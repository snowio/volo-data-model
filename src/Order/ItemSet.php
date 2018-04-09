<?php

namespace SnowIO\VoloDataModel\Order;

use SnowIO\VoloDataModel\Internal\SetTrait;

final class ItemSet implements \IteratorAggregate
{
    use SetTrait;

    public function get($espOrderNo): ?Item
    {
        return $this->items[$espOrderNo] ?? null;
    }

    public static function fromJson(array $json): self
    {
        $result = self::create();

        foreach ($json as $item) {
            $result->items[] = Item::fromJson($item);
        }
        return $result;
    }

    private static function getKey(Item $orderItem): string
    {
        return $orderItem->getOrderItemId();
    }

    public function toJson(): array
    {
        return array_map(function (Item $item) {
            return $item->toJson();
        }, array_values($this->items));
    }
}