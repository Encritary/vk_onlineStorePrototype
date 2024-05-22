<?php

declare(strict_types=1);

namespace vk_onlineStorePrototype\models\catalog;

use vk_onlineStorePrototype\models\Model;

class GoodStock implements Model{

	public static function findOrNull(Good $good, Warehouse $warehouse) : ?self{
		return new self(1, $good, $warehouse, 10);
	}

	public function __construct(
		public int $id,
		public Good $good,
		public Warehouse $warehouse,
		public int $itemCount
	){}
}