# getPublicKey


## 描述
获取非对称密钥的公钥

## 请求方式
GET

## 请求地址
https://kms.jdcloud-api.com/v1/key/{keyId}:GetPublicKey

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**keyId**|String|True| |密钥ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](getpublickey#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**publicKeyBlob**|String|公钥，PEM格式|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
