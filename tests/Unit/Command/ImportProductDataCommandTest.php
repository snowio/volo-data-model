<?php

namespace SnowIO\VoloDataModel\Test\Unit\Command;

use PHPUnit\Framework\TestCase;
use SnowIO\VoloDataModel\Command\ImportProductDataCommand;
use SnowIO\VoloDataModel\ProductImport\ImportData;
use SnowIO\VoloDataModel\ProductImport\ImportRow;
use SnowIO\VoloDataModel\ProductImport\ImportRowCollection;
use SnowIO\VoloDataModel\ProductImport\ImportFieldSet;
use SnowIO\VoloDataModel\ProductImport\ImportField;
use SnowIO\VoloDataModel\ProductImport\Layout;
use SnowIO\VoloDataModel\ProductImport\LayoutField;

class ImportProductDataCommandTest extends TestCase
{
    public function testFromJson()
    {

        $importProductDataCommand = ImportProductDataCommand::fromJson([
            'layout' => [
                'layoutFields' => [
                    'layoutField' => [
                        [
                            'name' => 'StockNumber'
                        ],
                        [
                            'name' => 'UPC'
                        ]
                    ]
                ],
                'layoutName' => 'Default Layout',
                'keyField' => 'StockNumber',
            ],
            'importData' => [
                'importRow' => [
                    [
                        'importField' => [
                            [
                                'name' => 'StockNumber',
                                'value' => '84938793-8N9',
                            ],
                            [
                                'name' => 'UPC',
                                'value' => '94809380-K90',
                            ],
                        ]
                    ],
                    [
                        'importField' => [
                            [
                                'name' => 'StockNumber',
                                'value' => '84938793-8N80',
                            ],
                            [
                                'name' => 'UPC',
                                'value' => '94809380-K70',
                            ],
                        ]
                    ],
                ]
            ],
        ]);
        self::assertTrue(Layout::of('Default Layout', 'StockNumber')
            ->withLayoutField(LayoutField::of('StockNumber'))
            ->withLayoutField(LayoutField::of('UPC'))->equals($importProductDataCommand->getLayout()));

        $importRowCollection = ImportRowCollection::of([
            ImportRow::create()
                ->withImportFields(ImportFieldSet::of([
                    ImportField::of('StockNumber', '84938793-8N9'),
                    ImportField::of('UPC', '94809380-K90'),
                ])),
            ImportRow::create()
                ->withImportFields(ImportFieldSet::of([
                    ImportField::of('StockNumber', '84938793-8N80'),
                    ImportField::of('UPC', '94809380-K70'),
                ])),
        ]);
        self::assertTrue(ImportData::create()
            ->withImportRows($importRowCollection)->equals($importProductDataCommand->getImportData()));
    }

    public function testToJson()
    {
        $layout = Layout::of('Default Layout', 'StockNumber')
            ->withLayoutField(LayoutField::of('StockNumber'))
            ->withLayoutField(LayoutField::of('UPC'));
        $importRowCollection = ImportRowCollection::of([
            ImportRow::create()
                ->withImportFields(ImportFieldSet::of([
                    ImportField::of('StockNumber', '84938793-8N9'),
                    ImportField::of('UPC', '94809380-K90'),
                ])),
            ImportRow::create()
                ->withImportFields(ImportFieldSet::of([
                    ImportField::of('StockNumber', '84938793-8N80'),
                    ImportField::of('UPC', '94809380-K70'),
                ])),
        ]);
        $importData = ImportData::create()->withImportRows($importRowCollection);

        $importProductDataCommand = ImportProductDataCommand::of($layout, $importData);

        self::assertEquals([
            'layout' => [
                'layoutFields' => [
                    'layoutField' => [
                        [
                            'name' => 'StockNumber'
                        ],
                        [
                            'name' => 'UPC'
                        ]
                    ]
                ],
                'layoutName' => 'Default Layout',
                'keyField' => 'StockNumber',
            ],
            'importData' => [
                'importRow' => [
                    [
                        'importField' => [
                            [
                                'name' => 'StockNumber',
                                'value' => '84938793-8N9',
                            ],
                            [
                                'name' => 'UPC',
                                'value' => '94809380-K90',
                            ],
                        ]
                    ],
                    [
                        'importField' => [
                            [
                                'name' => 'StockNumber',
                                'value' => '84938793-8N80',
                            ],
                            [
                                'name' => 'UPC',
                                'value' => '94809380-K70',
                            ],
                        ]
                    ],
                ]
            ],
        ], $importProductDataCommand->toJson());
    }
}
