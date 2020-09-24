# createKey


## 描述
创建一个CMK（用户主密钥），默认为启用状态

## 请求方式
POST

## 请求地址
https://kms.jdcloud-api.com/v1/key:create


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**keyCfg**|[KeyCfg](createkey#keycfg)|True| | |

### <div id="keycfg">KeyCfg</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**keyDescCfg**|[KeyDescCfg](createkey#keydesccfg)|True| |密钥描述配置|
|**keyRotateCfg**|[KeyRotateCfg](createkey#keyrotatecfg)|True| |对称密钥的轮换配置；非对称密钥的操作，不支持该配置|
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
|**result**|[Result](createkey#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**keyId**|String|创建的密钥ID|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
