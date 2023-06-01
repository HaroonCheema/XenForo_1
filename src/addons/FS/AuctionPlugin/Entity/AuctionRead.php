<?php

namespace FS\AuctionPlugin\Entity;

use XF\Mvc\Entity\Entity;
use XF\Mvc\Entity\Structure;

class AuctionRead extends Entity
{
	public static function getStructure(Structure $structure)
	{
		$structure->table = 'fs_auction_read';
		$structure->shortName = 'FS\AuctionPlugin:AuctionRead';
		$structure->contentType = 'fs_auction_read';
		$structure->primaryKey = 'auction_read_id';
		$structure->columns = [
			'auction_read_id' => ['type' => self::UINT, 'autoIncrement' => true],
			'user_id' => ['type' => self::UINT, 'required' => true],
			'auction_id' => ['type' => self::UINT, 'required' => true],
			'auction_read_date' => ['type' => self::UINT, 'default' => \XF::$time]
		];
		$structure->getters = [];
		$structure->relations = [];

		return $structure;
	}
}
