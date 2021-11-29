# exportResourceRecords


## 描述
导出当前zone下所有解析记录，返回的数据是可以转换为csv文件格式的字符串


## 请求方式
GET

## 请求地址
https://privatezone.jdcloud-api.com/v1/regions/{regionId}/zone/{zoneId}/resourceRecords:export

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|
|**zoneId**|String|True| |zone id|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result[]](#result)| |
|**requestId**|String|此次请求的ID|

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|String|导出数据结果，此结果是可以存储为csv文件格式的字符串|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
