<?php
declare(strict_types=1);
namespace SnowIO\VoloDataModel\ProductImport;

use SnowIO\VoloDataModel\Internal\CollectionTrait;

final class ImportRowCollection implements \IteratorAggregate
{
    use CollectionTrait;

    public function with(ImportRow $importRow): self
    {
        $result = clone $this;
        $result->items[] = $importRow;
        return $result;
    }

    public function toJson(): array
    {
        return \array_map(function (ImportRow $importRow) {
            return $importRow->toJson();
        }, $this->items);
    }

    private static function itemsAreEqual(ImportRow $importRow, ImportRow $otherImportRow): bool
    {
        return $importRow->equals($otherImportRow);
    }
}
