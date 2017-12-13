<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\Test\Unit\ImportDataTest;

use PHPUnit\Framework\TestCase;
use SnowIO\VoloDataModel\ProductImport\ImportData;
use SnowIO\VoloDataModel\ProductImport\ImportField;
use SnowIO\VoloDataModel\ProductImport\ImportFieldSet;
use SnowIO\VoloDataModel\ProductImport\ImportRow;
use SnowIO\VoloDataModel\ProductImport\Layout;
use SnowIO\VoloDataModel\ProductImport\LayoutField;
use SnowIO\VoloDataModel\ProductImport\LayoutFieldSet;

class LayoutTest extends TestCase
{
    public function testFromJson()
    {
        $layout = Layout::fromJson($json = [
            "layoutFields" => [
                "layoutField" => [
                    [
                        "name" => "StockNumber"
                    ],
                    [
                        "name" => "UPC"
                    ],
                    [
                        "name" => "CostEach"
                    ],
                ]
            ],
            "layoutName" => 'TestLayout',
            "keyField" => 'StockNumber',
        ]);

        self::assertEquals($json, $layout->toJson());
        self::assertTrue(Layout::of('TestLayout', 'StockNumber')
            ->withLayoutField(LayoutField::of('StockNumber'))
            ->withLayoutField(LayoutField::of('UPC'))
            ->withLayoutField(LayoutField::of('CostEach'))
            ->equals($layout));
    }

    public function testToJson()
    {
        /** @var Layout $layout */
        $layout = Layout::of('TestLayout', 'StockNumber');
        self::assertEquals([
            'layoutFields' => [
                'layoutField' => []
            ],
            "layoutName" => 'TestLayout',
            "keyField" => 'StockNumber',
        ], $layout->toJson());

        $layout = $layout
            ->withLayoutField(LayoutField::of('StockNumber'))
            ->withLayoutField(LayoutField::of('UPC'))
            ->withLayoutField(LayoutField::of('CostEach'));

        self::assertEquals([
            "layoutFields" => [
                "layoutField" => [
                    [
                        "name" => "StockNumber"
                    ],
                    [
                        "name" => "UPC"
                    ],
                    [
                        "name" => "CostEach"
                    ],
                ]
            ],
            "layoutName" => 'TestLayout',
            "keyField" => 'StockNumber',
        ], $layout->toJson());

        $layout = $layout
            ->withLayoutField(LayoutField::of('StockNumber'))
            ->withLayoutField(LayoutField::of('UPC'))
            ->withLayoutField(LayoutField::of('CostEach'))
            ->withSellerCentralCategory('TEST_SELLER_CENTRAL_CATEGORY')
            ->withSellerCentralSubCategory('TEST_SELLER_CENTRAL_SUB_CATEGORY')
            ->withFlagForNewProducts(1)
            ->withSkipExistingProduct(false)
            ->withSkipNewProduct(false);
        self::assertEquals([
            "layoutFields" => [
                "layoutField" => [
                    [
                        "name" => "StockNumber"
                    ],
                    [
                        "name" => "UPC"
                    ],
                    [
                        "name" => "CostEach"
                    ],
                ]
            ],
            "layoutName" => 'TestLayout',
            "sellerCentralCategory" => "TEST_SELLER_CENTRAL_CATEGORY",
            "sellerCentralSubCategory" => "TEST_SELLER_CENTRAL_SUB_CATEGORY",
            "flagForNewProducts" => 1,
            "skipExistingProduct" => false,
            "skipNewProduct" => false,
            "keyField" => 'StockNumber',
        ], $layout->toJson());
    }

    public function testWithers()
    {
        $layout = Layout::of('TestLayout', 'StockNumber')
            ->withLayoutField(LayoutField::of('StockNumber'))
            ->withLayoutField(LayoutField::of('UPC'))
            ->withLayoutField(LayoutField::of('CostEach'))
            ->withSellerCentralCategory('TEST_SELLER_CENTRAL_CATEGORY')
            ->withSellerCentralSubCategory('TEST_SELLER_CENTRAL_SUB_CATEGORY')
            ->withFlagForNewProducts(1)
            ->withSkipExistingProduct(false)
            ->withSkipNewProduct(false);

        self::assertEquals('TestLayout', $layout->getName());
        self::assertEquals('StockNumber', $layout->getKeyField());
        self::assertTrue(LayoutFieldSet::of([
            LayoutField::of('StockNumber'),
            LayoutField::of('UPC'),
            LayoutField::of('CostEach')
        ])->equals($layout->getLayoutFields()));
        self::assertTrue(LayoutField::of('StockNumber')->equals($layout->getLayoutField('StockNumber')));
        self::assertTrue(LayoutField::of('UPC')->equals($layout->getLayoutField('UPC')));
        self::assertTrue(LayoutField::of('CostEach')->equals($layout->getLayoutField('CostEach')));
        self::assertEquals('TEST_SELLER_CENTRAL_CATEGORY', $layout->getSellerCentralCategory());
        self::assertEquals('TEST_SELLER_CENTRAL_SUB_CATEGORY', $layout->getSellerCentralSubCategory());
        self::assertEquals(1, $layout->getFlagForNewProducts());
        self::assertEquals(false, $layout->skipExistingProduct());
        self::assertEquals(false, $layout->skipNewProduct());
    }

    public function testValidationWithValidImport()
    {
        $importData = ImportData::create()
            ->withImportRow(
                ImportRow::create()
                    ->withImportFields(ImportFieldSet::of([
                        ImportField::of('StockNumber', '89240803-K23'),
                        ImportField::of('UPC', '8924h380'),
                        ImportField::of('CostEach', '5.43'),
                    ]))
            )
            ->withImportRow(
                ImportRow::create()
                    ->withImportFields(ImportFieldSet::of([
                        ImportField::of('StockNumber', '89240803-K24'),
                        ImportField::of('UPC', '8924h381'),
                        ImportField::of('CostEach', '6.43'),
                    ]))
            );

        $layout = Layout::of('TestLayout', 'StockNumber')
            ->withLayoutFields(LayoutFieldSet::of([
                LayoutField::of('StockNumber'),
                LayoutField::of('UPC'),
                LayoutField::of('CostEach'),
            ]));
        $layout->validate($importData);

        self::assertTrue(true);
    }

    /**
     * @expectedException \SnowIO\VoloDataModel\ProductImport\LayoutException
     */
    public function testValidationWithImportThatHasWrongKeyField()
    {
        $importData = ImportData::create()
            ->withImportRow(
                ImportRow::create()
                    ->withImportFields(ImportFieldSet::of([
                        ImportField::of('Title', '89240803-K23'),
                        ImportField::of('UPC', '8924h380'),
                        ImportField::of('CostEach', '5.43'),
                    ]))
            )
            ->withImportRow(
                ImportRow::create()
                    ->withImportFields(ImportFieldSet::of([
                        ImportField::of('StockNumber', '89240803-K24'),
                        ImportField::of('UPC', '8924h381'),
                        ImportField::of('CostEach', '6.43'),
                    ]))
            );

        $layout = Layout::of('TestLayout', 'StockNumber')
            ->withLayoutFields(LayoutFieldSet::of([
                LayoutField::of('StockNumber'),
                LayoutField::of('UPC'),
                LayoutField::of('CostEach'),
            ]));

        $layout->validate($importData);
    }

    /**
     * @expectedException \SnowIO\VoloDataModel\ProductImport\LayoutException
     * todo Need to look into whether this will be affected by the principle of order
     * we still do not know if the layout is but a map for the fields in the import field by order
     * or a the list of field names and order provide a form of validation for the import fields
     */
    public function testValidationWithImportThatHasInvalidFields()
    {
        $importData = ImportData::create()
            ->withImportRow(
                ImportRow::create()
                    ->withImportFields(ImportFieldSet::of([
                        ImportField::of('StockNumber', '89240803-K23'),
                        ImportField::of('UPC', '8924h380'),
                        ImportField::of('SalePrice', '5.43'),
                    ]))
            )
            ->withImportRow(
                ImportRow::create()
                    ->withImportFields(ImportFieldSet::of([
                        ImportField::of('StockNumber', '89240803-K24'),
                        ImportField::of('UPC', '8924h381'),
                        ImportField::of('CostEach', '6.43'),
                    ]))
            );

        $layout = Layout::of('TestLayout', 'StockNumber')
            ->withLayoutFields(LayoutFieldSet::of([
                LayoutField::of('StockNumber'),
                LayoutField::of('UPC'),
                LayoutField::of('CostEach'),
            ]));

        $layout->validate($importData);
    }

    public function testEquals()
    {
        $layout = Layout::of('TestLayout', 'StockNumber')
            ->withLayoutField(LayoutField::of('StockNumber'))
            ->withLayoutField(LayoutField::of('UPC'))
            ->withLayoutField(LayoutField::of('CostEach'))
            ->withSellerCentralCategory('TEST_SELLER_CENTRAL_CATEGORY')
            ->withSellerCentralSubCategory('TEST_SELLER_CENTRAL_SUB_CATEGORY')
            ->withFlagForNewProducts(1)
            ->withSkipExistingProduct(false)
            ->withSkipNewProduct(false);

        /** @var Layout $otherLayout */
        $otherLayout = clone $layout;
        self::assertTrue($otherLayout->equals($layout));
        self::assertFalse(($otherLayout->withSkipNewProduct(true))->equals($layout));
        self::assertFalse(($otherLayout->withSkipExistingProduct(true))->equals($layout));
        self::assertFalse(($otherLayout->withFlagForNewProducts(18))->equals($layout));
        self::assertFalse(($otherLayout->withSellerCentralCategory('OTHER'))->equals($layout));
        self::assertFalse(($otherLayout->withSellerCentralSubCategory('OTHER2'))->equals($layout));
        self::assertFalse(($otherLayout->withSellerCentralSubCategory('OTHER2'))->equals($layout));
        self::assertTrue($otherLayout->equals($layout));
    }
}
