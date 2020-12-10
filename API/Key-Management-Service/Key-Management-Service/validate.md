# validate


## 描述
使用非对称密钥的公钥验证签名

## 请求方式
POST

## 请求地址
https://kms.jdcloud-api.com/v1/key/{keyId}:Validate

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**keyId**|String|True| |密钥ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**plaintext**|String|False| |需要签名的数据 Base64-encoded binary data object|
|**signature**|String|False| |签名|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](validate#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**validated**|Boolean|校验签名结果，true为成功，false为失败|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
