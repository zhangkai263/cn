# describeAlarmHistory


## 描述
报警历史列表

## 请求方式
GET

## 请求地址
https://jdccs.jdcloud-api.com/v1/alarmHistory


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码, 默认为1|
|**pageSize**|Integer|False|20|分页大小，默认为20|
|**alarmId**|String|False| |报警规则ID|
|**startTime**|Integer|False| |查询时间范围的开始时间， UNIX时间戳|
|**endTime**|Integer|False| |查询时间范围的结束时间， UNIX时间戳|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describealarmhistory#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**alarmHistory**|[AlarmHistory[]](describealarmhistory#alarmhistory)|报警历史列表|
|**pageNumber**|Integer|页码|
|**pageSize**|Integer|分页大小|
|**totalCount**|Integer|总数量|
### <div id="alarmhistory">AlarmHistory</div>
|名称|类型|描述|
|---|---|---|
|**alarmId**|String|规则实例ID|
|**name**|String|规则名称|
|**idc**|String|机房英文标识|
|**idcName**|String|机房名称|
|**resourceType**|String|资源类型 bandwidth:带宽|
|**resourceId**|String|资源ID|
|**resourceName**|String|资源名称|
|**metric**|String|监控项英文标识|
|**metricName**|String|监控项名称|
|**period**|Integer|统计周期（单位：分钟）|
|**statisticMethod**|String|统计方法：平均值=avg、最大值=max、最小值=min|
|**operator**|String|计算方式 >=、>、<、<=、=、！=|
|**threshold**|Double|阈值|
|**times**|Integer|连续多少次后报警|
|**noticePeriod**|Integer|通知周期 单位：小时|
|**status**|String|规则状态 disabled:禁用 enabled:启用|
|**managementIp**|String|IP地址|
|**ifName**|String|端口名称|
|**alarmStatus**|String|报警状态 normal:正常 alarm:报警|
|**value**|Double|报警值|
|**noticeTime**|String|报警时间 遵循ISO8601标准，使用UTC时间，格式为：yyyy-MM-ddTHH:mm:ssZ|
|**condition**|String|报警条件|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
