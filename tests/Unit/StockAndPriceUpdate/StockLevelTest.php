<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\Test\Unit\StockAndPriceUpdate;

use PHPUnit\Framework\TestCase;
use SnowIO\VoloDataModel\StockAndPriceUpdate\Price;
use SnowIO\VoloDataModel\StockAndPriceUpdate\StockLevel;
use SnowIO\VoloDataModel\StockAndPriceUpdate\StockUpdateTypes;

class StockLevelTest extends TestCase
{
    public function testFromJson()
    {
        $stockLevel = StockLevel::fromJson([
            "location" => "WAREHOUSE",
            "quantity" => 5000,
            "stockUpdateType" => StockUpdateTypes::DELIVERY,
        ]);

        self::assertTrue(
            StockLevel::of(5000)
                ->withLocation("WAREHOUSE")
                ->withStockUpdateType(StockUpdateTypes::DELIVERY)
                ->equals($stockLevel)
        );
    }

    public function testToJson()
    {
        $stockLevel = StockLevel::of(5000)
            ->withLocation("WAREHOUSE")
            ->withStockUpdateType(StockUpdateTypes::DELIVERY);

        self::assertEquals([
            "location" => "WAREHOUSE",
            "quantity" => 5000,
            "stockUpdateType" => StockUpdateTypes::DELIVERY,
        ], $stockLevel->toJson());
    }

    public function testWithers()
    {
        $stockLevel = StockLevel::of(5000)
            ->withLocation("WAREHOUSE")
            ->withStockUpdateType(StockUpdateTypes::DELIVERY);

        self::assertEquals(5000, $stockLevel->getQuantity());
        self::assertEquals("WAREHOUSE", $stockLevel->getLocation());
        self::assertEquals(StockUpdateTypes::DELIVERY, $stockLevel->getStockUpdateType());
    }

    public function testEquals()
    {
        $stockLevel = StockLevel::of(5000)
            ->withLocation("WAREHOUSE")
            ->withStockUpdateType(StockUpdateTypes::DELIVERY);

        $otherStockLevel = clone $stockLevel;

        self::assertTrue($otherStockLevel->equals($stockLevel));
        self::assertFalse(($otherStockLevel->withLocation("Location"))->equals($stockLevel));
        self::assertFalse(($otherStockLevel->withStockUpdateType(StockUpdateTypes::STOCK_CHECK))->equals($stockLevel));
        self::assertFalse((Price::of(0))->equals($stockLevel));
    }
}
