# createResourceRecord


## 描述
创建解析记录


## 请求方式
POST

## 请求地址
https://privatezone.jdcloud-api.com/v1/regions/{regionId}/zone/{zoneId}/resourceRecords

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|
|**zoneId**|String|True| |zone id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**hostRecord**|String|False| |主机记录|
|**hostValue**|String|True| |主机记录值|
|**recordType**|String|True| |解析类型，目前支持类型 A AAAA CNAME TXT CAA SRV MX PTR|
|**ttl**|Integer|False| |TTL值|
|**priority**|Integer|False| |优先级，只存在于MX, SRV解析记录类型|
|**port**|Integer|False| |端口，只存在于SRV解析记录类型|
|**weight**|Integer|False| |解析记录的权重，目前支持权重的有：A/AAAA/CNAME，A/AAAA权重范围0-100，CNAME权重范围1-100。|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|此次请求的ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
