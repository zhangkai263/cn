# describeBandwidthPackageStock


## 描述
查询共享带宽库存

## 请求方式
GET

## 请求地址
https://edcps.jdcloud-api.com/v1/regions/{regionId}/bandwidthPackageStock

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID，可调用接口（describeEdCPSRegions）获取分布式云物理服务器支持的地域|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describebandwidthpackagestock#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**region**|String|地域|
|**availableBandwidth**|Integer|可用带宽库存|
|**availableExtraUplinkBandwidth**|Integer|可用额外上行带宽库存|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Bad request|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
