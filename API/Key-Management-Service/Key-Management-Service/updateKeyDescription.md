# updateKeyDescription


## 描述
-   修改对称密钥配置，包括key的名称、用途、是否自动轮换和轮换周期等;
-   修改非对称密钥配置，包括key的名称、用途等。


## 请求方式
PATCH

## 请求地址
https://kms.jdcloud-api.com/v1/key/{keyId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**keyId**|String|True| |密钥ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**keyCfg**|[KeyCfg](updatekeydescription#keycfg)|True| | |

### <div id="keycfg">KeyCfg</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**keyDescCfg**|[KeyDescCfg](updatekeydescription#keydesccfg)|True| |密钥描述配置|
|**keyRotateCfg**|[KeyRotateCfg](updatekeydescription#keyrotatecfg)|True| |对称密钥的轮换配置；非对称密钥的操作，不支持该配置|
### <div id="keyrotatecfg">KeyRotateCfg</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**autoRotate**|Boolean|True| |是否自动轮换，默认为false|
|**rotationCycle**|Integer|True| |自动轮换周期，单位为（天），默认为0（永不轮换）|
### <div id="keydesccfg">KeyDescCfg</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**keyName**|String|True| |key名称，默认为""|
|**keyDesc**|String|True| |key描述，默认为""|
|**keyType**|Integer|False| |密钥类型： 1: rsa-2048, 0: aes-256，default: aes-256|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|Not found|
