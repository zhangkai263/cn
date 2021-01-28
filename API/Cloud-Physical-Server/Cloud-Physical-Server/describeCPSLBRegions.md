# describeCPSLBRegions


## 描述
查询负载均衡地域列表

## 请求方式
GET

## 请求地址
https://cps.jdcloud-api.com/v1/cpslbRegions


## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describecpslbregions#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**regions**|[Region[]](describecpslbregions#region)| |
### <div id="region">Region</div>
|名称|类型|描述|
|---|---|---|
|**region**|String|地域代码, 如 cn-north-1|
|**regionName**|String|地域名称，如华北-北京|
|**azs**|[Az[]](describecpslbregions#az)|可用区列表|
### <div id="az">Az</div>
|名称|类型|描述|
|---|---|---|
|**region**|String|地域代码，如 cn-east-1|
|**az**|String|可用区代码，如 cn-east-1a|
|**azName**|String|可用区名称|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Bad request|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
