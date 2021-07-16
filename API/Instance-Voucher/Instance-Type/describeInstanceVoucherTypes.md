# describeInstanceVoucherTypes


## 描述
查询实例规格信息列表


## 请求方式
GET

## 请求地址
https://instancevoucher.jdcloud-api.com/v1/regions/{regionId}/instanceVoucherTypes

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**resourceType**|String|False|vm|产品类型 支持[vm, nativecontainer, pod]，默认为vm|
|**reservedType**|String|False|nonReserved|资源分配方式，支持[nonReserved]|
|**filters**|[Filter[]](describeinstancevouchertypes#filter)|False| |Filter names: (仅支持eq)<br>instanceType - 实例规格，精确匹配，支持多个<br>instanceTypeFamily - 实例规格族，精确匹配，支持多个<br>az - 可用区，精确匹配，支持多个<br>|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeinstancevouchertypes#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**instanceVoucherTypes**|[InstanceVoucherType[]](describeinstancevouchertypes#instancevouchertype)|实例抵扣券规格|
### <div id="instancevouchertype">InstanceVoucherType</div>
|名称|类型|描述|
|---|---|---|
|**instanceTypeFamily**|String|实例规格族|
|**instanceTypes**|[InstanceType[]](describeinstancevouchertypes#instancetype)|实例规格|
### <div id="instancetype">InstanceType</div>
|名称|类型|描述|
|---|---|---|
|**family**|String|实例规格类型|
|**instanceType**|String|实例规格，如g.n2.medium|
|**generation**|Integer|实例规格代数|
|**cpu**|Integer|Cpu个数|
|**memoryMB**|Integer|内存大小|
|**nicLimit**|Integer|支持弹性网卡的数量|
|**desc**|String|描述|
|**state**|[InstanceTypeState[]](describeinstancevouchertypes#instancetypestate)|规格状态|
|**gpu**|[Gpu](describeinstancevouchertypes#gpu)|Gpu配置|
|**localDisks**|[LocalDisk[]](describeinstancevouchertypes#localdisk)|本地缓存盘配置|
### <div id="localdisk">LocalDisk</div>
|名称|类型|描述|
|---|---|---|
|**diskType**|String|磁盘类型|
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
|**inStock**|Boolean|可售卖情况，true:可售卖、false:已售罄不可用<br>- 非预留型：实例规格当前售卖情况，仅供参考。仍可购买，用于抵扣现有资源<br>- 预留型：实例抵扣券与实例规格的售卖情况，售罄不可购买<br>|
|**online**|Boolean|在线情况，true:在线、false:已下线不可用|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
