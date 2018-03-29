# volo-data-model

[![Build Status](https://travis-ci.org/snowio/volo-data-model.svg?branch=master)](https://travis-ci.org/snowio/volo-data-model)
[![codecov](https://codecov.io/gh/snowio/volo-data-model/branch/master/graph/badge.svg)](https://codecov.io/gh/snowio/volo-data-model)

Data model for the Volo API 
Currently supports: 
- ProductImport request data
- Update Order Request data

## ProductImport


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

## OrderUpdate 

- SnowIO DataModel Example

```php
<?php
    use SnowIO\VoloDataModel\Command\UpdateOrderCommand;
    use SnowIO\VoloDataModel\OrderUpdate\OrderStatus;
    use SnowIO\VoloDataModel\OrderUpdate\OrderUpdate;
    use SnowIO\VoloDataModel\OrderUpdate\OrderUpdateCollection;
        
    $updateOrderCommand = UpdateOrderCommand::of(OrderUpdateCollection::of([
            OrderUpdate::create()
                ->withEspOrderNo(28393283)
                ->withOrderStatus(OrderStatus::WAITING_FOR_DELIVERY)
                ->withOnHoldNotes("string")
                ->withCourier("string"),
            OrderUpdate::create()
                ->withEspOrderNo(76863823)
                ->withOrderStatus(OrderStatus::WAITING_FOR_DELIVERY)
                ->withOnHoldNotes("string")
                ->withCourier("string"),
     ]));
```