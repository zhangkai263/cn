# stopTask


## 描述
停止报表任务

## 请求方式
POST

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/tasks/{taskId}:stop

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|
|**taskId**|String|True| |任务ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**taskOpts**|[TaskOpts](stoptask#taskopts)|True| |报表配置信息|

### <div id="taskopts">TaskOpts</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**dbId**|String|False| |数据库ID|
|**insId**|String|False| |数据库审计实例ID|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String| |


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
