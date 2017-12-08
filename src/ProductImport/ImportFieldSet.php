<?php
declare(strict_types=1);
namespace SnowIO\VoloDataModel\ProductImport;

use SnowIO\VoloDataModel\Internal\SetTrait;

final class ImportFieldSet implements \IteratorAggregate
{
    use SetTrait;

    public function with(ImportField $importField): self
    {
        $result = clone $this;
        $result->items[self::getKey($importField)] = $importField;
        return $result;
    }

    public function get($name): ?ImportField
    {
        return $this->items[$name] ?? null;
    }

    public function toJson(): array
    {
        return \array_map(function (ImportField $importField) {
            return $importField->toJson();
        }, array_values($this->items));
    }

    private static function getKey(ImportField $importField): string
    {
        return $importField->getName();
    }

    private static function itemsAreEqual(ImportField $importField, ImportField $otherImportField): bool
    {
        return $importField->equals($otherImportField);
    }
}
