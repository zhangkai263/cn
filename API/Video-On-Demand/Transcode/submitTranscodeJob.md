# submitTranscodeJob


## 描述
提交转码作业

## 请求方式
POST

## 请求地址
https://vod.jdcloud-api.com/v1/transcodeTasks:submitJob


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**videoId**|String|False| |视频ID|
|**templateGroupId**|String|False| |转码模板组ID。若此字段不为空，则以模板组方式提交作业，templateIds字段将被忽略。|
|**templateIds**|Long[]|False| |转码模板ID列表|
|**watermarkIds**|Long[]|False| |水印ID列表|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](submittranscodejob#result)|提交转码作业结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**tasks**|[SubmittedTranscodeTask[]](submittranscodejob#submittedtranscodetask)|已提交的转码任务|
### <div id="submittedtranscodetask">SubmittedTranscodeTask</div>
|名称|类型|描述|
|---|---|---|
|**taskId**|Long|任务ID|
|**videoId**|String|视频ID|
|**packageType**|String|打包类型。取值范围：None, HLSPackage|
|**templateId**|Long|转码模板ID。非打包转码，包含此字段。|
|**templateGroupId**|String|转码模板组ID。若是以模板组方式提交作业，生成的转码任务中包含此字段。|
|**templateIds**|Long[]|模板ID列表。|
|**watermarkIds**|Long[]|水印ID列表|

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
https://vod.jdcloud-api.com/v1/transcodeTasks:submitJob

```

```
{
    "templateIds": [
        1, 
        2
    ], 
    "videoId": "343a6194-85ea-49bd-8b43-df1c654f5d79", 
    "watermarkIds": [
        1, 
        2
    ]
}
```

## 返回示例
```
{
    "requestId": "d2e394ff-f7ff-42b5-8544-8866f999507e", 
    "result": {
        "tasks": [
            {
                "taskId": 1, 
                "templateId": 1, 
                "videoId": "343a6194-85ea-49bd-8b43-df1c654f5d79", 
                "watermarkIds": [
                    1, 
                    2
                ]
            }, 
            {
                "taskId": 2, 
                "templateId": 2, 
                "videoId": "343a6194-85ea-49bd-8b43-df1c654f5d79", 
                "watermarkIds": [
                    1, 
                    2
                ]
            }
        ]
    }
}
```
