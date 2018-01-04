<?php
namespace SnowIO\VoloDataModel\Test\Unit\Command;

use PHPUnit\Framework\TestCase;
use SnowIO\VoloDataModel\Command\UpdateStockAndPriceCommand;
use SnowIO\VoloDataModel\StockAndPriceUpdate\Price;
use SnowIO\VoloDataModel\StockAndPriceUpdate\PriceCollection;
use SnowIO\VoloDataModel\StockAndPriceUpdate\PriceNames;
use SnowIO\VoloDataModel\StockAndPriceUpdate\ProductUpdate;
use SnowIO\VoloDataModel\StockAndPriceUpdate\ProductUpdateCollection;
use SnowIO\VoloDataModel\StockAndPriceUpdate\StockLevel;
use SnowIO\VoloDataModel\StockAndPriceUpdate\StockUpdateTypes;

class UpdateStockAndPriceCommandTest extends TestCase
{
    public function testFromJson()
    {
        self::assertTrue(UpdateStockAndPriceCommand::of(ProductUpdateCollection::of([
            ProductUpdate::of('89239837-8N87382')
                ->withPrices(PriceCollection::of(
                    [
                        Price::of(600.60),
                        Price::of(350.89)
                            ->withName(PriceNames::PLAY_PRICE)
                            ->withAccountName('testPlayPrice'),
                    ]
                ))->withStockLevel(StockLevel::of(5000)
                    ->withLocation("WAREHOUSE")
                    ->withStockUpdateType(StockUpdateTypes::STOCK_CHECK_ADJUST_COMMITTED))
                ->withCostPrice(203.99),
            ProductUpdate::of('89239837-8N87389')
                ->withPrices(PriceCollection::of(
                    [
                        Price::of(700.94)
                            ->withName(PriceNames::AMAZON_PRICE)
                            ->withAccountName('testAmazonPrice'),
                        Price::of(450.89),
                    ]
                )),
        ]))->equals(UpdateStockAndPriceCommand::fromJson([
            'productUpdate' => [
                [
                    "stockNumber" => "89239837-8N87382",
                    "prices" => [
                        "price" => [
                            [
                                "value" => 600.60,
                            ],
                            [
                                "name" => PriceNames::PLAY_PRICE,
                                "value" => 350.89,
                                "accountName" => 'testPlayPrice',
                            ],
                        ]
                    ],
                    "stockLevel" => [
                        "location" => "WAREHOUSE",
                        "quantity" => 5000,
                        "stockUpdateType" => StockUpdateTypes::STOCK_CHECK_ADJUST_COMMITTED,
                    ],
                    "costPrice" => 203.99,
                ],
                [
                    "stockNumber" => "89239837-8N87389",
                    "prices" => [
                        "price" => [
                            [
                                "name" => PriceNames::AMAZON_PRICE,
                                "value" => 700.94,
                                "accountName" => 'testAmazonPrice',
                            ],
                            [
                                "value" => 450.89,
                            ],
                        ]
                    ],
                ],
            ]
        ])));
    }

    public function testToJson()
    {
        self::assertEquals([
            'productUpdate' => [
                [
                    "stockNumber" => "89239837-8N87382",
                    "prices" => [
                        "price" => [
                            [
                                "value" => 600.60,
                            ],
                            [
                                "name" => PriceNames::PLAY_PRICE,
                                "value" => 350.89,
                                "accountName" => 'testPlayPrice',
                            ],
                        ]
                    ],
                    "stockLevel" => [
                        "location" => "WAREHOUSE",
                        "quantity" => 5000,
                        "stockUpdateType" => StockUpdateTypes::STOCK_CHECK_ADJUST_COMMITTED,
                    ],
                    "costPrice" => 203.99,
                ],
                [
                    "stockNumber" => "89239837-8N87389",
                    "prices" => [
                        "price" => [
                            [
                                "name" => PriceNames::AMAZON_PRICE,
                                "value" => 700.94,
                                "accountName" => 'testAmazonPrice',
                            ],
                            [
                                "value" => 450.89,
                            ],
                        ]
                    ],
                ]
            ]
        ], UpdateStockAndPriceCommand::of(
            ProductUpdateCollection::of(
                [
                    ProductUpdate::of('89239837-8N87382')
                        ->withPrices(
                            PriceCollection::of(
                                [
                                    Price::of(600.60),
                                    Price::of(350.89)
                                        ->withName(PriceNames::PLAY_PRICE)
                                        ->withAccountName('testPlayPrice'),
                                ]
                            )
                        )->withStockLevel(StockLevel::of(5000)
                            ->withLocation("WAREHOUSE")
                            ->withStockUpdateType(StockUpdateTypes::STOCK_CHECK_ADJUST_COMMITTED))
                        ->withCostPrice(203.99),
                    ProductUpdate::of('89239837-8N87389')->withPrices(PriceCollection::of([
                        Price::of(700.94)->withName(PriceNames::AMAZON_PRICE)->withAccountName('testAmazonPrice'),
                        Price::of(450.89),
                    ])),
                ]
            )
        )->toJson());
    }
}
