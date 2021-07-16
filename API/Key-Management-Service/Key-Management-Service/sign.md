# sign


## 描述
使用非对称密钥的私钥签名,签名算法仅支持RSA_PKCS1_PADDING填充方式,最大签名数据长度为4K字节

## 请求方式
POST

## 请求地址
https://kms.jdcloud-api.com/v1/key/{keyId}:Sign

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**keyId**|String|True| |密钥ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**plaintext**|String|False| |需要签名的数据 Base64-encoded binary data object|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](sign#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**signature**|String|签名|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
