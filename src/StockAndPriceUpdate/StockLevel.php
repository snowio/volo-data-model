<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\StockAndPriceUpdate;

final class StockLevel
{

    public static function of(int $quantity): self
    {
        $stockLevel = new self;
        $stockLevel->quantity = $quantity;
        return $stockLevel;
    }

    public static function fromJson(array $json): self
    {
        StockUpdateTypes::validateStockUpdateType($json['stockUpdateType']);
        $result = new self;
        $result->quantity = $json['quantity'];
        $result->location = $json['location'] ?? null;
        $result->stockUpdateType = $json['stockUpdateType'] ?? null;
        return $result;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function withLocation(string $location): self
    {
        $result = clone $this;
        $result->location = $location;
        return $result;

    }

    public function getStockUpdateType(): ?string
    {
        return $this->stockUpdateType;
    }

    public function withStockUpdateType(string $stockUpdateType): self
    {
        StockUpdateTypes::validateStockUpdateType($stockUpdateType);
        $result = clone $this;
        $result->stockUpdateType = $stockUpdateType;
        return $result;

    }

    public function toJson(): array
    {
        $json = [
            'quantity' => $this->quantity,
        ];

        if ($this->location) {
            $json['location'] = $this->location;
        }

        if ($this->stockUpdateType) {
            $json['stockUpdateType'] = $this->stockUpdateType;
        }

        return $json;
    }

    public function equals($otherStockLevel): bool
    {
        return $otherStockLevel instanceof StockLevel &&
            $this->quantity === $otherStockLevel->quantity &&
            $this->location === $otherStockLevel->location &&
            $this->stockUpdateType === $otherStockLevel->stockUpdateType;
    }

    private $quantity;
    private $location;
    private $stockUpdateType;

    private function __construct()
    {

    }
}
