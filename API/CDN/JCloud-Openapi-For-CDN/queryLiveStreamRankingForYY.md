# queryLiveStreamRankingForYY


## 描述
查询按播放人数流排行

## 请求方式
GET

## 请求地址
https://cdn.jdcloud-api.com/v1/liveStream:rankingForYY


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|True| |推流域名|
|**appName**|String|False| | |
|**scheme**|String|True| |播放协议,只能为hdl或者hls|
|**startTime**|String|True| |查询起始时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|
|**endTime**|String|True| |查询截止时间,UTC时间，格式为:yyyy-MM-dd'T'HH:mm:ss'Z'，示例:2018-10-21T10:00:00Z|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**startTime**|String| |
|**endTime**|String| |
|**domain**|String| |
|**appName**|String| |
|**scheme**|String| |
|**rankingList**|[StreamRankingForYY[]](#streamrankingforyy)| |
### <div id="StreamRankingForYY">StreamRankingForYY</div>
|名称|类型|描述|
|---|---|---|
|**streamName**|String| |
|**ranking**|Integer| |
|**playerCount**|Long| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
