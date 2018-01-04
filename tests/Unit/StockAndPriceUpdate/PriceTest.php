<?php
declare(strict_types=1);
namespace SnowIO\VoloDataModel\Test\Unit\StockAndPriceUpdate;

use PHPUnit\Framework\TestCase;
use SnowIO\VoloDataModel\StockAndPriceUpdate\Price;
use SnowIO\VoloDataModel\StockAndPriceUpdate\PriceNames;
use SnowIO\VoloDataModel\StockAndPriceUpdate\StockLevel;

class PriceTest extends TestCase
{
    public function testFromJson()
    {
        /** @var Price $price */
        $price = Price::fromJson([
            'name' => PriceNames::EBAY_BUY_NOW_PRICE,
            'value' => 0,
            'accountName' => 'test account',
        ]);

        $otherPrice = Price::of(0)
            ->withName(PriceNames::EBAY_BUY_NOW_PRICE)
            ->withAccountName('test account');


        self::assertTrue($otherPrice->equals($price));
    }

    public function testToJson()
    {
        $price = Price::of(0)
            ->withName(PriceNames::EBAY_BUY_NOW_PRICE)
            ->withAccountName('test account');

        self::assertEquals([
            'name' => PriceNames::EBAY_BUY_NOW_PRICE,
            'value' => 0,
            'accountName' => 'test account',
        ], $price->toJson());
    }

    public function testWithers()
    {
        $price = Price::of(0)
            ->withName(PriceNames::EBAY_BUY_NOW_PRICE)
            ->withAccountName('test account');
        self::assertEquals(0, $price->getValue());
        self::assertEquals(PriceNames::EBAY_BUY_NOW_PRICE, $price->getName());
        self::assertEquals('test account', $price->getAccountName());
    }

    public function testEquals()
    {
        $price = Price::of(0)
            ->withName(PriceNames::EBAY_BUY_NOW_PRICE)
            ->withAccountName('test account');

        $otherPrice = clone $price;
        self::assertTrue($otherPrice->equals($price));
        self::assertFalse(($otherPrice->withName(PriceNames::AMAZON_PRICE))->equals($price));
        self::assertFalse((StockLevel::of(0))->equals($price));
    }
}
