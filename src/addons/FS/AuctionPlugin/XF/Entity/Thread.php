<?php

namespace FS\AuctionPlugin\XF\Entity;

use XF\Mvc\Entity\Structure;

class Thread extends XFCP_Thread
{
    public static function getStructure(Structure $structure)
    {
        $structure = parent::getStructure($structure);

        $structure->columns['auction_end_date'] =  ['type' => self::UINT, 'default' => 0];

        return $structure;
    }
}
