# deleteNodeInstances


## 描述
从工作节点组中删除指定实例

## 请求方式
POST

## 请求地址
https://kubernetes.jdcloud-api.com/v1/regions/{regionId}/nodeGroups/{nodeGroupId}:deleteNodeInstances

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 ID|
|**nodeGroupId**|String|True| |工作节点组 ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**instanceIds**|String[]|True| |需要从工作节点组中删除的实例<br>- 不可将一个集群中的实例全部删除<br>|


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
