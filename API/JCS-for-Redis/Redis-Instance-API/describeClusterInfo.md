# describeClusterInfo


## 描述
查询Redis实例的集群内部信息

## 请求方式
GET

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/cacheInstance/{cacheInstanceId}/clusterInfo

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|
|**cacheInstanceId**|String|True| |缓存Redis实例ID，是访问实例的唯一标识|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeclusterinfo#result)|结果|
|**requestId**|String|本次请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**info**|[ClusterInfo](describeclusterinfo#clusterinfo)|集群内部信息|
### <div id="clusterinfo">ClusterInfo</div>
|名称|类型|描述|
|---|---|---|
|**proxies**|[Proxy[]](describeclusterinfo#proxy)|proxy列表|
|**shards**|[Shard[]](describeclusterinfo#shard)|shard列表|
### <div id="shard">Shard</div>
|名称|类型|描述|
|---|---|---|
|**id**|String| |
### <div id="proxy">Proxy</div>
|名称|类型|描述|
|---|---|---|
|**id**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
