# getApp


## 描述
获取应用

## 请求方式
GET

## 请求地址
https://ias.jdcloud-api.com/v1/regions/{regionId}/app/{clientId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**clientId**|String|True| |应用ID，应用创建时由京东云分配的16位数字ID|
|**regionId**|String|True| |地域编码，参考OpenAPI公共说明|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String| |
|**result**|Result|获取应用返回结果|

### Result
|名称|类型|描述|
|---|---|---|
|**accessTokenValiditySeconds**|Integer|访问令牌有效期|
|**account**|String|创建应用的账户用户名|
|**clientId**|String|应用ID，由京东云分配的16位数字ID|
|**clientName**|String|应用名|
|**clientUri**|String|应用介绍地址|
|**contacts**|String|应用联系信息|
|**createTime**|Long|应用创建时间|
|**extension**|String|应用扩展信息|
|**grantTypes**|String|支持的OAuth类型|
|**jwks**|String|JWKS|
|**jwksUri**|String|JWKS地址|
|**logoUri**|String|应用logo地址|
|**multiTenant**|Boolean|是否为多租户应用|
|**policyUri**|String|应用隐私条款地址|
|**redirectUris**|String|回调地址|
|**refreshTokenValiditySeconds**|Integer|刷新令牌有效期|
|**responseTypes**|String|当grantTypes为authorization_code时，responseTypes为code；当grantTypes为implicit时，responseTypes为token|
|**scope**|String|OAuth scope授权范围|
|**secretUpdateTime**|Long|应用密码更新时间|
|**tokenEndpointAuthMethod**|String|客户端认证方式|
|**tosUri**|String|应用服务协议地址|
|**updateTime**|Long|应用更新时间|
|**userType**|String|允许登录应用的账号类型|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
