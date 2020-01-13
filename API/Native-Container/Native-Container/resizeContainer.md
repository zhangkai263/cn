# resizeContainer


## 描述
调整原生容器实例类型配置。
- 原生容器状态为停止;
- 支持升配、降配；**不支持原有规格**
- 计费类型不变
    - 包年包月：需要计算配置差价，如果所选配置价格高，需要补齐到期前的差价，到期时间不变；如果所选配置价格低，需要延长到期时间
    - 按配置：按照所选规格，进行计费


## 请求方式
POST

## 请求地址
https://nativecontainer.jdcloud-api.com/v1/regions/{regionId}/containers/{containerId}:resize

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**containerId**|String|True| |Container ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**instanceType**|String|True| |新实例类型，不可与原实例类型相同|


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
|**500**|Internal server error|
|**503**|Service unavailable|
