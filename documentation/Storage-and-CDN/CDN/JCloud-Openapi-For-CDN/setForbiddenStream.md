# setForbiddenStream


## 描述
设置禁播流

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/liveDomain/{domain}/stream:forbidden

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|True| |用户域名|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**streams**|String[]|False| |禁播流名|
|**app**|String|False| |封禁推流的app|
|**publishIps**|String[]|False| |禁播IP|
|**forbiddenType**|String|True| |禁播类型:forever永久，limit限时封禁，stop剔流|
|**ttl**|Long|False| |禁播时长单位s,当限时封禁时,必传|
|**startTime**|String|False| |禁播开始时间，UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z，与ttl同传的时候以ttl为准|
|**endTime**|String|False| |禁播结束时间，UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z，与ttl同传的时候以ttl为准|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Object| |
|**requestId**|String| |


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
