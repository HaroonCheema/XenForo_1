<?php

namespace XF\Service\Thread;

use XF\Entity\Post;
use XF\Entity\Thread;
use XF\Entity\User;

class Replier extends \XF\Service\AbstractService
{
	use \XF\Service\ValidateAndSavableTrait;

	/**
	 * @var Thread
	 */
	protected $thread;

	/**
	 * @var Post
	 */
	protected $post;

	/**
	 * @var User
	 */
	protected $user;

	/**
	 * @var \XF\Service\Post\Preparer
	 */
	protected $postPreparer;

	protected $performValidations = true;

	protected $isPreRegAction = false;

	public function __construct(\XF\App $app, Thread $thread)
	{
		parent::__construct($app);
		$this->setThread($thread);
		$this->setUser(\XF::visitor());
		$this->setPostDefaults();
	}

	protected function setThread(Thread $thread)
	{
		$this->thread = $thread;
		$this->post = $thread->getNewPost();
		$this->postPreparer = $this->service('XF:Post\Preparer', $this->post);
	}

	public function getThread()
	{
		return $this->thread;
	}

	public function getPost()
	{
		return $this->post;
	}

	public function getPostPreparer()
	{
		return $this->postPreparer;
	}

	protected function setUser(\XF\Entity\User $user)
	{
		$this->user = $user;
	}

	public function logIp($logIp)
	{
		$this->postPreparer->logIp($logIp);
	}

	public function setPerformValidations($perform)
	{
		$this->performValidations = (bool)$perform;
	}

	public function getPerformValidations()
	{
		return $this->performValidations;
	}

	public function setIsAutomated()
	{
		$this->logIp(false);
		$this->setPerformValidations(false);
	}

	public function setIsPreRegAction(bool $isPreRegAction)
	{
		$this->isPreRegAction = $isPreRegAction;
	}

	protected function setPostDefaults()
	{
		$forum = $this->thread->Forum;

		if (!$forum) {
			throw new \LogicException("Thread is not in a valid forum");
		}

		$this->post->message_state = $forum->getNewContentState($this->thread);
		$this->post->user_id = $this->user->user_id;
		$this->post->username = $this->user->username;
	}

	public function setMessage($message, $format = true)
	{
		return $this->postPreparer->setMessage($message, $format, $this->performValidations);
	}

	public function setAttachmentHash($hash)
	{

		$this->postPreparer->setAttachmentHash($hash);
	}

	public function checkForSpam()
	{
		if ($this->post->message_state == 'visible' && $this->user->isSpamCheckRequired()) {
			$this->postPreparer->checkForSpam();
		}
	}

	protected function finalSetup()
	{
		$this->post->post_date = time();
	}

	protected function _validate()
	{
		$this->finalSetup();

		$post = $this->post;

		if (!$post->user_id && !$this->isPreRegAction) {
			/** @var \XF\Validator\Username $validator */
			$validator = $this->app->validator('Username');
			$post->username = $validator->coerceValue($post->username);
			if ($this->performValidations && !$validator->isValid($post->username, $error)) {
				return [$validator->getPrintableErrorValue($error)];
			}
		} else if ($this->isPreRegAction && !$post->username) {
			// need to force a value here to avoid a presave error
			$post->username = 'preRegAction-' . \XF::$time;
		}

		$post->preSave();

		$errors = $post->getErrors();

		return $errors;
	}

	protected function _save()
	{
		if ($this->isPreRegAction) {
			throw new \LogicException("Pre-reg action replies cannot be saved");
		}

		$post = $this->post;

		$db = $this->db();
		$db->beginTransaction();

		$threadLatest = $this->db()->fetchRow("
			SELECT *
			FROM xf_thread
			WHERE thread_id = ?
			FOR UPDATE
		", $this->thread->thread_id);

		// Ensure our thread entity has the latest data to make sure things like reply count are correct
		$forceUpdateColumns = [
			'first_post_id',
			'reply_count',
			'last_post_date',
			'last_post_id',
			'last_post_user_id',
			'last_post_username'
		];
		foreach ($forceUpdateColumns as $forceUpdateColumn) {
			$this->thread->setAsSaved($forceUpdateColumn, $threadLatest[$forceUpdateColumn]);
		}

		$this->setPostPosition($threadLatest);

		$post->save(true, false);

		$this->postPreparer->afterInsert();

		$db->commit();

		return $post;
	}

	protected function setPostPosition(array $threadInfo)
	{
		$post = $this->post;

		if ($post->post_date < $threadInfo['last_post_date']) {
			throw new \LogicException("Replier can only add posts at the end of a thread");
		}

		if ($post->message_state == 'visible') {
			$position = $threadInfo['reply_count'] + 1;
		} else {
			$position = $threadInfo['reply_count'];
		}

		$post->set('position', $position, ['forceSet' => true]);
	}

	public function sendNotifications()
	{
		//var_dump($this->post->isVisible());
		//exit;
		//if ($this->post->isVisible()) {
		/** @var \XF\Service\Post\Notifier $notifier */
		$notifier = $this->service('XF:Post\Notifier', $this->post, 'reply');

		// var_dump($this->postPreparer->getMentionedUserIds(), $this->postPreparer->getQuotedUserIds());
		//exit;
		$notifier->setMentionedUserIds($this->postPreparer->getMentionedUserIds());
		$notifier->setQuotedUserIds($this->postPreparer->getQuotedUserIds());
		$notifier->notifyAndEnqueue(3);
		//}
	}
}
