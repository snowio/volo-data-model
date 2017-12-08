<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\Test\Unit\ImportDataTest;

use PHPUnit\Framework\TestCase;
use SnowIO\VoloDataModel\ProductImport\ImportField;
use SnowIO\VoloDataModel\ProductImport\ImportRow;

class ImportFieldTest extends TestCase
{
    public function testToJson()
    {
        $importField = ImportField::of('StockNumber', '12022014-17');
        self::assertEquals([
            'name' => 'StockNumber',
            'value' => '12022014-17',
            //todo need to understand the type of fields
        ], $importField->toJson());
    }

    public function testWither()
    {
        $importField = ImportField::of('StockNumber', '12022014-17')
            ->withType('test')
            ->withValue('12022014-18');

        self::assertEquals('StockNumber', $importField->getName());
        self::assertEquals('test', $importField->getType());
        self::assertEquals('12022014-18', $importField->getValue());
    }

    public function testEquals()
    {
        $importField = ImportField::of('StockNumber', '12022014-17')
            ->withType('test')
            ->withValue('12022014-18');
        $otherImportField = clone $importField;
        self::assertTrue($otherImportField->equals($importField));
        self::assertFalse($otherImportField->withType('test2')->equals($importField));
        self::assertFalse((ImportRow::create())->equals($importField));
    }
}
