# describeAlarm


## 描述
查询报警规则详情

## 请求方式
GET

## 请求地址
https://jdccs.jdcloud-api.com/v1/alarms/{alarmId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**alarmId**|String|True| |报警规则ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describealarm#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**alarm**|[Alarm](describealarm#alarm)| |
### <div id="alarm">Alarm</div>
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
|**switchboard**|[Switchboard[]](describealarm#switchboard)|交换机信息|
### <div id="switchboard">Switchboard</div>
|名称|类型|描述|
|---|---|---|
|**ip**|String|IP|
|**port**|String|端口|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
