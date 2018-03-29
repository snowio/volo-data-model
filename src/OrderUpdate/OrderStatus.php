<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\OrderUpdate;

final class OrderStatus
{
    const WAITING_FOR_DELIVERY = "WAITING_FOR_DELIVERY";
    const DELIVERED = "DELIVERED";
    const CANCELLED = "CANCELLED";
    const ON_HOLD = "ON_HOLD";

    const ALL = [
        self::WAITING_FOR_DELIVERY,
        self::DELIVERED,
        self::CANCELLED,
        self::ON_HOLD,
    ];


    public static function validateStatus(string $status)
    {
        if (!in_array($status, self::ALL)) {
            throw new \InvalidArgumentException('Invalid Status');
        }
    }
}
