# upgradeCluster


## 描述
触发升级

## 请求方式
POST

## 请求地址
https://kubernetes.jdcloud-api.com/v1/regions/{regionId}/clusters/{clusterId}:upgradeCluster

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 ID|
|**clusterId**|String|True| |集群 ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**scope**|String|True| |升级范围|
|**nodeGroupIds**|String[]|False| |节点组 id|
|**version**|String|True| |指定升级到的版本|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String| |


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**429**|Quota exceeded|
|**500**|Internal server error|
|**503**|Service unavailable|
