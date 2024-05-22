<?php

declare(strict_types=1);

namespace vk_onlineStorePrototype\models\catalog;

use vk_onlineStorePrototype\models\Model;

class Subgroup implements Model{

	public function __construct(
		public int $id,
		public string $name,
		public string $imageUrl,
		public Group $group
	){}
}