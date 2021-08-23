# describeInstanceTypes


## 描述
查询实例规格信息列表


## 请求方式
GET

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instanceTypes

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**serviceName**|String|False| |服务类型，取值为{vm、nc}，vm代表虚机、nc代表原生容器|
|**filters**|[Filter[]](describeinstancetypes#filter)|False| |instanceTypes - 实例规格，精确匹配，支持多个<br>az - 可用区，精确匹配，支持多个<br>|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeinstancetypes#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**instanceTypes**|[InstanceType[]](describeinstancetypes#instancetype)|通用的实例规格|
|**specificInstanceTypes**|[InstanceType[]](describeinstancetypes#instancetype)|用户特有的实例规格；需要工单申请|
|**totalCount**|Integer|总数量|
### <div id="instancetype">InstanceType</div>
|名称|类型|描述|
|---|---|---|
|**family**|String|实例规格类型|
|**instanceType**|String|实例规格，比如g.b1.2xlarge|
|**cpu**|Integer|cpu个数|
|**memoryMB**|Integer|内存大小|
|**nicLimit**|Integer|支持弹性网卡的数量|
|**desc**|String|描述|
|**state**|[InstanceTypeState[]](describeinstancetypes#instancetypestate)|规格状态|
|**gpu**|[Gpu](describeinstancetypes#gpu)|Gpu配置|
|**localDisks**|[LocalDisk[]](describeinstancetypes#localdisk)| 本地缓存盘配置，目前只有Gpu规格上才有|
|**generation**|Integer|实例规格代数|
### <div id="localdisk">LocalDisk</div>
|名称|类型|描述|
|---|---|---|
|**diskType**|String|磁盘类型，取值范围{ssd、premium-hdd、hdd.std1、ssd.gp1、ssd.io1}|
|**diskSizeGB**|Integer|磁盘大小|
### <div id="gpu">Gpu</div>
|名称|类型|描述|
|---|---|---|
|**model**|String|GPU型号|
|**number**|Integer|GPU数量|
### <div id="instancetypestate">InstanceTypeState</div>
|名称|类型|描述|
|---|---|---|
|**az**|String|可用区|
|**inStock**|Boolean|可售卖情况，true:可售卖、false:已售罄不可用|
|**availableCount**|Integer|可用库存数量，预留字段，敬请期待。|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
