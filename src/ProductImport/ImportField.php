<?php
declare(strict_types = 1);

namespace SnowIO\VoloDataModel\ProductImport;

final class ImportField
{
    public static function of(string $name, string $value): self
    {
        $importField = new self;
        $importField->name = $name;
        $importField->value = $value;
        return $importField;
    }

    public static function fromJson(array $json): self
    {
        $result = new self;
        $result->name = $json['name'];
        $result->value = $json['value'];
        $result->type = $json['type'] ?? null;
        return $result;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function withValue(string $value): self
    {
        $result = clone $this;
        $result->value = $value;
        return $result;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function withType(string $type): self
    {
        $result = clone $this;
        $result->type = $type;
        return $result;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function toJson(): array
    {
        $json = [
            'name' => $this->name,
            'value' => $this->value,
        ];

        if ($this->type) {
            $json['type'] = $this->type;
        }

        return $json;
    }

    public function equals($otherImportField): bool
    {
        return $otherImportField instanceof ImportField &&
        $this->value === $otherImportField->value &&
        $this->name === $otherImportField->name &&
        $this->type === $otherImportField->type;
    }

    private $value;
    private $name;
    private $type;

    private function __construct()
    {
    }
}
