<?php

namespace SnowIO\VoloDataModel\Order;

final class Payment
{
    public static function of(string $paymentReference): self
    {
        $payment = new self($paymentReference);
        return $payment;
    }

    public static function fromJson(array $json)
    {
        return Payment::of($json['paymentReference'])
            ->withPaymentMethod($json['paymentMethod'])
            ->withPaymentReference($json['paymentReference'])
            ->withPaymentNotes($json['paymentNotes'])
            ->withPaymentCCDetails($json['paymentCCDetails'])
            ->withPaymentGateway($json['paymentGateway'])
            ->withPayPalEmail($json['payPalEmail'])
            ->withPayPalTransactionID($json['payPalTransactionID'])
            ->withPayPalProtectionEligibility($json['payPalProtectionEligibility'])
            ->withAmount($json['amount'])
            ->withPaymentDate($json['paymentDate'])
            ->withPaymentId($json['paymentId'])
            ->withClearedDate($json['clearedDate'])
            ->withPostedBatchId($json['postedBatchId']);
    }

    public function toJson(): array
    {
        return [
            'paymentMethod' => $this->paymentMethod,
            'paymentReference' => $this->paymentReference,
            'paymentNotes' => $this->paymentNotes,
            'paymentCCDetails' => $this->paymentCCDetails,
            'paymentGateway' => $this->paymentGateway,
            'payPalEmail' => $this->payPalEmail,
            'payPalTransactionID' => $this->payPalTransactionID,
            'payPalProtectionEligibility' => $this->payPalProtectionEligibility,
            'amount' => $this->amount,
            'paymentDate' => $this->paymentDate,
            'paymentId' => (int) $this->paymentId,
            'clearedDate' => $this->clearedDate,
            'postedBatchId' => (int) $this->postedBatchId,
        ];
    }

    /**
     * @param Payment $object
     * @return bool
     */
    public function equals($object): bool
    {
        return ($object instanceof Payment) &&
        ($this->paymentMethod === $object->paymentMethod) &&
        ($this->paymentReference === $object->paymentReference) &&
        ($this->paymentNotes === $object->paymentNotes) &&
        ($this->paymentCCDetails === $object->paymentCCDetails) &&
        ($this->paymentGateway === $object->paymentGateway) &&
        ($this->payPalEmail === $object->payPalEmail) &&
        ($this->payPalTransactionID === $object->payPalTransactionID) &&
        ($this->payPalProtectionEligibility === $object->payPalProtectionEligibility) &&
        ($this->amount === $object->amount) &&
        ($this->paymentDate === $object->paymentDate) &&
        ($this->paymentId === $object->paymentId) &&
        ($this->clearedDate === $object->clearedDate) &&
        ($this->postedBatchId === $object->postedBatchId);
    }

    private $paymentMethod;
    private $paymentReference;
    private $paymentNotes;
    private $paymentCCDetails;
    private $paymentGateway;
    private $payPalEmail;
    private $payPalTransactionID;
    private $payPalProtectionEligibility;
    private $amount;
    private $paymentDate;
    private $paymentId;
    private $clearedDate;
    private $postedBatchId;

    private function __construct($paymentReference)
    {
        $this->paymentReference = $paymentReference;
    }

    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    public function withPaymentMethod(string $paymentMethod): self
    {
        $result = clone $this;
        $result->paymentMethod = $paymentMethod;
        return $result;
    }

    public function getPaymentReference(): string
    {
        return $this->paymentReference;
    }

    public function withPaymentReference(string $paymentReference): self
    {
        $result = clone $this;
        $result->paymentReference = $paymentReference;
        return $result;
    }

    public function getPaymentNotes(): string
    {
        return $this->paymentNotes;
    }

    public function withPaymentNotes(string $paymentNotes): self
    {
        $result = clone $this;
        $result->paymentNotes = $paymentNotes;
        return $result;
    }

    public function getPaymentCCDetails(): string
    {
        return $this->paymentCCDetails;
    }

    public function withPaymentCCDetails(string $paymentCCDetails): self
    {
        $result = clone $this;
        $result->paymentCCDetails = $paymentCCDetails;
        return $result;
    }

    public function getPaymentGateway(): string
    {
        return $this->paymentGateway;
    }

    public function withPaymentGateway(string $paymentGateway): self
    {
        $result = clone $this;
        $result->paymentGateway = $paymentGateway;
        return $result;
    }

    public function getPayPalEmail(): string
    {
        return $this->payPalEmail;
    }

    public function withPayPalEmail(string $payPalEmail): self
    {
        $result = clone $this;
        $result->payPalEmail = $payPalEmail;
        return $result;
    }

    public function getPayPalTransactionID(): string
    {
        return $this->payPalTransactionID;
    }

    public function withPayPalTransactionID($payPalTransactionID): self
    {
        $result = clone $this;
        $result->payPalTransactionID = $payPalTransactionID;
        return $result;
    }

    public function getPayPalProtectionEligibility(): bool
    {
        return (bool) $this->payPalProtectionEligibility;
    }

    public function withPayPalProtectionEligibility(bool $payPalProtectionEligibility): self
    {
        $result = clone $this;
        $result->payPalProtectionEligibility = $payPalProtectionEligibility;
        return $result;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function withAmount(string $amount): self
    {
        $result = clone $this;
        $result->amount = $amount;
        return $result;
    }

    public function getPaymentDate(): string
    {
        return $this->paymentDate;
    }

    public function withPaymentDate(string $paymentDate): self
    {
        $result = clone $this;
        $result->paymentDate = $paymentDate;
        return $result;
    }

    public function getPaymentId(): int
    {
        return (int) $this->paymentId;
    }

    public function withPaymentId(int $paymentId): self
    {
        $result = clone $this;
        $result->paymentId = $paymentId;
        return $result;
    }

    public function getClearedDate(): string
    {
        return $this->clearedDate;
    }

    public function withClearedDate(string $clearedDate): self
    {
        $result = clone $this;
        $result->clearedDate = $clearedDate;
        return $result;
    }

    public function getPostedBatchId(): int
    {
        return $this->postedBatchId;
    }

    public function withPostedBatchId(int $postedBatchId): self
    {
        $result = clone $this;
        $result->postedBatchId = $postedBatchId;
        return $result;
    }
}
