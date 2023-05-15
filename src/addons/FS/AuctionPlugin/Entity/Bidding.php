<?php

namespace FS\AuctionPlugin\Entity;

use XF\Mvc\Entity\Entity;
use XF\Mvc\Entity\Structure;
use XF\Util\Arr;

class Bidding extends Entity
{
    public static function getStructure(Structure $structure)
    {
        $structure->table = 'fs_auction_category_bidding';
        $structure->shortName = 'FS\AuctionPlugin:Bidding';
        $structure->contentType = 'fs_auction';
        $structure->primaryKey = 'bidding_id';
        $structure->columns = [
            'bidding_id' => ['type' => self::UINT, 'autoIncrement' => true],
            'category_id' => [
                'type' => self::UINT,
                'required' => 'z61_classifieds_please_enter_valid_category'
            ],
            'title' => [
                'type' => self::STR, 'maxLength' => 100,
                'required' => 'please_enter_valid_title'
            ],
            'content' => [
                'type' => self::STR,
                'required' => 'please_enter_valid_message',
                'censor' => true
            ],
            'user_id' => ['type' => self::UINT, 'required' => true],
            'bidding_status' => ['type' => self::BOOL, 'default' => true],
            'prefix_id' => ['type' => self::UINT, 'default' => 0],
            'attach_count' => ['type' => self::UINT, 'default' => 0],
            'ends_on' => ['type' => self::UINT, 'required' => true],
            'timezone' => ['type' => self::STR, 'required' => true],
            'starting_bid' => ['type' => self::UINT, 'required' => true],
            'bid_increament' => ['type' => self::UINT, 'required' => true],
            'shipping_term' => ['type' => self::STR, 'required' => true],
            'ships_via' => ['type' => self::STR, 'required' => true],
            'auction_guidelines' => ['type' => self::BOOL, 'default' => false],
            'bumping_rules' => ['type' => self::BOOL, 'default' => false],
            'watch_thread' => ['type' => self::BOOL, 'default' => false],
            'receive_email' => ['type' => self::BOOL, 'default' => false],
            'payment_methods' => ['type' => self::JSON_ARRAY, 'default' => []],
        ];

        $structure->relations = [
            'Category' => [
                'entity' => 'FS\AuctionPlugin:Category',
                'type' => self::TO_ONE,
                'conditions' => 'category_id',
            ],

            'Attachment' => [
                'entity' => 'XF:Attachment',
                'type' => self::TO_ONE,
                'conditions' => [
                    ['content_type', '=', 'fs_auction'],
                    ['content_id', '=', '$bidding_id']
                ],
                'with' => 'Data',
            ]
        ];
        $structure->defaultWith = [];
        $structure->getters = [];
        $structure->behaviors = [];

        return $structure;
    }

    public function getAttachmentConstraints()
    {

        $options = $this->app()->options();

        $extensions = [];
        $extensions = array_merge($extensions, Arr::stringToArray($options->bh_ImageExtensions));

        return [
            'extensions' => $extensions,
        ];
    }
}
