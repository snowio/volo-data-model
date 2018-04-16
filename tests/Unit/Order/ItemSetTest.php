<?php


namespace SnowIO\VoloDataModel\Test\Unit\Order;

use PHPUnit\Framework\TestCase;
use SnowIO\VoloDataModel\Order\Item;
use SnowIO\VoloDataModel\Order\ItemSet;

class ItemSetTest extends TestCase
{
    public function testItemSetToJson()
    {
        $itemSet = ItemSet::of([
            Item::of(1, 'stockNumber')
                ->withWebProductID('webProductID')
                ->withItemNumber('itemNumber')
                ->withProductTitle('productTitle')
                ->withQuantity(0)
                ->withUnitCost('99.00')
                ->withTaxRate('98.002')
                ->withTaxCode('taxCode')
                ->withUnitCostIncludesTax('unitCostIncludesTax')
                ->withWeight(0)
                ->withProductFolderName('productFolderName')
                ->withCreditReason('creditReason')
                ->withCustomMessage1('customMessage1')
                ->withCustomMessage2('customMessage2')
                ->withCustomMessage3('customMessage3')
                ->withLocationId(0)
                ->withSupplierId(1)
                ->withKitType('kitType')
                ->withKitMaster('kitMaster')
                ->withPicked(true)
                ->withUnitItemTax('22.112')
                ->withUnitShippingTax('33.333')
                ->withUnitShippingAmount('44.444')
                ->withBackOrder(true)
        ]);

        self::assertEquals([
            "item" => [
                $this->getSampleData(1)
            ]
        ], $itemSet->toJson());
    }

    /**
     * @expectedException \SnowIO\VoloDataModel\VoloDataException
     * @expectedMessage Cannot set OrderCredit with same stockNumber
     */
    public function testInvalidSetItemSetTwiceInOf()
    {
        ItemSet::of([
            Item::of(1, 'stockNumber1'),
            Item::of(1, 'stockNumber2')
        ]);
    }

    /**
     * @expectedException \SnowIO\VoloDataModel\VoloDataException
     * @expectedMessage Cannot set OrderCredit with same stockNumber
     */
    public function testInvalidItemSetTwiceInFromJson()
    {
        ItemSet::fromJson([
            "item" => [
                Item::of(1, 'stockNumber1')->toJson(),
                Item::of(1, 'stockNumber2')->toJson(),
            ]
        ]);
    }

    public function testItemSetFromJson()
    {
        $data = [
            "item" => [
                $this->getSampleData(1),
                $this->getSampleData(2)
            ],
        ];
        $itemSet = ItemSet::fromJson($data);

        self::assertSame(2, $itemSet->count());
        self::assertEquals($data, $itemSet->toJson());
    }

    public function testDefaultValues()
    {
        $itemSet = ItemSet::of([
            Item::of(1, 'stockNumber')
        ]);

        self::assertEquals([
            "item" => [
                [
                    'orderItemId' => 1,
                    'webProductID' => null,
                    'stockNumber' => 'stockNumber',
                    'itemNumber' => null,
                    'productTitle' => null,
                    'quantity' => 0,
                    'unitCost' => '',
                    'taxRate' => '',
                    'taxCode' => null,
                    'unitCostIncludesTax' => null,
                    'weight' => 0,
                    'productFolderName' => null,
                    'creditReason' => null,
                    'customMessage1' => null,
                    'customMessage2' => null,
                    'customMessage3' => null,
                    'locationId' => 0,
                    'supplierId' => 0,
                    'kitType' => null,
                    'kitMaster' => null,
                    'picked' => null,
                    'unitItemTax' => '',
                    'unitShippingTax' => '',
                    'unitShippingAmount' => '',
                    'backOrder' => null
                ]
            ]
        ], $itemSet->toJson());
    }

    /**
     * @expectedException \SnowIO\VoloDataModel\VoloDataException
     * @expectedMessage Cannot set Item with same orderItemId
     */
    public function testItemTwice()
    {
        ItemSet::of([
            Item::of(2, 'stockNumber1'),
            Item::of(2, 'stockNumber1')
        ]);
    }

    public function testGetShouldUseOrderItemIdAsKey()
    {
        $itemSet = ItemSet::of([
            Item::of(1, 'stockNumber1')
        ]);
        self::assertInstanceOf(Item::class, $itemSet->get(1));
        self::assertNull($itemSet->get(0));
    }

    public function testEquality()
    {
        $itemSet = ItemSet::of([
            Item::of(1, 'stockNumber'),
            Item::of(2, 'stockNumber'),
            Item::of(3, 'stockNumber'),
        ]);
        $sameSet = ItemSet::of([
            Item::of(1, 'stockNumber'),
            Item::of(2, 'stockNumber'),
            Item::of(3, 'stockNumber'),
        ]);
        $notSameSet = ItemSet::of([
            Item::of(1, 'stockNumber1'),
            Item::of(2, 'stockNumber'),
            Item::of(3, 'xxxxxxxxxxxx'),
        ]);
        self::assertTrue($itemSet->equals($sameSet));
        self::assertFalse($itemSet->equals($notSameSet));
    }

    private function getSampleData($orderItemId)
    {
        return [
            'orderItemId' => $orderItemId,
            'webProductID' => 'webProductID',
            'stockNumber' => 'stockNumber',
            'itemNumber' => 'itemNumber',
            'productTitle' => 'productTitle',
            'quantity' => 0,
            'unitCost' => '99.00',
            'taxRate' => '98.002',
            'taxCode' => 'taxCode',
            'unitCostIncludesTax' => 'unitCostIncludesTax',
            'weight' => 0,
            'productFolderName' => 'productFolderName',
            'creditReason' => 'creditReason',
            'customMessage1' => 'customMessage1',
            'customMessage2' => 'customMessage2',
            'customMessage3' => 'customMessage3',
            'locationId' => 0,
            'supplierId' => 1,
            'kitType' => 'kitType',
            'kitMaster' => 'kitMaster',
            'picked' => true,
            'unitItemTax' => '22.112',
            'unitShippingTax' => '33.333',
            'unitShippingAmount' => '44.444',
            'backOrder' => true
        ];
    }
}
