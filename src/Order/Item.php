<?php

namespace SnowIO\VoloDataModel\Order;

class Item
{
    public static function of(int $orderItemId, string $stockNumber): self
    {
        $item = new self($orderItemId, $stockNumber);
        return $item;
    }

    public static function fromJson($json): self
    {
        return self::of($json['orderItemId'], $json['stockNumber'])
            ->withWebProductID($json['webProductID'])
            ->withItemNumber($json['itemNumber'])
            ->withProductTitle($json['productTitle'])
            ->withQuantity($json['quantity'])
            ->withUnitCost($json['unitCost'])
            ->withTaxRate($json['taxRate'])
            ->withTaxCode($json['taxCode'])
            ->withUnitCostIncludesTax($json['unitCostIncludesTax'])
            ->withWeight($json['weight'])
            ->withProductFolderName($json['productFolderName'])
            ->withCreditReason($json['creditReason'])
            ->withCustomMessage1($json['customMessage1'])
            ->withCustomMessage2($json['customMessage2'])
            ->withCustomMessage3($json['customMessage3'])
            ->withLocationId($json['locationId'])
            ->withSupplierId($json['supplierId'])
            ->withKitType($json['kitType'])
            ->withKitMaster($json['kitMaster'])
            ->withPicked($json['picked'])
            ->withUnitItemTax($json['unitItemTax'])
            ->withUnitShippingTax($json['unitShippingTax'])
            ->withUnitShippingAmount($json['unitShippingAmount'])
            ->withBackOrder($json['backOrder']);
    }

    public function toJson(): array
    {
        return [
            'orderItemId' => (int) $this->orderItemId,
            'webProductID' => $this->webProductID,
            'stockNumber' => $this->stockNumber,
            'itemNumber' => $this->itemNumber,
            'productTitle' => $this->productTitle,
            'quantity' => (int) $this->quantity,
            'unitCost' => (string) $this->unitCost,
            'taxRate' => (string) $this->taxRate,
            'taxCode' => $this->taxCode,
            'unitCostIncludesTax' => $this->unitCostIncludesTax,
            'weight' => (int) $this->weight,
            'productFolderName' => $this->productFolderName,
            'creditReason' => $this->creditReason,
            'customMessage1' => $this->customMessage1,
            'customMessage2' => $this->customMessage2,
            'customMessage3' => $this->customMessage3,
            'locationId' => (int) $this->locationId,
            'supplierId' => (int) $this->supplierId,
            'kitType' => $this->kitType,
            'kitMaster' => $this->kitMaster,
            'picked' => $this->picked,
            'unitItemTax' => (string) $this->unitItemTax,
            'unitShippingTax' => (string) $this->unitShippingTax,
            'unitShippingAmount' => (string) $this->unitShippingAmount,
            'backOrder' => $this->backOrder,
        ];
    }

    private $orderItemId;
    private $webProductID;
    private $stockNumber;
    private $itemNumber;
    private $productTitle;
    private $quantity;
    private $unitCost;
    private $taxRate;
    private $taxCode;
    private $unitCostIncludesTax;
    private $weight;
    private $productFolderName;
    private $creditReason;
    private $customMessage1;
    private $customMessage2;
    private $customMessage3;
    private $locationId;
    private $supplierId;
    private $kitType;
    private $kitMaster;
    private $picked;
    private $unitItemTax;
    private $unitShippingTax;
    private $unitShippingAmount;
    private $backOrder;

    private function __construct(int $orderItemId, string $stockNumber)
    {
        $this->orderItemId = $orderItemId;
        $this->stockNumber = $stockNumber;
    }

    public function getOrderItemId(): int
    {
        return $this->orderItemId;
    }

    public function getWebProductID(): string
    {
        return $this->webProductID;
    }

    public function withWebProductID(string $webProductID): self
    {
        $result = clone $this;
        $result->webProductID = $webProductID;
        return $result;
    }

    public function getStockNumber(): string
    {
        return $this->stockNumber;
    }

    public function getItemNumber(): string
    {
        return $this->itemNumber;
    }

    public function withItemNumber(string $itemNumber): self
    {
        $result = clone $this;
        $result->itemNumber = $itemNumber;
        return $result;
    }

    public function getProductTitle(): string
    {
        return $this->productTitle;
    }

    public function withProductTitle(string $productTitle): self
    {
        $result = clone $this;
        $result->productTitle = $productTitle;
        return $result;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function withQuantity(int $quantity): self
    {
        $result = clone $this;
        $result->quantity = $quantity;
        return $result;
    }

    public function getUnitCost(): string
    {
        return $this->unitCost;
    }

    public function withUnitCost(string $unitCost): self
    {
        $result = clone $this;
        $result->unitCost = $unitCost;
        return $result;
    }

    public function getTaxRate(): string
    {
        return $this->taxRate;
    }

    public function withTaxRate(string $taxRate): self
    {
        $result = clone $this;
        $result->taxRate = $taxRate;
        return $result;
    }

    public function getTaxCode(): string
    {
        return $this->taxCode;
    }

    public function withTaxCode(string $taxCode): self
    {
        $result = clone $this;
        $result->taxCode = $taxCode;
        return $result;
    }

    public function getUnitCostIncludesTax(): string
    {
        return $this->unitCostIncludesTax;
    }

    public function withUnitCostIncludesTax(string $unitCostIncludesTax): self
    {
        $result = clone $this;
        $result->unitCostIncludesTax = $unitCostIncludesTax;
        return $result;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function withWeight(int $weight): self
    {
        $result = clone $this;
        $result->weight = $weight;
        return $result;
    }

    public function getProductFolderName(): string
    {
        return $this->productFolderName;
    }

    public function withProductFolderName(string $productFolderName): self
    {
        $result = clone $this;
        $result->productFolderName = $productFolderName;
        return $result;
    }

    public function getCreditReason(): string
    {
        return $this->creditReason;
    }

    public function withCreditReason(string $creditReason): self
    {
        $result = clone $this;
        $result->creditReason = $creditReason;
        return $result;
    }

    public function getCustomMessage1(): string
    {
        return $this->customMessage1;
    }

    public function withCustomMessage1(string $customMessage1): self
    {
        $result = clone $this;
        $result->customMessage1 = $customMessage1;
        return $result;
    }

    public function getCustomMessage2(): string
    {
        return $this->customMessage2;
    }

    public function withCustomMessage2(string $customMessage2): self
    {
        $result = clone $this;
        $result->customMessage2 = $customMessage2;
        return $result;
    }

    public function getCustomMessage3(): string
    {
        return $this->customMessage3;
    }

    public function withCustomMessage3(string $customMessage3): self
    {
        $result = clone $this;
        $result->customMessage3 = $customMessage3;
        return $result;
    }

    public function getLocationId(): int
    {
        return $this->locationId;
    }

    public function withLocationId(int $locationId): self
    {
        $result = clone $this;
        $result->locationId = $locationId;
        return $result;
    }

    public function getSupplierId(): int
    {
        return $this->supplierId;
    }

    public function withSupplierId(int $supplierId): self
    {
        $result = clone $this;
        $result->supplierId = $supplierId;
        return $result;
    }

    public function getKitType(): string
    {
        return $this->kitType;
    }

    public function withKitType(string $kitType): self
    {
        $result = clone $this;
        $result->kitType = $kitType;
        return $result;
    }

    public function getKitMaster(): string
    {
        return $this->kitMaster;
    }

    public function withKitMaster(string $kitMaster): self
    {
        $result = clone $this;
        $result->kitMaster = $kitMaster;
        return $result;
    }

    public function getPicked(): bool
    {
        return $this->picked;
    }

    public function withPicked(bool $picked): self
    {
        $result = clone $this;
        $result->picked = $picked;
        return $result;
    }

    public function getUnitItemTax(): string
    {
        return $this->unitItemTax;
    }

    public function withUnitItemTax(string $unitItemTax): self
    {
        $result = clone $this;
        $result->unitItemTax = $unitItemTax;
        return $result;
    }

    public function getUnitShippingTax(): string
    {
        return $this->unitShippingTax;
    }

    public function withUnitShippingTax(string $unitShippingTax): self
    {
        $result = clone $this;
        $result->unitShippingTax = $unitShippingTax;
        return $result;
    }

    public function getUnitShippingAmount(): string
    {
        return $this->unitShippingAmount;
    }

    public function withUnitShippingAmount(string $unitShippingAmount): self
    {
        $result = clone $this;
        $result->unitShippingAmount = $unitShippingAmount;
        return $result;
    }

    public function getBackOrder(): bool
    {
        return $this->backOrder;
    }

    public function withBackOrder(bool $backOrder): self
    {
        $result = clone $this;
        $result->backOrder = $backOrder;
        return $result;
    }
}
