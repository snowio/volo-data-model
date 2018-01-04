<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\Test\Unit\StockAndPriceUpdate;

use PHPUnit\Framework\TestCase;
use SnowIO\VoloDataModel\StockAndPriceUpdate\Price;
use SnowIO\VoloDataModel\StockAndPriceUpdate\PriceNames;
use SnowIO\VoloDataModel\StockAndPriceUpdate\PriceCollection;
use SnowIO\VoloDataModel\StockAndPriceUpdate\ProductUpdate;
use SnowIO\VoloDataModel\StockAndPriceUpdate\StockLevel;
use SnowIO\VoloDataModel\StockAndPriceUpdate\StockUpdateTypes;

class ProductUpdateTest extends TestCase
{
    public function testFromJson()
    {
        self::assertTrue(
            ProductUpdate::of("84938793-8N3948")->withPrices(
                PriceCollection::of(
                    [
                        Price::of(0.0)
                            ->withName(PriceNames::EBAY_BUY_NOW_PRICE)
                            ->withAccountName('test account')
                    ]
                )
            )
                ->withCostPrice(0.0)
                ->withStockLevel(
                    StockLevel::of(5000)
                        ->withLocation("WAREHOUSE")
                        ->withStockUpdateType(StockUpdateTypes::STOCK_CHECK_ADJUST_COMMITTED)
                )
                ->equals(
                    ProductUpdate::fromJson(
                        [
                            "stockNumber" => "84938793-8N3948",
                            "prices" => [
                                "price" => [
                                    [
                                        'name' => PriceNames::EBAY_BUY_NOW_PRICE,
                                        'value' => 0.0,
                                        'accountName' => 'test account',
                                    ]
                                ]
                            ],
                            "stockLevel" => [
                                "location" => "WAREHOUSE",
                                "quantity" => 5000,
                                "stockUpdateType" => StockUpdateTypes::STOCK_CHECK_ADJUST_COMMITTED,
                            ],
                            "costPrice" => 0.0,
                        ]
                    )
                )
        );

        self::assertTrue(
            ProductUpdate::of("84938793-8N3948")
                ->withCostPrice(0.0)
                ->withStockLevel(
                    StockLevel::of(5000)
                        ->withLocation("WAREHOUSE")
                        ->withStockUpdateType(StockUpdateTypes::STOCK_CHECK_ADJUST_COMMITTED)
                )
                ->equals(
                    ProductUpdate::fromJson([
                        "stockNumber" => "84938793-8N3948",
                        "prices" => [
                        ],
                        "stockLevel" => [
                            "location" => "WAREHOUSE",
                            "quantity" => 5000,
                            "stockUpdateType" => StockUpdateTypes::STOCK_CHECK_ADJUST_COMMITTED,
                        ],
                        "costPrice" => 0.0,
                    ])
                )
        );

        self::assertTrue(
            ProductUpdate::of("84938793-8N3948")->withCostPrice(0.0)
                ->withStockLevel(StockLevel::of(5000)
                    ->withLocation("WAREHOUSE")
                    ->withStockUpdateType(StockUpdateTypes::STOCK_CHECK_ADJUST_COMMITTED))
                ->equals(
                    ProductUpdate::fromJson([
                        "stockNumber" => "84938793-8N3948",
                        "stockLevel" => [
                            "location" => "WAREHOUSE",
                            "quantity" => 5000,
                            "stockUpdateType" => StockUpdateTypes::STOCK_CHECK_ADJUST_COMMITTED,
                        ],
                        "costPrice" => 0.0,
                    ])
                )
        );


        self::assertTrue(
            ProductUpdate::of("84938793-8N3948")->withCostPrice(0.0)
                ->equals(
                    ProductUpdate::fromJson([
                        "stockNumber" => "84938793-8N3948",
                        "costPrice" => 0.0,
                    ])
                )
        );

        self::assertTrue(
            ProductUpdate::of("84938793-8N3948")
                ->equals(
                    ProductUpdate::fromJson([
                        "stockNumber" => "84938793-8N3948",
                    ])
                )
        );
    }

    public function testToJson()
    {
        self::assertEquals(
            [
                "stockNumber" => "84938793-8N3948",
                "prices" => [
                    "price" => [
                        [
                            'name' => PriceNames::EBAY_BUY_NOW_PRICE,
                            'value' => 0.0,
                        ]
                    ]
                ],
                "stockLevel" => [
                    "location" => "WAREHOUSE",
                    "quantity" => 5000,
                    "stockUpdateType" => StockUpdateTypes::STOCK_CHECK_ADJUST_COMMITTED,
                ],
                "costPrice" => 0.0,
            ],
            ProductUpdate::of("84938793-8N3948")->withPrices(PriceCollection::of([
                Price::of(0.0)->withName(PriceNames::EBAY_BUY_NOW_PRICE)
            ]))->withCostPrice(0.0)
                ->withStockLevel(StockLevel::of(5000)
                    ->withLocation("WAREHOUSE")
                    ->withStockUpdateType(StockUpdateTypes::STOCK_CHECK_ADJUST_COMMITTED))->toJson()
        );

        self::assertEquals(
            [
                "stockNumber" => "84938793-8N3948",
                "stockLevel" => [
                    "location" => "WAREHOUSE",
                    "quantity" => 5000,
                    "stockUpdateType" => StockUpdateTypes::STOCK_CHECK_ADJUST_COMMITTED,
                ],
                "costPrice" => 0.0,
            ],
            ProductUpdate::of("84938793-8N3948")
                ->withCostPrice(0.0)
                ->withStockLevel(StockLevel::of(5000)
                    ->withLocation("WAREHOUSE")
                    ->withStockUpdateType(StockUpdateTypes::STOCK_CHECK_ADJUST_COMMITTED))->toJson()
        );

        self::assertEquals(
            ["stockNumber" => "84938793-8N3948", "costPrice" => 0.0],
            ProductUpdate::of("84938793-8N3948")->withCostPrice(0.0)
                ->toJson()
        );

        self::assertEquals(
            ["stockNumber" => "84938793-8N3948"],
            ProductUpdate::of("84938793-8N3948")->toJson()
        );
    }

    public function testWithers()
    {
        $productUpdate = ProductUpdate::of("84938793-8N3948")->withPrices(PriceCollection::of([
            Price::of(0.0)->withName(PriceNames::EBAY_BUY_NOW_PRICE),
        ]))->withCostPrice(0.0)
            ->withPrice(Price::of(0.0)->withName(PriceNames::PLAY_PRICE))
            ->withStockLevel(StockLevel::of(5000)
                ->withLocation("WAREHOUSE")
                ->withStockUpdateType(StockUpdateTypes::STOCK_CHECK_ADJUST_COMMITTED));

        self::assertEquals("84938793-8N3948", $productUpdate->getStockNumber());

        self::assertTrue(PriceCollection::of([
            Price::of(0.0)->withName(PriceNames::EBAY_BUY_NOW_PRICE),
            Price::of(0.0)->withName(PriceNames::PLAY_PRICE)
        ])->equals($productUpdate->getPrices()));

        self::assertEquals(0.0, $productUpdate->getCostPrice());
        self::assertTrue(StockLevel::of(5000)
            ->withLocation("WAREHOUSE")
            ->withStockUpdateType(StockUpdateTypes::STOCK_CHECK_ADJUST_COMMITTED)
            ->equals($productUpdate->getStockLevel()));
    }

    public function testEquals()
    {
        /** @var ProductUpdate $productUpdate */
        $productUpdate = ProductUpdate::of("84938793-8N3948")->withPrices(PriceCollection::of([
            Price::of(0.0)->withName(PriceNames::EBAY_BUY_NOW_PRICE)
        ]))->withCostPrice(0.0)->withStockLevel(StockLevel::of(5000)
            ->withLocation("WAREHOUSE")
            ->withStockUpdateType(StockUpdateTypes::STOCK_CHECK_ADJUST_COMMITTED));
        $otherProductUpdate = clone $productUpdate;
        self::assertTrue($otherProductUpdate->equals($productUpdate));
        self::assertFalse(($otherProductUpdate->withCostPrice(1))->equals($productUpdate));
        self::assertFalse(
            $otherProductUpdate->withPrice(Price::of(0.0)
                ->withName(PriceNames::EBAY_BUY_NOW_PRICE))
                ->equals($productUpdate)
        );
    }
}
