<?php

namespace DC\CustomNodeIcon\XF\Entity;

use XF\Mvc\Entity\Structure;

class Node extends XFCP_Node
{
    public function getIcon()
    {
        $icon = 'data://nodeIcons/'.$this->node_id.'.jpg';
		
		if (\XF\Util\File::abstractedPathExists($icon))
		{
			return $this->app()->applyExternalDataUrl('nodeIcons/' . $this->node_id . '.jpg?' . $this->icon_time, true);
		}
	
		return;
    }

    public function getIconUnread()
    {
        $icon = 'data://nodeIcons/'.$this->node_id.'_unread.jpg';
		
		if (\XF\Util\File::abstractedPathExists($icon))
		{
			return $this->app()->applyExternalDataUrl('nodeIcons/' . $this->node_id . '_unread.jpg?' . $this->icon_time, true);
		}
	
		return;
    }

    protected function _preSave()
    {
        $parent = parent::_preSave();
        
        $this->icon_time = \XF::$time;

        return $parent;
    }

    protected function _postDelete()
	{
        $parent = parent::_postDelete();
        
        \XF\Util\File::deleteFromAbstractedPath('data://nodeIcons/'.$this->node_id.'.jpg');
        \XF\Util\File::deleteFromAbstractedPath('data://nodeIcons/'.$this->node_id.'_unread.jpg');

        return $parent;
    }
    
    public static function getStructure(Structure $structure)
    {
        $structure = parent::getStructure($structure);

        $structure->columns['icon_time'] = ['type' => self::INT, 'default' => 0];

        return $structure;
    }
}