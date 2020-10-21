# createTask


## 描述
创建任务报表

## 请求方式
POST

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/tasks

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**taskSpec**|[TaskSpec](createtask#taskspec)|True| |报表配置信息|

### <div id="taskspec">TaskSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**taskName**|String|False| |报表任务名称，长度限制32字节|
|**taskDesc**|String|False| |报表任务描述，长度限制128字节|
|**insId**|String|False| |数据库审计实例ID|
|**dbId**|String|False| |审计数据库ID(默认为空,代表全部数据据库)|
|**execDate**|Integer|False| | 0,1,2,3,4,5,6,7,8 (0:立即实行,1-7为每周特定日期执行,8为每天执行)|
|**startTime**|String|False| |报表统计开始时间(execDate =0立即执行时必传)|
|**endTime**|String|False| |报表统计结束时间(execDate =0立即执行时必传)|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createtask#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**taskId**|String|创建的任务ID|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
