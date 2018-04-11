<?php

namespace SnowIO\VoloDataModel\Order;

class OrderCredit
{
    public static function of(string $creditNoteNumber, string $stockNumber): self
    {
        $item = new self($creditNoteNumber, $stockNumber);
        return $item;
    }

    public static function fromJson($json): self
    {
        return self::of($json['creditNoteNumber'], $json['stockNumber'])
            ->withCreditNoteDate($json['creditNoteDate'])
            ->withShippingRefunded($json['shippingRefunded'])
            ->withInsuranceRefunded($json['insuranceRefunded'])
            ->withDiscountRefunded($json['discountRefunded'])
            ->withPrice($json['price'])
            ->withCancelReason($json['cancelReason'])
            ->withQuantityRefunded($json['quantityRefunded']);
    }

    public function toJson(): array
    {
        return [
            'creditNoteNumber' => $this->creditNoteNumber,
            'creditNoteDate' => $this->creditNoteDate,
            'shippingRefunded' => (int) $this->shippingRefunded,
            'insuranceRefunded' => (int) $this->insuranceRefunded,
            'discountRefunded' => (int) $this->discountRefunded,
            'price' => (string) $this->price,
            'cancelReason' => $this->cancelReason,
            'stockNumber' => $this->stockNumber,
            'quantityRefunded' => (int) $this->quantityRefunded,
        ];
    }

    public function equals($object): bool
    {
        return ($object instanceof OrderCredit) &&
        ($this->creditNoteNumber === $object->creditNoteNumber) &&
        ($this->creditNoteDate === $object->creditNoteDate) &&
        ($this->shippingRefunded === $object->shippingRefunded) &&
        ($this->insuranceRefunded === $object->insuranceRefunded) &&
        ($this->discountRefunded === $object->discountRefunded) &&
        ($this->price === $object->price) &&
        ($this->cancelReason === $object->cancelReason) &&
        ($this->stockNumber === $object->stockNumber) &&
        ($this->quantityRefunded === $object->quantityRefunded);
    }

    private $creditNoteNumber;
    private $creditNoteDate;
    private $shippingRefunded;
    private $insuranceRefunded;
    private $discountRefunded;
    private $price;
    private $cancelReason;
    private $stockNumber;
    private $quantityRefunded;

    private function __construct(string $creditNoteNumber, string $stockNumber)
    {
        $this->creditNoteNumber = $creditNoteNumber;
        $this->stockNumber = $stockNumber;
    }

    public function getCreditNoteNumber(): string
    {
        return $this->creditNoteNumber;
    }

    public function getCreditNoteDate(): string
    {
        return $this->creditNoteDate;
    }

    public function withCreditNoteDate(string $creditNoteDate): self
    {
        $result = clone $this;
        $result->creditNoteDate = $creditNoteDate;
        return $result;
    }

    public function getShippingRefunded(): int
    {
        return $this->shippingRefunded;
    }

    public function withShippingRefunded(int $shippingRefunded): self
    {
        $result = clone $this;
        $result->shippingRefunded = $shippingRefunded;
        return $result;
    }

    public function getInsuranceRefunded(): int
    {
        return $this->insuranceRefunded;
    }

    public function withInsuranceRefunded(int $insuranceRefunded): self
    {
        $result = clone $this;
        $result->insuranceRefunded = $insuranceRefunded;
        return $result;
    }

    public function getDiscountRefunded(): int
    {
        return $this->discountRefunded;
    }

    public function withDiscountRefunded(int $discountRefunded): self
    {
        $result = clone $this;
        $result->discountRefunded = $discountRefunded;
        return $result;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function withPrice(string $price): self
    {
        $result = clone $this;
        $result->price = $price;
        return $result;
    }

    public function getCancelReason(): string
    {
        return $this->cancelReason;
    }

    public function withCancelReason(string $cancelReason): self
    {
        $result = clone $this;
        $result->cancelReason = $cancelReason;
        return $result;
    }

    public function getStockNumber(): string
    {
        return $this->stockNumber;
    }

    public function getQuantityRefunded(): int
    {
        return $this->quantityRefunded;
    }

    public function withQuantityRefunded(int $quantityRefunded): self
    {
        $result = clone $this;
        $result->quantityRefunded = $quantityRefunded;
        return $result;
    }
}
