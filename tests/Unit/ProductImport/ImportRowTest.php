<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\Test\Unit\ImportDataTest;

use PHPUnit\Framework\TestCase;
use SnowIO\VoloDataModel\ProductImport\ImportData;
use SnowIO\VoloDataModel\ProductImport\ImportField;
use SnowIO\VoloDataModel\ProductImport\ImportFieldSet;
use SnowIO\VoloDataModel\ProductImport\ImportRow;

class ImportRowTest extends TestCase
{
    public function testFromJson()
    {
        $importRow = ImportRow::fromJson([
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
                ]
            ],
        ]);

        self::assertTrue(ImportRow::create()
            ->withImportField(ImportField::of('StockNumber', '12022014-17'))
            ->withImportField(ImportField::of('ManufacturerNumber', 'MANU-NAHEUJE-93'))
            ->withImportField(ImportField::of('Color', 'blue'))
            ->withImportField(ImportField::of('Size', 'large'))->equals($importRow));
    }

    public function testToJson()
    {
        $importRow = ImportRow::create()
            ->withImportField(ImportField::of('StockNumber', '12022014-17'))
            ->withImportField(ImportField::of('ManufacturerNumber', 'MANU-NAHEUJE-93'))
            ->withImportField(ImportField::of('Color', 'blue'))
            ->withImportField(ImportField::of('Size', 'large'));

        self::assertEquals([
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
                ]
            ],
        ], $importRow->toJson());
    }

    public function testWithers()
    {
        $importRow = ImportRow::create()
            ->withImportField(ImportField::of('StockNumber', '12022014-17'));
        self::assertTrue(ImportField::of('StockNumber', '12022014-17')
            ->equals($importRow->getImportField('StockNumber')));
        self::assertTrue(ImportFieldSet::of([
            ImportField::of('StockNumber', '12022014-17')
        ])->equals($importRow->getImportFields()));
    }

    public function testEquals()
    {
        $importRow = ImportRow::create()
            ->withImportField(ImportField::of('StockNumber', '12022014-17'));

        $otherImportRow = ImportRow::create()
            ->withImportField(ImportField::of('StockNumber', '12022014-17'));
        self::assertTrue($otherImportRow->equals($importRow));
        $otherImportRow = $otherImportRow->withImportField(ImportField::of('Manufacturer Number', 'MANU-NAHEUJE-93'));
        self::assertFalse($otherImportRow->equals($importRow));
        self::assertFalse((ImportData::create())->equals($importRow));
    }
}
