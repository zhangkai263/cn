# modifyInstanceSpec


## 描述
变更kafka实例的配置，实例为running状态才可变更配置


## 请求方式
POST

## 请求地址
https://kafka.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:modifyInstanceSpec

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |regionId|
|**instanceId**|String|True| |实例ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**instanceClassSpec**|[InstanceClassSpec[]](modifyinstancespec#instanceclassspec)|True| |变更的规格|

### <div id="instanceclassspec">InstanceClassSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**role**|String|True| |角色|
|**nodeClassCode**|String|False| |节点规格代码|
|**nodeCount**|Integer|False| |节点个数|
|**nodeDiskType**|String|False| |磁盘类型|
|**nodeDiskGB**|Integer|False| |单节点磁盘大小单位GB|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](modifyinstancespec#result)|结果|
|**requestId**|String|本次请求的ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**instanceId**|String|kafka实例编号|
|**buyId**|String|buyId|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|INVALID_ARGUMENT|
|**404**|NOT_FOUND|
