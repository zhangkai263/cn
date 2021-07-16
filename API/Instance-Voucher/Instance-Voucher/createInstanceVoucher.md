# createInstanceVoucher


## 描述
创建实例抵扣券


## 请求方式
POST

## 请求地址
https://instancevoucher.jdcloud-api.com/v1/regions/{regionId}/instanceVouchers

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**instanceVoucherSpec**|[InstanceVoucherSpec](createinstancevoucher#instancevoucherspec)|True| |创建实例抵扣券规格|
|**clientToken**|String|False| |保证请求幂等性|

### <div id="instancevoucherspec">InstanceVoucherSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |实例抵扣券名称，支持中文、数字、大小写字母及英文下划线“_”及中划线“-”，不超过32个字符|
|**description**|String|False| |描述，不超过256个字符|
|**resourceType**|String|True| |产品类型 支持[vm, nativecontainer, pod]|
|**reservedType**|String|True| |资源分配方式 支持[nonReserved]|
|**nonReservedVoucherSpec**|[NonReservedVoucherSpec](createinstancevoucher#nonreservedvoucherspec)|False| |非资源预留型实例抵扣券参数，reservedType 为 nonReserved 时生效|
|**charge**|[ChargeSpec](createinstancevoucher#chargespec)|True| |计费模式|
### <div id="chargespec">ChargeSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**chargeUnit**|String|True| |计费单位，取值为：month、year，默认为month|
|**chargeDuration**|Integer|True| |计费时长。当chargeUnit为month时取值为：1 ~ 9，当chargeUnit为year时取值为：1、2、3|
|**autoRenew**|Boolean|False| |True=：OPEN——开通自动续费、False=CLOSE—— 不开通自动续费，默认为CLOSE|
### <div id="nonreservedvoucherspec">NonReservedVoucherSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**instanceTypeFamily**|String|True| |实例规格族|
|**unitCount**|Integer|True| |cpu 核数 / gpu 卡数|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createinstancevoucher#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**instanceVoucherId**|String|实例抵扣券 ID|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**429**|Quota exceeded|
|**500**|Internal server error|
|**503**|Service unavailable|
