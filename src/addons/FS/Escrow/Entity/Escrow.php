<?php

namespace FS\Escrow\Entity;

use XF\Mvc\Entity\Entity;
use XF\Mvc\Entity\Structure;

class Escrow extends Entity
{

    public static function getStructure(Structure $structure)
    {
        $structure->table = 'fs_escrow';
        $structure->shortName = 'FS\Escrow:Escrow';
        $structure->contentType = 'fs_escrow';
        $structure->primaryKey = 'escrow_id';
        $structure->columns = [
            'escrow_id' => ['type' => self::UINT, 'autoIncrement' => true],
            'user_id' => ['type' => self::UINT, 'default' => 0],
            'to_user' => ['type' => self::UINT, 'default' => 0],
            'escrow_amount' => ['type' => self::UINT, 'default' => 0],
            'thread_id' => ['type' => self::UINT, 'default' => 0],
            'transaction_id' => ['type' => self::UINT, 'default' => 0],
            'escrow_status' => ['type' => self::UINT, 'default' => 0],
            'admin_percentage' => ['type' => self::UINT, 'default' => 0],
        ];

        $structure->relations = [
            'User' => [
                'entity' => 'XF:User',
                'type' => self::TO_ONE,
                'conditions' => [
                    ['user_id', '=', '$to_user'],
                ]
            ],
            'Thread' => [
                'entity' => 'XF:Thread',
                'type' => self::TO_ONE,
                'conditions' => 'thread_id',
                'primary' => true
            ],
        ];
        $structure->defaultWith = [];
        $structure->getters = [];
        $structure->behaviors = [];

        return $structure;
    }
}
