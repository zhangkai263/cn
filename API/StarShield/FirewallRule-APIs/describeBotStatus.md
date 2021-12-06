# describeBotStatus


## 描述
查询Bot开启状态

## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/bot/{zoneId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zoneId**|String|True| | |

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeBotStatus#result)| |
|**requestId**|String|请求id|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**zoneId**|String|zone id|
|**instanceId**|String|套餐实例id|
|**subscriptionType**|String|订阅类型|
|**subscriptionId**|String|订阅id|
|**switchStatus**|String|开关状态|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
