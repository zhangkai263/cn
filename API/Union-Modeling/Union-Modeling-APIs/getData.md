# getData


## 描述
获取数据


## 请求方式
POST

## 请求地址
https://umodeling.jdcloud-api.com/v1/regions/{regionId}/task:getData

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**vo**|[GetDataVO](getdata#getdatavo)|True| |获取数据|

### <div id="getdatavo">GetDataVO</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**jobId**|String|True| |任务ID|
|**role**|String|True| |数据目标角色|
|**fromRole**|String|True| |数据源角色|
|**key**|String|True| |数据key|
|**taskType**|String|True| |任务类型|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](getdata#result)| |
|**requestId**|String|请求ID，每次请求都不一样|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**status**|Boolean|true为成功，false为失败|
|**message**|String|描述信息|
|**data**|String|查询数据结果|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**500**|Internal server error|
