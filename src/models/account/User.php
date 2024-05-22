<?php

declare(strict_types=1);

namespace vk_onlineStorePrototype\models\account;

use vk_onlineStorePrototype\models\Model;

class User implements Model{

	public function __construct(
		public int $id,
		public string $email,
		public string $phone,
		public string $passwordHash
	){}
}