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
 <?php
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

## StockAndPriceUpdate

- Example request json payload this sent to volo more information about the request [here](https://developer.volocommerce.io/#operation/updateProducts)

```json
{
  "productUpdate": [
    {
      "stockNumber": "string",
      "prices": {
        "price": [
          {
            "name": "EBAY_BUY_NOW_PRICE",
            "value": 0,
            "accountName": "string"
          }
        ]
      },
      "stockLevel": {
        "location": "string",
        "quantity": 0,
        "stockUpdateType": "DELIVERY"
      },
      "costPrice": 0
    }
  ]
}
```

- SnowIO DataModel Model Example

```php
<?php 
    use SnowIO\VoloDataModel\Command\UpdateStockAndPriceCommand;
    use SnowIO\VoloDataModel\StockAndPriceUpdate\Price;
    use SnowIO\VoloDataModel\StockAndPriceUpdate\PriceCollection;
    use SnowIO\VoloDataModel\StockAndPriceUpdate\PriceNames;
    use SnowIO\VoloDataModel\StockAndPriceUpdate\ProductUpdate;
    use SnowIO\VoloDataModel\StockAndPriceUpdate\ProductUpdateCollection;
    use SnowIO\VoloDataModel\StockAndPriceUpdate\StockLevel;
    use SnowIO\VoloDataModel\StockAndPriceUpdate\StockUpdateTypes;
    $updateStockAndPriceCommand = UpdateStockAndPriceCommand::of(ProductUpdateCollection::of([
        ProductUpdate::of('89239837-8N87382')
            ->withPrices(PriceCollection::of(
                [
                    Price::of(600.60),
                    Price::of(350.89)
                        ->withName(PriceNames::PLAY_PRICE)
                        ->withAccountName('testPlayPrice'),
                ]
            ))->withStockLevel(StockLevel::of(5000)
                ->withLocation("WAREHOUSE")
                ->withStockUpdateType(StockUpdateTypes::STOCK_CHECK_ADJUST_COMMITTED))
            ->withCostPrice(203.99),
        ProductUpdate::of('89239837-8N87389')
            ->withPrices(PriceCollection::of(
                [
                    Price::of(700.94)
                        ->withName(PriceNames::AMAZON_PRICE)
                        ->withAccountName('testAmazonPrice'),
                    Price::of(450.89),
                ]
            )),
    ]));
       
```