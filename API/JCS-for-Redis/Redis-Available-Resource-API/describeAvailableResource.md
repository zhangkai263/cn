# describeAvailableResource


## 描述
查询支持的规格列表

## 请求方式
GET

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/availableResource

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeavailableresource#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**availableResources**|[AvailableResource[]](describeavailableresource#availableresource)|支持的规格列表|
### <div id="availableresource">AvailableResource</div>
|名称|类型|描述|
|---|---|---|
|**architectureType**|String|架构类型，目前支持：master-slave（标准版）、cluster（基于代理的集群版）|
|**architectureName**|String|架构类型名|
|**recommended**|Boolean|是否推荐|
|**soldOut**|Boolean|是否售罄|
|**availableEngineVersions**|[AvailableEngineVersion[]](describeavailableresource#availableengineversion)|引擎版本列表|
### <div id="availableengineversion">AvailableEngineVersion</div>
|名称|类型|描述|
|---|---|---|
|**version**|String|redis引擎主从版本号，目前支持：2.8、4.0|
|**recommended**|Boolean|是否推荐|
|**soldOut**|Boolean|是否售罄|
|**availableMemorySpecs**|[AvailableMemorySpec[]](describeavailableresource#availablememoryspec)|售卖内存规格列表|
### <div id="availablememoryspec">AvailableMemorySpec</div>
|名称|类型|描述|
|---|---|---|
|**memoryGB**|Integer|售卖内存（GB）|
|**soldOut**|Boolean|是否售罄|
|**availableZones**|[AzInfo[]](describeavailableresource#azinfo)|可用区列表|
|**availableFlavors**|[AvailableFlavor[]](describeavailableresource#availableflavor)|规格列表|
### <div id="availableflavor">AvailableFlavor</div>
|名称|类型|描述|
|---|---|---|
|**shardNumber**|Integer|分片数|
|**ipNumber**|Integer|IP数|
|**recommended**|Boolean|是否推荐|
|**instanceClasses**|String[]|规格代码，标准版为实例的规格代码；集群版为单分片规格代码|
|**detail**|[FlavorDetail](describeavailableresource#flavordetail)|规格详情|
### <div id="flavordetail">FlavorDetail</div>
|名称|类型|描述|
|---|---|---|
|**cpu**|Integer|该规格的CPU核数|
|**diskGB**|Integer|该规格的磁盘大小（GB)|
|**maxConnection**|Integer|该规格的最大连接数|
|**bandwidthMbps**|Integer|该规格的带宽（Mbps)|
### <div id="azinfo">AzInfo</div>
|名称|类型|描述|
|---|---|---|
|**azId**|String|逻辑可用区id|
|**azName**|String|逻辑可用区名|
|**soldOut**|Boolean|是否售罄|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
