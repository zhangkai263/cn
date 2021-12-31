# describeDedicatedHostType


## 描述
查询专有宿主机机型。


## 请求方式
GET

## 请求地址
https://dh.jdcloud-api.com/v1/regions/{regionId}/dedicatedHostType

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**filters**|[Filter[]](#filter)|False| |dedicatedHostType - 专有宿主机机型，精确匹配，支持多个<br>az - 可用区，精确匹配，支持多个<br>|

### <div id="Filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**dedicatedHostTypes**|[HostType[]](#hosttype)| |
|**totalCount**|Number| |
### <div id="HostType">HostType</div>
|名称|类型|描述|
|---|---|---|
|**dedicatedHostType**|String|专有宿主机机型|
|**state**|[HostTypeState[]](#hosttypestate)|专有宿主机机型售卖状态|
|**totalVCPUs**|Integer|CPU总数|
|**totalMemoryMB**|Integer|内存总大小，单位MB|
|**totalDiskGB**|Integer|本地磁盘总大小，单位GB|
|**totalGPUs**|Integer|GPU总个数|
|**supportedInstanceType**|String[]|专有宿主机支持的云主机实例规格|
### <div id="HostTypeState">HostTypeState</div>
|名称|类型|描述|
|---|---|---|
|**az**|String|可用区|
|**inStock**|Boolean|售卖信息，true:可用、false:已售罄不可用|
|**online**|Boolean|在线状态，true:可用、false:已下线|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
