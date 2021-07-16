# describeSecretVersionList


## 描述
获取机密详情

## 请求方式
GET

## 请求地址
https://kms.jdcloud-api.com/v1/secret/{secretId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**secretId**|String|True| |机密ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码；默认为1|
|**pageSize**|Integer|False|10|分页大小；默认为10；取值范围[10, 100]|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describesecretversionlist#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**secretDetail**|[SecretDetail](describesecretversionlist#secretdetail)| |
### <div id="secretdetail">SecretDetail</div>
|名称|类型|描述|
|---|---|---|
|**secretInfo**|[SecretInfo](describesecretversionlist#secretinfo)|密钥的基本信息|
|**secretVersionCount**|Integer|Secret版本的个数|
|**secretVersionList**|[SecretVersionItem[]](describesecretversionlist#secretversionitem)|Secret版本详情的列表|
### <div id="secretversionitem">SecretVersionItem</div>
|名称|类型|描述|
|---|---|---|
|**secretVersion**|String|版本标识|
|**secretStatus**|Integer|Secret当前状态: 0: 已启用、1: 已禁用|
|**startTime**|String|Secret激活时间，采用ISO8601标准，格式为: YYYY-MM-DDTHH:mm:ssZ|
|**expireTime**|String|到期时间，采用ISO8601标准，格式为: YYYY-MM-DDTHH:mm:ssZ|
|**secretData**|String|密钥的内容|
### <div id="secretinfo">SecretInfo</div>
|名称|类型|描述|
|---|---|---|
|**secretId**|String|SecretID|
|**secretName**|String|Secret名称|
|**secretDesc**|String|Secret用途描述|
|**secretStatus**|Integer|Secret当前状态: 0: 已启用、1: 已禁用|
|**createTime**|String|Secret创建时间，采用ISO8601标准，格式为: YYYY-MM-DDTHH:mm:ssZ|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|Not found|
