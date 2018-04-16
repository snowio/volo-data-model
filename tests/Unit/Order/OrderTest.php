<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\Test\Unit\Order;

use PHPUnit\Framework\TestCase;
use SnowIO\VoloDataModel\Order\ItemSet;
use SnowIO\VoloDataModel\Order\Item;
use SnowIO\VoloDataModel\Order\OrderCredit;
use SnowIO\VoloDataModel\Order\Payment;
use SnowIO\VoloDataModel\Order\PaymentSet;
use SnowIO\VoloDataModel\Order\OrderCreditSet;
use SnowIO\VoloDataModel\Order\Order;

class OrderTest extends TestCase
{
    private function getJsonData($espOrderNo)
    {
        return [
            'orderType' => 'orderType',
            'orderSource' => 'orderSource',
            'espOrderNo' => $espOrderNo,
            'invoiceNumber' => 'invoiceNumber',
            'externalReference' => 'externalReference',
            'date' => '2018-04-05T08:42:03Z',
            'customerCompany' => 'customerCompany',
            'customerName' => 'customerName',
            'customerAddress1' => 'customerAddress1',
            'customerAddress2' => 'customerAddress2',
            'customerAddress3' => 'customerAddress3',
            'customerCity' => 'customerCity',
            'customerCounty' => 'customerCounty',
            'customerPostcode' => 'customerPostcode',
            'customerCountry' => 'customerCountry',
            'customerEmail' => 'customerEmail',
            'customerTelephone' => 'customerTelephone',
            'customerFax' => 'customerFax',
            'customerReference' => 'customerReference',
            'customerNotes' => 'customerNotes',
            'deliveryCompany' => 'deliveryCompany',
            'deliveryName' => 'deliveryName',
            'deliveryAddress1' => 'deliveryAddress1',
            'deliveryAddress2' => 'deliveryAddress2',
            'deliveryAddress3' => 'deliveryAddress3',
            'deliveryCity' => 'deliveryCity',
            'deliveryCounty' => 'deliveryCounty',
            'deliveryPostcode' => 'deliveryPostcode',
            'deliveryCountry' => 'deliveryCountry',
            'deliveryTelephone' => 'deliveryTelephone',
            'shippingMethod' => 'shippingMethod',
            'shippingCost' => '199.99',
            'insurance' => '0',
            'discount' => '0',
            'voucherCode' => 'voucherCode',
            'orderTotal' => '999.999',
            'paymentComplete' => true,
            'currencyCode' => 'currencyCode',
            'exchangeRate' => '123.222',
            'sellerUsername' => 'sellerUsername',
            'sellerId' => 1,
            'courierProfileName' => 'courierProfileName',
            'buyerId' => "9",
            'storeId' => 'storeId',
            'shipToStore' => 'shipToStore',
            'orderStatus' => 'orderStatus',
            'flag1' => 'flag1',
            'flag2' => 'flag2',
            'courierName' => 'courierName',
            'courierService' => 'courierService',
            'courierServiceCode' => 'courierServiceCode',
            'fulfilmentType' => 'fulfilmentType',
            'webOrderID' => 1222,
            'shippingDate' => '2018-04-05T08:42:03Z',
            'invoiceDate' => '2018-04-05T08:42:03Z',
            'tradeSale' => true,
            'courierTracking' => 'courierTracking',
            'actualCourierCost' => '99.333',
            'orderItems' => [
                "item" => [
                    [
                        'orderItemId' => 1,
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
                    ]
                ]
            ],
            'orderCredits' => [
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
                ]
            ],
            'payments' => [
                [
                    'paymentMethod' => 'paymentMethod',
                    'paymentReference' => 'paymentReference',
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
                ]
            ],
        ];
    }

    public function testFromJsonToJson()
    {
        $data = $this->getJsonData('111111');
        $order = Order::fromJson($data);

        self::assertEquals($data, $order->toJson());
    }

    public function testWithers()
    {
        $order = Order::of('22')
            ->withOrderType('orderType')
            ->withOrderSource('orderSource')
            ->withInvoiceNumber('invoiceNumber')
            ->withExternalReference('externalReference')
            ->withExternalReference('externalReference')
            ->withBuyerId('11')
            ->withOrderTotal('99.9999')
            ->withDate('2018-04-05T08:42:03Z')
            ->withCustomerCompany('customerCompany')
            ->withCustomerName('customerName')
            ->withCustomerAddress1('customerAddress1')
            ->withCustomerAddress2('customerAddress2')
            ->withCustomerAddress3('customerAddress3')
            ->withCustomerCity('customerCity')
            ->withCustomerCounty('customerCounty')
            ->withCustomerPostcode('customerPostcode')
            ->withCustomerCountry('customerCountry')
            ->withCustomerEmail('customerEmail')
            ->withCustomerTelephone('customerTelephone')
            ->withCustomerFax('customerFax')
            ->withCustomerReference('customerReference')
            ->withCustomerNotes('customerNotes')
            ->withDeliveryCompany('deliveryCompany')
            ->withDeliveryName('deliveryName')
            ->withDeliveryAddress1('deliveryAddress1')
            ->withDeliveryAddress2('deliveryAddress2')
            ->withDeliveryAddress3('deliveryAddress3')
            ->withDeliveryCity('deliveryCity')
            ->withDeliveryCounty('deliveryCounty')
            ->withDeliveryPostcode('deliveryPostcode')
            ->withDeliveryCountry('deliveryCountry')
            ->withDeliveryTelephone('deliveryTelephone')
            ->withShippingMethod('shippingMethod')
            ->withShippingCost('199.99')
            ->withInsurance('0')
            ->withDiscount('0')
            ->withVoucherCode('voucherCode')
            ->withOrderTotal('999.999')
            ->withPaymentComplete(true)
            ->withCurrencyCode('currencyCode')
            ->withExchangeRate('123.222')
            ->withSellerUsername('sellerUsername')
            ->withSellerId(1)
            ->withCourierProfileName('courierProfileName')
            ->withBuyerId('9')
            ->withStoreId('storeId')
            ->withShipToStore('shipToStore')
            ->withOrderStatus('orderStatus')
            ->withFlag1('flag1')
            ->withFlag2('flag2')
            ->withCourierName('courierName')
            ->withCourierService('courierService')
            ->withCourierServiceCode('courierServiceCode')
            ->withFulfilmentType('fulfilmentType')
            ->withWebOrderID(1222)
            ->withShippingDate('2018-04-05T08:42:03Z')
            ->withInvoiceDate('2018-04-05T08:42:03Z')
            ->withTradeSale(true)
            ->withCourierTracking('courierTracking')
            ->withActualCourierCost('99.333')
            ->withOrderItems(ItemSet::of([
                Item::of(1, 'stockNumber')
                    ->withWebProductID('webProductID')
                    ->withItemNumber('itemNumber')
                    ->withProductTitle('productTitle')
                    ->withQuantity(0)
                    ->withUnitCost('99.00')
                    ->withTaxRate('98.002')
                    ->withTaxCode('taxCode')
                    ->withUnitCostIncludesTax('unitCostIncludesTax')
                    ->withWeight("0")
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
            ]))
            ->withOrderCredits(OrderCreditSet::of([
                OrderCredit::of('0001', 'stockNumber')
                    ->withCreditNoteDate('2018-04-05T08:42:03Z')
                    ->withShippingRefunded(0)
                    ->withInsuranceRefunded(0)
                    ->withDiscountRefunded(0)
                    ->withPrice('99.999999')
                    ->withCancelReason('cancelReason')
                    ->withQuantityRefunded(9)
            ]))
            ->withPayments(PaymentSet::of([
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
            ]));

        self::assertEquals($this->getJsonData('22'), $order->toJson());
    }

    public function testGetters()
    {
        $data = $this->getJsonData('111111');
        $order = Order::fromJson($data);

        self::assertEquals($order->getEspOrderNo(), '111111');
        self::assertEquals($order->getOrderType(), 'orderType');
        self::assertEquals($order->getOrderSource(), 'orderSource');
        self::assertEquals($order->getInvoiceNumber(), 'invoiceNumber');
        self::assertEquals($order->getExternalReference(), 'externalReference');
        self::assertEquals($order->getBuyerId(), '9');
        self::assertEquals($order->getOrderTotal(), '999.999');
        self::assertEquals($order->getDate(), '2018-04-05T08:42:03Z');
        self::assertEquals($order->getCustomerCompany(), 'customerCompany');
        self::assertEquals($order->getCustomerName(), 'customerName');
        self::assertEquals($order->getCustomerAddress1(), 'customerAddress1');
        self::assertEquals($order->getCustomerAddress2(), 'customerAddress2');
        self::assertEquals($order->getCustomerAddress3(), 'customerAddress3');
        self::assertEquals($order->getCustomerCity(), 'customerCity');
        self::assertEquals($order->getCustomerCounty(), 'customerCounty');
        self::assertEquals($order->getCustomerPostcode(), 'customerPostcode');
        self::assertEquals($order->getCustomerCountry(), 'customerCountry');
        self::assertEquals($order->getCustomerEmail(), 'customerEmail');
        self::assertEquals($order->getCustomerTelephone(), 'customerTelephone');
        self::assertEquals($order->getCustomerFax(), 'customerFax');
        self::assertEquals($order->getCustomerReference(), 'customerReference');
        self::assertEquals($order->getCustomerNotes(), 'customerNotes');
        self::assertEquals($order->getDeliveryCompany(), 'deliveryCompany');
        self::assertEquals($order->getDeliveryName(), 'deliveryName');
        self::assertEquals($order->getDeliveryAddress1(), 'deliveryAddress1');
        self::assertEquals($order->getDeliveryAddress2(), 'deliveryAddress2');
        self::assertEquals($order->getDeliveryAddress3(), 'deliveryAddress3');
        self::assertEquals($order->getDeliveryCity(), 'deliveryCity');
        self::assertEquals($order->getDeliveryCounty(), 'deliveryCounty');
        self::assertEquals($order->getDeliveryPostcode(), 'deliveryPostcode');
        self::assertEquals($order->getDeliveryCountry(), 'deliveryCountry');
        self::assertEquals($order->getDeliveryTelephone(), 'deliveryTelephone');
        self::assertEquals($order->getShippingMethod(), 'shippingMethod');
        self::assertEquals($order->getShippingCost(), '199.99');
        self::assertEquals($order->getInsurance(), 0);
        self::assertEquals($order->getDiscount(), 0);
        self::assertEquals($order->getVoucherCode(), 'voucherCode');
        self::assertEquals($order->getOrderTotal(), '999.999');
        self::assertEquals($order->getPaymentComplete(), true);
        self::assertEquals($order->getCurrencyCode(), 'currencyCode');
        self::assertEquals($order->getExchangeRate(), '123.222');
        self::assertEquals($order->getSellerUsername(), 'sellerUsername');
        self::assertEquals($order->getSellerId(), 1);
        self::assertEquals($order->getCourierProfileName(), 'courierProfileName');
        self::assertEquals($order->getBuyerId(), '9');
        self::assertEquals($order->getStoreId(), 'storeId');
        self::assertEquals($order->getShipToStore(), 'shipToStore');
        self::assertEquals($order->getOrderStatus(), 'orderStatus');
        self::assertEquals($order->getFlag1(), 'flag1');
        self::assertEquals($order->getFlag2(), 'flag2');
        self::assertEquals($order->getCourierName(), 'courierName');
        self::assertEquals($order->getCourierService(), 'courierService');
        self::assertEquals($order->getCourierServiceCode(), 'courierServiceCode');
        self::assertEquals($order->getFulfilmentType(), 'fulfilmentType');
        self::assertEquals($order->getWebOrderID(), 1222);
        self::assertEquals($order->getShippingDate(), '2018-04-05T08:42:03Z');
        self::assertEquals($order->getInvoiceDate(), '2018-04-05T08:42:03Z');
        self::assertEquals($order->getTradeSale(), true);
        self::assertEquals($order->getCourierTracking(), 'courierTracking');
        self::assertEquals($order->getActualCourierCost(), '99.333');
    }
}
