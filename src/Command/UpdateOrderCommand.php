<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\Command;

use SnowIO\VoloDataModel\OrderUpdate\OrderUpdateCollection;

final class UpdateOrderCommand
{

    public static function of(OrderUpdateCollection $orderUpdates): self
    {
        $orderUpdateCommand = new self;
        $orderUpdateCommand->orderUpdates = $orderUpdates;
        return $orderUpdateCommand;
    }

    public static function fromJson(array $json): self
    {
        $orderUpdateCommand = new self;
        $orderUpdateCommand->orderUpdates = OrderUpdateCollection::fromJson($json['orderUpdate']);
        return $orderUpdateCommand;
    }

    public function getOrderUpdates(): OrderUpdateCollection
    {
        return $this->orderUpdates;
    }

    public function toJson(): array
    {
        return [
            'orderUpdate' => $this->orderUpdates->toJson(),
        ];
    }

    /** @var  */
    private $orderUpdates;

    private function __construct()
    {

    }
}