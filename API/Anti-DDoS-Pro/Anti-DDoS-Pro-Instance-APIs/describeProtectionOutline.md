# describeProtectionOutline


## 描述
查询高防实例防护概要

## 请求方式
GET

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/describeProtectionOutline

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeprotectionoutline#result)| |
|**requestId**|String| |
|**error**|[Error](describeprotectionoutline#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](describeprotectionoutline#err)| |
### <div id="err">Err</div>
|名称|类型|描述|
|---|---|---|
|**code**|Long|同http code|
|**details**|Object| |
|**message**|String| |
|**status**|String|具体错误|
### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[ProtectionOutline](describeprotectionoutline#protectionoutline)| |
### <div id="protectionoutline">ProtectionOutline</div>
|名称|类型|描述|
|---|---|---|
|**instancesCount**|Integer|实例数量|
|**protectedCount**|Integer|已防护实例数量|
|**protectedDay**|Integer|已防护天数|
|**weekAttackCount**|Integer|7 日攻击次数|
|**weekAttackPeak**|Double|7 日攻击流量峰值|
|**weekAttackUnit**|String|7 日攻击流量单位|
|**monthAttackCount**|Integer|30 日攻击次数|
|**monthAttackPeak**|Double|30 日攻击流量峰值|
|**monthAttackUnit**|String|30 日攻击流量单位|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
|**500**|INTERNAL_SERVER_ERROR|
