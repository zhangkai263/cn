# describeIpv6Addresses


## 描述
查询IPv6地址列表<br/>
支持分页查询，默认每页20条<br/>


## 请求方式
GET

## 请求地址
https://cps.jdcloud-api.com/v1/regions/{regionId}/ipv6Addresses

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID，可调用接口（describeRegiones）获取云物理服务器支持的地域|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码；默认为1|
|**pageSize**|Integer|False|20|分页大小；默认为20；取值范围[20, 100]|
|**ipv6GatewayId**|String|False| |IPv6网关ID|
|**ipv6Address**|String|False| |IPv6地址|
|**enableInternet**|Boolean|False| |是否已开通公网|
|**filters**|[Filter[]](describeipv6addresses#filter)|False| |ipv6AddressId - IPv6地址ID，精确匹配，支持多个<br>|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeipv6addresses#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**ipv6Addresses**|[Ipv6Address[]](describeipv6addresses#ipv6address)| |
|**pageNumber**|Integer|页码；默认为1|
|**pageSize**|Integer|分页大小；默认为20；取值范围[20, 100]|
|**totalCount**|Integer|查询结果总数|
### <div id="ipv6address">Ipv6Address</div>
|名称|类型|描述|
|---|---|---|
|**region**|String|地域代码, 如cn-north-1|
|**ipv6AddressId**|String|公网IPv6地址ID|
|**ipv6Address**|String|IPv6地址|
|**ipv6GatewayId**|String|IPv6网关ID|
|**bandwidth**|Integer|带宽, 单位Mbps|
|**vpcId**|String|私有网络ID|
|**vpcName**|String|私有网络名称|
|**instanceType**|String|关联的实例类型|
|**instanceId**|String|关联的实例ID|
|**instanceName**|String|关联的实例名称|
|**createTime**|String|创建时间|
|**charge**|[Charge](describeipv6addresses#charge)|计费信息|
### <div id="charge">Charge</div>
|名称|类型|描述|
|---|---|---|
|**chargeMode**|String|支付模式，取值为：prepaid_by_duration，postpaid_by_usage或postpaid_by_duration，prepaid_by_duration表示预付费，postpaid_by_usage表示按用量后付费，postpaid_by_duration表示按配置后付费，默认为postpaid_by_duration|
|**chargeStatus**|String|费用支付状态，取值为：normal、overdue、arrear，normal表示正常，overdue表示已到期，arrear表示欠费|
|**chargeStartTime**|String|计费开始时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|
|**chargeExpiredTime**|String|过期时间，预付费资源的到期时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ，后付费资源此字段内容为空|
|**chargeRetireTime**|String|预期释放时间，资源的预期释放时间，预付费/后付费资源均有此值，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Bad request|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
