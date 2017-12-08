# volo-data-model

[![Build Status](https://travis-ci.org/snowio/volo-data-model.svg?branch=master)](https://travis-ci.org/snowio/volo-data-model)
[![codecov](https://codecov.io/gh/snowio/volo-data-model/branch/master/graph/badge.svg)](https://codecov.io/gh/snowio/volo-data-model)

Data model for the Volo API 
- Currently supports only ProductImport request data

## ProductImport

- Example Request json payload that is sent to Volo more information about the request [here](https://developer.volocommerce.io/#operation/importProducts)

```json 
{
    "layout": {
        "layoutName": "Custom Layout",
        "layoutFields": {
            "layoutField": [
                {
                    "name": "StockNumber"
                }
            ]
        },
        "keyField": "StockNumber"
    },
    "importData": {
        "importRow": [
            {
                "importField": [
                    {
                        "name": "StockNumber",
                        "value": "3827893279-IK89"
                    }
                ]
            }
        ]
    }
}
```

- SnowIO DataModel Model Example

```php
        use SnowIO\VoloDataModel\Command\ImportProductDataCommand;
        use SnowIO\VoloDataModel\ProductImport\ImportData;
        use SnowIO\VoloDataModel\ProductImport\ImportRow;
        use SnowIO\VoloDataModel\ProductImport\ImportRowCollection;
        use SnowIO\VoloDataModel\ProductImport\ImportFieldSet;
        use SnowIO\VoloDataModel\ProductImport\ImportField;
        use SnowIO\VoloDataModel\ProductImport\Layout;
        use SnowIO\VoloDataModel\ProductImport\LayoutField;
        
        $layout = Layout::of('Custom Layout', 'StockNumber')
            ->withLayoutField(LayoutField::of('StockNumber'));
        $importRowCollection = ImportRowCollection::of([
            ImportRow::create()
                ->withImportFields(ImportFieldSet::of([
                    ImportField::of('StockNumber', '3827893279-IK89'),
                ])),
        ]);
        $importData = ImportData::create()->withImportRows($importRowCollection);
        $importProductDataCommand = ImportProductDataCommand::of($layout, $importData);
```
