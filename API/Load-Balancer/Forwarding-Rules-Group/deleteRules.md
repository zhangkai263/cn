# deleteRules


## 描述
删除转发规则

## 请求方式
POST

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/urlMaps/{urlMapId}:deleteRules

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**urlMapId**|String|True| |转发规则组Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**ruleIds**|String[]|True| |rule Id列表|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|Successful operation|
|**404**|Resource not found|
|**400**|Request parameter x.y.z is 'xxx', expected one of [yyy,zzz]|
