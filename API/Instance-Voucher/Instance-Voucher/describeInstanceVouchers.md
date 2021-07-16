# describeInstanceVouchers


## 描述
批量查询实例抵扣券的详细信息<br>
此接口支持分页查询，默认每页20条。


## 请求方式
GET

## 请求地址
https://instancevoucher.jdcloud-api.com/v1/regions/{regionId}/instanceVouchers

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False| |页码；默认为1|
|**pageSize**|Integer|False| |分页大小；默认为20；取值范围[10, 100]|
|**filters**|[Filter[]](describeinstancevouchers#filter)|False| |Filter names: (仅支持eq)<br>instanceVoucherId - 实例ID，精确匹配，支持多个<br>name - 实例名称，模糊匹配，支持多个<br>resourceType - 产品类型，精确匹配，支持多个 支持[vm nativecontainer pod]<br>reservedType - 资源分配方式，精确匹配，支持多个 支持[nonReserved]<br>status - 实例抵扣券状态，精确匹配，支持多个<br>instanceTypeFamily - 实例规格族，精确匹配，支持多个（适用于非预留型）<br>|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeinstancevouchers#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**instanceVouchers**|[InstanceVoucher[]](describeinstancevouchers#instancevoucher)| |
|**totalCount**|Integer| |
### <div id="instancevoucher">InstanceVoucher</div>
|名称|类型|描述|
|---|---|---|
|**instanceVoucherId**|String|实例抵扣券 ID|
|**name**|String|实例抵扣券名称|
|**description**|String|描述|
|**resourceType**|String|产品类型|
|**reservedType**|String|资源分配方式|
|**nonReservedVoucher**|[NonReservedVoucher](describeinstancevouchers#nonreservedvoucher)|非资源预留型实例抵扣券参数|
|**status**|String|实例抵扣券状态 pending, active, expired, deleting|
|**createdTime**|String|创建时间|
|**charge**|[Charge](describeinstancevouchers#charge)|计费配置信息|
### <div id="charge">Charge</div>
|名称|类型|描述|
|---|---|---|
|**chargeStatus**|String|费用支付状态|
|**chargeStartTime**|String|计费开始时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|
|**chargeExpiredTime**|String|过期时间，预付费资源的到期时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|
### <div id="nonreservedvoucher">NonReservedVoucher</div>
|名称|类型|描述|
|---|---|---|
|**instanceTypeFamily**|String|实例规格族|
|**unitCount**|Integer|cpu 核数 / gpu 卡数|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
