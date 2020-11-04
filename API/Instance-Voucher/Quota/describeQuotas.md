# describeQuotas


## 描述
查询配额


## 请求方式
GET

## 请求地址
https://instancevoucher.jdcloud-api.com/v1/regions/{regionId}/quotas

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**filters**|[Filter[]](describequotas#filter)|False| |Filter names: (仅支持eq)<br>resourceType - 产品类型，精确匹配，支持多个 支持[vm, nativecontainer, pod]<br>reservedType - 资源分配方式，精确匹配，支持多个 支持[nonReserved]<br>|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describequotas#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**quotas**|[Quota[]](describequotas#quota)| |
### <div id="quota">Quota</div>
|名称|类型|描述|
|---|---|---|
|**resourceType**|String|产品类型|
|**reservedType**|String|资源分配方式|
|**cpuLimit**|Integer|cpu 核数上限|
|**cpuUsed**|Integer|cpu 已使用核数|
|**gpuLimit**|Integer|gpu 卡数上限|
|**gpuUsed**|Integer|gpu 已使用卡数|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
