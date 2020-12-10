# modifyNodeSpec


## 描述
变更分片集群的节点规格，支持Mognos、Shard节点。

## 请求方式
POST

## 请求地址
https://mongodb.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/nodes/{nodeId}:modifyNodeSpec

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**instanceId**|String|True| |Instance ID|
|**nodeId**|String|True| |Node ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**nodeType**|String|True| |Shard节点或Mongos节点的规格，不允许小于当前规格。|
|**nodeStorageGB**|Integer|False| |Shard存储空间，当前节点为Shard时可用，不允许小于当前规格。|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](modifynodespec#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**nodeId**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
