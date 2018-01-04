<?php
declare(strict_types=1);
namespace SnowIO\VoloDataModel\Command;

use SnowIO\VoloDataModel\StockAndPriceUpdate\ProductUpdateCollection;

final class UpdateStockAndPriceCommand
{
    public static function of(ProductUpdateCollection $productUpdates): self
    {
        $result = new self;
        $result->productUpdates = $productUpdates;
        return $result;
    }

    public static function fromJson(array $json): self
    {
        return self::of(ProductUpdateCollection::fromJson($json['productUpdate']));
    }

    public function getProductUpdates(): ProductUpdateCollection
    {
        return $this->productUpdates;
    }

    public function equals($otherUpdateStockAndPriceCommand): bool
    {
        return $otherUpdateStockAndPriceCommand instanceof UpdateStockAndPriceCommand &&
            $this->productUpdates->equals($otherUpdateStockAndPriceCommand->productUpdates);
    }

    public function toJson(): array
    {
        return [
            'productUpdate' => $this->productUpdates->toJson(),
        ];
    }

    /** @var ProductUpdateCollection */
    private $productUpdates;

    private function __construct()
    {

    }
}
