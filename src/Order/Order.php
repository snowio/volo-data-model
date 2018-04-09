<?php

namespace SnowIO\VoloDataModel\Order;

final class Order
{
    public static function of(int $espOrderNo): self
    {
        $order = new self($espOrderNo);
        $order->orderItems = ItemSet::create();
        $order->orderCredits = OrderCreditSet::create();
        $order->payments = PaymentSet::create();
        return $order;
    }

    private function __construct(int $espOrderNo)
    {
        $this->espOrderNo = $espOrderNo;
    }

    public function toJson(): array
    {
        return [
            'orderType' => $this->orderType,
            'orderSource' => $this->orderSource,
            'espOrderNo' => $this->espOrderNo,
            'invoiceNumber' => $this->invoiceNumber,
            'externalReference' => $this->externalReference,
            'date' => $this->date,
            'customerCompany' => $this->customerCompany,
            'customerName' => $this->customerName,
            'customerAddress1' => $this->customerAddress1,
            'customerAddress2' => $this->customerAddress2,
            'customerAddress3' => $this->customerAddress3,
            'customerCity' => $this->customerCity,
            'customerCounty' => $this->customerCounty,
            'customerPostcode' => $this->customerPostcode,
            'customerCountry' => $this->customerCountry,
            'customerEmail' => $this->customerEmail,
            'customerTelephone' => $this->customerTelephone,
            'customerFax' => $this->customerFax,
            'customerReference' => $this->customerReference,
            'customerNotes' => $this->customerNotes,
            'deliveryCompany' => $this->deliveryCompany,
            'deliveryName' => $this->deliveryName,
            'deliveryAddress1' => $this->deliveryAddress1,
            'deliveryAddress2' => $this->deliveryAddress2,
            'deliveryAddress3' => $this->deliveryAddress3,
            'deliveryCity' => $this->deliveryCity,
            'deliveryCounty' => $this->deliveryCounty,
            'deliveryPostcode' => $this->deliveryPostcode,
            'deliveryCountry' => $this->deliveryCountry,
            'deliveryTelephone' => $this->deliveryTelephone,
            'shippingMethod' => $this->shippingMethod,
            'shippingCost' => $this->shippingCost,
            'insurance' => $this->insurance,
            'discount' => $this->discount,
            'voucherCode' => $this->voucherCode,
            'orderTotal' => $this->orderTotal,
            'paymentComplete' => $this->paymentComplete,
            'currencyCode' => $this->currencyCode,
            'exchangeRate' => $this->exchangeRate,
            'sellerUsername' => $this->sellerUsername,
            'sellerId' => $this->sellerId,
            'courierProfileName' => $this->courierProfileName,
            'buyerId' => $this->buyerId,
            'storeId' => $this->storeId,
            'shipToStore' => $this->shipToStore,
            'orderStatus' => $this->orderStatus,
            'flag1' => $this->flag1,
            'flag2' => $this->flag2,
            'courierName' => $this->courierName,
            'courierService' => $this->courierService,
            'courierServiceCode' => $this->courierServiceCode,
            'fulfilmentType' => $this->fulfilmentType,
            'webOrderID' => $this->webOrderID,
            'shippingDate' => $this->shippingDate,
            'invoiceDate' => $this->invoiceDate,
            'tradeSale' => $this->tradeSale,
            'courierTracking' => $this->courierTracking,
            'actualCourierCost' => $this->actualCourierCost,
            'orderItems' => $this->orderItems->toJson(),
            'orderCredits' => $this->orderCredits->toJson(),
            'payments' => $this->payments->toJson(),
        ];
    }

    public static function fromJson(array $json): self
    {
        return self::of($json['espOrderNo'])
            ->withOrderType($json['orderType'])
            ->withOrderSource($json['orderSource'])
            ->withEspOrderNo($json['espOrderNo'])
            ->withInvoiceNumber($json['invoiceNumber'])
            ->withExternalReference($json['externalReference'])
            ->withDate($json['date'])
            ->withCustomerCompany($json['customerCompany'])
            ->withCustomerName($json['customerName'])
            ->withCustomerAddress1($json['customerAddress1'])
            ->withCustomerAddress2($json['customerAddress2'])
            ->withCustomerAddress3($json['customerAddress3'])
            ->withCustomerCity($json['customerCity'])
            ->withCustomerCounty($json['customerCounty'])
            ->withCustomerPostcode($json['customerPostcode'])
            ->withCustomerCountry($json['customerCountry'])
            ->withCustomerEmail($json['customerEmail'])
            ->withCustomerTelephone($json['customerTelephone'])
            ->withCustomerFax($json['customerFax'])
            ->withCustomerReference($json['customerReference'])
            ->withCustomerNotes($json['customerNotes'])
            ->withDeliveryCompany($json['deliveryCompany'])
            ->withDeliveryName($json['deliveryName'])
            ->withDeliveryAddress1($json['deliveryAddress1'])
            ->withDeliveryAddress2($json['deliveryAddress2'])
            ->withDeliveryAddress3($json['deliveryAddress3'])
            ->withDeliveryCity($json['deliveryCity'])
            ->withDeliveryCounty($json['deliveryCounty'])
            ->withDeliveryPostcode($json['deliveryPostcode'])
            ->withDeliveryCountry($json['deliveryCountry'])
            ->withDeliveryTelephone($json['deliveryTelephone'])
            ->withShippingMethod($json['shippingMethod'])
            ->withShippingCost($json['shippingCost'])
            ->withInsurance($json['insurance'])
            ->withDiscount($json['discount'])
            ->withVoucherCode($json['voucherCode'])
            ->withOrderTotal($json['orderTotal'])
            ->withPaymentComplete($json['paymentComplete'])
            ->withCurrencyCode($json['currencyCode'])
            ->withExchangeRate($json['exchangeRate'])
            ->withSellerUsername($json['sellerUsername'])
            ->withSellerId($json['sellerId'])
            ->withCourierProfileName($json['courierProfileName'])
            ->withBuyerId($json['buyerId'])
            ->withStoreId($json['storeId'])
            ->withShipToStore($json['shipToStore'])
            ->withOrderStatus($json['orderStatus'])
            ->withFlag1($json['flag1'])
            ->withFlag2($json['flag2'])
            ->withCourierName($json['courierName'])
            ->withCourierService($json['courierService'])
            ->withCourierServiceCode($json['courierServiceCode'])
            ->withFulfilmentType($json['fulfilmentType'])
            ->withWebOrderID($json['webOrderID'])
            ->withShippingDate($json['shippingDate'])
            ->withInvoiceDate($json['invoiceDate'])
            ->withTradeSale($json['tradeSale'])
            ->withCourierTracking($json['courierTracking'])
            ->withActualCourierCost($json['actualCourierCost'])
            ->withOrderItems(
                ItemSet::fromJson($json['orderItems'] ?? [])
            )
            ->withOrderCredits(
                OrderCreditSet::fromJson($json['orderCredits'] ?? [])
            )
            ->withPayments(
                PaymentSet::fromJson($json['payments'] ?? [])
            );
    }

    private $orderType;
    private $orderSource;
    private $espOrderNo;
    private $invoiceNumber;
    private $externalReference;
    private $date;
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
    private $customerFax;
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
    private $shippingCost;
    private $insurance;
    private $discount;
    private $voucherCode;
    private $orderTotal;
    private $paymentComplete;
    private $currencyCode;
    private $exchangeRate;
    private $sellerUsername;
    private $sellerId;
    private $courierProfileName;
    private $buyerId;
    private $storeId;
    private $shipToStore;
    private $orderStatus;
    private $flag1;
    private $flag2;
    private $courierName;
    private $courierService;
    private $courierServiceCode;
    private $fulfilmentType;
    private $webOrderID;
    private $shippingDate;
    private $invoiceDate;
    private $tradeSale;
    private $courierTracking;
    private $actualCourierCost;
    private $orderItems;
    private $orderCredits;
    private $payments;

    public function getOrderType(): string
    {
        return $this->orderType;
    }

    public function withOrderType(string $orderType): self
    {
        $result = clone $this;
        $result->orderType = $orderType;
        return $result;
    }

    public function getOrderSource(): string
    {
        return $this->orderSource;
    }

    public function withOrderSource(string $orderSource): self
    {
        $result = clone $this;
        $result->orderSource = $orderSource;
        return $result;
    }

    public function getEspOrderNo(): int
    {
        return $this->espOrderNo;
    }

    public function withEspOrderNo(int $espOrderNo): self
    {
        $result = clone $this;
        $result->espOrderNo = $espOrderNo;
        return $result;
    }

    public function getInvoiceNumber(): string
    {
        return $this->invoiceNumber;
    }

    public function withInvoiceNumber(string $invoiceNumber): self
    {
        $result = clone $this;
        $result->invoiceNumber = $invoiceNumber;
        return $result;
    }

    public function getExternalReference(): string
    {
        return $this->externalReference;
    }

    public function withExternalReference(string $externalReference): self
    {
        $result = clone $this;
        $result->externalReference = $externalReference;
        return $result;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function withDate(string $date): self
    {
        $result = clone $this;
        $result->date = $date;
        return $result;
    }

    public function getCustomerCompany():string
    {
        return $this->customerCompany;
    }

    public function withCustomerCompany(string $customerCompany): self
    {
        $result = clone $this;
        $result->customerCompany = $customerCompany;
        return $result;
    }

    public function getCustomerName(): string
    {
        return $this->customerName;
    }

    public function withCustomerName(string $customerName): self
    {
        $result = clone $this;
        $result->customerName = $customerName;
        return $result;
    }

    public function getCustomerAddress1(): string
    {
        return $this->customerAddress1;
    }

    public function withCustomerAddress1(string $customerAddress1): self
    {
        $result = clone $this;
        $result->customerAddress1 = $customerAddress1;
        return $result;
    }

    public function getCustomerAddress2(): string
    {
        return $this->customerAddress2;
    }

    public function withCustomerAddress2(string $customerAddress2): self
    {
        $result = clone $this;
        $result->customerAddress2 = $customerAddress2;
        return $result;
    }

    public function getCustomerAddress3(): string
    {
        return $this->customerAddress3;
    }

    public function withCustomerAddress3(string $customerAddress3): self
    {
        $result = clone $this;
        $result->customerAddress3 = $customerAddress3;
        return $result;
    }

    public function getCustomerCity(): string
    {
        return $this->customerCity;
    }

    public function withCustomerCity(string $customerCity): self
    {
        $result = clone $this;
        $result->customerCity = $customerCity;
        return $result;
    }

    public function getCustomerCounty(): string
    {
        return $this->customerCounty;
    }

    public function withCustomerCounty(string $customerCounty): self
    {
        $result = clone $this;
        $result->customerCounty = $customerCounty;
        return $result;
    }

    public function getCustomerPostcode(): string
    {
        return $this->customerPostcode;
    }

    public function withCustomerPostcode(string $customerPostcode): self
    {
        $result = clone $this;
        $result->customerPostcode = $customerPostcode;
        return $result;
    }

    public function getCustomerCountry(): string
    {
        return $this->customerCountry;
    }

    public function withCustomerCountry(string $customerCountry): self
    {
        $result = clone $this;
        $result->customerCountry = $customerCountry;
        return $result;
    }

    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }

    public function withCustomerEmail(string $customerEmail): self
    {
        $result = clone $this;
        $result->customerEmail = $customerEmail;
        return $result;
    }

    public function getCustomerTelephone(): string
    {
        return $this->customerTelephone;
    }

    public function withCustomerTelephone(string $customerTelephone): self
    {
        $result = clone $this;
        $result->customerTelephone = $customerTelephone;
        return $result;
    }

    public function getCustomerFax(): string
    {
        return $this->customerFax;
    }

    public function withCustomerFax(string $customerFax): self
    {
        $result = clone $this;
        $result->customerFax = $customerFax;
        return $result;
    }

    public function getCustomerReference(): string
    {
        return $this->customerReference;
    }

    public function withCustomerReference(string $customerReference): self
    {
        $result = clone $this;
        $result->customerReference = $customerReference;
        return $result;
    }

    public function getCustomerNotes(): string
    {
        return $this->customerNotes;
    }

    public function withCustomerNotes(string $customerNotes): self
    {
        $result = clone $this;
        $result->customerNotes = $customerNotes;
        return $result;
    }

    public function getDeliveryCompany(): string
    {
        return $this->deliveryCompany;
    }

    public function withDeliveryCompany(string $deliveryCompany): self
    {
        $result = clone $this;
        $result->deliveryCompany = $deliveryCompany;
        return $result;
    }

    public function getDeliveryName(): string
    {
        return $this->deliveryName;
    }

    public function withDeliveryName(string $deliveryName): self
    {
        $result = clone $this;
        $result->deliveryName = $deliveryName;
        return $result;
    }

    public function getDeliveryAddress1(): string
    {
        return $this->deliveryAddress1;
    }

    public function withDeliveryAddress1(string $deliveryAddress1): self
    {
        $result = clone $this;
        $result->deliveryAddress1 = $deliveryAddress1;
        return $result;
    }

    public function getDeliveryAddress2(): string
    {
        return $this->deliveryAddress2;
    }

    public function withDeliveryAddress2(string $deliveryAddress2): self
    {
        $result = clone $this;
        $result->deliveryAddress2 = $deliveryAddress2;
        return $result;
    }

    public function getDeliveryAddress3(): string
    {
        return $this->deliveryAddress3;
    }

    public function withDeliveryAddress3(string $deliveryAddress3): self
    {
        $result = clone $this;
        $result->deliveryAddress3 = $deliveryAddress3;
        return $result;
    }

    public function getDeliveryCity(): string
    {
        return $this->deliveryCity;
    }

    public function withDeliveryCity(string $deliveryCity): self
    {
        $result = clone $this;
        $result->deliveryCity = $deliveryCity;
        return $result;
    }

    public function getDeliveryCounty(): string
    {
        return $this->deliveryCounty;
    }

    public function withDeliveryCounty(string $deliveryCounty): self
    {
        $result = clone $this;
        $result->deliveryCounty = $deliveryCounty;
        return $result;
    }

    public function getDeliveryPostcode(): string
    {
        return $this->deliveryPostcode;
    }

    public function withDeliveryPostcode(string $deliveryPostcode): self
    {
        $result = clone $this;
        $result->deliveryPostcode = $deliveryPostcode;
        return $result;
    }

    public function getDeliveryCountry(): string
    {
        return $this->deliveryCountry;
    }

    public function withDeliveryCountry(string $deliveryCountry): self
    {
        $result = clone $this;
        $result->deliveryCountry = $deliveryCountry;
        return $result;
    }

    public function getDeliveryTelephone(): string
    {
        return $this->deliveryTelephone;
    }

    public function withDeliveryTelephone(string $deliveryTelephone): self
    {
        $result = clone $this;
        $result->deliveryTelephone = $deliveryTelephone;
        return $result;
    }

    public function getShippingMethod(): string
    {
        return $this->shippingMethod;
    }

    public function withShippingMethod(string $shippingMethod): self
    {
        $result = clone $this;
        $result->shippingMethod = $shippingMethod;
        return $result;
    }

    public function getShippingCost(): string
    {
        return $this->shippingCost;
    }

    public function withShippingCost(string $shippingCost): self
    {
        $result = clone $this;
        $result->shippingCost = $shippingCost;
        return $result;
    }

    public function getInsurance(): string
    {
        return $this->insurance;
    }

    public function withInsurance(string $insurance): self
    {
        $result = clone $this;
        $result->insurance = $insurance;
        return $result;
    }

    public function getDiscount(): string
    {
        return $this->discount;
    }

    public function withDiscount(string $discount): self
    {
        $result = clone $this;
        $result->discount = $discount;
        return $result;
    }

    public function getVoucherCode(): string
    {
        return $this->voucherCode;
    }

    public function withVoucherCode(string $voucherCode): self
    {
        $result = clone $this;
        $result->voucherCode = $voucherCode;
        return $result;
    }

    public function getOrderTotal(): string
    {
        return $this->orderTotal;
    }

    public function withOrderTotal(string $orderTotal): self
    {
        $result = clone $this;
        $result->orderTotal = $orderTotal;
        return $result;
    }

    public function getPaymentComplete(): bool
    {
        return $this->paymentComplete;
    }

    public function withPaymentComplete(bool $paymentComplete): self
    {
        $result = clone $this;
        $result->paymentComplete = $paymentComplete;
        return $result;
    }

    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }

    public function withCurrencyCode(string $currencyCode): self
    {
        $result = clone $this;
        $result->currencyCode = $currencyCode;
        return $result;
    }

    public function getExchangeRate(): string
    {
        return $this->exchangeRate;
    }

    public function withExchangeRate(string $exchangeRate): self
    {
        $result = clone $this;
        $result->exchangeRate = $exchangeRate;
        return $result;
    }

    public function getSellerUsername(): string
    {
        return $this->sellerUsername;
    }

    public function withSellerUsername(string $sellerUsername): self
    {
        $result = clone $this;
        $result->sellerUsername = $sellerUsername;
        return $result;
    }

    public function getSellerId(): int
    {
        return $this->sellerId;
    }

    public function withSellerId(int $sellerId): self
    {
        $result = clone $this;
        $result->sellerId = $sellerId;
        return $result;
    }

    public function getCourierProfileName(): string
    {
        return $this->courierProfileName;
    }

    public function withCourierProfileName(string $courierProfileName): self
    {
        $result = clone $this;
        $result->courierProfileName = $courierProfileName;
        return $result;
    }

    public function getBuyerId(): string
    {
        return $this->buyerId;
    }

    public function withBuyerId(string $buyerId): self
    {
        $result = clone $this;
        $result->buyerId = $buyerId;
        return $result;
    }

    public function getStoreId(): string
    {
        return $this->storeId;
    }

    public function withStoreId(string $storeId): self
    {
        $result = clone $this;
        $result->storeId = $storeId;
        return $result;
    }

    public function getShipToStore(): string
    {
        return $this->shipToStore;
    }

    public function withShipToStore(string $shipToStore): self
    {
        $result = clone $this;
        $result->shipToStore = $shipToStore;
        return $result;
    }

    public function getOrderStatus(): string
    {
        return $this->orderStatus;
    }

    public function withOrderStatus(string $orderStatus): self
    {
        $result = clone $this;
        $result->orderStatus = $orderStatus;
        return $result;
    }

    public function getFlag1(): string
    {
        return $this->flag1;
    }

    public function withFlag1(string $flag1): self
    {
        $result = clone $this;
        $result->flag1 = $flag1;
        return $result;
    }

    public function getFlag2(): string
    {
        return $this->flag2;
    }

    public function withFlag2(string $flag2): self
    {
        $result = clone $this;
        $result->flag2 = $flag2;
        return $result;
    }

    public function getCourierName(): string
    {
        return $this->courierName;
    }

    public function withCourierName(string $courierName): self
    {
        $result = clone $this;
        $result->courierName = $courierName;
        return $result;
    }

    public function getCourierService(): string
    {
        return $this->courierService;
    }

    public function withCourierService(string $courierService): self
    {
        $result = clone $this;
        $result->courierService = $courierService;
        return $result;
    }

    public function getCourierServiceCode(): string
    {
        return $this->courierServiceCode;
    }

    public function withCourierServiceCode(string $courierServiceCode): self
    {
        $result = clone $this;
        $result->courierServiceCode = $courierServiceCode;
        return $result;
    }

    public function getFulfilmentType(): string
    {
        return $this->fulfilmentType;
    }

    public function withFulfilmentType(string $fulfilmentType): self
    {
        $result = clone $this;
        $result->fulfilmentType = $fulfilmentType;
        return $result;
    }

    public function getWebOrderID(): int
    {
        return $this->webOrderID;
    }

    public function withWebOrderID(int $webOrderID): self
    {
        $result = clone $this;
        $result->webOrderID = $webOrderID;
        return $result;
    }

    public function getShippingDate(): string
    {
        return $this->shippingDate;
    }

    public function withShippingDate(string $shippingDate): self
    {
        $result = clone $this;
        $result->shippingDate = $shippingDate;
        return $result;
    }

    public function getInvoiceDate(): string
    {
        return $this->invoiceDate;
    }

    public function withInvoiceDate(string $invoiceDate): self
    {
        $result = clone $this;
        $result->invoiceDate = $invoiceDate;
        return $result;
    }

    public function getTradeSale(): bool
    {
        return $this->tradeSale;
    }

    public function withTradeSale(bool $tradeSale): self
    {
        $result = clone $this;
        $result->tradeSale = $tradeSale;
        return $result;
    }

    public function getCourierTracking(): string
    {
        return $this->courierTracking;
    }

    public function withCourierTracking(string $courierTracking): self
    {
        $result = clone $this;
        $result->courierTracking = $courierTracking;
        return $result;
    }

    public function getActualCourierCost(): string
    {
        return $this->actualCourierCost;
    }

    public function withActualCourierCost(string $actualCourierCost): self
    {
        $result = clone $this;
        $result->actualCourierCost = $actualCourierCost;
        return $result;
    }

    public function getOrderItems(): ItemSet
    {
        return $this->orderItems;
    }

    public function withOrderItems(ItemSet $orderItems): self
    {
        $result = clone $this;
        $result->orderItems = $orderItems;
        return $result;
    }

    public function getOrderCredits(): OrderCreditSet
    {
        return $this->orderCredits;
    }

    public function withOrderCredits(OrderCreditSet $orderCredits): self
    {
        $result = clone $this;
        $result->orderCredits = $orderCredits;
        return $result;
    }

    public function getPayments(): PaymentSet
    {
        return $this->payments;
    }

    public function withPayments(PaymentSet $payments): self
    {
        $result = clone $this;
        $result->payments = $payments;
        return $result;
    }
}
