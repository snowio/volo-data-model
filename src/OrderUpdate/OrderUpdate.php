<?php
declare(strict_types = 1);

namespace SnowIO\VoloDataModel\OrderUpdate;

final class OrderUpdate
{

    public static function create(): self
    {
        return new self();
    }

    public static function fromJson(array $json): self
    {
        $result = new self;
        $result->json = $json;
        return $result;
    }

    public function withEspOrderNo(int $espOrderNo): self
    {
        $result = clone $this;
        $result->json['espOrderNo'] = $espOrderNo;
        return $result;
    }

    public function withOrderStatus(string $orderStatus): self
    {
        OrderStatus::validateStatus($orderStatus);
        $result = clone $this;
        $result->json['orderStatus'] = $orderStatus;
        return $result;
    }

    public function withOnHoldNotes(string $onHoldNotes): self
    {
        $result = clone $this;
        $result->json['onHoldNotes'] = $onHoldNotes;
        return $result;
    }

    public function withCourier(string $courier): self
    {
        $result = clone $this;
        $result->json['courier'] = $courier;
        return $result;
    }

    public function withCourierService(string $courierService): self
    {
        $result = clone $this;
        $result->json['courierService'] = $courierService;
        return $result;
    }

    public function withCourierTracking(string $courierTracking): self
    {
        $result = clone $this;
        $result->json['courierTracking'] = $courierTracking;
        return $result;
    }

    public function withFlag1(string $flag1): self
    {
        $result = clone $this;
        $result->json['flag1'] = $flag1;
        return $result;
    }

    public function withFlag2(string $flag2): self
    {
        $result = clone $this;
        $result->json['flag2'] = $flag2;
        return $result;
    }

    public function withCustomerCompany(string $customerCompany): self
    {
        $result = clone $this;
        $result->json['customerCompany'] = $customerCompany;
        return $result;
    }

    public function withCustomerName(string $customerName): self
    {
        $result = clone $this;
        $result->json['customerName'] = $customerName;
        return $result;
    }

    public function withCustomerAddress1(string $customerAddress1): self
    {
        $result = clone $this;
        $result->json['customerAddress1'] = $customerAddress1;
        return $result;
    }

    public function withCustomerAddress2(string $customerAddress2): self
    {
        $result = clone $this;
        $result->json['customerAddress2'] = $customerAddress2;
        return $result;
    }

    public function withCustomerAddress3(string $customerAddress3): self
    {
        $result = clone $this;
        $result->json['customerAddress3'] = $customerAddress3;
        return $result;
    }

    public function withCustomerCity(string $customerCity): self
    {
        $result = clone $this;
        $result->json['customerCity'] = $customerCity;
        return $result;
    }

    public function withCustomerCounty(string $customerCounty): self
    {
        $result = clone $this;
        $result->json['customerCounty'] = $customerCounty;
        return $result;
    }

    public function withCustomerPostcode(string $customerPostcode): self
    {
        $result = clone $this;
        $result->json['customerPostcode'] = $customerPostcode;
        return $result;
    }

    public function withCustomerCountry(string $customerCountry): self
    {
        $result = clone $this;
        $result->json['customerCountry'] = $customerCountry;
        return $result;
    }

    public function withCustomerEmail(string $customerEmail): self
    {
        $result = clone $this;
        $result->json['customerEmail'] = $customerEmail;
        return $result;
    }

    public function withCustomerTelephone(string $customerTelephone): self
    {
        $result = clone $this;
        $result->json['customerTelephone'] = $customerTelephone;
        return $result;
    }

    public function withCustomerReference(string $customerReference): self
    {
        $result = clone $this;
        $result->json['customerReference'] = $customerReference;
        return $result;
    }

    public function withCustomerNotes(string $customerNotes): self
    {
        $result = clone $this;
        $result->json['customerNotes'] = $customerNotes;
        return $result;
    }

    public function withDeliveryCompany(string $customerDeliveryCompany): self
    {
        $result = clone $this;
        $result->json['deliveryCompany'] = $customerDeliveryCompany;
        return $result;
    }

    public function withDeliveryName(string $deliveryName): self
    {
        $result = clone $this;
        $result->json['deliveryName'] = $deliveryName;
        return $result;
    }

    public function withDeliveryAddress1(string $deliveryAddress1): self
    {
        $result = clone $this;
        $result->json['deliveryAddress1'] = $deliveryAddress1;
        return $result;
    }

    public function withDeliveryAddress2(string $deliveryAddress2): self
    {
        $result = clone $this;
        $result->json['deliveryAddress2'] = $deliveryAddress2;
        return $result;
    }

    public function withDeliveryAddress3(string $deliveryAddress3): self
    {
        $result = clone $this;
        $result->json['deliveryAddress3'] = $deliveryAddress3;
        return $result;
    }

    public function withDeliveryCity(string $deliveryCity): self
    {
        $result = clone $this;
        $result->json['deliveryCity'] = $deliveryCity;
        return $result;
    }

    public function withDeliveryCounty(string $deliveryCounty): self
    {
        $result = clone $this;
        $result->json['deliveryCounty'] = $deliveryCounty;
        return $result;
    }

    public function withDeliveryPostcode(string $deliveryPostcode): self
    {
        $result = clone $this;
        $result->json['deliveryPostcode'] = $deliveryPostcode;
        return $result;
    }

    public function withDeliveryCountry(string $deliveryCountry): self
    {
        $result = clone $this;
        $result->json['deliveryCountry'] = $deliveryCountry;
        return $result;
    }

    public function withDeliveryTelephone(string $deliveryTelephone): self
    {
        $result = clone $this;
        $result->json['deliveryTelephone'] = $deliveryTelephone;
        return $result;
    }

    public function withShippingMethod(string $shippingMethod): self
    {
        $result = clone $this;
        $result->json['shippingMethod'] = $shippingMethod;
        return $result;
    }

    public function withVoucherCode(string $voucherCode): self
    {
        $result = clone $this;
        $result->json['voucherCode'] = $voucherCode;
        return $result;
    }

    public function withTradeSale(bool $tradeSale): self
    {
        $result = clone $this;
        $result->json['tradeSale'] = $tradeSale;
        return $result;
    }

    public function withActualCourierCost(int $actualCourierCost): self
    {
        $result = clone $this;
        $result->json['actualCourierCost'] = $actualCourierCost;
        return $result;
    }


    public function getEspOrderNo(): int
    {
        return $this->json['espOrderNo'];
    }

    public function getOrderStatus(): string
    {
        return $this->json['orderStatus'];
    }

    public function getOnHoldNotes(): string
    {
        return $this->json['onHoldNotes'];
    }

    public function getCourier(): string
    {
        return $this->json['courier'];
    }

    public function getCourierService(): string
    {
        return $this->json['courierService'];
    }

    public function getCourierTracking(): string
    {
        return $this->json['courierTracking'];
    }

    public function getFlag1(): string
    {
        return $this->json['flag1'];
    }

    public function getFlag2(): string
    {
        return $this->json['flag2'];
    }

    public function getCustomerCompany(): string
    {
        return $this->json['customerCompany'];
    }

    public function getCustomerName(): string
    {
        return $this->json['customerName'];
    }

    public function getCustomerAddress1(): string
    {
        return $this->json['customerAddress1'];
    }

    public function getCustomerAddress2(): string
    {
        return $this->json['customerAddress2'];
    }

    public function getCustomerAddress3(): string
    {
        return $this->json['customerAddress3'];
    }

    public function getCustomerCity(): string
    {
        return $this->json['customerCity'];
    }

    public function getCustomerCounty(): string
    {
        return $this->json['customerCounty'];
    }

    public function getCustomerPostcode(): string
    {
        return $this->json['customerPostcode'];
    }

    public function getCustomerCountry(): string
    {
        return $this->json['customerCountry'];
    }

    public function getCustomerEmail(): string
    {
        return $this->json['customerEmail'];
    }

    public function getCustomerTelephone(): string
    {
        return $this->json['customerTelephone'];
    }

    public function getCustomerReference(): string
    {
        return $this->json['customerReference'];
    }

    public function getCustomerNotes(): string
    {
        return $this->json['customerNotes'];
    }

    public function getDeliveryCompany(): string
    {
        return $this->json['deliveryCompany'];
    }

    public function getDeliveryName(): string
    {
        return $this->json['deliveryName'];
    }

    public function getDeliveryAddress1(): string
    {
        return $this->json['deliveryAddress1'];
    }

    public function getDeliveryAddress2(): string
    {
        return $this->json['deliveryAddress2'];
    }

    public function getDeliveryAddress3(): string
    {
        return $this->json['deliveryAddress3'];
    }

    public function getDeliveryCity(): string
    {
        return $this->json['deliveryCity'];
    }

    public function getDeliveryCounty(): string
    {
        return $this->json['deliveryCounty'];
    }

    public function getDeliveryPostcode(): string
    {
        return $this->json['deliveryPostcode'];
    }

    public function getDeliveryCountry(): string
    {
        return $this->json['deliveryCountry'];
    }

    public function getDeliveryTelephone(): string
    {
        return $this->json['deliveryTelephone'];
    }

    public function getShippingMethod(): string
    {
        return $this->json['shippingMethod'];
    }

    public function getVoucherCode(): string
    {
        return $this->json['voucherCode'];
    }

    public function getTradeSale(): bool
    {
        return $this->json['tradeSale'];
    }

    public function getActualCourierCost(): int
    {
        return $this->json['actualCourierCost'];
    }

    public function toJson(): array
    {
        return $this->json;
    }

    public function equals($otherOrderUpdateData): bool
    {
        return $otherOrderUpdateData instanceof self &&
        count(array_diff($otherOrderUpdateData->json, $this->json)) === 0;
    }

    private $json;

    private function __construct()
    {

    }
}