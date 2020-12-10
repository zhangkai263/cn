# describeKey


## 描述
获取密钥详情

## 请求方式
GET

## 请求地址
https://kms.jdcloud-api.com/v1/key/{keyId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**keyId**|String|True| |密钥ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describekey#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**keyInfo**|[KeyInfo](describekey#keyinfo)| |
### <div id="keyinfo">KeyInfo</div>
|名称|类型|描述|
|---|---|---|
|**keyId**|String|KeyID|
|**keyName**|String|Key名称|
|**keyStatus**|Integer|Key当前状态: 0:已启用、1:已禁用、2:计划删除|
|**createTime**|String|Key创建时间，采用ISO8601标准，格式为: YYYY-MM-DDTHH:mm:ssZ|
|**keyDesc**|String|Key的用途|
|**rotationCycle**|Integer|Key的轮换周期，为0则永久不轮换|
|**deleteTime**|String|计划删除的时间，采用ISO8601标准，格式为: YYYY-MM-DDTHH:mm:ssZ|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|Not found|
