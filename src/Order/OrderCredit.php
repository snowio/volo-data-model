<?php

namespace SnowIO\VoloDataModel\Order;

class OrderCredit
{
    public static function of(string $creditNoteNumber): self
    {
        $item = new self($creditNoteNumber);
        return $item;
    }

    public static function create(): self
    {
        return new self();
    }

    public static function fromJson($json): self
    {
        return self::of($json['creditNoteNumber'])
            ->withCreditNoteDate($json['creditNoteDate'])
            ->withShippingRefunded($json['shippingRefunded'])
            ->withInsuranceRefunded($json['insuranceRefunded'])
            ->withDiscountRefunded($json['discountRefunded'])
            ->withPrice($json['price'])
            ->withCancelReason($json['cancelReason'])
            ->withStockNumber($json['stockNumber'])
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

    private $creditNoteNumber;
    private $creditNoteDate;
    private $shippingRefunded;
    private $insuranceRefunded;
    private $discountRefunded;
    private $price;
    private $cancelReason;
    private $stockNumber;
    private $quantityRefunded;

    private function __construct(string $creditNoteNumber)
    {
        $this->creditNoteNumber = $creditNoteNumber;
    }

    public function getCreditNoteNumber()
    {
        return $this->creditNoteNumber;
    }

    public function withCreditNoteNumber($creditNoteNumber): self
    {
        $result = clone $this;
        $result->creditNoteNumber = $creditNoteNumber;
        return $result;
    }

    public function getCreditNoteDate()
    {
        return $this->creditNoteDate;
    }

    public function withCreditNoteDate($creditNoteDate): self
    {
        $result = clone $this;
        $result->creditNoteDate = $creditNoteDate;
        return $result;
    }

    public function getShippingRefunded()
    {
        return $this->shippingRefunded;
    }

    public function withShippingRefunded($shippingRefunded): self
    {
        $result = clone $this;
        $result->shippingRefunded = $shippingRefunded;
        return $result;
    }

    public function getInsuranceRefunded()
    {
        return $this->insuranceRefunded;
    }

    public function withInsuranceRefunded($insuranceRefunded): self
    {
        $result = clone $this;
        $result->insuranceRefunded = $insuranceRefunded;
        return $result;
    }

    public function getDiscountRefunded()
    {
        return $this->discountRefunded;
    }

    public function withDiscountRefunded($discountRefunded): self
    {
        $result = clone $this;
        $result->discountRefunded = $discountRefunded;
        return $result;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function withPrice($price): self
    {
        $result = clone $this;
        $result->price = $price;
        return $result;
    }

    public function getCancelReason()
    {
        return $this->cancelReason;
    }

    public function withCancelReason($cancelReason): self
    {
        $result = clone $this;
        $result->cancelReason = $cancelReason;
        return $result;
    }

    public function getStockNumber()
    {
        return $this->stockNumber;
    }

    public function withStockNumber($stockNumber): self
    {
        $result = clone $this;
        $result->stockNumber = $stockNumber;
        return $result;
    }

    public function getQuantityRefunded()
    {
        return $this->quantityRefunded;
    }

    public function withQuantityRefunded($quantityRefunded): self
    {
        $result = clone $this;
        $result->quantityRefunded = $quantityRefunded;
        return $result;
    }

}