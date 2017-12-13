<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\ProductImport;

final class Layout
{
    public static function of(string $name, string $keyField): self
    {
        $layout = new self;
        $layout->name = $name;
        $layout->keyField = $keyField;
        $layout->layoutFields = LayoutFieldSet::create();
        return $layout;
    }

    public static function fromJson(array $json): self
    {
        $result = new self;
        $result->layoutFields = LayoutFieldSet::fromJson($json['layoutFields']);
        $result->name = $json['layoutName'];
        $result->keyField = $json['keyField'];
        $result->skipExistingProduct = $json['skipExistingProduct'] ?? null;
        $result->skipNewProduct = $json['skipNewProduct'] ?? null;
        $result->flagForNewProducts = $json['flagForNewProducts'] ?? null;
        $result->sellerCentralCategory = $json['sellerCentralCategory'] ?? null;
        $result->sellerCentralSubCategory = $json['sellerCentralSubCategory'] ?? null;
        return $result;
    }

    public function validate(ImportData $importData): void
    {
        $this->checkImportRowsHaveKeyField($importData->getImportRows());
        $this->checkImportRowsHaveLayoutFields($importData->getImportRows());
        //todo TBC check the order of the fields match the order of the import row fields
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getKeyField(): string
    {
        return $this->keyField;
    }

    public function withLayoutField(LayoutField $layoutField): self
    {
        $result = clone $this;
        $result->layoutFields = $result->layoutFields->with($layoutField);
        return $result;
    }

    public function getLayoutField(string $name): LayoutField
    {
        return $this->layoutFields->get($name) ?? null;
    }

    public function withLayoutFields(LayoutFieldSet $layoutFields): self
    {
        $result = clone $this;
        $result->layoutFields = $layoutFields;
        return $result;
    }

    public function getLayoutFields(): LayoutFieldSet
    {
        return $this->layoutFields;
    }

    public function withSellerCentralCategory(string $sellerCentralCategory): self
    {
        $result = clone $this;
        $result->sellerCentralCategory = $sellerCentralCategory;
        return $result;
    }

    public function getSellerCentralCategory(): ?string
    {
        return $this->sellerCentralCategory;
    }

    public function withSellerCentralSubCategory(string $sellerCentralSubCategory): self
    {
        $result = clone $this;
        $result->sellerCentralSubCategory = $sellerCentralSubCategory;
        return $result;
    }

    public function getSellerCentralSubCategory(): ?string
    {
        return $this->sellerCentralSubCategory;
    }

    public function withFlagForNewProducts(int $flagForNewProducts): self
    {
        $result = clone $this;
        $result->flagForNewProducts = $flagForNewProducts;
        return $result;
    }

    public function getFlagForNewProducts(): ?int
    {
        return $this->flagForNewProducts;
    }

    public function withSkipExistingProduct(bool $skipExistingProduct): self
    {
        $result = clone $this;
        $result->skipExistingProduct = $skipExistingProduct;
        return $result;
    }

    public function skipExistingProduct(): bool
    {
        return $this->skipExistingProduct;
    }

    public function withSkipNewProduct(bool $skipNewProduct): self
    {
        $result = clone $this;
        $result->skipNewProduct = $skipNewProduct;
        return $result;
    }

    public function skipNewProduct(): bool
    {
        return $this->skipNewProduct;
    }

    public function equals($layout): bool
    {
        return $layout instanceof Layout &&
        $layout->name === $this->name &&
        $layout->keyField === $this->keyField &&
        $layout->layoutFields->equals($this->layoutFields) &&
        $layout->sellerCentralCategory === $this->sellerCentralCategory &&
        $layout->sellerCentralSubCategory === $this->sellerCentralSubCategory &&
        $layout->flagForNewProducts === $this->flagForNewProducts &&
        $layout->skipExistingProduct === $this->skipExistingProduct &&
        $layout->skipNewProduct === $this->skipNewProduct;
    }

    public function toJson(): array
    {
        $json = [
            'layoutFields' => [
                'layoutField' => $this->layoutFields->toJson(),
            ],
            'layoutName' => $this->name,
            'keyField' => $this->keyField
        ];

        if ($this->skipExistingProduct !== null) {
            $json['skipExistingProduct'] = (bool)$this->skipExistingProduct;
        }

        if ($this->skipNewProduct !== null) {
            $json['skipNewProduct'] = (bool)$this->skipNewProduct;
        }

        if ($this->flagForNewProducts) {
            $json['flagForNewProducts'] = $this->flagForNewProducts;
        }

        if ($this->sellerCentralCategory) {
            $json['sellerCentralCategory'] = $this->sellerCentralCategory;
        }

        if ($this->sellerCentralSubCategory) {
            $json['sellerCentralSubCategory'] = $this->sellerCentralSubCategory;
        }

        return $json;
    }

    private function checkImportRowsHaveKeyField(ImportRowCollection $importRows): void
    {
        foreach ($importRows as $importRow) {
            if (!$importRow->hasField($this->keyField)) {
                throw new LayoutException("Key field `{$this->keyField}` is not specified in import row");
            }
        }
    }

    private function checkImportRowsHaveLayoutFields(ImportRowCollection $importRows): void
    {
        foreach ($this->layoutFields as $layoutField) {
            /** @var ImportRow $importRow */
            foreach ($importRows as $importRow) {
                if (!$importRow->hasField($layoutField->getName())) {
                    $rowKeyFieldValue = $importRow->getImportField($this->keyField);
                    throw new LayoutException("Field `{$layoutField->getName()}` not found in import row with {$this->keyField} of {$rowKeyFieldValue->getName()}");
                }
            }
        }
    }

    private $name;
    private $keyField;
    /** @var LayoutFieldSet */
    private $layoutFields;
    private $sellerCentralCategory;
    private $sellerCentralSubCategory;
    private $flagForNewProducts;
    private $skipExistingProduct;
    private $skipNewProduct;

    private function __construct()
    {
    }
}
