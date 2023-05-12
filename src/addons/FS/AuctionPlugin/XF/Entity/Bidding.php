<?php

namespace FS\AutoForumManager\Entity;

use XF\Mvc\Entity\Entity;
use XF\Mvc\Entity\Structure;

class AutoForumManager extends Entity
{

    public static function getStructure(Structure $structure)
    {
        $structure->table = 'fs_auto_forum_manage';
        $structure->shortName = 'FS\AutoForumManager:AutoForumManager';
        $structure->contentType = 'fs_auto_forum_manage';
        $structure->primaryKey = 'forum_manage_id';
        $structure->columns = [
            'forum_manage_id' => ['type' => self::UINT, 'autoIncrement' => true],
            'admin_id' => ['type' => self::UINT, 'default' => null],
            'node_id' => ['type' => self::UINT, 'default' => null],
            'last_login_days' => ['type' => self::UINT, 'default' => null],
        ];

        $structure->relations = [
            'User' => [
                'entity' => 'XF:User',
                'type' => self::TO_ONE,
                'conditions' => [
                    ['user_id', '=', '$admin_id'],
                ],
            ],

            'Node' => [
                'entity' => 'XF:Node',
                'type' => self::TO_ONE,
                'conditions' => 'node_id',
            ],
        ];
        $structure->defaultWith = [];
        $structure->getters = [];
        $structure->behaviors = [];

        return $structure;
    }

    public static function getStructure(Structure $structure)
    {
        $structure->table = 'xf_z61_classifieds_listing';
        $structure->shortName = 'FS\AuctionPlugin:Listing';
        $structure->contentType = 'classifieds_listing';
        $structure->primaryKey = 'listing_id';
        $structure->columns = [
            'listing_id' => ['type' => self::UINT, 'autoIncrement' => true],
            'listing_type_id' => ['type' => self::UINT,
                'required' => 'z61_classifieds_please_enter_valid_type'
            ],
            'condition_id' => ['type' => self::UINT,
                'required' => 'z61_classifieds_please_enter_valid_condition'
            ],
            'package_id' => ['type' => self::UINT,
                'required' => 'z61_classifieds_please_enter_valid_package'
            ],
            'category_id' => ['type' => self::UINT,
                'required' => 'z61_classifieds_please_enter_valid_category'
            ],
            'title' => ['type' => self::STR, 'maxLength' => 100,
                'required' => 'please_enter_valid_title'
            ],
            'content' => ['type' => self::STR,
                'required' => 'please_enter_valid_message',
                'censor' => true
            ],
            'listing_date' => ['type' => self::UINT, 'required' => true, 'default' => \XF::$time],
            'user_id' => ['type' => self::UINT, 'required' => true],
            'username' => ['type' => self::STR, 'maxLength' => 50,
                'required' => 'please_enter_valid_name'
            ],
            'discussion_thread_id' => ['type' => self::UINT, 'default' => 0],
            'ip_id' => ['type' => self::UINT, 'default' => 0],
            'view_count' => ['type' => self::UINT, 'default' => 0],
            'price' => ['type' => self::FLOAT, 'default' => 0, 'max' => 99999999, 'min' => 0],
            'currency' => ['type' => self::STR, 'default' => '', 'maxLength' => 3],
            'last_edit_date' => ['type' => self::UINT, 'default' => 0],
            'last_edit_user_id' => ['type' => self::UINT, 'default' => 0],
            'listing_state' => ['type' => self::STR, 'default' => 'visible',
                'allowedValues' => ['visible', 'moderated', 'deleted']
            ],
            'listing_status' => ['type' => self::STR, 'default' => 'active',
                'allowedValues' => ['active', 'awaiting_payment', 'sold', 'expired']
            ],
            'listing_open' => ['type' => self::BOOL, 'default' => true],
            'listing_location' => ['type' => self::STR, 'maxLength' => 255],
            'listing_location_data' => ['type' => self::JSON_ARRAY, 'default' => []],
            'warning_id' => ['type' => self::UINT, 'default' => 0],
            'warning_message' => ['type' => self::STR, 'default' => ''],
            'prefix_id' => ['type' => self::UINT, 'default' => 0],
            'attach_count' => ['type' => self::UINT, 'default' => 0],
            'custom_fields' => ['type' => self::JSON_ARRAY, 'default' => []],
            'tags' => ['type' => self::JSON_ARRAY, 'default' => []],
            'embed_metadata' => ['type' => self::JSON_ARRAY, 'default' => []],
            'expiration_date' => ['type' => self::UINT, 'default' => 0],
            'contact_email' => ['type' => self::STR, 'default' => '', 'maxLength' => 150],
            'contact_custom' => ['type' => self::STR, 'default' => '', 'maxLength' => 150],
            'contact_email_enable' => ['type' => self::BOOL, 'default' => true],
            'contact_conversation_enable' => ['type' => self::BOOL, 'default' => true],
            'location_lat' => ['type' => self::FLOAT, 'default' => 0.0, 'nullable' => true],
            'location_long' => ['type' => self::FLOAT, 'default' => 0.0, 'nullable' => true],
            'cover_image_id' => ['type' => self::INT, 'nullable' => true],
            'sold_user_id' => ['type' => self::UINT, 'nullable' => true],
            'sold_username' => ['type' => self::STR, 'nullable' => true]
        ];
        $structure->behaviors = [
            'XF:Reactable' => ['stateField' => 'listing_state'],
            'XF:Taggable' => ['stateField' => 'listing_state'],
            'XF:Indexable' => [
                'checkForUpdates' => ['title', 'content', 'category_id', 'user_id', 'discussion_thread_id', 'listing_date', 'listing_state', 'listing_status', 'tags']
            ],
            'XF:NewsFeedPublishable' => [
                'usernameField' => 'username',
                'dateField' => 'listing_date'
            ],
            'XF:CustomFieldsHolder' => [
                'valueTable' => 'xf_z61_classifieds_listing_field_value',
                'checkForUpdates' => ['category_id'],
                'getAllowedFields' => function($listing) { return $listing->Category ? $listing->Category->field_cache : []; }
            ]
        ];
        $structure->getters = [
            'custom_fields' => true,
            'expired' => true,
	        'purchasable_type_id' => true
        ];
        $structure->relations = [
            'Category' => [
                'entity' => 'FS\AuctionPlugin:Category',
                'type' => self::TO_ONE,
                'conditions' => 'category_id',
                'primary' => true,
            ],
            'Type' => [
                'entity' => 'FS\AuctionPlugin:ListingType',
                'type' => self::TO_ONE,
                'conditions' => 'listing_type_id',
                'primary' => true,
            ],
            'User' => [
                'entity' => 'XF:User',
                'type' => self::TO_ONE,
                'conditions' => 'user_id',
                'primary' => 'true'
            ],
            'SoldUser' => [
                'entity' => 'XF:User',
                'type' => self::TO_ONE,
                'conditions' => [['user_id', '=', '$sold_user_id']],
                'primary' => 'true'
            ],
            'Prefix' => [
                'entity' => 'FS\AuctionPlugin:ListingPrefix',
                'type' => self::TO_ONE,
                'conditions' => 'prefix_id',
                'primary' => true
            ],
            'Discussion' => [
                'entity' => 'XF:Thread',
                'type' => self::TO_ONE,
                'conditions' => [['thread_id', '=', '$discussion_thread_id']],
                'primary' => true
            ],
            'CoverImage' => [
                'entity' => 'XF:Attachment',
                'type' => self::TO_ONE,
                'conditions' => [
                    ['content_type', '=', 'classifieds_listing'],
                    ['content_id', '=', '$listing_id'],
                    ['attachment_id', '=', '$cover_image_id']
                ],
                'with' => 'Data',
                'order' => 'attach_date'
            ],
            'Attachments' => [
                'entity' => 'XF:Attachment',
                'type' => self::TO_MANY,
                'conditions' => [
                    ['content_type', '=', 'classifieds_listing'],
                    ['content_id', '=', '$listing_id']
                ],
                'with' => 'Data',
                'order' => 'attach_date'
            ],
            'ApprovalQueue' => [
                'entity' => 'XF:ApprovalQueue',
                'type' => self::TO_ONE,
                'conditions' => [
                    ['content_type', '=', 'classifieds_listing'],
                    ['content_id', '=', '$listing_id']
                ],
                'primary' => true
            ],
            'DeletionLog' => [
                'entity' => 'XF:DeletionLog',
                'type' => self::TO_ONE,
                'conditions' => [
                    ['content_type', '=', 'classifieds_listing'],
                    ['content_id', '=', '$listing_id']
                ],
                'primary' => true
            ],
            'Watch' => [
                'entity' => 'FS\AuctionPlugin:ListingWatch',
                'type' => self::TO_MANY,
                'conditions' => 'listing_id',
                'key' => 'user_id'
            ],
            'Featured' => [
                'entity' => 'FS\AuctionPlugin:ListingFeature',
                'type' => self::TO_ONE,
                'conditions' => 'listing_id',
                'primary' => true
            ],
            'Read' => [
                'entity' => 'FS\AuctionPlugin:ListingRead',
                'type' => self::TO_MANY,
                'conditions' => 'listing_id',
                'key' => 'user_id'
            ],
            'Condition' => [
                'entity' => 'FS\AuctionPlugin:Condition',
                'type' => self::TO_ONE,
                'conditions' => 'condition_id',
                'primary' => true,
            ],
            'Package' => [
                'entity' => 'FS\AuctionPlugin:Package',
                'type' => self::TO_ONE,
                'conditions' => 'package_id',
                'primary' => true,
            ],
            'Questions' => [
                'entity' => 'FS\AuctionPlugin:Question',
                'type' => self::TO_MANY,
                'conditions' => [
                    ['listing_id', '=', '$listing_id']
                ],
                'primary' => true,
            ],
        ];
        $structure->defaultWith = [
            'Category', 'User'
        ];
        $structure->options = [
            'log_moderator' => true
        ];

        static::addReactableStructureElements($structure);
        static::addBookmarkableStructureElements($structure);

        return $structure;
    }
}
