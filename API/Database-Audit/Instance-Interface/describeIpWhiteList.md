# describeIpWhiteList


## 描述
获取此实例的所有IP白名单列表

## 请求方式
GET

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/instances/{insId}/ipwhitelist

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|
|**insId**|String|True| |审计实例ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeipwhitelist#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**ipWhileList**|String[]|IP白名单记录列表|
|**totalCount**|Integer|IP白名单记录的数量|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
