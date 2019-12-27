# describeServer


## 描述
查询后端服务器详情

## 请求方式
GET

## 请求地址
https://cps.jdcloud-api.com/v1/regions/{regionId}/serverGroups/{serverGroupId}/servers/{serverId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID，可调用接口（describeCPSLBRegions）获取云物理服务器支持的地域|
|**serverGroupId**|String|True| |服务器组ID|
|**serverId**|String|True| |后端服务器ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**server**|[Server](#server)|后端服务器详细信息|
### <div id="Server">Server</div>
|名称|类型|描述|
|---|---|---|
|**serverId**|String|服务器ID|
|**instanceType**|String|资源类型|
|**instanceName**|String|实例名称|
|**instanceId**|String|后端云物理服务器ID|
|**az**|String|可用区|
|**privateIp**|String|内网Ip|
|**port**|Integer|端口|
|**weight**|Integer|后端云物理服务器权重|
|**status**|String|状态|
|**healthyStatus**|String|健康状态|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Bad request|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
