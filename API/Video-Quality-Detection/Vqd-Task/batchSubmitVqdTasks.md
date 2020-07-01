# batchSubmitVqdTasks


## 描述
批量提交视频质检任务，一次同时最多提交50个输入媒体

## 请求方式
POST

## 请求地址
https://vqd.jdcloud-api.com/v1/vqdTasks:batchSubmit


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**mediaList**|[VqdMediaObject[]](batchsubmitvqdtasks#vqdmediaobject)|True| |媒体列表|
|**templateId**|String|True| |检测模板ID|

### <div id="vqdmediaobject">VqdMediaObject</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**mediaUrl**|String|True| |媒体URL|
|**mediaName**|String|False| |媒体名称|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](batchsubmitvqdtasks#result)|批量提交视频质检任务结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**taskIds**|String[]| |

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
https://vqd.jdcloud-api.com/v1/vqdTasks:batchSubmit

```
```
{
    "mediaList": [
        {
            "mediaName": "言叶之庭", 
            "mediaUrl": "https://example.com/video/filename-001.mp4"
        }, 
        {
            "mediaName": "夏目友人帐", 
            "mediaUrl": "https://example.com/video/filename-002.mp4"
        }
    ], 
    "templateId": "10000"
}
```

## 返回示例
```
{
    "requestId": "bgvmivir54gddpgi764se9f4kfr7ge41", 
    "result": {
        "taskIds": [
            "10001", 
            "10002"
        ]
    }
}
```
