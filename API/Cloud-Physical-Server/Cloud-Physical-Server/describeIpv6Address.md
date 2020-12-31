# describeIpv6Address


## 描述
查询IPv6地址例详情

## 请求方式
GET

## 请求地址
https://cps.jdcloud-api.com/v1/regions/{regionId}/ipv6Addresses/{ipv6AddressId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID，可调用接口（describeRegiones）获取云物理服务器支持的地域|
|**ipv6AddressId**|String|True| |IPv6地址ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeipv6address#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**ipv6Address**|[Ipv6Address](describeipv6address#ipv6address)|IPv6地址详细信息|
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
|**charge**|[Charge](describeipv6address#charge)|计费信息|
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
