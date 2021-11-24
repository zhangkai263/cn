# retryRecurse


## 描述
解析失败后，尝试递归解析开关


## 请求方式
PUT

## 请求地址
https://privatezone.jdcloud-api.com/v1/regions/{regionId}/zone/{zoneId}:retryRecurse

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|
|**zoneId**|String|True| |zone id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**retryRecurse**|Boolean|True| |true->解析失败后尝试递归解析 false->解析失败后不进行递归解析|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|此次请求的ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
