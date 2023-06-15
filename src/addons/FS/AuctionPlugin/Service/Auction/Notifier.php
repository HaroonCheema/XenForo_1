<?php

namespace FS\Service\Auction;

use FS\AuctionPlugin\Entity\AuctionListing;
use XF\Service\AbstractNotifier;

class Notifier extends AbstractNotifier
{
    /**
     * @var AuctionListing
     */
    protected $auction;

    protected $actionType;

    public function __construct(\XF\App $app, AuctionListing $auction, $actionType)
    {
        parent::__construct($app);

        // switch ($actionType)
        // {
        // 	case 'reply':
        // 	case 'thread':
        // 		break;

        // 	default:
        // 		throw new \InvalidArgumentException("Unknown action type '$actionType'");
        // }

        $this->actionType = $actionType;
        $this->auction = $auction;
    }

    public static function createForJob(array $extraData)
    {
        $auction = \XF::app()->find('XF:Post', $extraData['auction_id'], ['User']);
        if (!$auction) {
            return null;
        }

        return \XF::service('FS\Service:Auction\Notifier', $auction, $extraData['actionType']);
    }

    protected function getExtraJobData()
    {
        return [
            'auction_id' => $this->auction->auction_id,
            'actionType' => $this->actionType
        ];
    }

    protected function loadNotifiers()
    {
        $notifiers = [
            'auction' => $this->app->notifier('FS\AuctionPlugin\Notifier:Listing\Auction', $this->auction),
        ];

        // if this is not the last post, then another notification would have been triggered already
        // if ($this->auction->isLastPost()) {
        //     $notifiers['threadWatch'] = $this->app->notifier('XF:Post\ThreadWatch', $this->auction, $this->actionType);
        // }

        return $notifiers;
    }

    protected function loadExtraUserData(array $users)
    {
        $permCombinationIds = [];
        foreach ($users as $user) {
            $id = $user->permission_combination_id;
            $permCombinationIds[$id] = $id;
        }

        $this->app->permissionCache()->cacheMultipleContentPermsForContent(
            $permCombinationIds,
            'node',
            $this->auction->auction_id
        );
    }

    protected function canUserViewContent(\XF\Entity\User $user)
    {
        return true;
    }

    public function skipUsersWatchingForum(\XF\Entity\Forum $forum)
    {
        $watchers = $this->db()->fetchAll("
			SELECT user_id, send_alert, send_email
			FROM xf_forum_watch
			WHERE node_id = ?
				AND (send_alert = 1 OR send_email = 1)
		", $forum->node_id);

        foreach ($watchers as $watcher) {
            if ($watcher['send_alert']) {
                $this->setUserAsAlerted($watcher['user_id']);
            }
            if ($watcher['send_email']) {
                $this->setUserAsEmailed($watcher['user_id']);
            }
        }
    }
}
