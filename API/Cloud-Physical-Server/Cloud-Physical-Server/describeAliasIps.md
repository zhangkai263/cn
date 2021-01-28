# describeAliasIps


## 描述
查询别名IP列表

## 请求方式
GET

## 请求地址
https://cps.jdcloud-api.com/v1/regions/{regionId}/aliasIps

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID，可调用接口（describeRegions）获取云物理服务器支持的地域|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码；默认为1|
|**pageSize**|Integer|False|20|分页大小；默认为20；取值范围[20, 100]|
|**subnetId**|String|False| |子网ID|
|**instanceId**|String|False| |实例ID|
|**cidr**|String|False| |CIDR段，模糊搜索|
|**filters**|[Filter[]](describealiasips#filter)|False| |aliasIpId - 别名IP id<br/><br>|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describealiasips#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**aliasIps**|[AliasIp[]](describealiasips#aliasip)| |
|**pageNumber**|Integer|页码；默认为1|
|**pageSize**|Integer|分页大小；默认为20；取值范围[20, 100]|
|**totalCount**|Integer|查询结果总数|
### <div id="aliasip">AliasIp</div>
|名称|类型|描述|
|---|---|---|
|**region**|String|地域|
|**az**|String|可用区|
|**instanceId**|String|实例ID|
|**subnetId**|String|子网ID|
|**secondaryCidrId**|String|次要cidr ID|
|**aliasIpId**|String|别名IP ID|
|**cidr**|String|cidr段|
|**isBondEip**|Boolean|是否已绑弹性公网ip|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Bad request|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
