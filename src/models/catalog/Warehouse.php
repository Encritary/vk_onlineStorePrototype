<?php

declare(strict_types=1);

namespace vk_onlineStorePrototype\models\catalog;

use vk_onlineStorePrototype\exception\ModelNotFoundException;
use vk_onlineStorePrototype\models\Model;

class Warehouse implements Model{

	/**
	 * @throws ModelNotFoundException
	 */
	public static function get(int $id) : self{
		if($id !== 2){
			throw new ModelNotFoundException("Can't find warehouse ID = $id");
		}
		return new self($id, "test", new City(0, "test"), "1234");
	}

	public function __construct(
		public int $id,
		public string $address,
		public City $city,
		public string $logisticId
	){}
}