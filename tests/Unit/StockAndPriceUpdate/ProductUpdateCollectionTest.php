<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\Test\Unit\StockAndPriceUpdate;

use PHPUnit\Framework\TestCase;
use SnowIO\VoloDataModel\StockAndPriceUpdate\Price;
use SnowIO\VoloDataModel\StockAndPriceUpdate\PriceCollection;
use SnowIO\VoloDataModel\StockAndPriceUpdate\ProductUpdate;
use SnowIO\VoloDataModel\StockAndPriceUpdate\ProductUpdateCollection;
use SnowIO\VoloDataModel\StockAndPriceUpdate\StockLevel;
use SnowIO\VoloDataModel\StockAndPriceUpdate\StockUpdateTypes;

class ProductUpdateCollectionTest extends TestCase
{
    public function testWithers()
    {
        $productUpdateCollection = ProductUpdateCollection::of([
            ProductUpdate::of('98h39387927')->withPrices(PriceCollection::of([
                Price::of(400),
                Price::of(500),
            ]))
        ]);

        $productUpdateCollection = $productUpdateCollection->with(
            ProductUpdate::of('hri8398939h9')->withPrices(PriceCollection::of([
                Price::of(400),
                Price::of(500),
            ]))
        );

        self::assertTrue(ProductUpdateCollection::of([
            ProductUpdate::of('98h39387927')->withPrices(PriceCollection::of([
                Price::of(400),
                Price::of(500),
            ])),
            ProductUpdate::of('hri8398939h9')->withPrices(PriceCollection::of([
                Price::of(400),
                Price::of(500),
            ]))
        ])->equals($productUpdateCollection));

        self::assertFalse(ProductUpdateCollection::of([
            ProductUpdate::of('98h39387927')->withPrices(PriceCollection::of([
                Price::of(789),
                Price::of(500),
            ])),
            ProductUpdate::of('hri8398939h9')->withPrices(PriceCollection::of([
                Price::of(400),
                Price::of(893),
            ]))
        ])->equals($productUpdateCollection));

        self::assertFalse(ProductUpdateCollection::of([
            ProductUpdate::of('hri8398939h9')->withPrices(PriceCollection::of([
                Price::of(789),
                Price::of(500),
            ])),
            ProductUpdate::of('hri8398939h9')->withPrices(PriceCollection::of([
                Price::of(400),
                Price::of(893),
            ]))
        ])->equals($productUpdateCollection));

        self::assertFalse(ProductUpdateCollection::of([
            ProductUpdate::of('98h39387927')->withPrices(PriceCollection::of([
                Price::of(789),
                Price::of(500),
            ])),
            ProductUpdate::of('hri8398939h9')->withPrices(PriceCollection::of([
                Price::of(400),
            ]))
        ])->equals($productUpdateCollection));

        self::assertFalse(ProductUpdateCollection::of([
            ProductUpdate::of('98h39387927')->withPrices(PriceCollection::of([
                Price::of(789),
                Price::of(500),
            ])),
            ProductUpdate::of('hri8398939h9')->withPrices(PriceCollection::of([
                Price::of(400),
            ])),
            ProductUpdate::of('hri8398939h9')->withPrices(PriceCollection::of([
                Price::of(400),
            ]))
        ])->equals($productUpdateCollection));

        self::assertFalse(ProductUpdateCollection::of([
            ProductUpdate::of('98h39387927')->withPrices(PriceCollection::of([
                Price::of(789),
                Price::of(500),
            ])),
            ProductUpdate::of('hri8398939h9')->withPrices(PriceCollection::of([
                Price::of(400),
                Price::of(890)
            ])),
            ProductUpdate::of('r028r97r39rh39')->withPrices(PriceCollection::of([
                Price::of(400),
                Price::of(930),
            ]))
        ])->equals($productUpdateCollection));
    }

    public function testFromJson()
    {
        self::assertTrue(ProductUpdateCollection::of([
            ProductUpdate::of('98h39387927')->withPrices(PriceCollection::of([
                Price::of(400),
                Price::of(500),
            ])),
            ProductUpdate::of('hri8398939h9')->withPrices(PriceCollection::of([
                Price::of(400),
                Price::of(600),
            ]))->withStockLevel(StockLevel::of(5000)
                ->withStockUpdateType(StockUpdateTypes::STOCK_CHECK_ADJUST_COMMITTED)
                ->withLocation('WAREHOUSE'))->withCostPrice(200),
        ])->equals(ProductUpdateCollection::fromJson([
            [
                'stockNumber' => '98h39387927',
                'prices' => [
                    'price' => [
                        [
                            'value' => 400,
                        ],
                        [
                            'value' => 500,
                        ],
                    ],
                ],
            ],
            [
                'stockNumber' => 'hri8398939h9',
                'prices' => [
                    'price' => [
                        [
                            'value' => 400,
                        ],
                        [
                            'value' => 600,
                        ],
                    ],
                ],
                'stockLevel' => [
                    'location' => 'WAREHOUSE',
                    'quantity' => 5000,
                    'stockUpdateType' => StockUpdateTypes::STOCK_CHECK_ADJUST_COMMITTED,
                ],
                'costPrice' => 200,
            ]
        ])));
    }

    public function testToJson()
    {
        self::assertEquals([
            [
                'stockNumber' => '98h39387927',
                'prices' => [
                    'price' => [
                        [
                            'value' => 400,
                        ],
                        [
                            'value' => 500,
                        ],
                    ],
                ],
            ],
            [
                'stockNumber' => 'hri8398939h9',
                'prices' => [
                    'price' => [
                        [
                            'value' => 400,
                        ],
                        [
                            'value' => 600,
                        ],
                    ],
                ],
                'stockLevel' => [
                    'location' => 'WAREHOUSE',
                    'quantity' => 5000,
                    'stockUpdateType' => StockUpdateTypes::STOCK_CHECK_ADJUST_COMMITTED,
                ],
                'costPrice' => 200,
            ]
        ], ProductUpdateCollection::of([
            ProductUpdate::of('98h39387927')->withPrices(PriceCollection::of([
                Price::of(400),
                Price::of(500),
            ])),
            ProductUpdate::of('hri8398939h9')->withPrices(PriceCollection::of([
                Price::of(400),
                Price::of(600),
            ]))->withStockLevel(StockLevel::of(5000)
                ->withStockUpdateType(StockUpdateTypes::STOCK_CHECK_ADJUST_COMMITTED)
                ->withLocation('WAREHOUSE'))->withCostPrice(200),
        ])->toJson());
    }
}
