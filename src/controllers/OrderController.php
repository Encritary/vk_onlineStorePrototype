<?php

declare(strict_types=1);

namespace vk_onlineStorePrototype\controllers;

use vk_onlineStorePrototype\App;
use vk_onlineStorePrototype\exception\AppException;
use vk_onlineStorePrototype\exception\ModelNotFoundException;
use vk_onlineStorePrototype\models\account\Order;
use vk_onlineStorePrototype\models\account\OrderGood;
use vk_onlineStorePrototype\models\account\User;
use vk_onlineStorePrototype\models\catalog\Good;
use vk_onlineStorePrototype\models\catalog\GoodStock;
use vk_onlineStorePrototype\models\catalog\Warehouse;

class OrderController{

	/**
	 * @param array $goodsQuantity (good ID => quantity)
	 * @throws ModelNotFoundException
	 */
	public function createOrder(User $user, int $warehouseId, array $goodsQuantity, string $address) : Order{
		$warehouse = Warehouse::get($warehouseId);

		$goodModels = [];
		$stockModels = [];

		// db transaction start
		foreach($goodsQuantity as $goodId => $quantity){
			$good = Good::get($goodId);
			$goodModels[$goodId] = $good;

			$stock = GoodStock::findOrNull($good, $warehouse);
			if($stock === null || $stock->itemCount < $quantity){
				throw new AppException("Shortage of good ID = $goodId on warehouse $warehouseId, wanted $quantity, have only {$stock->itemCount}");
			}
			$stockModels[$goodId] = $stock;
		}

		foreach($stockModels as $goodId => $stock){
			$stock->itemCount -= $goodsQuantity[$goodId];
		}
		// db transaction end

		$logisticId = App::$logisticApi->createShipping($user->phone, $warehouse->logisticId, $address);

		$order = Order::create($logisticId);
		foreach($goodModels as $goodId => $good){
			OrderGood::create($order, $good, $goodsQuantity[$goodId]);
		}

		return $order;
	}
}