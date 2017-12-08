<?php
declare(strict_types=1);
namespace SnowIO\VoloDataModel\ProductImport;

final class LayoutField
{
    public static function of(string $name): self
    {
        $layoutField = new self;
        $layoutField->name = $name;
        return $layoutField;
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

    public function getType(): string
    {
        return $this->type;
    }

    public function toJson(): array
    {
        $json = [
            'name' => $this->name,
        ];

        if ($this->value) {
            $json['value'] = $this->value;
        }

        if ($this->type) {
            $json['type'] = $this->type;
        }

        return $json;
    }

    public function equals($otherLayoutField): bool
    {
        return $otherLayoutField instanceof LayoutField &&
            $otherLayoutField->name === $this->name &&
            $otherLayoutField->value === $this->value &&
            $otherLayoutField->type === $this->type;
    }

    private $name;
    private $value;
    private $type;

    private function __construct()
    {
    }
}
