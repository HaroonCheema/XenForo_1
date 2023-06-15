<?php

namespace FS\AuctionPlugin\Entity;

use XF\Mvc\Entity\Entity;
use XF\Mvc\Entity\Structure;
use XF\Util\Arr;
use XF\Entity\BookmarkTrait;
use XF\Entity\LinkableInterface;


class AuctionListing extends Entity implements LinkableInterface
{

    use  BookmarkTrait;

    protected function canBookmarkContent(&$error = null)
    {

        return true;
    }

    public function getContentPublicRoute()
    {
        return 'auction/view-auction';
    }

    public function getContentTitle(string $context = '')
    {
        if ($this->title) {

            return $this->title;
        }
    }
    public function getContentUrl(bool $canonical = false, array $extraParams = [], $hash = null)
    {

        $route = $canonical ? 'canonical:auction/view-auction' : 'auction/view-auction';

        return $this->app()->router('public')->buildLink($route, $this, $extraParams, $hash);
    }
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
                'required' => 'fs_auctions_please_enter_valid_category'
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
            'prefix_id' => ['type' => self::UINT, 'default' => 0],
            'attach_count' => ['type' => self::UINT, 'default' => 0],
            'ends_on' => ['type' => self::UINT, 'required' => true],
            'created_date' => ['type' => self::UINT, 'default' => \XF::$time],
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
            'last_bumping' => ['type' => self::UINT, 'default' => \XF::$time],
            'bumping_counts' => ['type' => self::UINT, 'default' => 0],
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
        static::addBookmarkableStructureElements($structure);

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


    public function getFormatedTime()
    {
        $tempDate = new \DateTime('@' . $this->ends_on);
        $date =  date_timezone_set($tempDate, timezone_open('America/Los_Angeles'));
        return $date->format("H:i");
    }
    public function getFormatedTime12()
    {
        $tempDate = new \DateTime('@' . $this->ends_on);
        $date =  date_timezone_set($tempDate, timezone_open('America/Los_Angeles'));
        return $date->format("F j Y, h:i A");
    }

    public function getImage()
    {
        $attachmentData = $this->finder('XF:Attachment')->where('content_id', $this->auction_id)->where('content_type', 'fs_auction')->fetchOne();

        return $attachmentData->Data ? $attachmentData->Data->getThumbnailUrl() : '';
    }
    public function getMaxBidOfAuction()
    {
        $maxBid = $this->finder('FS\AuctionPlugin:Bidding')->where('auction_id', $this->auction_id)->order('bidding_amount', 'desc')->fetchOne();
if ($maxBid){
    return $maxBid->bidding_amount;
}
else{
    return false;
}
    }
}
