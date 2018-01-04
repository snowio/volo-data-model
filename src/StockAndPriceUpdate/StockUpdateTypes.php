<?php
declare(strict_types=1);
namespace SnowIO\VoloDataModel\StockAndPriceUpdate;

final class StockUpdateTypes
{
    const DELIVERY = "DELIVERY";
    const STOCK_CHECK = "STOCK_CHECK";
    const STOCK_CHECK_ADJUST_COMMITTED = "STOCK_CHECK_ADJUST_COMMITTED";

    const ALL = [
        self::DELIVERY,
        self::STOCK_CHECK,
        self::STOCK_CHECK_ADJUST_COMMITTED,
    ];

    public static function validateStockUpdateType(string $stockUpdateType)
    {
        if (!\in_array($stockUpdateType, self::ALL)) {
            throw new \InvalidArgumentException('Invalid Stock Update Type');
        }
    }
}
