# deleteResourceRecords


## 描述
删除解析记录。批量删除时多个resourceRecordId用","分隔。批量删除每次最多不超过100个记录


## 请求方式
DELETE

## 请求地址
https://privatezone.jdcloud-api.com/v1/regions/{regionId}/zone/{zoneId}/resourceRecords/{resourceRecordId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|
|**zoneId**|String|True| |zone id|
|**resourceRecordId**|String|True| |解析记录ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|此次请求的ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
