<?php
declare(strict_types=1);
namespace SnowIO\VoloDataModel\StockAndPriceUpdate;

use SnowIO\VoloDataModel\Internal\CollectionTrait;

final class ProductUpdateCollection implements \IteratorAggregate
{
    use CollectionTrait;

    public function with(ProductUpdate $productUpdate): self
    {
        $result = clone $this;
        $result->items[] = $productUpdate;
        return $result;
    }

    public static function fromJson(array $json): self
    {
        $result = self::create();
        foreach ($json as $productUpdate) {
            $result->items[] = ProductUpdate::fromJson($productUpdate);
        }

        return $result;
    }

    public function toJson(): array
    {
        return \array_map(function (ProductUpdate $productUpdate) {
            return $productUpdate->toJson();
        }, $this->items);
    }

    private static function itemsAreEqual(ProductUpdate $productUpdate, ProductUpdate $otherProductUpdate): bool
    {
        return $productUpdate->equals($otherProductUpdate);
    }
}
