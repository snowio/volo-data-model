<?php
declare(strict_types=1);
namespace SnowIO\VoloDataModel\OrderUpdate;

use SnowIO\VoloDataModel\Internal\CollectionTrait;

final class OrderUpdateCollection implements \IteratorAggregate
{
    use CollectionTrait;

    public function with(OrderUpdate $orderUpdateData): self
    {
        $result = clone $this;
        $result->items[] = $orderUpdateData;
        return $result;
    }

    public static function fromJson(array $json): self
    {
        $result = self::create();
        foreach ($json as $orderUpdateJson) {
            $result->items[] = OrderUpdate::fromJson($orderUpdateJson);
        }

        return $result;
    }

    public function toJson(): array
    {
        return \array_map(function (OrderUpdate $orderUpdate) {
            return $orderUpdate->toJson();
        }, $this->items);
    }


    private static function itemsAreEqual(OrderUpdate $orderUpdateData, OrderUpdate $otherOrderUpdateData): bool
    {
        return  $orderUpdateData->equals($otherOrderUpdateData);
    }
}