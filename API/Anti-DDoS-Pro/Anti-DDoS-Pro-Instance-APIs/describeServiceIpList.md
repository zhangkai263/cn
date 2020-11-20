# describeServiceIpList


## 描述
查询实例高防 IP 列表

## 请求方式
GET

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:describeServiceIpList

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |实例 ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False| |页码, 默认为 1|
|**pageSize**|Integer|False| |分页大小, 默认为 10, 取值范围[10, 100]|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeserviceiplist#result)| |
|**requestId**|String| |
|**error**|[Error](describeserviceiplist#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](describeserviceiplist#err)| |
### <div id="err">Err</div>
|名称|类型|描述|
|---|---|---|
|**code**|Long|同http code|
|**details**|Object| |
|**message**|String| |
|**status**|String|具体错误|
### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**dataList**|[ServiceIp[]](describeserviceiplist#serviceip)| |
|**currentCount**|Integer|当前页数量|
|**totalCount**|Integer|总数|
|**totalPage**|Integer|总页数|
### <div id="serviceip">ServiceIp</div>
|名称|类型|描述|
|---|---|---|
|**serviceIp**|String|高防 IP|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
