# modifyInstanceSpec


## 描述
变更es实例的配置，实例为running状态才可变更配置，每次只能变更一种且不可与原来的相同。
实例配置（cpu核数、内存、磁盘容量、节点数量）目前只允许变大


## 请求方式
POST

## 请求地址
https://es.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:modifyInstanceSpec

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |regionId|
|**instanceId**|String|True| |实例ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**nodeClass**|String|False| |data节点规格|
|**nodeDiskGB**|Integer|False| |data节点磁盘|
|**nodeCount**|Integer|False| |data节点数|
|**masterClass**|String|False| |master节点规格|
|**coordinatingClass**|String|False| |coordinating节点规格|
|**coordinatingCount**|Integer|False| |coordinating节点数|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](modifyinstancespec#result)|结果|
|**requestId**|String|本次请求的ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**orderNum**|String|订单编号|
|**instanceId**|String|es实例编号|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|INVALID_ARGUMENT|
|**404**|NOT_FOUND|
