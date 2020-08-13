# getVqdTask


## 描述
获取视频质检任务详细信息

## 请求方式
GET

## 请求地址
https://vqd.jdcloud-api.com/v1/vqdTasks/{taskId}


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**taskId**|String|True| |任务ID，路径参数|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](getvqdtask#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**vqdTaskObject**|[VqdTaskObject](getvqdtask#vqdtaskobject)| |
### <div id="vqdtaskobject">VqdTaskObject</div>
|名称|类型|描述|
|---|---|---|
|**taskId**|String|任务ID|
|**templateId**|String|模板ID|
|**mediaName**|String|媒体名称|
|**threshold**|Double|缺陷判定时间阈值|
|**detections**|String[]|检测项列表|
|**status**|String|任务状态。<br>- READY<br>- CANCELLED<br>- RUNNING<br>- FINISHED_SUCCESS<br>- FINISHED_FAILURE<br>|
|**createTime**|String|创建时间|
|**updateTime**|String|更新时间|

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
https://vqd.jdcloud-api.com/v1/vqdTasks/10000

```

## 返回示例
```
{
    "requestId": "bgvmivir54gddpgi764se9f4kfr7ge41", 
    "result": {
        "createTime": "2019-11-16T15:51:32Z", 
        "detections": [
            "BlackScreen", 
            "PureColor", 
            "ColorCast"
        ], 
        "mediaName": "言叶之庭", 
        "status": "READY", 
        "taskId": "10000", 
        "templateId": "10000", 
        "threshold": "3.000", 
        "updateTime": "2019-11-16T15:51:32Z"
    }
}
```
