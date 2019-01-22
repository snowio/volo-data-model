<?php
declare(strict_types = 1);

namespace SnowIO\VoloDataModel\OrderUpdate;

final class OrderUpdate
{

    public static function of(int $espOrderNo): self
    {
        $result = new self();
        $result->espOrderNo = $espOrderNo;
        return $result;
    }

    public static function fromJson(array $json): self
    {
        $result = new self;
        $result->espOrderNo = (int) $json['espOrderNo'];
        $result->orderStatus = $json['orderStatus'] ?? null;
        $result->onHoldNotes = $json['onHoldNotes'] ?? null;
        $result->courier = $json['courier'] ?? null;
        $result->courierService = $json['courierService'] ?? null;
        $result->courierTracking = $json['courierTracking'] ?? null;
        $result->flag1 = $json['flag1'] ?? null;
        $result->flag2 = $json['flag2'] ?? null;
        $result->customerCompany = $json['customerCompany'] ?? null;
        $result->customerName = $json['customerName'] ?? null;
        $result->customerAddress1 = $json['customerAddress1'] ?? null;
        $result->customerAddress2 = $json['customerAddress2'] ?? null;
        $result->customerAddress3 = $json['customerAddress3'] ?? null;
        $result->customerCity = $json['customerCity'] ?? null;
        $result->customerCounty = $json['customerCounty'] ?? null;
        $result->customerPostcode = $json['customerPostcode'] ?? null;
        $result->customerCountry = $json['customerCountry'] ?? null;
        $result->customerEmail = $json['customerEmail'] ?? null;
        $result->customerTelephone = $json['customerTelephone'] ?? null;
        $result->customerReference = $json['customerReference'] ?? null;
        $result->customerNotes = $json['customerNotes'] ?? null;
        $result->deliveryCompany = $json['deliveryCompany'] ?? null;
        $result->deliveryName = $json['deliveryName'] ?? null;
        $result->deliveryAddress1 = $json['deliveryAddress1'] ?? null;
        $result->deliveryAddress2 = $json['deliveryAddress2'] ?? null;
        $result->deliveryAddress3 = $json['deliveryAddress3'] ?? null;
        $result->deliveryCity = $json['deliveryCity'] ?? null;
        $result->deliveryCounty = $json['deliveryCounty'] ?? null;
        $result->deliveryPostcode = $json['deliveryPostcode'] ?? null;
        $result->deliveryCountry = $json['deliveryCountry'] ?? null;
        $result->deliveryTelephone = $json['deliveryTelephone'] ?? null;
        $result->shippingMethod = $json['shippingMethod'] ?? null;
        $result->voucherCode = $json['voucherCode'] ?? null;
        $result->tradeSale = (bool) ($json['tradeSale'] ?? null);
        $result->actualCourierCost = $json['actualCourierCost'] ?? null;
        return $result;
    }

    public function withOrderStatus(?string $orderStatus): self
    {
        OrderStatus::validateStatus($orderStatus);
        $result = clone $this;
        $result->orderStatus = $orderStatus;
        return $result;
    }

    public function withOnHoldNotes(?string $onHoldNotes): self
    {
        $result = clone $this;
        $result->onHoldNotes = $onHoldNotes;
        return $result;
    }

    public function withCourier(string $courier): self
    {
        $result = clone $this;
        $result->courier = $courier;
        return $result;
    }

    public function withCourierService(?string $courierService): self
    {
        $result = clone $this;
        $result->courierService = $courierService;
        return $result;
    }

    public function withCourierTracking(?string $courierTracking): self
    {
        $result = clone $this;
        $result->courierTracking = $courierTracking;
        return $result;
    }

    public function withFlag1(?string $flag1): self
    {
        $result = clone $this;
        $result->flag1 = $flag1;
        return $result;
    }

    public function withFlag2(?string $flag2): self
    {
        $result = clone $this;
        $result->flag2 = $flag2;
        return $result;
    }

    public function withCustomerCompany(?string $customerCompany): self
    {
        $result = clone $this;
        $result->customerCompany = $customerCompany;
        return $result;
    }

    public function withCustomerName(?string $customerName): self
    {
        $result = clone $this;
        $result->customerName = $customerName;
        return $result;
    }

    public function withCustomerAddress1(?string $customerAddress1): self
    {
        $result = clone $this;
        $result->customerAddress1 = $customerAddress1;
        return $result;
    }

    public function withCustomerAddress2(?string $customerAddress2): self
    {
        $result = clone $this;
        $result->customerAddress2 = $customerAddress2;
        return $result;
    }

    public function withCustomerAddress3(?string $customerAddress3): self
    {
        $result = clone $this;
        $result->customerAddress3 = $customerAddress3;
        return $result;
    }

    public function withCustomerCity(?string $customerCity): self
    {
        $result = clone $this;
        $result->customerCity = $customerCity;
        return $result;
    }

    public function withCustomerCounty(?string $customerCounty): self
    {
        $result = clone $this;
        $result->customerCounty = $customerCounty;
        return $result;
    }

    public function withCustomerPostcode(?string $customerPostcode): self
    {
        $result = clone $this;
        $result->customerPostcode = $customerPostcode;
        return $result;
    }

    public function withCustomerCountry(?string $customerCountry): self
    {
        $result = clone $this;
        $result->customerCountry = $customerCountry;
        return $result;
    }

    public function withCustomerEmail(?string $customerEmail): self
    {
        $result = clone $this;
        $result->customerEmail = $customerEmail;
        return $result;
    }

    public function withCustomerTelephone(?string $customerTelephone): self
    {
        $result = clone $this;
        $result->customerTelephone = $customerTelephone;
        return $result;
    }

    public function withCustomerReference(?string $customerReference): self
    {
        $result = clone $this;
        $result->customerReference = $customerReference;
        return $result;
    }

    public function withCustomerNotes(?string $customerNotes): self
    {
        $result = clone $this;
        $result->customerNotes = $customerNotes;
        return $result;
    }

    public function withDeliveryCompany(?string $customerDeliveryCompany): self
    {
        $result = clone $this;
        $result->deliveryCompany = $customerDeliveryCompany;
        return $result;
    }

    public function withDeliveryName(?string $deliveryName): self
    {
        $result = clone $this;
        $result->deliveryName = $deliveryName;
        return $result;
    }

    public function withDeliveryAddress1(?string $deliveryAddress1): self
    {
        $result = clone $this;
        $result->deliveryAddress1 = $deliveryAddress1;
        return $result;
    }

    public function withDeliveryAddress2(?string $deliveryAddress2): self
    {
        $result = clone $this;
        $result->deliveryAddress2 = $deliveryAddress2;
        return $result;
    }

    public function withDeliveryAddress3(?string $deliveryAddress3): self
    {
        $result = clone $this;
        $result->deliveryAddress3 = $deliveryAddress3;
        return $result;
    }

    public function withDeliveryCity(?string $deliveryCity): self
    {
        $result = clone $this;
        $result->deliveryCity = $deliveryCity;
        return $result;
    }

    public function withDeliveryCounty(?string $deliveryCounty): self
    {
        $result = clone $this;
        $result->deliveryCounty = $deliveryCounty;
        return $result;
    }

    public function withDeliveryPostcode(?string $deliveryPostcode): self
    {
        $result = clone $this;
        $result->deliveryPostcode = $deliveryPostcode;
        return $result;
    }

    public function withDeliveryCountry(?string $deliveryCountry): self
    {
        $result = clone $this;
        $result->deliveryCountry = $deliveryCountry;
        return $result;
    }

    public function withDeliveryTelephone(?string $deliveryTelephone): self
    {
        $result = clone $this;
        $result->deliveryTelephone = $deliveryTelephone;
        return $result;
    }

    public function withShippingMethod(?string $shippingMethod): self
    {
        $result = clone $this;
        $result->shippingMethod = $shippingMethod;
        return $result;
    }

    public function withVoucherCode(?string $voucherCode): self
    {
        $result = clone $this;
        $result->voucherCode = $voucherCode;
        return $result;
    }

    public function withTradeSale(?bool $tradeSale): self
    {
        $result = clone $this;
        $result->tradeSale = $tradeSale;
        return $result;
    }

    public function withActualCourierCost(?string $actualCourierCost): self
    {
        $result = clone $this;
        $result->actualCourierCost = $actualCourierCost;
        return $result;
    }

    public function getEspOrderNo(): int
    {
        return $this->espOrderNo;
    }

    public function getOrderStatus(): ?string
    {
        return $this->orderStatus;
    }

    public function getOnHoldNotes(): ?string
    {
        return $this->onHoldNotes;
    }

    public function getCourier(): ?string
    {
        return $this->courier;
    }

    public function getCourierService(): ?string
    {
        return $this->courierService;
    }

    public function getCourierTracking(): ?string
    {
        return $this->courierTracking;
    }

    public function getFlag1(): ?string
    {
        return $this->flag1;
    }

    public function getFlag2(): ?string
    {
        return $this->flag2;
    }

    public function getCustomerCompany(): ?string
    {
        return $this->customerCompany;
    }

    public function getCustomerName(): ?string
    {
        return $this->customerName;
    }

    public function getCustomerAddress1(): ?string
    {
        return $this->customerAddress1;
    }

    public function getCustomerAddress2(): ?string
    {
        return $this->customerAddress2;
    }

    public function getCustomerAddress3(): ?string
    {
        return $this->customerAddress3;
    }

    public function getCustomerCity(): ?string
    {
        return $this->customerCity;
    }

    public function getCustomerCounty(): ?string
    {
        return $this->customerCounty;
    }

    public function getCustomerPostcode(): ?string
    {
        return $this->customerPostcode;
    }

    public function getCustomerCountry(): ?string
    {
        return $this->customerCountry;
    }

    public function getCustomerEmail(): ?string
    {
        return $this->customerEmail;
    }

    public function getCustomerTelephone(): ?string
    {
        return $this->customerTelephone;
    }

    public function getCustomerReference(): ?string
    {
        return $this->customerReference;
    }

    public function getCustomerNotes(): ?string
    {
        return $this->customerNotes;
    }

    public function getDeliveryCompany(): ?string
    {
        return $this->deliveryCompany;
    }

    public function getDeliveryName(): ?string
    {
        return $this->deliveryName;
    }

    public function getDeliveryAddress1(): ?string
    {
        return $this->deliveryAddress1;
    }

    public function getDeliveryAddress2(): ?string
    {
        return $this->deliveryAddress2;
    }

    public function getDeliveryAddress3(): ?string
    {
        return $this->deliveryAddress3;
    }

    public function getDeliveryCity(): ?string
    {
        return $this->deliveryCity;
    }

    public function getDeliveryCounty(): ?string
    {
        return $this->deliveryCounty;
    }

    public function getDeliveryPostcode(): ?string
    {
        return $this->deliveryPostcode;
    }

    public function getDeliveryCountry(): ?string
    {
        return $this->deliveryCountry;
    }

    public function getDeliveryTelephone(): ?string
    {
        return $this->deliveryTelephone;
    }

    public function getShippingMethod(): ?string
    {
        return $this->shippingMethod;
    }

    public function getVoucherCode(): ?string
    {
        return $this->voucherCode;
    }

    public function getTradeSale(): ?bool
    {
        return $this->tradeSale;
    }

    public function getActualCourierCost(): string
    {
        return $this->actualCourierCost;
    }

    public function toJson(): array
    {
        return array_filter(get_object_vars($this), function ($value) {
            return $value !== null;
        });
    }

    public function equals($otherOrderUpdateData): bool
    {
        return $otherOrderUpdateData instanceof self &&
        count(array_diff(get_object_vars($otherOrderUpdateData), get_object_vars($this))) === 0;
    }

    private $espOrderNo;
    private $orderStatus;
    private $onHoldNotes;
    private $courier;
    private $courierService;
    private $courierTracking;
    private $flag1;
    private $flag2;
    private $customerCompany;
    private $customerName;
    private $customerAddress1;
    private $customerAddress2;
    private $customerAddress3;
    private $customerCity;
    private $customerCounty;
    private $customerPostcode;
    private $customerCountry;
    private $customerEmail;
    private $customerTelephone;
    private $customerReference;
    private $customerNotes;
    private $deliveryCompany;
    private $deliveryName;
    private $deliveryAddress1;
    private $deliveryAddress2;
    private $deliveryAddress3;
    private $deliveryCity;
    private $deliveryCounty;
    private $deliveryPostcode;
    private $deliveryCountry;
    private $deliveryTelephone;
    private $shippingMethod;
    private $voucherCode;
    private $tradeSale;
    private $actualCourierCost;

    private function __construct()
    {

    }
}