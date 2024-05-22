<?php

declare(strict_types=1);

namespace vk_onlineStorePrototype\models\account;

use vk_onlineStorePrototype\data\OrderStatus;
use vk_onlineStorePrototype\models\Model;

class Order implements Model{

	public static function create(string $logisticId) : self{
		// insert into db
		return new self(1, OrderStatus::Created, $logisticId);
	}

	public function __construct(
		public int $id,
		public OrderStatus $status,
		public string $logisticId
	){}
}