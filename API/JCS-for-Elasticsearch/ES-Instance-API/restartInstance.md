# restartInstance


## 描述
重启实例接口，提供强制重启与滚动重启，两种重启方式

## 请求方式
POST

## 请求地址
https://es.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:restartInstance

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |regionId|
|**instanceId**|String|True| |实例ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**restartType**|String|True| |重启类型，有两种，强制重启：same_time，滚动重启：one_by_one|
|**applyNode**|String|True| |重启节点类型，重启所有节点：all，重启master节点：master，重启node节点：node，重启协调节点：coordinating，具体某一个节点：例如node-2，master-0，coordinating-1|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|本次请求的ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|INVALID_ARGUMENT|
|**404**|NOT_FOUND|
|**500**|INTERNAL|
