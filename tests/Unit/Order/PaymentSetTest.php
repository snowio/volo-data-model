<?php


namespace SnowIO\VoloDataModel\Test\Unit\Order;

use PHPUnit\Framework\TestCase;
use SnowIO\VoloDataModel\Order\Payment;
use SnowIO\VoloDataModel\Order\PaymentSet;

class PaymentSetTest extends TestCase
{
    public function testEmptyJsonPaymentSet()
    {
        $itemSet = PaymentSet::fromJson([]);
        self::assertEquals([], $itemSet->toJson());
    }

    public function testPaymentSetToJson()
    {
        $itemSet = PaymentSet::of([
            Payment::of('paymentReference')
                ->withPaymentMethod('paymentMethod')
                ->withPaymentNotes('paymentNotes')
                ->withPaymentCCDetails('paymentCCDetails')
                ->withPaymentGateway('paymentGateway')
                ->withPayPalEmail('payPalEmail')
                ->withPayPalTransactionID('payPalTransactionID')
                ->withPayPalProtectionEligibility(true)
                ->withAmount('99.999')
                ->withPaymentDate('paymentDate')
                ->withPaymentId(12)
                ->withClearedDate('clearedDate')
                ->withPostedBatchId(1)
        ]);

        self::assertEquals([
            'payment' => [
                $this->getSampleData('paymentReference'),
            ]
        ], $itemSet->toJson());
    }

    public function testPaymentSetFromJson()
    {
        $data = [
            'payment' => [
                $this->getSampleData('1'),
                $this->getSampleData('2')
            ]
        ];
        $itemSet = PaymentSet::fromJson($data);

        self::assertSame(2, $itemSet->count());
        self::assertEquals($data, $itemSet->toJson());
    }

    public function testDefaultValues()
    {
        $itemSet = PaymentSet::of([
            Payment::of('1')
        ]);

        self::assertEquals([
            'payment' => [
                [
                    'paymentMethod' => null,
                    'paymentReference' => '1',
                    'paymentNotes' => null,
                    'paymentCCDetails' => null,
                    'paymentGateway' => null,
                    'payPalEmail' => null,
                    'payPalTransactionID' => null,
                    'payPalProtectionEligibility' => null,
                    'amount' => null,
                    'paymentDate' => null,
                    'paymentId' => 0,
                    'clearedDate' => null,
                    'postedBatchId' => 0,
                ],
            ]
        ], $itemSet->toJson());
    }

    /**
     * @expectedException \SnowIO\VoloDataModel\VoloDataException
     * @expectedMessage Cannot set Payment with same orderPaymentId
     */
    public function testPaymentTwice()
    {
        PaymentSet::of([
            Payment::of(2, 'stockNumber1'),
            Payment::of(2, 'stockNumber1')
        ]);
    }

    public function testGetShouldUsePaymentReferenceAsKey()
    {
        $itemSet = PaymentSet::of([
            Payment::of(1)
        ]);
        self::assertInstanceOf(Payment::class, $itemSet->get(1));
        self::assertNull($itemSet->get(0));
    }

    public function testEquality()
    {
        $itemSet = PaymentSet::of([
            Payment::of('1'),
            Payment::of('2'),
            Payment::of('3'),
        ]);
        $sameSet = PaymentSet::of([
            Payment::of('1'),
            Payment::of('2'),
            Payment::of('3'),
        ]);
        $notSameSet = PaymentSet::of([
            Payment::of('1')->withAmount(11),
            Payment::of('2'),
            Payment::of('3'),
        ]);
        self::assertTrue($itemSet->equals($sameSet));
        self::assertFalse($itemSet->equals($notSameSet));
    }

    private function getSampleData($paymentReference)
    {
        return [
                    'paymentMethod' => 'paymentMethod',
                    'paymentReference' => $paymentReference,
                    'paymentNotes' => 'paymentNotes',
                    'paymentCCDetails' => 'paymentCCDetails',
                    'paymentGateway' => 'paymentGateway',
                    'payPalEmail' => 'payPalEmail',
                    'payPalTransactionID' => 'payPalTransactionID',
                    'payPalProtectionEligibility' => true,
                    'amount' => '99.999',
                    'paymentDate' => 'paymentDate',
                    'paymentId' => 12,
                    'clearedDate' => 'clearedDate',
                    'postedBatchId' => 1,

        ];
    }
}
