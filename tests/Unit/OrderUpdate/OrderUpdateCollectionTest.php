<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\Test\Unit\OrderUpdate;

use PHPUnit\Framework\TestCase;
use SnowIO\VoloDataModel\OrderUpdate\OrderStatus;
use SnowIO\VoloDataModel\OrderUpdate\OrderUpdate;
use SnowIO\VoloDataModel\OrderUpdate\OrderUpdateCollection;

class OrderUpdateCollectionTest extends TestCase
{
    public function testWithers()
    {
        $orderUpdateCollection = OrderUpdateCollection::of([
            OrderUpdate::of(28393283)
                ->withOrderStatus(OrderStatus::WAITING_FOR_DELIVERY)
                ->withOnHoldNotes("string")
                ->withCourier("string")
        ]);

        $orderUpdateCollection = $orderUpdateCollection->with(
            OrderUpdate::of(76863823)
                ->withOrderStatus(OrderStatus::WAITING_FOR_DELIVERY)
                ->withOnHoldNotes("string")
                ->withCourier("string")
        );


        self::assertTrue(OrderUpdateCollection::of([
            OrderUpdate::of(28393283)
                ->withOrderStatus(OrderStatus::WAITING_FOR_DELIVERY)
                ->withOnHoldNotes("string")
                ->withCourier("string"),
            OrderUpdate::of(76863823)
                ->withOrderStatus(OrderStatus::WAITING_FOR_DELIVERY)
                ->withOnHoldNotes("string")
                ->withCourier("string"),
        ])->equals($orderUpdateCollection));
    }

    public function testToJson()
    {
        $orderUpdateCollection = OrderUpdateCollection::of([
            OrderUpdate::of(28393283)
                ->withOrderStatus(OrderStatus::WAITING_FOR_DELIVERY)
                ->withOnHoldNotes("string")
                ->withCourier("string"),
            OrderUpdate::of(76863823)
                ->withOrderStatus(OrderStatus::WAITING_FOR_DELIVERY)
                ->withOnHoldNotes("string")
                ->withCourier("string"),
        ]);

        self::assertEquals([
            [
                'espOrderNo' => 28393283,
                'orderStatus' => OrderStatus::WAITING_FOR_DELIVERY,
                'onHoldNotes' => "string",
                'courier' => "string",
            ],
            [
                'espOrderNo' => 76863823,
                'orderStatus' => OrderStatus::WAITING_FOR_DELIVERY,
                'onHoldNotes' => "string",
                'courier' => "string",
            ]
        ], $orderUpdateCollection->toJson());

    }

    public function testFromJson()
    {
        $orderUpdateCollection = OrderUpdateCollection::fromJson([
            [
                'espOrderNo' => 28393283,
                'orderStatus' => OrderStatus::WAITING_FOR_DELIVERY,
                'onHoldNotes' => "string",
                'courier' => "string",
            ],
            [
                'espOrderNo' => 76863823,
                'orderStatus' => OrderStatus::WAITING_FOR_DELIVERY,
                'onHoldNotes' => "string",
                'courier' => "string",
            ]
        ]);

        self::assertTrue(OrderUpdateCollection::of([
            OrderUpdate::of(28393283)
                ->withOrderStatus(OrderStatus::WAITING_FOR_DELIVERY)
                ->withOnHoldNotes("string")
                ->withCourier("string"),
            OrderUpdate::of(76863823)
                ->withOrderStatus(OrderStatus::WAITING_FOR_DELIVERY)
                ->withOnHoldNotes("string")
                ->withCourier("string"),
        ])->equals($orderUpdateCollection));
    }
}
