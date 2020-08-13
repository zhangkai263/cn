# queryVqdTaskResult


## 描述
查询视频质检任务结果

## 请求方式
GET

## 请求地址
https://vqd.jdcloud-api.com/v1/vqdTasks/{taskId}:queryResult


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**taskId**|String|True| |任务ID，路径参数|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](queryvqdtaskresult#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**vqdTaskResultObject**|[VqdTaskResultObject](queryvqdtaskresult#vqdtaskresultobject)| |
### <div id="vqdtaskresultobject">VqdTaskResultObject</div>
|名称|类型|描述|
|---|---|---|
|**taskId**|String|任务ID|
|**status**|String|结果状态。<br>- FINISHED_SUCCESS<br>- FINISHED_FAILURE<br>|
|**defects**|[VqdDefectObject[]](queryvqdtaskresult#vqddefectobject)| |
|**errorCode**|String|错误码|
### <div id="vqddefectobject">VqdDefectObject</div>
|名称|类型|描述|
|---|---|---|
|**item**|String|检测项目|
|**start**|String|缺陷起始时间戳|
|**end**|String|缺陷结果时间戳|
|**value**|String|缺陷值|
|**info**|String|缺陷检测信息|

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
https://vqd.jdcloud-api.com/v1/vqdTasks/10000:queryResult

```

## 返回示例
```
{
    "requestId": "bgvmivir54gddpgi764se9f4kfr7ge41", 
    "result": {
        "defects": [
            {
                "detection": "BlackScreen", 
                "end": "38.541", 
                "info": "black screen detected", 
                "start": "35.041", 
                "value": "1.0000"
            }
        ], 
        "status": "FINISHED_SUCCESS", 
        "taskId": "10000"
    }
}
```
