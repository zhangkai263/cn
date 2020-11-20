# restartNode


## 描述
重启MongoDB分片集群节点，支持重启Mongos、Shard。

## 请求方式
POST

## 请求地址
https://mongodb.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/nodes/{nodeId}:restartNode

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**instanceId**|String|True| |Instance ID|
|**nodeId**|String|True| |Node ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](restartnode#result)| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**nodeId**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
