<?php

declare(strict_types=1);

namespace vk_onlineStorePrototype\integration;

interface LogisticAPI{

	public function createShipping(string $phone, string $warehouse, string $userAddress) : string;
}