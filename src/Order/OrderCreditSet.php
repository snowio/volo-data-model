<?php


namespace SnowIO\VoloDataModel\Order;

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

    private static function getKey(OrderCredit $orderCredit): string
    {
        return $orderCredit->getCreditNoteNumber();
    }

    public function toJson(): array
    {
        return array_map(function (OrderCredit $orderCredit) {
            return $orderCredit->toJson();
        }, array_values($this->items));
    }
}