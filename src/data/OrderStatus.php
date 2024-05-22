<?php

declare(strict_types=1);

namespace vk_onlineStorePrototype\data;

enum OrderStatus : string{
	case Created = 'created';
	case Packaging = 'packaging';
	case Sent = 'sent';
	case Received = 'received';
	case Cancelled = 'cancelled';
}