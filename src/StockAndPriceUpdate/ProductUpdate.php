<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\StockAndPriceUpdate;

final class ProductUpdate
{
    public static function of(string $stockNumber): self
    {
        $result = new self;
        $result->stockNumber = $stockNumber;
        $result->prices = PriceCollection::create();
        return $result;
    }

    public static function fromJson(array $json): self
    {
        $result = new self;
        $result->stockNumber = $json['stockNumber'];
        $result->prices = isset($json['prices']['price']) ?
            PriceCollection::fromJson($json['prices']['price']) : PriceCollection::create();
        $result->stockLevel = isset($json['stockLevel']) ?
            StockLevel::fromJson($json['stockLevel']) : null;
        $result->costPrice = isset($json['costPrice']) ?
            (float)$json['costPrice'] : null;
        return $result;
    }

    public function getStockNumber(): string
    {
        return $this->stockNumber;
    }

    public function getPrices(): PriceCollection
    {
        return $this->prices;
    }

    public function withPrices(PriceCollection $prices): self
    {
        $result = clone $this;
        $result->prices = $prices;
        return $result;
    }

    public function withPrice(Price $price): self
    {
        $result = clone $this;
        $result->prices = $result->prices->with($price);
        return $result;
    }

    public function getStockLevel(): ?StockLevel
    {
        return $this->stockLevel;
    }

    public function withStockLevel(StockLevel $stockLevel): self
    {
        $result = clone $this;
        $result->stockLevel = $stockLevel;
        return $result;
    }

    public function getCostPrice(): ?float
    {
        return $this->costPrice;
    }

    public function withCostPrice(float $costPrice): self
    {
        $result = clone $this;
        $result->costPrice = $costPrice;
        return $result;
    }

    public function toJson(): array
    {
        $json = ['stockNumber' => $this->stockNumber];

        if (!$this->prices->isEmpty()) {
            $json['prices']['price'] = $this->prices->toJson();
        }

        if ($this->stockLevel !== null) {
            $json['stockLevel'] = $this->stockLevel->toJson();
        }

        if ($this->costPrice !== null) {
            $json['costPrice'] = $this->costPrice;
        }

        return $json;
    }

    public function equals($otherProductUpdate): bool
    {
        return $otherProductUpdate instanceof ProductUpdate &&
        $this->stockNumber === $otherProductUpdate->stockNumber &&
        $this->prices->equals($otherProductUpdate->prices) &&
        ($this->stockLevel === null ?
            ($this->stockLevel === $otherProductUpdate->stockLevel) :
            ($this->stockLevel->equals($otherProductUpdate->stockLevel))
        ) &&
        $this->costPrice === $otherProductUpdate->costPrice;
    }

    private $stockNumber;
    /** @var PriceCollection $prices */
    private $prices;
    /** @var StockLevel $stockLevel */
    private $stockLevel;
    private $costPrice;

    private function __construct()
    {

    }
}
