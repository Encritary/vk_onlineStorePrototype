<?php

declare(strict_types=1);

namespace vk_onlineStorePrototype\models\catalog;

use vk_onlineStorePrototype\exception\ModelNotFoundException;
use vk_onlineStorePrototype\models\Model;

class Good implements Model{

	/**
	 * @throws ModelNotFoundException
	 */
	public static function get(int $id) : self{
		if($id !== 2){
			throw new ModelNotFoundException("Can't find good ID = $id");
		}
		return new self(
			$id, "test", "https://test.example/test.png",
			new Subgroup(1, "test", "test.png",
				new Group(1, "test", "test.png")
			)
		);
	}

	public function __construct(
		public int $id,
		public string $name,
		public string $imageUrl,
		public Subgroup $subgroup
	){}
}