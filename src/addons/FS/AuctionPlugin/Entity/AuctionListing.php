<?php

namespace FS\AuctionPlugin\Entity;

use XF\Mvc\Entity\Entity;
use XF\Mvc\Entity\Structure;
use XF\Util\Arr;

class AuctionListing extends Entity
{
    public static function getStructure(Structure $structure)
    {
        $structure->table = 'fs_auction_listing';
        $structure->shortName = 'FS\AuctionPlugin:AuctionListing';
        $structure->contentType = 'fs_auction';
        $structure->primaryKey = 'auction_id';
        $structure->columns = [
            'auction_id' => ['type' => self::UINT, 'autoIncrement' => true],
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
            'auction_status' => ['type' => self::BOOL, 'default' => true],
            'prefix_id' => ['type' => self::UINT, 'default' => 0],
            'attach_count' => ['type' => self::UINT, 'default' => 0],
            'ends_on' => ['type' => self::UINT, 'required' => true],
            'created_date' => ['type' => self::UINT, 'required' => false],
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
            'ShipVia' => [
                'entity' => 'FS\AuctionPlugin:ShipsVia',
                'type' => self::TO_ONE,
                'conditions' => [
                    ['via_id', '=', '$ships_via'],
                ]
            ],

            'ShipTerm' => [
                'entity' => 'FS\AuctionPlugin:ShipTerms',
                'type' => self::TO_ONE,
                'conditions' => [
                    ['term_id', '=', '$shipping_term'],
                ]
            ],

            'User' => [
                'entity' => 'XF:User',
                'type' => self::TO_ONE,
                'conditions' => 'user_id',
            ],
            'Prefix' => [
                'entity' => 'XF:ThreadPrefix',
                'type' => self::TO_ONE,
                'conditions' => 'prefix_id',
                'primary' => true
            ],

            'Attachment' => [
                'entity' => 'XF:Attachment',
                'type' => self::TO_ONE,
                'conditions' => [
                    ['content_type', '=', 'fs_auction'],
                    ['content_id', '=', '$auction_id']
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
        $extensions = array_merge($extensions, Arr::stringToArray($options->fs_auction_ImageExtensions));

        return [
            'extensions' => $extensions,
        ];
    }

    public function getImage()
    {
        $attachmentData = $this->finder('XF:Attachment')->where('content_id', $this->auction_id)->where('content_type', 'fs_auction')->fetchOne();

        return $attachmentData->Data ? $attachmentData->Data->getThumbnailUrl() : '';
    }
}
