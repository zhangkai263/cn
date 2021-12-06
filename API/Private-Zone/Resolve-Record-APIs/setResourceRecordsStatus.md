# setResourceRecordsStatus


## 描述
设置解析记录状态，STOP操作会将停止该记录的解析，直到再次START。批量设置时多个resourceRecordId用","分隔。批量设置时每次最多不超过100个记录


## 请求方式
PUT

## 请求地址
https://privatezone.jdcloud-api.com/v1/regions/{regionId}/zone/{zoneId}/resourceRecords/{resourceRecordId}/status

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|
|**zoneId**|String|True| |zone id|
|**resourceRecordId**|String|True| |解析记录ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**status**|String|True| |解析记录状态 START->正常解析 STOP->停止解析|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|此次请求的ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
