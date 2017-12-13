<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\Test\Unit\ImportDataTest;

use PHPUnit\Framework\TestCase;
use SnowIO\VoloDataModel\ProductImport\ImportData;
use SnowIO\VoloDataModel\ProductImport\ImportField;
use SnowIO\VoloDataModel\ProductImport\ImportRow;
use SnowIO\VoloDataModel\ProductImport\ImportRowCollection;

class ImportDataTest extends TestCase
{
    public function testFromJson()
    {
        $importData = ImportData::fromJson([
            'importRow' => [
                [
                    'importField' => [
                        [
                            'name' => 'StockNumber',
                            'value' => '12022014-17',
                        ],
                        [
                            'name' => 'ManufacturerNumber',
                            'value' => 'MANU-NAHEUJE-93',
                        ],
                        [
                            'name' => 'Color',
                            'value' => 'blue',
                        ],
                        [
                            'name' => 'Size',
                            'value' => 'large',
                        ],
                    ]
                ],
                [
                    'importField' => [
                        [
                            'name' => 'StockNumber',
                            'value' => '12022014-18',
                        ],
                        [
                            'name' => 'ManufacturerNumber',
                            'value' => 'MANU-NAHEUJE-93',
                        ],
                        [
                            'name' => 'Color',
                            'value' => 'yellow',
                        ],
                        [
                            'name' => 'Size',
                            'value' => 'small',
                        ],

                    ]
                ]
            ]
        ]);

        self::assertTrue(ImportData::create()
            ->withImportRow(
                ImportRow::create()
                    ->withImportField(ImportField::of('StockNumber', '12022014-17'))
                    ->withImportField(ImportField::of('ManufacturerNumber', 'MANU-NAHEUJE-93'))
                    ->withImportField(ImportField::of('Color', 'blue'))
                    ->withImportField(ImportField::of('Size', 'large'))
            )
            ->withImportRow(
                ImportRow::create()
                    ->withImportField(ImportField::of('StockNumber', '12022014-18'))
                    ->withImportField(ImportField::of('ManufacturerNumber', 'MANU-NAHEUJE-93'))
                    ->withImportField(ImportField::of('Color', 'yellow'))
                    ->withImportField(ImportField::of('Size', 'small'))
            )->equals($importData));
    }

    public function testToJson()
    {
        $importData = ImportData::create()
            ->withImportRow(
                ImportRow::create()
                    ->withImportField(ImportField::of('StockNumber', '12022014-17'))
                    ->withImportField(ImportField::of('ManufacturerNumber', 'MANU-NAHEUJE-93'))
                    ->withImportField(ImportField::of('Color', 'blue'))
                    ->withImportField(ImportField::of('Size', 'large'))
            )
            ->withImportRow(
                ImportRow::create()
                    ->withImportField(ImportField::of('StockNumber', '12022014-18'))
                    ->withImportField(ImportField::of('ManufacturerNumber', 'MANU-NAHEUJE-93'))
                    ->withImportField(ImportField::of('Color', 'yellow'))
                    ->withImportField(ImportField::of('Size', 'small'))
            );

        self::assertEquals([
            'importRow' => [
                [
                    'importField' => [
                        [
                            'name' => 'StockNumber',
                            'value' => '12022014-17',
                        ],
                        [
                            'name' => 'ManufacturerNumber',
                            'value' => 'MANU-NAHEUJE-93',
                        ],
                        [
                            'name' => 'Color',
                            'value' => 'blue',
                        ],
                        [
                            'name' => 'Size',
                            'value' => 'large',
                        ],
                    ]
                ],
                [
                    'importField' => [
                        [
                            'name' => 'StockNumber',
                            'value' => '12022014-18',
                        ],
                        [
                            'name' => 'ManufacturerNumber',
                            'value' => 'MANU-NAHEUJE-93',
                        ],
                        [
                            'name' => 'Color',
                            'value' => 'yellow',
                        ],
                        [
                            'name' => 'Size',
                            'value' => 'small',
                        ],

                    ]
                ]
            ]
        ], $importData->toJson());
    }

    public function testWithers()
    {
        $importData = ImportData::create()
            ->withImportRow(
                ImportRow::create()
                    ->withImportField(ImportField::of('StockNumber', '12022014-17'))
                    ->withImportField(ImportField::of('ManufacturerNumber', 'MANU-NAHEUJE-93'))
                    ->withImportField(ImportField::of('Color', 'blue'))
                    ->withImportField(ImportField::of('Size', 'large'))
            );

        self::assertTrue(ImportRowCollection::of([
            ImportRow::create()
                ->withImportField(ImportField::of('StockNumber', '12022014-17'))
                ->withImportField(ImportField::of('ManufacturerNumber', 'MANU-NAHEUJE-93'))
                ->withImportField(ImportField::of('Color', 'blue'))
                ->withImportField(ImportField::of('Size', 'large'))
        ])->equals($importData->getImportRows()));
    }

    public function testEquals()
    {
        $importData = ImportData::create()
            ->withImportRow(
                ImportRow::create()
                    ->withImportField(ImportField::of('StockNumber', '12022014-17'))
                    ->withImportField(ImportField::of('ManufacturerNumber', 'MANU-NAHEUJE-93'))
                    ->withImportField(ImportField::of('Color', 'blue'))
                    ->withImportField(ImportField::of('Size', 'large'))
            )
            ->withImportRow(
                ImportRow::create()
                    ->withImportField(ImportField::of('StockNumber', '12022014-18'))
                    ->withImportField(ImportField::of('ManufacturerNumber', 'MANU-NAHEUJE-93'))
                    ->withImportField(ImportField::of('Color', 'yellow'))
                    ->withImportField(ImportField::of('Size', 'small'))
            );

        $otherImportData = ImportData::create()
            ->withImportRow(
                ImportRow::create()
                    ->withImportField(ImportField::of('StockNumber', '12022014-17'))
                    ->withImportField(ImportField::of('ManufacturerNumber', 'MANU-NAHEUJE-93'))
                    ->withImportField(ImportField::of('Color', 'blue'))
                    ->withImportField(ImportField::of('Size', 'large'))
            )
            ->withImportRow(
                ImportRow::create()
                    ->withImportField(ImportField::of('StockNumber', '12022014-18'))
                    ->withImportField(ImportField::of('ManufacturerNumber', 'MANU-NAHEUJE-93'))
                    ->withImportField(ImportField::of('Color', 'yellow'))
                    ->withImportField(ImportField::of('Size', 'small'))
            );
        self::assertTrue($otherImportData->equals($importData));

        $otherImportData = $otherImportData->withImportRow(
            ImportRow::create()
                ->withImportField(ImportField::of('StockNumber', '12022014-10'))
                ->withImportField(ImportField::of('ManufacturerNumber', 'MANU-NAHEUJE-92'))
                ->withImportField(ImportField::of('Color', 'blue'))
                ->withImportField(ImportField::of('Size', 'large'))
        );
        self::assertFalse($otherImportData->equals($importData));

        self::assertFalse($otherImportData->withImportRow(
            ImportRow::create()
                ->withImportField(ImportField::of('StockNumber', '12022014-18'))
                ->withImportField(ImportField::of('ManufacturerNumber', 'MANU-NAHEUJE-92'))
                ->withImportField(ImportField::of('Color', 'blue'))
                ->withImportField(ImportField::of('Size', 'large'))
        )->equals($importData));
    }
}
