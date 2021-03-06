<?php


namespace SnowIO\VoloDataModel\Order;

use SnowIO\VoloDataModel\Internal\SetTrait;

class OrderCreditSet
{
    use SetTrait;

    public function get($creditNoteNumber): ?OrderCredit
    {
        return $this->items[$creditNoteNumber] ?? null;
    }

    public static function fromJson(array $json): OrderCreditSet
    {
        $result = self::create();

        foreach ($json as $orderCredit) {
            $result->items[] = OrderCredit::fromJson($orderCredit);
        }
        return $result;
    }

    public function toJson(): array
    {
        return array_map(function (OrderCredit $orderCredit) {
            return $orderCredit->toJson();
        }, array_values($this->items));
    }

    private static function getKey(OrderCredit $orderCredit): string
    {
        return $orderCredit->getCreditNoteNumber();
    }

    private static function itemsAreEqual(
        OrderCredit $orderCredit,
        OrderCredit $otherOrderCredit
    ) : bool {
        return $orderCredit->equals($otherOrderCredit);
    }
}
