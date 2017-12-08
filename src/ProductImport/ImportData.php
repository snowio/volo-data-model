<?php
declare(strict_types=1);

namespace SnowIO\VoloDataModel\ProductImport;

final class ImportData
{
    public static function create(): self
    {
        $importData = new self;
        $importData->importRows = ImportRowCollection::create();
        return $importData;
    }

    public function withImportRow(ImportRow $importRow): self
    {
        $result = clone $this;
        $result->importRows = $result->importRows->with($importRow);
        return $result;
    }

    public function withImportRows(ImportRowCollection $importRows): self
    {
        $result = clone $this;
        $result->importRows = $importRows;
        return $result;
    }

    public function getImportRows(): ImportRowCollection
    {
        return $this->importRows;
    }

    public function toJson()
    {
        return [
            'importRow' => $this->importRows->toJson(),
        ];
    }

    public function equals($otherImportData): bool
    {
        return $otherImportData instanceof self &&
        $otherImportData->importRows->equals($this->importRows);
    }

    /** @var ImportRowCollection */
    private $importRows;

    private function __construct()
    {

    }
}
