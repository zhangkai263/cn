# createLiveForwardTask


## 描述
创建直播拉流转推任务


## 请求方式
POST

## 请求地址
https://live.jdcloud-api.com/v1/LiveForwardTask:create


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**sourceUrl**|String|True| |拉流地址<br>- 支持rtmp<br>|
|**pushUrl**|String|True| |转推地址<br>- 支持rtmp<br>|
|**startMode**|String|True| |执行方式<br>- StartNow: 立即执行<br>- StartAsScheduled: 定时执行，根据参数设定的时间<br>|
|**startTime**|String|False| |开始时间<br>- UTC时间， ISO8601示例：2021-07-26T08:08:08Z<br>- 不填表示立即开始<br>|
|**endTime**|String|False| |结束时间<br>- UTC时间， ISO8601示例：2021-07-26T08:08:08Z<br>- 最大支持365天，与开始时间间隔不超过7天。<br>  - 假设当前时间2021年03月30日11:50:01，则：结束时间不可超过2022年03月30日11:50:01。<br>- 不填拉不到流10分钟自动结束<br>|
|**callbackEvents**|String[]|False| |回调类型<br>- 不填发送全部回调<br>- TaskStart 任务开始<br>- TaskExit 任务结束<br>- callbackUrl非空的情况下，callbackEvents有效<br>|
|**callbackUrl**|String|False| |事件回调地址<br>|
|**name**|String|False| |任务名称<br>- 最大255字符<br>|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createLiveForwardTask#result)| |
|**requestId**|String|requestId|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**taskId**|String|任务ID|

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
POST
```
https://live.jdcloud-api.com/v1/LiveForwardTask:create

```

```
{
    "callbackEvents": [
        "TaskExit"
    ], 
    "callbackUrl": "http://127.0.0.1", 
    "endTime": "2021-08-26T09:00:00Z", 
    "name": "test", 
    "pushUrl": "rtmp://127.0.0.1", 
    "sourceUrl": "rtmp://127.0.0.1", 
    "startMode": "StartAsScheduled", 
    "startTime": "2021-08-20T12:00:00Z"
}
```

## 返回示例
```
{
    "code": 200, 
    "requestId": "bgvmivir54gddpgi764se9f4kfr7ge41", 
    "result": {
        "taskId": "9"
    }
}
```
