<?php

namespace FS\AuctionPlugin\Attachment;

use XF\Attachment\AbstractHandler;
use XF\Entity\Attachment;
use XF\Mvc\Entity\Entity;

class AuctionListing extends AbstractHandler
{
	public function getContainerWith()
	{
		$visitor = \XF::visitor();

		return ['Attachment'];
	}

	public function canView(Attachment $attachment, Entity $container, &$error = null)
	{

		return $container->canView();
	}

	public function canManageAttachments(array $context, &$error = null)
	{

		return true;
	}

	public function validateAttachmentUpload(\XF\Http\Upload $upload, \XF\Attachment\Manipulator $manipulator)
	{

		if (!$upload->getTempFile()) {
			return;
		}

		$extension = $upload->getExtension();

		$repo = \XF::repository('FS\AuctionPlugin:AuctionListing');



		$mediaType = $repo->getMediaTypeFromExtension($extension);

		if (in_array($mediaType, ['audio', 'image', 'video'])) {
			$visitor = \XF::visitor();
			$constraints = $manipulator->getConstraints();

			$thisFileSize = $runningTotal = $upload->getFileSize();
			$newAttachments = $manipulator->getNewAttachments();
			if (count($newAttachments)) {
				foreach ($newAttachments as $attachment) {
					/** @var \XF\Entity\Attachment $attachment */
					$runningTotal += intval($attachment->getFileSize());
				}
			}
		}
	}

	public function onAttachmentDelete(Attachment $attachment, Entity $container = null)
	{
		if (!$container) {
			return;
		}
	}

	public function getConstraints(array $context)
	{
		$options = \XF::options();

		return [
			'extensions' => preg_split('/\s+/', trim($options->attachmentExtensions), -1, PREG_SPLIT_NO_EMPTY),
			'size' => $options->attachmentMaxFileSize * 1024,
			'width' => $options->attachmentMaxDimensions['width'],
			'height' => $options->attachmentMaxDimensions['height'],
			'count' => $options->fs_auction_max_attachments
		];
	}

	public function getContainerIdFromContext(array $context)
	{
		return isset($context['auction_id']) ? intval($context['auction_id']) : null;
	}

	public function getContainerLink(Entity $container, array $extraParams = [])
	{
		return \XF::app()->router('admin')->buildLink('item-list', $container, $extraParams);
	}

	public function getContext(Entity $entity = null, array $extraContext = [])
	{

		if ($entity instanceof \FS\AuctionPlugin\Entity\AuctionListing) {
			$extraContext['auction_id'] = $entity->auction_id;
		} else if (!$entity) {
			// need nothing
		} else {
			throw new \InvalidArgumentException("Entity must be media, record or category");
		}

		return $extraContext;
	}
}
