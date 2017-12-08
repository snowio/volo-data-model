<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\Test\Unit\ImportDataTest;

use PHPUnit\Framework\TestCase;
use SnowIO\VoloDataModel\ProductImport\LayoutField;
use SnowIO\VoloDataModel\ProductImport\LayoutFieldSet;

class LayoutFieldSetTest extends TestCase
{
    public function testWithers()
    {
        $layoutFieldSet = LayoutFieldSet::of([
            LayoutField::of('StockNumber'),
            LayoutField::of('UPC')
        ]);

        $layoutFieldSet = $layoutFieldSet->with(LayoutField::of('ManufacturerNumber'));
        self::assertTrue(LayoutFieldSet::of([
            LayoutField::of('StockNumber'),
            LayoutField::of('UPC'),
            LayoutField::of('ManufacturerNumber')
        ])->equals($layoutFieldSet));
    }

    public function testToJson()
    {
        $layoutFieldSet = LayoutFieldSet::of([
            LayoutField::of('StockNumber'),
            LayoutField::of('UPC')
        ]);

        self::assertEquals([
            [
                'name' => 'StockNumber'
            ],
            [
                'name' => 'UPC'
            ]
        ], $layoutFieldSet->toJson());
    }
}
