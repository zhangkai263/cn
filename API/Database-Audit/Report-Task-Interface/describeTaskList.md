# describeTaskList


## 描述
获取任务列表
一次性任务报表时间范围[0-30天]


## 请求方式
GET

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/tasks

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码；默认为1|
|**pageSize**|Integer|False|10|分页大小；默认为10；取值范围[10, 100]|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describetasklist#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**totalCount**|Integer| |
|**list**|[TaskInfo[]](describetasklist#taskinfo)| |
### <div id="taskinfo">TaskInfo</div>
|名称|类型|描述|
|---|---|---|
|**taskId**|String|报表任务ID|
|**taskName**|String|报表任务名称，长度限制32字节|
|**taskDesc**|String|报表任务描述，长度限制128字节|
|**taskState**|Integer|报表任务状态(0 停止 1 运行中 2 一次性任务)|
|**insId**|String|数据库审计实例ID|
|**dbId**|String|审计数据库ID(默认为空,代表全部数据据库)|
|**execDate**|Integer| 0,1,2,3,4,5,6,7,8 (0:立即实行,1-7为每周特定日期执行,8为每天执行)|
|**createTime**|String|报表创建时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
