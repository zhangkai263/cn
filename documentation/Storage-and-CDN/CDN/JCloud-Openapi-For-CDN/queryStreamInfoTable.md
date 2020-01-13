# queryStreamInfoTable


## 描述
推流信息

## 请求方式
GET

## 请求地址
https://cdn.jdcloud-api.com/v1/liveDomain/{domain}/publishInfo

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|True| |用户域名|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**appName**|String|False| |app名|
|**streamName**|String|False| |流名|
|**pageSize**|Integer|False|10|分页查询大小|
|**pageNumber**|Integer|False|1| |
|**startTime**|String|True| |开始时间格式yyyy-MM-dd HH:mm|
|**endTime**|String|False| |结束时间格式yyyy-MM-dd HH:mm|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**total**|Integer| |
|**result**|[PushStreamInfoItem[]](#pushstreaminfoitem)| |
### <div id="PushStreamInfoItem">PushStreamInfoItem</div>
|名称|类型|描述|
|---|---|---|
|**app**|String| |
|**stream**|String| |
|**clientIp**|String| |
|**nodeIp**|String| |
|**startTime**|String|任务创建时间,UTC时间|
|**endTime**|String|任务创建时间,UTC时间|
|**duration**|Long| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
