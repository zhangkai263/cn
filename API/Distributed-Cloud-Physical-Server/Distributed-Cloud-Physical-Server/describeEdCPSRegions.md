# describeEdCPSRegions


## 描述
查询分布式分布式云物理服务器地域列表

## 请求方式
GET

## 请求地址
https://edcps.jdcloud-api.com/v1/edgeRegions


## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeedcpsregions#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**regions**|[Region[]](describeedcpsregions#region)| |
### <div id="region">Region</div>
|名称|类型|描述|
|---|---|---|
|**region**|String|地域代码, 如 cn-east-tz1|
|**regionName**|String|地域名称，如 华东-台州|
|**azs**|[Az[]](describeedcpsregions#az)|可用区列表|
### <div id="az">Az</div>
|名称|类型|描述|
|---|---|---|
|**region**|String|地域代码，如 cn-east-tz1|
|**az**|String|可用区代码，如 cn-east-tz1a|
|**azName**|String|可用区名称|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Bad request|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
