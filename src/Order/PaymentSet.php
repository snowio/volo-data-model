<?php

namespace SnowIO\VoloDataModel\Order;

use SnowIO\VoloDataModel\Internal\SetTrait;

class PaymentSet
{
    use SetTrait;

    public function get($paymentReference): ?Payment
    {
        return $this->items[$paymentReference] ?? null;
    }

    public static function fromJson(array $json): PaymentSet
    {
        return self::of(array_map(function (array $paymentJson) {
            return Payment::fromJson($paymentJson);
        }, $json["payment"]));
    }

    public function withPayment(Payment $payment): self
    {
        $result = clone $this;
        $key = self::getKey($payment);
        $result->items[$key] = $payment;
        return $result;
    }

    private static function getKey(Payment $payment): string
    {
        return $payment->getPaymentReference();
    }

    public function toJson(): array
    {
        return [
            "payment" => array_map(function (Payment $payment) {
                return $payment->toJson();
            }, array_values($this->items))
        ];
    }

    private static function itemsAreEqual(
        Payment $payment,
        Payment $otherPayment
    ) : bool {
        return $payment->equals($otherPayment);
    }
}
