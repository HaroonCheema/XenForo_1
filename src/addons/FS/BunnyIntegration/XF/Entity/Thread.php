<?php

namespace FS\BunnyIntegration\XF\Entity;

use XF\Mvc\Entity\Structure;

class Thread extends XFCP_Thread
{

    public static function getStructure(Structure $structure)
    {
        $structure = parent::getStructure($structure);

        $structure->columns['bunny_lib_id'] =  ['type' => self::UINT, 'default' => 0];
        $structure->columns['bunny_vid_id'] =  ['type' => self::STR, 'default' => null];

        return $structure;
    }
}
