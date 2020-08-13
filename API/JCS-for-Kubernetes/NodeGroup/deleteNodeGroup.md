# deleteNodeGroup


## 描述
集群摘除工作节点组并删除工作节点组

## 请求方式
DELETE

## 请求地址
https://kubernetes.jdcloud-api.com/v1/regions/{regionId}/nodeGroups/{nodeGroupId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 ID|
|**nodeGroupId**|String|True| |工作节点组 ID|

## 请求参数
无


## 返回参数
无


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
