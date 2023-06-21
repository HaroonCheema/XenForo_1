<?php

namespace FS\AuctionPlugin\Bookmark;

use XF\Bookmark\AbstractHandler;
use XF\Mvc\Entity\Entity;


class AuctionListing extends AbstractHandler
{
	public function getContentUser(Entity $content)
	{
		if ($content->Thread->User) {

			return $content->Thread->User;
		}
	}

	public function canViewContent(Entity $content, &$error = null)
	{
		return true;
	}
}
