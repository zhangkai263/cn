# modifyBandwidthPackage


## 描述
修改共享带宽


## 请求方式
POST

## 请求地址
https://edcps.jdcloud-api.com/v1/regions/{regionId}/bandwidthPackages/{bandwidthPackageId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID，可调用接口（describeEdCPSRegions）获取分布式云物理服务器支持的地域|
|**bandwidthPackageId**|String|True| |共享带宽ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**clientToken**|String|False| |由客户端生成，用于保证请求的幂等性，长度不能超过36个字符；<br/><br>如果多个请求使用了相同的clientToken，只会执行第一个请求，之后的请求直接返回第一个请求的结果<br/><br>|
|**name**|String|False| |名称|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](modifybandwidthpackage#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**bandwidthPackage**|[BandwidthPackage](modifybandwidthpackage#bandwidthpackage)|共享带宽详细信息|
### <div id="bandwidthpackage">BandwidthPackage</div>
|名称|类型|描述|
|---|---|---|
|**region**|String|区域代码, 如cn-east-tz1|
|**az**|String|可用区代码, 如cn-east-tz1a|
|**bandwidthPackageId**|String|共享带宽ID|
|**bandwidth**|Integer|带宽, 单位Mbps|
|**extraUplinkBandwidth**|Integer|额外上行带宽, 单位Mbps|
|**lineType**|String|链路类型|
|**name**|String|名称|
|**createTime**|String|创建时间|
|**charge**|[Charge](modifybandwidthpackage#charge)|计费信息|
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
