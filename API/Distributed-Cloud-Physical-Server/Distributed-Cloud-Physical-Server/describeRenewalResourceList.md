# describeRenewalResourceList


## 描述
查询资源名称和资源绑定关系

## 请求方式
GET

## 请求地址
https://edcps.jdcloud-api.com/v1/regions/{regionId}/instances:selectDetailList

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID，可调用接口（describeEdCPSRegions）获取分布式云物理服务器支持的地域|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**resourceList**|String|True| |资源ID列表（多个以,分隔）|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[RenewalResource[]](#renewalresource)| |
### <div id="renewalresource">RenewalResource</div>
|名称|类型|描述|
|---|---|---|
|**resourceId**|String|资源ID|
|**resourceName**|String|资源名称|
|**remark**|String|备注|
|**bind**|[RenewalResource[]](#renewalresource)|绑定资源列表|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Bad request|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
