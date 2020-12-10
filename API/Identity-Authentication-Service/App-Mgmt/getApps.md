# getApps


## 描述
获取账户下的所有应用

## 请求方式
GET

## 请求地址
https://ias.jdcloud-api.com/v1/regions/{regionId}/app/list

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域编码，参考OpenAPI公共说明|

## 请求参数
无

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String| |
|**result**|Result|返回结果|

### Result
|名称|类型|描述|
|---|---|---|
|**apps**|ApplicationRes[]|应用数据|

### ApplicationRes
|名称|类型|描述|
|---|---|---|
|**account**|String|创建应用的账户用户名|
|**clientId**|String|应用ID|
|**clientName**|String|clientName|
|**redirectUris**|String|redirectUris|
|**tokenEndpointAuthMethod**|String|tokenEndpointAuthMethod|
|**grantTypes**|String|grantTypes|
|**accessTokenValiditySeconds**|Integer|accessTokenValiditySeconds|
|**refreshTokenValiditySeconds**|Integer|refreshTokenValiditySeconds|
|**multiTenant**|Boolean|multiTenant|
|**userType**|String|userType|
|**scope**|String|scope|
|**secretUpdateTime**|Integer|secret更新时间戳|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
|**500**|Internal server error|
|**503**|Service unavailable|
