# describeSecretVersionInfo


## 描述
获取指定机密版本的详细信息

## 请求方式
GET

## 请求地址
https://kms.jdcloud-api.com/v1/secret/{secretId}/version/{version}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**secretId**|String|True| |机密ID|
|**version**|String|True| |机密版本|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describesecretversioninfo#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**secretVersionItem**|[SecretVersionItem](describesecretversioninfo#secretversionitem)| |
### <div id="secretversionitem">SecretVersionItem</div>
|名称|类型|描述|
|---|---|---|
|**secretVersion**|String|版本标识|
|**secretStatus**|Integer|Secret当前状态: 0: 已启用、1: 已禁用|
|**startTime**|String|Secret激活时间，采用ISO8601标准，格式为: YYYY-MM-DDTHH:mm:ssZ|
|**expireTime**|String|到期时间，采用ISO8601标准，格式为: YYYY-MM-DDTHH:mm:ssZ|
|**secretData**|String|密钥的内容|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
