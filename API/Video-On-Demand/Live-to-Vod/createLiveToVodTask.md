# createLiveToVodTask


## 描述
创建直播转点播任务

## 请求方式
POST

## 请求地址
https://vod.jdcloud-api.com/v1/createLiveToVodTask


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**title**|String|True| |视频标题|
|**fileName**|String|True| |文件名称|
|**fileSize**|Long|False| |文件大小|
|**coverUrl**|String|False| |封面地址|
|**description**|String|False| |视频描述|
|**categoryId**|Long|False| |分类ID|
|**tags**|String[]|False| |视频标签集合|
|**transcodeTemplateGroupId**|String|False| |转码模板组ID。若此字段不为空，则将以模板组方式提交转码作业，transcodeTemplateIds字段将被忽略。|
|**transcodeTemplateIds**|Long[]|False| |转码模板ID集合|
|**watermarkIds**|Long[]|False| |水印ID集合|
|**publishDomain**|String|True| |推流域名|
|**appName**|String|True| |应用名称|
|**streamName**|String|True| |流名称|
|**recordTimes**|[RecordTime[]](createlivetovodtask#recordtime)|True| |录制时间段集合<br>- 支持自定义1-10个时间段,拼接成一个文件<br>- 每个时间段不小于10s<br>- 总跨度不超过12小时<br>- 时间段按升序排列且无重叠<br>|
|**recordFileType**|String|True| |录制文件类型:<br>- 取值: ts, flv, mp4<br>- 不区分大小写<br>|
|**taskExternalId**|String|False| |直播录制任务外键|
|**priority**|String|False| |任务优先级:<br>- 取值: low, medium, high<br>- 不区分大小写<br>|

### <div id="recordtime">RecordTime</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**startTime**|String|True| |开始时间<br>- UTC时间<br>  格式: yyyy-MM-dd'T'HH:mm:ss'Z'<br>  示例: 2018-10-21T10:00:00Z<br>|
|**endTime**|String|True| |结束时间<br>- UTC时间<br>  格式: yyyy-MM-dd'T'HH:mm:ss'Z'<br>  示例: 2018-10-21T10:00:00Z<br>|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createlivetovodtask#result)|创建直转点任务结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**flowId**|String|业务流ID|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**500**|Internal server error|
|**503**|Service unavailable|

## 请求示例
POST
```
https://vod.jdcloud-api.com/v1/createLiveToVodTask

```

```
{
    "appName": "yourapp", 
    "categoryId": 1, 
    "coverUrl": null, 
    "description": "我的三体是神游八方发起的使用Minecraft制作的三体动画", 
    "fileName": "我的三体.mp4", 
    "fileSize": 12495245, 
    "publishDomain": "push.yourdomain.com", 
    "recordFileType": "mp4", 
    "recordTimes": [
        {
            "endTime": "2018-10-21T10:05:00Z", 
            "startTime": "2018-10-21T10:00:00Z"
        }, 
        {
            "endTime": "2018-10-21T10:15:00Z", 
            "startTime": "2018-10-21T10:10:00Z"
        }
    ], 
    "streamName": "yourstream", 
    "tags": [
        "三体", 
        "动画"
    ], 
    "title": "我的三体", 
    "transcodeTemplateGroupId": "00238eeb170c1170bfd29c66d040a20f", 
    "transcodeTemplateIds": [
        1, 
        2
    ], 
    "watermarkIds": [
        1, 
        2
    ]
}
```

## 返回示例
```
{
    "code": 200, 
    "requestId": "edfc74ea-be4c-418b-b841-31ddd2b33203", 
    "result": {
        "flowId": "12345"
    }
}
```
