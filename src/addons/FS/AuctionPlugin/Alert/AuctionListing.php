<?php

namespace FS\AuctionPlugin\Alert;

use XF\Mvc\Entity\Entity;
use XF\Alert\AbstractHandler;

class AuctionListing extends AbstractHandler
{
    public function getOptOutActions()
    {
        return [
            'auction_bid',
        ];
    }

    public function getOptOutDisplayOrder()
    {
        return 200;
    }

    public function canViewContent(Entity $entity, &$error = null)
    {
        return true;
    }
}
