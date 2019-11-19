# appDetail


## 描述
运营后台获取应用详情

## 请求方式
GET

## 请求地址
https://ias.jdcloud-api.com/v1/regions/{regionId}/operate_backend/app/{clientId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**clientId**|String|True| | |
|**regionId**|String|True| | |

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String| |
|**result**|Result| |

### Result
|名称|类型|描述|
|---|---|---|
|**accessTokenValiditySeconds**|Integer|accessTokenValiditySeconds|
|**account**|String|account|
|**clientId**|String|应用|
|**clientName**|String|应用名|
|**clientUri**|String|clientUri|
|**contacts**|String|contacts|
|**createTime**|Long|createTime|
|**extension**|String|extension|
|**grantTypes**|String|grantTypes|
|**jwks**|String|jwks|
|**jwksUri**|String|jwksUri|
|**logoUri**|String|logoUri|
|**multiTenant**|Boolean|multiTenant|
|**policyUri**|String|policyUri|
|**redirectUris**|String|redirectUris|
|**refreshTokenValiditySeconds**|Integer|refreshTokenValiditySeconds|
|**responseTypes**|String|responseTypes|
|**scope**|String|scope|
|**secretUpdateTime**|Long|secretUpdateTime|
|**state**|String|state|
|**tokenEndpointAuthMethod**|String|tokenEndpointAuthMethod|
|**tosUri**|String|tosUri|
|**updateTime**|Long|updateTime|
|**userType**|String|userType|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
