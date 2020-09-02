# createSecret


## 描述
创建机密

## 请求方式
POST

## 请求地址
https://kms.jdcloud-api.com/v1/secret:create


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**secretCfg**|[SecretCfg](createsecret#secretcfg)|True| | |

### <div id="secretcfg">SecretCfg</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**secretDescCfg**|[SecretDescCfg](createsecret#secretdesccfg)|True| |机密数据描述信息配置|
|**secretTimeCfg**|[SecretTimeCfg](createsecret#secrettimecfg)|True| |机密数据有效时间段配置|
|**secretData**|String|True| |secret内容|
### <div id="secrettimecfg">SecretTimeCfg</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**startTime**|String|True| |激活时间，默认为当前时间，采用ISO8601标准，格式为: YYYY-MM-DDTHH:mm:ssZ|
|**expireTime**|String|True| |到期时间，默认为永久不到期，采用ISO8601标准，格式为: YYYY-MM-DDTHH:mm:ssZ|
### <div id="secretdesccfg">SecretDescCfg</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**secretName**|String|True| |secret名称，默认为""|
|**secretDesc**|String|True| |secret描述，默认为""|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createsecret#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**secretId**|String|secretId|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
