<?php

declare(strict_types=1);

namespace vk_onlineStorePrototype\models\account;

use vk_onlineStorePrototype\models\catalog\Good;
use vk_onlineStorePrototype\models\Model;

class OrderGood implements Model{

	public static function create(Order $order, Good $good, int $quantity) : self{
		return new self(1, $order, $good, $quantity);
	}

	public function __construct(
		public int $id,
		public Order $order,
		public Good $good,
		public int $quantity
	){}
}