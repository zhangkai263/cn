# modifyInstanceVoucherAttribute


## 描述
修改实例抵扣券的 名称 和 描述。<br>
name 和 description 必须要指定一个


## 请求方式
PATCH

## 请求地址
https://instancevoucher.jdcloud-api.com/v1/regions/{regionId}/instanceVouchers/{instanceVoucherId}:modifyInstanceVoucherAttribute

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 ID|
|**instanceVoucherId**|String|True| |实例抵扣券 ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|False| |实例抵扣券名称|
|**description**|String|False| |实例抵扣券描述|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String| |


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
