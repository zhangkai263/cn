# describeIps


## 描述
查询公网IP列表

## 请求方式
GET

## 请求地址
https://jdccs.jdcloud-api.com/v1/idcs/{idc}/ips

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**idc**|String|True| |IDC机房ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码, 默认为1|
|**pageSize**|Integer|False|20|分页大小，默认为20|
|**filters**|[Filter[]](describeips#filter)|False| |ipId - 公网IP实例ID，精确匹配，支持多个<br>|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeips#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**ips**|[Ip[]](describeips#ip)|公网IP列表|
|**pageNumber**|Integer|页码|
|**pageSize**|Integer|分页大小|
|**totalCount**|Integer|总数量|
### <div id="ip">Ip</div>
|名称|类型|描述|
|---|---|---|
|**idc**|String|机房英文标识|
|**idcName**|String|机房名称|
|**ipId**|String|公网IP实例ID|
|**cidrAddr**|String|IP地址段|
|**ipQuantity**|String|IP数量|
|**ipType**|String|IP类型 IPV4/IPV6|
|**networkAddr**|String|网络位地址|
|**gatewayAddr**|String|网关地址|
|**broadcastAddr**|String|广播地址|
|**lineType**|String|线路类型 dynamicBGP:动态BGP thirdLineBGP:三线BGP telecom:电信单线 unicom:联通单线 mobile:移动单线|
|**status**|String|状态 normal:正常 abnormal:异常|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
