<?php
declare(strict_types = 1);
namespace SnowIO\VoloDataModel\ProductImport;

final class ImportRow
{
    public static function create()
    {
        $importRow = new self;
        $importRow->importFields = ImportFieldSet::create();
        return $importRow;
    }

    public static function fromJson(array $json): self
    {
        $result = new self;
        $result->importFields = ImportFieldSet::fromJson($json['importField']);
        return $result;
    }

    public function withImportField(ImportField $field): self
    {
        $result = clone $this;
        $result->importFields = $result->importFields->with($field);
        return $result;
    }

    public function getImportField(string $name): ?ImportField
    {
        return $this->importFields->get($name);
    }

    public function hasField(string $name): bool
    {
        return $this->getImportField($name) !== null;
    }

    public function withImportFields(ImportFieldSet $importFields): self
    {
        $result = clone $this;
        $result->importFields = $importFields;
        return $result;
    }

    public function getImportFields(): ImportFieldSet
    {
        return $this->importFields;
    }

    public function toJson()
    {
        return [
            'importField' => $this->importFields->toJson(),
        ];
    }

    public function equals($importRow): bool
    {
        return $importRow instanceof ImportRow &&
        $this->importFields->equals($importRow->importFields);
    }

    /** @var  ImportFieldSet */
    private $importFields;

    private function __construct()
    {

    }
}
