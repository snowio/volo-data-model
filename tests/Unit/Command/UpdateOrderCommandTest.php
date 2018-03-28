<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\Test\Unit\Command;

use PHPUnit\Framework\TestCase;
use SnowIO\VoloDataModel\Command\UpdateOrderCommand;
use SnowIO\VoloDataModel\OrderUpdate\OrderStatus;
use SnowIO\VoloDataModel\OrderUpdate\OrderUpdate;
use SnowIO\VoloDataModel\OrderUpdate\OrderUpdateCollection;

class UpdateOrderCommandTest extends TestCase
{
    public function testFromJson()
    {
        $updateOrderCommand = UpdateOrderCommand::fromJson([
            'orderUpdate' => [
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
            ]
        ]);

        self::assertTrue(OrderUpdateCollection::of([
            OrderUpdate::create()
                ->withEspOrderNo(28393283)
                ->withOrderStatus(OrderStatus::WAITING_FOR_DELIVERY)
                ->withOnHoldNotes("string")
                ->withCourier("string"),
            OrderUpdate::create()
                ->withEspOrderNo(76863823)
                ->withOrderStatus(OrderStatus::WAITING_FOR_DELIVERY)
                ->withOnHoldNotes("string")
                ->withCourier("string"),
        ])->equals($updateOrderCommand->getOrderUpdates()));
    }

    public function testToJson()
    {
        $updateOrderCommand = UpdateOrderCommand::of(OrderUpdateCollection::of([
            OrderUpdate::create()
                ->withEspOrderNo(28393283)
                ->withOrderStatus(OrderStatus::WAITING_FOR_DELIVERY)
                ->withOnHoldNotes("string")
                ->withCourier("string"),
            OrderUpdate::create()
                ->withEspOrderNo(76863823)
                ->withOrderStatus(OrderStatus::WAITING_FOR_DELIVERY)
                ->withOnHoldNotes("string")
                ->withCourier("string"),
        ]));

        self::assertEquals([
            'orderUpdate' => [
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
            ]
        ], $updateOrderCommand->toJson());


    }
}