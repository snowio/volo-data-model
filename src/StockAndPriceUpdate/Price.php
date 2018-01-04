<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\StockAndPriceUpdate;

final class Price
{
    public static function of(float $value): self
    {
        $price = new self;
        $price->value = $value;
        return $price;
    }

    public static function fromJson(array $json): self
    {
        $result = new self;
        $result->value = (float) $json['value'];
        $result->accountName = $json['accountName'] ?? null;
        $result = !isset($json['name']) ? $result : $result->withName($json['name']);
        return $result;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function withName(string $name): self
    {
        PriceNames::validatePriceName($name);
        $result = clone $this;
        $result->name = $name;
        return $result;

    }

    public function getAccountName(): ?string
    {
        return $this->accountName;
    }

    public function withAccountName(string $accountName): self
    {
        $result = clone $this;
        $result->accountName = $accountName;
        return $result;
    }

    public function toJson(): array
    {
        $json = [
            'value' => $this->value
        ];

        if ($this->name) {
            $json['name'] = $this->name;
        }

        if ($this->accountName) {
            $json['accountName'] = $this->accountName;
        }

        return $json;

    }

    public function equals($otherPrice): bool
    {
        return $otherPrice instanceof Price &&
        $this->value === $otherPrice->value &&
        $this->name === $otherPrice->name &&
        $this->accountName === $otherPrice->accountName;
    }

    private $value;
    private $name;
    private $accountName;

    private function __construct()
    {

    }
}
