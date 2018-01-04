<?php
declare(strict_types=1);
namespace SnowIO\VoloDataModel\StockAndPriceUpdate;

final class PriceNames
{
    const EBAY_BUY_NOW_PRICE = "EBAY_BUY_NOW_PRICE";
    const EBAY_INVENTORY_PRICE = "EBAY_INVENTORY_PRICE";
    const RRP = "RRP";
    const AMAZON_PRICE = "AMAZON_PRICE";
    const PLAY_PRICE = "PLAY_PRICE";

    const ALL = [
        self::EBAY_BUY_NOW_PRICE,
        self::EBAY_INVENTORY_PRICE,
        self::RRP,
        self::AMAZON_PRICE,
        self::PLAY_PRICE,
    ];

    public static function validatePriceName(string $priceName)
    {
        if (!\in_array($priceName, self::ALL)) {
            throw new \InvalidArgumentException('Invalid Price Name');
        }
    }
}
