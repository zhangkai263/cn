# setRefer


## 描述
设置域名refer

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/domain/{domain}/refer

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|True| |用户域名|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**referType**|String|True| |refer类型，取值：block（黑名单），allow（白名单）默认为block|
|**referList**|String[]|True| |逗号隔开的域名列表，中国境内加速域名至多可配置400条，中国境外/全球加速域名至多可配置50条|
|**allowNoReferHeader**|String|True| |是否允许空refer访问，默认为“on”|
|**allowNullReferHeader**|String|True| |是否允许无refer访问，默认为“on”|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Object| |
|**requestId**|String| |


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
