# deleteAccessUserlog


## 描述
删除日志数据

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/accessUserlog:delete


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|True| |日志上传域名，如：www.a.com|
|**interval**|String|True| |日志粒度：fiveMin(五分钟粒度),hour(一小时粒度),day(一天粒度)|
|**logType**|String|True| |日志类型：gz,log,zip|
|**startTime**|String|True| |日志开始时间，格式：yyyy-MM-dd HH:ss，如：2019-04-12 00:00|
|**endTime**|String|True| |日志结束时间，格式：yyyy-MM-dd HH:ss 如：2019-04-12 00:05|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Object| |
|**requestId**|String| |


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
