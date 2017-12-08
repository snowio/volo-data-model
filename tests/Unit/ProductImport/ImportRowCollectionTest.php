<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\Test\Unit\ImportDataTest;

use PHPUnit\Framework\TestCase;
use SnowIO\VoloDataModel\ProductImport\ImportField;
use SnowIO\VoloDataModel\ProductImport\ImportFieldSet;
use SnowIO\VoloDataModel\ProductImport\ImportRow;
use SnowIO\VoloDataModel\ProductImport\ImportRowCollection;

class ImportRowCollectionTest extends TestCase
{

    public function testWithers()
    {
        $importRowCollection = ImportRowCollection::of([
            ImportRow::create()->withImportFields(ImportFieldSet::of([
                ImportField::of('StockNumber', '98h39387927'),
                ImportField::of('UPC', 'GGHURNRUIITY'),
                ImportField::of('ManufactureNumber', 'MNAHUD-3328_U'),
            ]))
        ]);

        /** @var ImportRowCollection $importRowCollection */
        $importRowCollection = $importRowCollection->with(
            ImportRow::create()->withImportFields(ImportFieldSet::of([
                ImportField::of('StockNumber', 'hri8398939h9'),
                ImportField::of('UPC', 'HUGIKIGUJIG'),
                ImportField::of('ManufactureNumber', '3893893-MIGJI_U'),
            ]))
        );

        self::assertTrue(ImportRowCollection::of([
            ImportRow::create()->withImportFields(ImportFieldSet::of([
                ImportField::of('StockNumber', '98h39387927'),
                ImportField::of('UPC', 'GGHURNRUIITY'),
                ImportField::of('ManufactureNumber', 'MNAHUD-3328_U'),
            ])),
            ImportRow::create()->withImportFields(ImportFieldSet::of([
                ImportField::of('StockNumber', 'hri8398939h9'),
                ImportField::of('UPC', 'HUGIKIGUJIG'),
                ImportField::of('ManufactureNumber', '3893893-MIGJI_U'),
            ]))
        ])->equals($importRowCollection));

        self::assertFalse(ImportRowCollection::of([
            ImportRow::create()->withImportFields(ImportFieldSet::of([
                ImportField::of('StockNumber', 'hri8398939h9'),
                ImportField::of('UPC', 'HUGIKIGUJIG'),
                ImportField::of('ManufactureNumber', '3893893-MIGJI_U'),
            ])),
            ImportRow::create()->withImportFields(ImportFieldSet::of([
                ImportField::of('StockNumber', 'hri8398939h9'),
                ImportField::of('UPC', 'HUGIKIGUJIG'),
                ImportField::of('ManufactureNumber', '3893893-MIGJI_U'),
            ]))
        ])->equals($importRowCollection));

        self::assertFalse(ImportRowCollection::of([
            ImportRow::create()->withImportFields(ImportFieldSet::of([
                ImportField::of('StockNumber', 'hri8398939h9'),
                ImportField::of('UPC', 'HUGIKIGUJIG'),
                ImportField::of('ManufactureNumber', '3893893-MIGJI_U'),
            ])),
            ImportRow::create()->withImportFields(ImportFieldSet::of([
                ImportField::of('StockNumber', 'hri8398939h9'),
                ImportField::of('UPC', 'HUGIKIGUJIG'),
                ImportField::of('ManufactureNumber', '3893893-MIGJI_U'),
            ])),
            ImportRow::create()->withImportFields(ImportFieldSet::of([
                ImportField::of('StockNumber', 'hri8da9h9'),
                ImportField::of('UPC', 'HUGdaGUJIG'),
                ImportField::of('ManufactureNumber', '38938ggJI_U'),
            ]))
        ])->equals($importRowCollection));

        self::assertFalse(ImportRowCollection::of([
            ImportRow::create()->withImportFields(ImportFieldSet::of([
                ImportField::of('StockNumber', 'hri8398939h9'),
                ImportField::of('UPC', 'HUGIKIGUJIG'),
                ImportField::of('ManufactureNumber', '3893893-MIGJI_U'),
            ])),
            ImportRow::create()->withImportFields(ImportFieldSet::of([
                ImportField::of('StockNumber', 'hri8398939h9'),
                ImportField::of('UPC', 'HUGIKIGUJIG'),
                ImportField::of('ManufactureNumber', '3893893-MIGJI_U'),
            ])),
            ImportRow::create()->withImportFields(ImportFieldSet::of([
                ImportField::of('StockNumber', 'hri8398939h9'),
                ImportField::of('UPC', 'HUGIKIGUJIG'),
                ImportField::of('ManufactureNumber', '3893893-MIGJI_U'),
            ]))
        ])->equals($importRowCollection));

        self::assertFalse(ImportRowCollection::of([
            ImportRow::create()->withImportFields(ImportFieldSet::of([
                ImportField::of('StockNumber', 'hri8398939h9'),
                ImportField::of('UPC', 'HUGIKIGUJIG'),
                ImportField::of('ManufactureNumber', '3893893-MIGJI_U'),
            ])),
            ImportRow::create()->withImportFields(ImportFieldSet::of([
                ImportField::of('StockNumber', 'hri8398939h9'),
                ImportField::of('UPC', 'HUGIKdfaJIG'),
                ImportField::of('ManufactureNumber', '3893893-MIGJI_U'),
            ])),
        ])->equals($importRowCollection));
    }
}
