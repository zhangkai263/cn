# describeRouteTable


## 描述
查询路由表详情

## 请求方式
GET

## 请求地址
https://cps.jdcloud-api.com/v1/regions/{regionId}/routeTables/{routeTableId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID，可调用接口（describeRegiones）获取云物理服务器支持的地域|
|**routeTableId**|String|True| |路由表ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeroutetable#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**routeTable**|[RouteTable](describeroutetable#routetable)|路由表详细信息|
### <div id="routetable">RouteTable</div>
|名称|类型|描述|
|---|---|---|
|**routeTableId**|String|路由表ID|
|**region**|String|地域|
|**vpcId**|String|私有网络ID|
|**vpcName**|String|私有网络名称|
|**name**|String|名称|
|**createTime**|String|创建时间|
|**routes**|[Route[]](describeroutetable#route)|路由规则|
### <div id="route">Route</div>
|名称|类型|描述|
|---|---|---|
|**destinationCidr**|String|目标网段|
|**nextHopType**|String|下一跳类型|
|**nextHop**|String|下一跳|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Bad request|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
