# describeInstanceVoucher


## 描述
查询实例抵扣券的详细信息


## 请求方式
GET

## 请求地址
https://instancevoucher.jdcloud-api.com/v1/regions/{regionId}/instanceVouchers/{instanceVoucherId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 ID|
|**instanceVoucherId**|String|True| |实例抵扣券 ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeinstancevoucher#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**instanceVoucher**|[InstanceVoucher](describeinstancevoucher#instancevoucher)| |
### <div id="instancevoucher">InstanceVoucher</div>
|名称|类型|描述|
|---|---|---|
|**instanceVoucherId**|String|实例抵扣券 ID|
|**name**|String|实例抵扣券名称|
|**description**|String|描述|
|**resourceType**|String|产品类型|
|**reservedType**|String|资源分配方式|
|**nonReservedVoucher**|[NonReservedVoucher](describeinstancevoucher#nonreservedvoucher)|非资源预留型实例抵扣券参数|
|**status**|String|实例抵扣券状态 pending, active, expired, deleting|
|**createdTime**|String|创建时间|
|**charge**|[Charge](describeinstancevoucher#charge)|计费配置信息|
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
