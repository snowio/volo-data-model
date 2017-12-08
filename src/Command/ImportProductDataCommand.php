<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\Command;

use SnowIO\VoloDataModel\ProductImport\ImportData;
use SnowIO\VoloDataModel\ProductImport\Layout;

final class ImportProductDataCommand
{
    public static function of(Layout $layout, ImportData $importData): self
    {
        $layout->validate($importData);
        $importProductDataCommand = new self;
        $importProductDataCommand->layout = $layout;
        $importProductDataCommand->importData = $importData;
        return $importProductDataCommand;
    }

    public function getLayout(): Layout
    {
        return $this->layout;
    }

    public function getImportData(): ImportData
    {
        return $this->importData;
    }

    public function toJson(): array
    {
        return [
            'layout' => $this->layout->toJson(),
            'importData' => $this->importData->toJson(),
        ];
    }

    /** @var Layout */
    private $layout;
    /** @var ImportData */
    private $importData;

    private function __construct()
    {
    }
}
