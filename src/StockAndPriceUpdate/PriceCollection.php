<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\StockAndPriceUpdate;

use SnowIO\VoloDataModel\Internal\CollectionTrait;

final class PriceCollection implements \IteratorAggregate
{
    use CollectionTrait;

    public function with(Price $price): self
    {
        $result = clone $this;
        $result->items[] = $price;
        return $result;
    }

    public static function fromJson(array $json): self
    {
        $result = self::create();
        foreach ($json as $price) {
            $result->items[] = Price::fromJson($price);
        }

        return $result;
    }

    public function toJson(): array
    {
        return \array_map(function (Price $price) {
            return $price->toJson();
        }, $this->items);
    }

    private static function itemsAreEqual(Price $price, Price $otherPrice): bool
    {
        return $price->equals($otherPrice);
    }
}
