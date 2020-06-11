# updateCertName


## 描述
修改证书名称

## 请求方式
POST

## 请求地址
https://ssl.jdcloud-api.com/v1/sslCert:updateName


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**certId**|String|True| |证书Id|
|**certName**|String|True| |证书名称|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Result| |
|**requestId**|String|请求的标识Id|

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**code**|Integer|状态码|
|**message**|String|消息|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
