<?php

namespace FS\Molly\XF\Entity;

use XF\Mvc\Entity\Structure;

class Node extends XFCP_Node
{
    // public function canAddAuctions()
    // {
    //     return ($this->user_id && $this->hasPermission('fs_auction', 'add'));
    // }

    public static function getStructure(Structure $structure)
    {
        $structure = parent::getStructure($structure);

        $structure->columns['avatar_attachment_id'] =  ['type' => self::UINT, 'default' => 0];
        $structure->columns['cover_attachment_id'] =  ['type' => self::UINT, 'default' => 0];
        $structure->columns['cover_crop_data'] =  ['type' => self::JSON_ARRAY, 'default' => []];

        $structure->relations += [
            'AvatarAttachment' => [
                'type' => self::TO_ONE,
                'entity' => 'XF:Attachment',
                'conditions' => [
                    ['attachment_id', '=', '$avatar_attachment_id']
                ],
                'primary' => true,
                'with' => ['Data']
            ],
            'CoverAttachment' => [
                'type' => self::TO_ONE,
                'entity' => 'XF:Attachment',
                'conditions' => [
                    ['attachment_id', '=', '$cover_attachment_id']
                ],
                'primary' => true,
                'with' => ['Data']
            ],
        ];

        return $structure;
    }

    /**
     * @param bool $canonical
     * @return string|null
     */
    public function getAvatarUrl($canonical = false)
    {
        /** @var Attachment|null $attachment */
        $attachment = $this->AvatarAttachment;
        if ($attachment === null) {
            return null;
        }

        return $this
            ->app()
            ->router('public')
            ->buildLink(($canonical ? 'canonical:' : '') . 'attachments', $attachment);
    }
}
