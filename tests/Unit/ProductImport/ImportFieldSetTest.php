<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\Test\Unit\ImportDataTest;

use PHPUnit\Framework\TestCase;
use SnowIO\VoloDataModel\ProductImport\ImportField;
use SnowIO\VoloDataModel\ProductImport\ImportFieldSet;

class ImportFieldSetTest extends TestCase
{
    public function testWithers()
    {
        $importFieldSet = ImportFieldSet::of([
            ImportField::of('StockNumber', '98h39387927'),
            ImportField::of('UPC', 'GGHURNRUIITY'),
        ]);

        $importFieldSet = $importFieldSet->with(ImportField::of('ManufactureNumber', 'MNAHUD-3328_U'));
        self::assertTrue(ImportFieldSet::of([
            ImportField::of('StockNumber', '98h39387927'),
            ImportField::of('UPC', 'GGHURNRUIITY'),
            ImportField::of('ManufactureNumber', 'MNAHUD-3328_U'),
        ])->equals($importFieldSet));

        $importFieldSet = $importFieldSet->with(ImportField::of('StockNumber', 'FNIFIUBIG943'));
        self::assertTrue(ImportFieldSet::of([
            ImportField::of('StockNumber', 'FNIFIUBIG943'),
            ImportField::of('UPC', 'GGHURNRUIITY'),
            ImportField::of('ManufactureNumber', 'MNAHUD-3328_U'),
        ])->equals($importFieldSet));
    }

    public function testToJson()
    {
        $importFieldSet = ImportFieldSet::of([
            ImportField::of('StockNumber', '98h39387927'),
            ImportField::of('UPC', 'GGHURNRUIITY'),
        ]);

        self::assertEquals([
            [
                'name' => 'StockNumber',
                'value' => '98h39387927',
            ],
            [
                'name' => 'UPC',
                'value' => 'GGHURNRUIITY',
            ]
        ], $importFieldSet->toJson());
    }
}
