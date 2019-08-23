# setAddons


## 描述
设置集群组件

## 请求方式
POST

## 请求地址
https://kubernetes.jdcloud-api.com/v1/regions/{regionId}/clusters/{clusterId}:setAddons

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 ID|
|**clusterId**|String|True| |集群 ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**addonsConfig**|AddonConfigSpec[]|True| |需要设置的集群组件配置|

### AddonConfigSpec
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |组件名称，目前支持customMetrics、logging|
|**enabled**|Boolean|False| |是否开启该组件，默认为false。|

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
