<?php

namespace XF\FindNew;

use XF\Entity\FindNew;

class Thread extends AbstractHandler
{
	public function getRoute()
	{
		// This returns threads, so we attach to the thread content type. However, as it's really individual posts
		// that generally bump things up, we refer to this in the interface as "new posts".
		return 'whats-new/posts';
	}

	public function getPageReply(\XF\Mvc\Controller $controller, FindNew $findNew, array $results, $page, $perPage)
	{
		$canInlineMod = false;

		/** @var \XF\Entity\Thread $thread */
		foreach ($results as $thread) {
			if ($thread->canUseInlineModeration()) {
				$canInlineMod = true;
				break;
			}
		}

		$viewParams = [
			'findNew' => $findNew,

			'page' => $page,
			'perPage' => $perPage,

			'threads' => $results,
			'canInlineMod' => $canInlineMod
		];
		return $controller->view('XF:WhatsNew\Posts', 'whats_new_posts', $viewParams);
	}

	public function getFiltersFromInput(\XF\Http\Request $request)
	{
		$filters = [];

		$visitor = \XF::visitor();

		$unread = $request->filter('unread', 'bool');
		if ($unread && $visitor->user_id) {
			$filters['unread'] = true;
		}

		$watched = $request->filter('watched', 'bool');
		if ($watched && $visitor->user_id) {
			$filters['watched'] = true;
		}

		$participated = $request->filter('participated', 'bool');
		if ($participated && $visitor->user_id) {
			$filters['participated'] = true;
		}

		$started = $request->filter('started', 'bool');
		if ($started && $visitor->user_id) {
			$filters['started'] = true;
		}

		$unanswered = $request->filter('unanswered', 'bool');
		if ($unanswered) {
			$filters['unanswered'] = true;
		}

		return $filters;
	}

	public function getDefaultFilters()
	{
		$visitor = \XF::visitor();

		if ($visitor->user_id) {
			return ['unread' => true];
		} else {
			return [];
		}
	}

	public function getResultIds(array $filters, $maxResults)
	{
		$visitor = \XF::visitor();

		/** @var \XF\Finder\Thread $threadFinder */
		$threadFinder = \XF::finder('XF:Thread')
			->with('Forum', true)
			->with('Forum.Node.Permissions|' . $visitor->permission_combination_id)
			->where('Forum.find_new', true)
			->where('discussion_type', '<>', 'redirect')
			->where('discussion_state', '<>', 'deleted')
			->order('last_post_date', 'DESC');

		$this->applyFilters($threadFinder, $filters);

		$threads = $threadFinder->fetch($maxResults);
		$threads = $this->filterResults($threads);

		// TODO: consider overfetching or some other permission limits within the query

		return $threads->keys();
	}

	public function getPageResultsEntities(array $ids)
	{
		$visitor = \XF::visitor();

		$ids = array_map('intval', $ids);

		$nodeFinder = \xf::finder('XF:Node')->where("parent_node_id", \xf::app()->options()->fs_web_ranking_parent_web_id);
		$tempNodeIds = $nodeFinder->pluckfrom('node_id')->fetch()->toArray();

		$forumFinder = \xf::finder('XF:Thread')->where("node_id", $tempNodeIds);
		$threadIds = $forumFinder->pluckfrom('thread_id')->fetch()->toArray();

		// echo "<pre>";
		// var_dump($threadIds);
		// var_dump($ids);

		$array1 = [
			287, 288, 293, 294, 295, 296, 297, 298, 299, 300,
			301, 302, 304, 285, 286, 289, 290, 291, 292, 303,
		];

		// $array2 = [
		// 	304, 302, 303, 301, 300, 299, 298, 297, 296, 295,
		// 	294, 293, 292, 291, 290, 289, 288, 287, 286, 285
		// ];

		$resultArray = array_values(array_diff($ids, $threadIds));
		// $resultArray = array_values(array_diff($array2, $array1));
		// var_dump($resultArray);
		// exit;
		/** @var \XF\Finder\Thread $threadFinder */
		$threadFinder = \XF::finder('XF:Thread')
			->where('thread_id', $ids)
			->with('fullForum')
			->with('Forum.Node.Permissions|' . $visitor->permission_combination_id);

		return $threadFinder->fetch();
	}

	protected function filterResults(\XF\Mvc\Entity\AbstractCollection $results)
	{
		return $results->filter(function (\XF\Entity\Thread $thread) {
			return ($thread->canView() && !$thread->isIgnored());
		});
	}

	protected function applyFilters(\XF\Finder\Thread $threadFinder, array $filters)
	{
		$visitor = \XF::visitor();

		if (!empty($filters['unread'])) {
			$threadFinder->unreadOnly($visitor->user_id);
		} else {
			$threadFinder->where('last_post_date', '>', \XF::$time - (86400 * \XF::options()->readMarkingDataLifetime));
		}

		if (!empty($filters['watched'])) {
			$threadFinder->watchedOnly($visitor->user_id);
		}

		if (!empty($filters['participated'])) {
			$threadFinder->exists('UserPosts|' . $visitor->user_id);
		}

		if (!empty($filters['started'])) {
			$threadFinder->where('user_id', $visitor->user_id);
		}

		if (!empty($filters['unanswered'])) {
			$threadFinder->where('reply_count', 0);
		}
	}

	public function getResultsPerPage()
	{
		return \XF::options()->discussionsPerPage;
	}
}
