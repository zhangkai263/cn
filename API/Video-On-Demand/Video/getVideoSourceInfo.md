# getVideoSourceInfo


## 描述
获取视频源文件信息

## 请求方式
GET

## 请求地址
https://vod.jdcloud-api.com/v1/videos/{videoId}:getSourceInfo


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**videoId**|String|True| |视频ID|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](getvideosourceinfo#result)|获取视频播放信息结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**baseInfo**|[VideoBaseInfo](getvideosourceinfo#videobaseinfo)|视频基础信息|
|**playInfoList**|[VideoPlayInfo[]](getvideosourceinfo#videoplayinfo)|视频播放信息列表|
### <div id="videoplayinfo">VideoPlayInfo</div>
|名称|类型|描述|
|---|---|---|
|**taskId**|String|生成播放信息的转码任务ID|
|**definition**|String|清晰度规格标记。取值范围：<br>  SD - 标清<br>  HD - 高清<br>  FHD - 超清<br>  2K<br>  4K<br>|
|**mediaType**|Integer|媒体类型|
|**status**|String|播放信息状态，目前只有正常状态(normal)|
|**url**|String|CDN地址，原始地址或者鉴权地址|
|**size**|Long| |
|**duration**|Long|视频时长|
|**bitrate**|Long|码率|
|**codec**|String|编码格式|
|**format**|String|封装格式|
|**width**|Integer|视频宽度|
|**height**|Integer|视频高度|
|**fps**|String|视频帧率|
|**createTime**|String| |
|**updateTime**|String| |
### <div id="videobaseinfo">VideoBaseInfo</div>
|名称|类型|描述|
|---|---|---|
|**videoId**|String|视频ID|
|**videoName**|String|视频名称|
|**description**|String|视频描述|
|**categoryId**|Long| |
|**categoryName**|String|分类名称|
|**tags**|String|标签|
|**duration**|Long|视频时长|
|**coverUrl**|String|封面地址|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|

## 请求示例
GET
```
https://vod.jdcloud-api.com/v1/videos/4fc583b4-d08a-457a-9ce4-8a59c5f474ac:getSourceInfo

```

## 返回示例
```
{
    "requestId": "5E22S6v13138j19PV8C4081U21zzE67i", 
    "result": {
        "fileName": "1d1aa87ea6df4b7b9090c12633c6948b", 
        "fileUrl": "http://vod-storage-72757.s3.cn-north-1-stag.jcloudcs.com/video/8eb8a1253670cd928967fc4e84c9a5cc.mp4", 
        "md5": "8eb8a1253670cd928967fc4e84c9a5cc", 
        "videoId": "984c2b0d-c13e-42ed-a912-c0ad6ee4c0d0"
    }
}
```
