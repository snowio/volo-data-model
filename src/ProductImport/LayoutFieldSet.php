<?php
declare(strict_types=1);
namespace SnowIO\VoloDataModel\ProductImport;

use SnowIO\VoloDataModel\Internal\SetTrait;

final class LayoutFieldSet implements \IteratorAggregate
{
    use SetTrait;

    public function with(LayoutField $layoutField): self
    {
        $layoutFieldSet = clone $this;
        $layoutFieldSet->items[self::getKey($layoutField)] = $layoutField;
        return $layoutFieldSet;
    }

    public function get(string $name): ?LayoutField
    {
        return $this->items[$name] ?? null;
    }

    public function toJson(): array
    {
        return \array_map(function (LayoutField $layoutField) {
            return $layoutField->toJson();
        }, array_values($this->items));
    }

    private static function getKey(LayoutField $layoutField): string
    {
        return $layoutField->getName();
    }

    private static function itemsAreEqual(LayoutField $layoutField, LayoutField $otherLayoutField): bool
    {
        return $layoutField->equals($otherLayoutField);
    }
}
