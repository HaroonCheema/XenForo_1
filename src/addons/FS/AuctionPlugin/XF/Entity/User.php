<?php

namespace FS\AuctionPlugin\XF\Entity;

use XF\Mvc\Entity\Structure;

class User extends XFCP_User
{
    public static function getStructure(Structure $structure)
    {
        $structure = parent::getStructure($structure);

        $structure->columns['layout_type'] =  ['type' => self::UINT, 'default' => 0];

        return $structure;
    }
}
