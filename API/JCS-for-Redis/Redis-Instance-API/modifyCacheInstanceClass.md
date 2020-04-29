# modifyCacheInstanceClass


## 描述
变更缓存Redis实例规格（变配），实例运行时可以变配，新规格不能与之前的老规格相同，新规格内存大小不能小于实例的已使用内存


## 请求方式
POST

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/cacheInstance/{cacheInstanceId}:modifyCacheInstanceClass

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|
|**cacheInstanceId**|String|True| |缓存Redis实例ID，是访问实例的唯一标识|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**cacheInstanceClass**|String|True| |新规格|
|**shardNumber**|Integer|False| |自定义分片数，只对自定义分片规格实例有效|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](modifycacheinstanceclass#result)|结果|
|**requestId**|String|本次请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**orderNum**|String|订单编号|
|**buyId**|String|购买ID|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
