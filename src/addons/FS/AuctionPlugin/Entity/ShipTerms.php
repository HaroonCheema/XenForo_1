<?php

namespace FS\AuctionPlugin\Entity;

use XF\Mvc\Entity\Entity;
use XF\Mvc\Entity\Structure;

class ShipTerms extends Entity
{

    public static function getStructure(Structure $structure)
    {
        $structure->table = 'fs_auction_ship_terms';
        $structure->shortName = 'FS\AuctionPlugin:ShipTerms';
        $structure->contentType = 'fs_auction_ship_terms';
        $structure->primaryKey = 'term_id';
        $structure->columns = [
            'term_id' => ['type' => self::UINT, 'autoIncrement' => true],
            'shipping_term' => ['type' => self::STR, 'default' => null],
        ];

        $structure->relations = [];
        $structure->defaultWith = [];
        $structure->getters = [];
        $structure->behaviors = [];

        return $structure;
    }
}
