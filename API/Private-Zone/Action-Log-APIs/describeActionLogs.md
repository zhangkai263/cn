# describeActionLogs


## 描述
查询操作日志


## 请求方式
GET

## 请求地址
https://privatezone.jdcloud-api.com/v1/regions/{regionId}/actionLogs

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageSize**|Integer|False| |页容量，默认10，取值范围(1 - 100)|
|**pageNumber**|Integer|False| |页序号，默认值1，不能小于1|
|**start**|String|True| |起始时间，格式：UTC时间例如2017-11-10T23:00:00Z|
|**end**|String|True| |结束时间，格式：UTC时间例如2017-11-10T23:00:00Z|
|**keyWord**|String|False| |日志模糊匹配的关键词|
|**success**|Boolean|False| |操作结果 false->失败 true->成功|
|**actionType**|String|False| |日志类型，支持的类型有：CREATE_ZONE、DELETE_ZONE、LOCK_ZONE、CREATE_RR、MODIFY_RR、DELETE_RR、SET_RR_STATUS、RETRY_RECURSE_ZONE|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**dataList**|[DescribeActionLogsRes[]](#describeactionlogsres)|操作日志记录列表|
|**currentCount**|Integer|当前页记录数量|
|**totalCount**|Integer|总记录数量|
|**totalPage**|Integer|总页数|
### <div id="DescribeActionLogsRes">DescribeActionLogsRes</div>
|名称|类型|描述|
|---|---|---|
|**id**|Integer|操作日志id|
|**pin**|String|用户pin|
|**zone**|String|zone|
|**zoneId**|String|zone id|
|**actionType**|String|操作类型|
|**detail**|String|操作详情|
|**time**|String|操作发生时间|
|**success**|Boolean|操作结果 true->成功 false->失败|
|**failReason**|String|操作失败原因|
|**clientIp**|String|操作者IP|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
