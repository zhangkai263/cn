# describeReportList


## 描述
获取任务下的报表列表

## 请求方式
GET

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/tasks/{taskId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|
|**taskId**|String|True| |任务ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码；默认为1|
|**pageSize**|Integer|False|10|分页大小；默认为10；取值范围[10, 100]|
|**instanceId**|String|True| |实例ID|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describereportlist#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**totalCount**|Integer| |
|**list**|[ReportInfo[]](describereportlist#reportinfo)| |
### <div id="reportinfo">ReportInfo</div>
|名称|类型|描述|
|---|---|---|
|**reportId**|String|报表ID|
|**taskId**|String|任务ID|
|**reportContent**|String|任务报表(base64,pdf)|
|**execTime**|String|任务执行时间|
|**reportState**|Integer|任务执行状态(0 执行中 1 成功)|
|**completeTime**|String|任务完成时间|
|**startTime**|String|报表统计开始时间|
|**endTime**|String|报表统计结束时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
