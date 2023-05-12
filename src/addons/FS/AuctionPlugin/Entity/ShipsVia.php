<?php

namespace FS\AuctionPlugin\Entity;

use XF\Mvc\Entity\Entity;
use XF\Mvc\Entity\Structure;

class ShipsVia extends Entity
{

    public static function getStructure(Structure $structure)
    {
        $structure->table = 'fs_auction_ship_via';
        $structure->shortName = 'FS\AuctionPlugin:ShipsVia';
        $structure->contentType = 'fs_auction_ship_via';
        $structure->primaryKey = 'via_id';
        $structure->columns = [
            'via_id' => ['type' => self::UINT, 'autoIncrement' => true],
            'ship_via' => ['type' => self::STR, 'default' => null],
        ];

        $structure->relations = [];
        $structure->defaultWith = [];
        $structure->getters = [];
        $structure->behaviors = [];

        return $structure;
    }
}
