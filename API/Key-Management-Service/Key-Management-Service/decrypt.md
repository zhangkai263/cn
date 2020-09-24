# decrypt


## 描述
使用密钥对数据进行解密，针对非对称密钥：使用私钥进行加密

## 请求方式
POST

## 请求地址
https://kms.jdcloud-api.com/v1/key/{keyId}:Decrypt

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**keyId**|String|True| |密钥ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**ciphertextBlob**|String|False| |密文数据 Base64-encoded binary data object|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](decrypt#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**plaintext**|String|明文数据 Base64-encoded binary data object|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|Not found|
