<?php

namespace SnowIO\VoloDataModel\Order;

class PaymentSet
{
    use SetTrait;

    public function get($paymentReference): ?Payment
    {
        return $this->items[$paymentReference] ?? null;
    }

    public static function fromJson(array $json): PaymentSet
    {
        $result = self::create();

        foreach ($json as $paymentItem) {
            $result->items[] = Payment::fromJson($paymentItem);
        }
        return $result;
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
        return array_map(function (Payment $payment) {
            return $payment->toJson();
        }, array_values($this->items));
    }
}