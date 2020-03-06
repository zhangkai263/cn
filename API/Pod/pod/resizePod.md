# resizePod


## 描述
调整pod实例类型配置。
- pod phase 需是停止状态；
- 支持升配、降配；**不支持原有规格**
- 计费类型不变
    - 包年包月：需要计算配置差价，如果所选配置价格高，需要补齐到期前的差价，到期时间不变；如果所选配置价格低，需要延长到期时间
    - 按配置：按照所选规格，进行计费
- 支持对 pod 中的容器进行资源限制、资源需求的调整
    - 容器需求的总资源占用不得超过 pod 的实例类型
    - 容器资源限制不得超过 pod 的实例类型


## 请求方式
POST

## 请求地址
https://pod.jdcloud-api.com/v1/regions/{regionId}/pods/{podId}:resize

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**podId**|String|True| |Pod ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**instanceType**|String|True| |新实例类型，不可与原实例类型相同|
|**containerResources**|[ContainerResourceSpec[]](resizepod#containerresourcespec)|False| |新实例类型，不可与原实例类型相同|

### <div id="containerresourcespec">ContainerResourceSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |容器名称|
|**resources**|[ResourceRequestsSpec](resizepod#resourcerequestsspec)|True| |容器计算资源配置|
### <div id="resourcerequestsspec">ResourceRequestsSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**requests**|[RequestSpec](resizepod#requestspec)|False| |容器必需的计算资源|
|**limits**|[RequestSpec](resizepod#requestspec)|False| |容器使用计算资源上限|
### <div id="requestspec">RequestSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**cpu**|String|False| |容器必需的计算资源，例：300m，1000m|
|**memoryMB**|String|False| |容器使用计算资源上限，例：1024Mi，16384Mi|

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
