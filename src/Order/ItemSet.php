<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\Order;

use SnowIO\VoloDataModel\Internal\SetTrait;

final class ItemSet implements \IteratorAggregate
{
    use SetTrait;

    public function get($orderItemId): ?Item
    {
        return $this->items[$orderItemId] ?? null;
    }

    public static function fromJson(array $json): self
    {
        $result = self::create();

        foreach ($json as $item) {
            $item = Item::fromJson($item);
            $result->items[$item->getOrderItemId()] = $item;
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

    private static function itemsAreEqual(
        Item $item,
        Item $otherItem
    ) : bool {
        return $item->equals($otherItem);
    }
}
