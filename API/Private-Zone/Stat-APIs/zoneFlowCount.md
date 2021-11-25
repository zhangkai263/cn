# zoneFlowCount


## 描述
统计zone的流量


## 请求方式
POST

## 请求地址
https://privatezone.jdcloud-api.com/v1/regions/{regionId}/stat:zoneFlowCount

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**start**|String|True| |查询时间段的起始时间, UTC时间格式，例如2017-11-10T23:00:00Z|
|**end**|String|True| |查询时间段的终止时间, UTC时间格式，例如2017-11-10T23:00:00Z|
|**zoneIds**|String[]|False| |查询的zone id，默认查询所有zone|
|**vpcIds**|String[]|False| |查询的vpc id，默认查询所有vpc|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result[]](#result)| |
|**requestId**|String|请求id|

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**time**|Long[]|时间序列|
|**unit**|String|数据序列的单位|
|**traffic**|Double[]|与时间序列对应的数据序列|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
