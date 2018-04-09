<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\Test\Unit\OrderUpdate;

use PHPUnit\Framework\TestCase;
use SnowIO\VoloDataModel\OrderUpdate\OrderStatus;
use SnowIO\VoloDataModel\OrderUpdate\OrderUpdate;
use SnowIO\VoloDataModel\ProductImport\ImportField;
use SnowIO\VoloDataModel\ProductImport\ImportRow;

class OrderUpdateTest extends TestCase
{
    public function testFromJson()
    {
        $orderUpdateData = OrderUpdate::fromJson([
            "espOrderNo" => 0,
            "orderStatus" => OrderStatus::WAITING_FOR_DELIVERY,
            "onHoldNotes" => "string",
            "courier" => "string",
            "courierService" => "string",
            "courierTracking" => "string",
            "flag1" => "string",
            "flag2" => "string",
            "customerCompany" => "string",
            "customerName" => "string",
            "customerAddress1" => "string",
            "customerAddress2" => "string",
            "customerAddress3" => "string",
            "customerCity" => "string",
            "customerCounty" => "string",
            "customerPostcode" => "string",
            "customerCountry" => "string",
            "customerEmail" => "string",
            "customerTelephone" => "string",
            "customerReference" => "string",
            "customerNotes" => "string",
            "deliveryCompany" => "string",
            "deliveryName" => "string",
            "deliveryAddress1" => "string",
            "deliveryAddress2" => "string",
            "deliveryAddress3" => "string",
            "deliveryCity" => "string",
            "deliveryCounty" => "string",
            "deliveryPostcode" => "string",
            "deliveryCountry" => "string",
            "deliveryTelephone" => "string",
            "shippingMethod" => "string",
            "voucherCode" => "string",
            "tradeSale" => true,
            "actualCourierCost" => "0"
        ]);
        $other = OrderUpdate::of(0)
            ->withOrderStatus(OrderStatus::WAITING_FOR_DELIVERY)
            ->withOnHoldNotes("string")
            ->withCourier("string")
            ->withCourierService("string")
            ->withCourierTracking("string")
            ->withFlag1("string")
            ->withFlag2("string")
            ->withCustomerCompany("string")
            ->withCustomerName("string")
            ->withCustomerAddress1("string")
            ->withCustomerAddress2("string")
            ->withCustomerAddress3("string")
            ->withCustomerCity("string")
            ->withCustomerCounty("string")
            ->withCustomerPostcode("string")
            ->withCustomerCountry("string")
            ->withCustomerEmail("string")
            ->withCustomerTelephone("string")
            ->withCustomerReference("string")
            ->withCustomerNotes("string")
            ->withDeliveryCompany("string")
            ->withDeliveryName("string")
            ->withDeliveryAddress1("string")
            ->withDeliveryAddress2("string")
            ->withDeliveryAddress3("string")
            ->withDeliveryCity("string")
            ->withDeliveryCounty("string")
            ->withDeliveryPostcode("string")
            ->withDeliveryCountry("string")
            ->withDeliveryTelephone("string")
            ->withShippingMethod("string")
            ->withVoucherCode("string")
            ->withTradeSale(true)
            ->withActualCourierCost("0");
        self::assertEquals($other->toJson(), $orderUpdateData->toJson());
        self::assertTrue($other->equals($orderUpdateData));
    }

    public function testToJson()
    {
        $orderData = OrderUpdate::of(0)
            ->withOrderStatus(OrderStatus::WAITING_FOR_DELIVERY)
            ->withOnHoldNotes("string")
            ->withCourier("string")
            ->withCourierService("string")
            ->withCourierTracking("string")
            ->withFlag1("string")
            ->withFlag2("string")
            ->withCustomerCompany("string")
            ->withCustomerName("string")
            ->withCustomerAddress1("string")
            ->withCustomerAddress2("string")
            ->withCustomerAddress3("string")
            ->withCustomerCity("string")
            ->withCustomerCounty("string")
            ->withCustomerPostcode("string")
            ->withCustomerCountry("string")
            ->withCustomerEmail("string")
            ->withCustomerTelephone("string")
            ->withCustomerReference("string")
            ->withCustomerNotes("string")
            ->withDeliveryCompany("string")
            ->withDeliveryName("string")
            ->withDeliveryAddress1("string")
            ->withDeliveryAddress2("string")
            ->withDeliveryAddress3("string")
            ->withDeliveryCity("string")
            ->withDeliveryCounty("string")
            ->withDeliveryPostcode("string")
            ->withDeliveryCountry("string")
            ->withDeliveryTelephone("string")
            ->withShippingMethod("string")
            ->withVoucherCode("string")
            ->withTradeSale(true)
            ->withActualCourierCost("0");
        self::assertEquals([
            "espOrderNo" => 0,
            "orderStatus" => OrderStatus::WAITING_FOR_DELIVERY,
            "onHoldNotes" => "string",
            "courier" => "string",
            "courierService" => "string",
            "courierTracking" => "string",
            "flag1" => "string",
            "flag2" => "string",
            "customerCompany" => "string",
            "customerName" => "string",
            "customerAddress1" => "string",
            "customerAddress2" => "string",
            "customerAddress3" => "string",
            "customerCity" => "string",
            "customerCounty" => "string",
            "customerPostcode" => "string",
            "customerCountry" => "string",
            "customerEmail" => "string",
            "customerTelephone" => "string",
            "customerReference" => "string",
            "customerNotes" => "string",
            "deliveryCompany" => "string",
            "deliveryName" => "string",
            "deliveryAddress1" => "string",
            "deliveryAddress2" => "string",
            "deliveryAddress3" => "string",
            "deliveryCity" => "string",
            "deliveryCounty" => "string",
            "deliveryPostcode" => "string",
            "deliveryCountry" => "string",
            "deliveryTelephone" => "string",
            "shippingMethod" => "string",
            "voucherCode" => "string",
            "tradeSale" => true,
            "actualCourierCost" => "0"
        ], $orderData->toJson());

    }

    public function testEquals()
    {
        $orderData = OrderUpdate::of(0)
            ->withOrderStatus(OrderStatus::WAITING_FOR_DELIVERY)
            ->withOnHoldNotes("string")
            ->withCourier("string");

        self::assertTrue($orderData->equals(OrderUpdate::of(0)
            ->withOrderStatus(OrderStatus::WAITING_FOR_DELIVERY)
            ->withOnHoldNotes("string")
            ->withCourier("string")));
        self::assertFalse($orderData->equals(OrderUpdate::of(0)
            ->withOrderStatus(OrderStatus::WAITING_FOR_DELIVERY)
            ->withOnHoldNotes("string")
            ->withCourier("stering")));
        self::assertFalse($orderData->equals(OrderUpdate::of(0)
            ->withOnHoldNotes("string")
            ->withCourier("stering")));
        self::assertFalse($orderData->equals(
            ImportRow::create()
            ->withImportField(ImportField::of('StockNumber', '12022014-18'))
        ));
    }

}