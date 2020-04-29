# setNodeGroupCA


## 描述
设置工作节点组自动扩容

## 请求方式
POST

## 请求地址
https://kubernetes.jdcloud-api.com/v1/regions/{regionId}/nodeGroups/{nodeGroupId}:setNodeGroupCA

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 ID|
|**nodeGroupId**|String|True| |工作节点组 ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**caConfig**|[CAConfigSpec](setnodegroupca#caconfigspec)|True| |自动伸缩配置，其中 enable 必须指定|

### <div id="caconfigspec">CAConfigSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**enable**|Boolean|False| |是否启用自动伸缩，默认为 false<br>|
|**maxNode**|Integer|False| |自动扩容最大工作节点数, 取值范围[1, min(2000, 子网剩余ip)]|
|**minNode**|Integer|False| |自动扩容最小工作节点数, 取值范围[0, min(2000, maxNode)]|

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
