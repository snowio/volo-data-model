<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\Test\Unit\StockAndPriceUpdate;

use PHPUnit\Framework\TestCase;
use SnowIO\VoloDataModel\StockAndPriceUpdate\Price;
use SnowIO\VoloDataModel\StockAndPriceUpdate\PriceNames;
use SnowIO\VoloDataModel\StockAndPriceUpdate\PriceCollection;

class PriceCollectionTest extends TestCase
{
    public function testWithers()
    {
        //notice that the api will pick the last value if the account name and priceName are the same
        //also notice that the api price will not go back to zero if a +ve value > 0 was send prior to
        //this
        $priceSet = PriceCollection::of([
            Price::of(200),
            Price::of(400),
            Price::of(500),
        ]);

        $priceSet = $priceSet->with(Price::of(700));
        self::assertTrue(PriceCollection::of([
            Price::of(200),
            Price::of(400),
            Price::of(500),
            Price::of(700),
        ])->equals($priceSet));

        $priceSet = $priceSet->with(Price::of(700));
        self::assertTrue(PriceCollection::of([
            Price::of(200),
            Price::of(400),
            Price::of(500),
            Price::of(700),
            Price::of(700),
        ])->equals($priceSet));
        $priceSet = $priceSet->with(Price::of(700)->withAccountName('testAccount')->withName(PriceNames::PLAY_PRICE));
        self::assertTrue(PriceCollection::of([
            Price::of(200),
            Price::of(400),
            Price::of(500),
            Price::of(700),
            Price::of(700),
            Price::of(700)->withName(PriceNames::PLAY_PRICE)->withAccountName('testAccount'),
        ])->equals($priceSet));

    }

    public function testToJson()
    {
        $priceSet = PriceCollection::of([
            Price::of(200),
            Price::of(400),
            Price::of(500)->withAccountName('testAccount')->withName(PriceNames::PLAY_PRICE),
        ]);

        self::assertEquals([
            [
                'value' => 200,
            ],
            [
                'value' => 400
            ],
            [
                'value' => 500,
                'accountName' => 'testAccount',
                'name' => 'PLAY_PRICE',
            ],
        ], $priceSet->toJson());

    }

    public function testFromJson()
    {
        //notice that the api will pick the last value if the account name and priceName are the same
        //also notice that the api price will not go back to zero if a +ve value > 0 was send prior to
        //The api allows multiple price entries with the same name and account name as well
        $priceSet = PriceCollection::fromJson([
            [
                'name' => PriceNames::EBAY_BUY_NOW_PRICE,
                'value' => 0,
                'accountName' => 'test account',
            ],
            [
                'name' => PriceNames::EBAY_BUY_NOW_PRICE,
                'value' => 0,
                'accountName' => 'test account',
            ],
            [
                'name' => PriceNames::AMAZON_PRICE,
                'value' => 490,
                'accountName' => 'otherAccount',
            ],
        ]);

        self::assertTrue(PriceCollection::of([
            Price::of(0)->withAccountName('test account')->withName(PriceNames::EBAY_BUY_NOW_PRICE),
            Price::of(0)->withAccountName('test account')->withName(PriceNames::EBAY_BUY_NOW_PRICE),
            Price::of(490)->withAccountName('otherAccount')->withName(PriceNames::AMAZON_PRICE),
        ])->equals($priceSet));
    }
}
