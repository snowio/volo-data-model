<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\Test\Unit\ImportDataTest;

use PHPUnit\Framework\TestCase;
use SnowIO\VoloDataModel\ProductImport\ImportField;
use SnowIO\VoloDataModel\ProductImport\LayoutField;

class LayoutFieldTest extends TestCase
{
    public function testFromJson()
    {
        $layoutField = LayoutField::fromJson([
            'name' => 'StockNumber',
            'type' => 'SOME_TYPE',
            'value' => 'VALUE',
        ]);

        self::assertTrue(
            LayoutField::of('StockNumber')
                ->withType('SOME_TYPE')
                ->withValue('VALUE')
                ->equals($layoutField)
        );
    }


    public function testToJson()
    {
        /** @var LayoutField $layoutField */
        $layoutField = LayoutField::of('StockNumber');
        self::assertEquals([
            'name' => 'StockNumber',
        ], $layoutField->toJson());

        $layoutField = $layoutField->withType('SOME_TYPE');
        self::assertEquals([
            'name' => 'StockNumber',
            'type' => 'SOME_TYPE',
        ], $layoutField->toJson());

        $layoutField = $layoutField->withValue('VALUE');
        self::assertEquals([
            'name' => 'StockNumber',
            'type' => 'SOME_TYPE',
            'value' => 'VALUE',
        ], $layoutField->toJson());
    }

    public function testWithers()
    {
        /** @var LayoutField $layoutField */
        $layoutField = LayoutField::of('StockNumber')
            ->withType('SOME_TYPE')
            ->withValue('SOME_VALUE');
        self::assertEquals('StockNumber', $layoutField->getName());
        self::assertEquals('SOME_TYPE', $layoutField->getType());
        self::assertEquals('SOME_VALUE', $layoutField->getValue());
    }

    public function testEquals()
    {
        /** @var LayoutField $layoutField */
        $layoutField = LayoutField::of('StockNumber')->withType('SOME_TYPE')->withValue('SOME_VALUE');
        $otherLayoutField = clone $layoutField;
        self::assertTrue($layoutField->equals($otherLayoutField));
        self::assertFalse($otherLayoutField->withType('OTHER_TYPE')->equals($layoutField));
        self::assertFalse(ImportField::of('StockNumber', '8294h9392g-8')->equals($layoutField));
    }
}
