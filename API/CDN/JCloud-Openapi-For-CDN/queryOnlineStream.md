# queryOnlineStream


## 描述
在线流信息

## 请求方式
GET

## 请求地址
https://cdn.jdcloud-api.com/v1/liveDomain/{domain}/online

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
|**startTime**|String|False| |开始时间格式yyyy-MM-dd HH:mm|
|**endTime**|String|False| |结束时间格式yyyy-MM-dd HH:mm|
|**recLevel**|Long|False| |顶流优先级|
|**connId**|String|False| |流在边缘的连接号|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**total**|Integer| |
|**result**|[OnlineStreamInfo[]](#onlinestreaminfo)| |
### <div id="OnlineStreamInfo">OnlineStreamInfo</div>
|名称|类型|描述|
|---|---|---|
|**app**|String| |
|**stream**|String| |
|**clientIp**|String| |
|**serverIp**|String| |
|**frameRate**|Double| |
|**frameLossRate**|Double| |
|**lastActive**|Long| |
|**realFps**|Double| |
|**uploadSpeed**|Long| |
|**videoCodecId**|Long| |
|**videoDataRate**|Long| |
|**audioCodecId**|Long| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
