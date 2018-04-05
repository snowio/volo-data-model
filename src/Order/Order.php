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

    public static function create(): self
    {
        return new self();
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

    public function getOrderType()
    {
        return $this->orderType;
    }

    public function withOrderType($orderType): self
    {
        $result = clone $this;
        $result->orderType = $orderType;
        return $result;
    }

    public function getOrderSource()
    {
        return $this->orderSource;
    }

    public function withOrderSource($orderSource): self
    {
        $result = clone $this;
        $result->orderSource = $orderSource;
        return $result;
    }

    public function getEspOrderNo()
    {
        return $this->espOrderNo;
    }

    public function withEspOrderNo($espOrderNo): self
    {
        $result = clone $this;
        $result->espOrderNo = $espOrderNo;
        return $result;
    }

    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    public function withInvoiceNumber($invoiceNumber): self
    {
        $result = clone $this;
        $result->invoiceNumber = $invoiceNumber;
        return $result;
    }

    public function getExternalReference()
    {
        return $this->externalReference;
    }

    public function withExternalReference($externalReference): self
    {
        $result = clone $this;
        $result->externalReference = $externalReference;
        return $result;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function withDate($date): self
    {
        $result = clone $this;
        $result->date = $date;
        return $result;
    }

    public function getCustomerCompany()
    {
        return $this->customerCompany;
    }

    public function withCustomerCompany($customerCompany): self
    {
        $result = clone $this;
        $result->customerCompany = $customerCompany;
        return $result;
    }

    public function getCustomerName()
    {
        return $this->customerName;
    }

    public function withCustomerName($customerName): self
    {
        $result = clone $this;
        $result->customerName = $customerName;
        return $result;
    }

    public function getCustomerAddress1()
    {
        return $this->customerAddress1;
    }

    public function withCustomerAddress1($customerAddress1): self
    {
        $result = clone $this;
        $result->customerAddress1 = $customerAddress1;
        return $result;
    }

    public function getCustomerAddress2()
    {
        return $this->customerAddress2;
    }

    public function withCustomerAddress2($customerAddress2): self
    {
        $result = clone $this;
        $result->customerAddress2 = $customerAddress2;
        return $result;
    }

    public function getCustomerAddress3()
    {
        return $this->customerAddress3;
    }

    public function withCustomerAddress3($customerAddress3): self
    {
        $result = clone $this;
        $result->customerAddress3 = $customerAddress3;
        return $result;
    }

    public function getCustomerCity()
    {
        return $this->customerCity;
    }

    public function withCustomerCity($customerCity): self
    {
        $result = clone $this;
        $result->customerCity = $customerCity;
        return $result;
    }

    public function getCustomerCounty()
    {
        return $this->customerCounty;
    }

    public function withCustomerCounty($customerCounty): self
    {
        $result = clone $this;
        $result->customerCounty = $customerCounty;
        return $result;
    }

    public function getCustomerPostcode()
    {
        return $this->customerPostcode;
    }

    public function withCustomerPostcode($customerPostcode): self
    {
        $result = clone $this;
        $result->customerPostcode = $customerPostcode;
        return $result;
    }

    public function getCustomerCountry()
    {
        return $this->customerCountry;
    }

    public function withCustomerCountry($customerCountry): self
    {
        $result = clone $this;
        $result->customerCountry = $customerCountry;
        return $result;
    }

    public function getCustomerEmail()
    {
        return $this->customerEmail;
    }

    public function withCustomerEmail($customerEmail): self
    {
        $result = clone $this;
        $result->customerEmail = $customerEmail;
        return $result;
    }

    public function getCustomerTelephone()
    {
        return $this->customerTelephone;
    }

    public function withCustomerTelephone($customerTelephone): self
    {
        $result = clone $this;
        $result->customerTelephone = $customerTelephone;
        return $result;
    }

    public function getCustomerFax()
    {
        return $this->customerFax;
    }

    public function withCustomerFax($customerFax): self
    {
        $result = clone $this;
        $result->customerFax = $customerFax;
        return $result;
    }

    public function getCustomerReference()
    {
        return $this->customerReference;
    }

    public function withCustomerReference($customerReference): self
    {
        $result = clone $this;
        $result->customerReference = $customerReference;
        return $result;
    }

    public function getCustomerNotes()
    {
        return $this->customerNotes;
    }

    public function withCustomerNotes($customerNotes): self
    {
        $result = clone $this;
        $result->customerNotes = $customerNotes;
        return $result;
    }

    public function getDeliveryCompany()
    {
        return $this->deliveryCompany;
    }

    public function withDeliveryCompany($deliveryCompany): self
    {
        $result = clone $this;
        $result->deliveryCompany = $deliveryCompany;
        return $result;
    }

    public function getDeliveryName()
    {
        return $this->deliveryName;
    }

    public function withDeliveryName($deliveryName): self
    {
        $result = clone $this;
        $result->deliveryName = $deliveryName;
        return $result;
    }

    public function getDeliveryAddress1()
    {
        return $this->deliveryAddress1;
    }

    public function withDeliveryAddress1($deliveryAddress1): self
    {
        $result = clone $this;
        $result->deliveryAddress1 = $deliveryAddress1;
        return $result;
    }

    public function getDeliveryAddress2()
    {
        return $this->deliveryAddress2;
    }

    public function withDeliveryAddress2($deliveryAddress2): self
    {
        $result = clone $this;
        $result->deliveryAddress2 = $deliveryAddress2;
        return $result;
    }

    public function getDeliveryAddress3()
    {
        return $this->deliveryAddress3;
    }

    public function withDeliveryAddress3($deliveryAddress3): self
    {
        $result = clone $this;
        $result->deliveryAddress3 = $deliveryAddress3;
        return $result;
    }

    public function getDeliveryCity()
    {
        return $this->deliveryCity;
    }

    public function withDeliveryCity($deliveryCity): self
    {
        $result = clone $this;
        $result->deliveryCity = $deliveryCity;
        return $result;
    }

    public function getDeliveryCounty()
    {
        return $this->deliveryCounty;
    }

    public function withDeliveryCounty($deliveryCounty): self
    {
        $result = clone $this;
        $result->deliveryCounty = $deliveryCounty;
        return $result;
    }

    public function getDeliveryPostcode()
    {
        return $this->deliveryPostcode;
    }

    public function withDeliveryPostcode($deliveryPostcode): self
    {
        $result = clone $this;
        $result->deliveryPostcode = $deliveryPostcode;
        return $result;
    }

    public function getDeliveryCountry()
    {
        return $this->deliveryCountry;
    }

    public function withDeliveryCountry($deliveryCountry): self
    {
        $result = clone $this;
        $result->deliveryCountry = $deliveryCountry;
        return $result;
    }

    public function getDeliveryTelephone()
    {
        return $this->deliveryTelephone;
    }

    public function withDeliveryTelephone($deliveryTelephone): self
    {
        $result = clone $this;
        $result->deliveryTelephone = $deliveryTelephone;
        return $result;
    }

    public function getShippingMethod()
    {
        return $this->shippingMethod;
    }

    public function withShippingMethod($shippingMethod): self
    {
        $result = clone $this;
        $result->shippingMethod = $shippingMethod;
        return $result;
    }

    public function getShippingCost()
    {
        return $this->shippingCost;
    }

    public function withShippingCost($shippingCost): self
    {
        $result = clone $this;
        $result->shippingCost = $shippingCost;
        return $result;
    }

    public function getInsurance()
    {
        return $this->insurance;
    }

    public function withInsurance($insurance): self
    {
        $result = clone $this;
        $result->insurance = $insurance;
        return $result;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function withDiscount($discount): self
    {
        $result = clone $this;
        $result->discount = $discount;
        return $result;
    }

    public function getVoucherCode()
    {
        return $this->voucherCode;
    }

    public function withVoucherCode($voucherCode): self
    {
        $result = clone $this;
        $result->voucherCode = $voucherCode;
        return $result;
    }

    public function getOrderTotal()
    {
        return $this->orderTotal;
    }

    public function withOrderTotal($orderTotal): self
    {
        $result = clone $this;
        $result->orderTotal = $orderTotal;
        return $result;
    }

    public function getPaymentComplete()
    {
        return $this->paymentComplete;
    }

    public function withPaymentComplete($paymentComplete): self
    {
        $result = clone $this;
        $result->paymentComplete = $paymentComplete;
        return $result;
    }

    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    public function withCurrencyCode($currencyCode): self
    {
        $result = clone $this;
        $result->currencyCode = $currencyCode;
        return $result;
    }

    public function getExchangeRate()
    {
        return $this->exchangeRate;
    }

    public function withExchangeRate($exchangeRate): self
    {
        $result = clone $this;
        $result->exchangeRate = $exchangeRate;
        return $result;
    }

    public function getSellerUsername()
    {
        return $this->sellerUsername;
    }

    public function withSellerUsername($sellerUsername): self
    {
        $result = clone $this;
        $result->sellerUsername = $sellerUsername;
        return $result;
    }

    public function getSellerId()
    {
        return $this->sellerId;
    }

    public function withSellerId($sellerId): self
    {
        $result = clone $this;
        $result->sellerId = $sellerId;
        return $result;
    }

    public function getCourierProfileName()
    {
        return $this->courierProfileName;
    }

    public function withCourierProfileName($courierProfileName): self
    {
        $result = clone $this;
        $result->courierProfileName = $courierProfileName;
        return $result;
    }

    public function getBuyerId()
    {
        return $this->buyerId;
    }

    public function withBuyerId($buyerId): self
    {
        $result = clone $this;
        $result->buyerId = $buyerId;
        return $result;
    }

    public function getStoreId()
    {
        return $this->storeId;
    }

    public function withStoreId($storeId): self
    {
        $result = clone $this;
        $result->storeId = $storeId;
        return $result;
    }

    public function getShipToStore()
    {
        return $this->shipToStore;
    }

    public function withShipToStore($shipToStore): self
    {
        $result = clone $this;
        $result->shipToStore = $shipToStore;
        return $result;
    }

    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    public function withOrderStatus($orderStatus): self
    {
        $result = clone $this;
        $result->orderStatus = $orderStatus;
        return $result;
    }

    public function getFlag1()
    {
        return $this->flag1;
    }

    public function withFlag1($flag1): self
    {
        $result = clone $this;
        $result->flag1 = $flag1;
        return $result;
    }

    public function getFlag2()
    {
        return $this->flag2;
    }

    public function withFlag2($flag2): self
    {
        $result = clone $this;
        $result->flag2 = $flag2;
        return $result;
    }

    public function getCourierName()
    {
        return $this->courierName;
    }

    public function withCourierName($courierName): self
    {
        $result = clone $this;
        $result->courierName = $courierName;
        return $result;
    }

    public function getCourierService()
    {
        return $this->courierService;
    }

    public function withCourierService($courierService): self
    {
        $result = clone $this;
        $result->courierService = $courierService;
        return $result;
    }

    public function getCourierServiceCode()
    {
        return $this->courierServiceCode;
    }

    public function withCourierServiceCode($courierServiceCode): self
    {
        $result = clone $this;
        $result->courierServiceCode = $courierServiceCode;
        return $result;
    }

    public function getFulfilmentType()
    {
        return $this->fulfilmentType;
    }

    public function withFulfilmentType($fulfilmentType): self
    {
        $result = clone $this;
        $result->fulfilmentType = $fulfilmentType;
        return $result;
    }

    public function getWebOrderID()
    {
        return $this->webOrderID;
    }

    public function withWebOrderID($webOrderID): self
    {
        $result = clone $this;
        $result->webOrderID = $webOrderID;
        return $result;
    }

    public function getShippingDate()
    {
        return $this->shippingDate;
    }

    public function withShippingDate($shippingDate): self
    {
        $result = clone $this;
        $result->shippingDate = $shippingDate;
        return $result;
    }

    public function getInvoiceDate()
    {
        return $this->invoiceDate;
    }

    public function withInvoiceDate($invoiceDate): self
    {
        $result = clone $this;
        $result->invoiceDate = $invoiceDate;
        return $result;
    }

    public function getTradeSale()
    {
        return $this->tradeSale;
    }

    public function withTradeSale($tradeSale): self
    {
        $result = clone $this;
        $result->tradeSale = $tradeSale;
        return $result;
    }

    public function getCourierTracking()
    {
        return $this->courierTracking;
    }

    public function withCourierTracking($courierTracking): self
    {
        $result = clone $this;
        $result->courierTracking = $courierTracking;
        return $result;
    }

    public function getActualCourierCost()
    {
        return $this->actualCourierCost;
    }

    public function withActualCourierCost($actualCourierCost): self
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