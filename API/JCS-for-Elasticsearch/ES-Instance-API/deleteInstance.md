# deleteInstance


## 描述
删除按配置计费或包年包月已到期的es实例，包年包月未到期不可删除。
状态为创建中和变配中的不可删除。


## 请求方式
DELETE

## 请求地址
https://es.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |regionId|
|**instanceId**|String|True| |实例ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|本次请求的ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|FAILED_PRECONDITION|
|**404**|NOT_FOUND|
