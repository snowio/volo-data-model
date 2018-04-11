<?php


namespace SnowIO\VoloDataModel\Test\Unit\Order;

use PHPUnit\Framework\TestCase;
use SnowIO\VoloDataModel\Order\OrderCredit;
use SnowIO\VoloDataModel\Order\OrderCreditSet;

class OrderCreditSetTest extends TestCase
{
    public function testOrderCreditSetToJson()
    {
        $orderCreditSet = OrderCreditSet::of([
            OrderCredit::of('0001', 'stockNumber')
                ->withCreditNoteDate('2018-04-05T08:42:03Z')
                ->withShippingRefunded(0)
                ->withInsuranceRefunded(0)
                ->withDiscountRefunded(0)
                ->withPrice('99.999999')
                ->withCancelReason('cancelReason')
                ->withQuantityRefunded(9)
        ]);

        self::assertEquals([[
            'creditNoteNumber' => '0001',
            'creditNoteDate' => '2018-04-05T08:42:03Z',
            'shippingRefunded' => 0,
            'insuranceRefunded' => 0,
            'discountRefunded' => 0,
            'price' => '99.999999',
            'cancelReason' => 'cancelReason',
            'stockNumber' => 'stockNumber',
            'quantityRefunded' => '9.00',
        ]], $orderCreditSet->toJson());
    }

    public function testOrderCreditSetFromJson()
    {
        $data = [
            [
                'creditNoteNumber' => '0001',
                'creditNoteDate' => '2018-04-05T08:42:03Z',
                'shippingRefunded' => 0,
                'insuranceRefunded' => 0,
                'discountRefunded' => 0,
                'price' => '99.999999',
                'cancelReason' => 'cancelReason',
                'stockNumber' => 'stockNumber',
                'quantityRefunded' => '9.00',
            ],
            [
                'creditNoteNumber' => '0002',
                'creditNoteDate' => '2018-04-05T08:42:03Z',
                'shippingRefunded' => 0,
                'insuranceRefunded' => 0,
                'discountRefunded' => 0,
                'price' => '33.3333',
                'cancelReason' => 'cancelReason',
                'stockNumber' => 'stockNumber',
                'quantityRefunded' => '9.00',
            ]];
        $orderCreditSet = OrderCreditSet::fromJson($data);

        self::assertSame(2, $orderCreditSet->count());
        self::assertEquals($data, $orderCreditSet->toJson());
    }

    public function testDefaultValues()
    {
        $orderCreditSet = OrderCreditSet::of([
            OrderCredit::of('0001', 'stockNumber')
        ]);

        self::assertEquals([[
            'creditNoteNumber' => '0001',
            'stockNumber' => 'stockNumber',
            'creditNoteDate' => null,
            'shippingRefunded' => 0,
            'insuranceRefunded' => 0,
            'discountRefunded' => 0,
            'price' => '',
            'cancelReason' => null,
            'quantityRefunded' => 0,
        ]], $orderCreditSet->toJson());
    }

    /**
     * @expectedException \SnowIO\VoloDataModel\VoloDataException
     * @expectedMessage Cannot set OrderCredit with same stockNumber
     */
    public function testInvalidSetOrderCreditTwice()
    {
        OrderCreditSet::of([
            OrderCredit::of('0001', 'stockNumber1'),
            OrderCredit::of('0001', 'stockNumber2')
        ]);
    }

    public function testGetShouldUseCreditNoteNumberAsKey()
    {
        $orderCreditSet = OrderCreditSet::of([
            OrderCredit::of('0001', 'stockNumber1')
        ]);
        self::assertInstanceOf(OrderCredit::class, $orderCreditSet->get('0001'));
        self::assertNull($orderCreditSet->get('0'));
    }

    public function testEquality()
    {
        $orderCreditSet = OrderCreditSet::of([
            OrderCredit::of('0001', 'stockNumber'),
            OrderCredit::of('0002', 'stockNumber'),
            OrderCredit::of('0003', 'stockNumber'),
        ]);
        $sameSet = OrderCreditSet::of([
            OrderCredit::of('0001', 'stockNumber'),
            OrderCredit::of('0002', 'stockNumber'),
            OrderCredit::of('0003', 'stockNumber'),
        ]);
        $notSameSet = OrderCreditSet::of([
            OrderCredit::of('0001', 'stockNumber1'),
            OrderCredit::of('0002', 'stockNumber'),
            OrderCredit::of('0003', 'xxxxxxxxxxxx'),
        ]);
        self::assertTrue($orderCreditSet->equals($sameSet));
        self::assertFalse($orderCreditSet->equals($notSameSet));
    }
}