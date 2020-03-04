# submitTranscodeJob


## 描述
提交转码作业

## 请求方式
POST

## 请求地址
https://mps.jdcloud-api.com/v1/transcodeJobs:submit


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**accessKey**|String|True| |输入对象存储 accessKey，必须参数|
|**secretKey**|String|True| |输入对象存储 accessKey，必须参数|
|**endpoint**|String|True| |输入对象存储 endpoint。必须参数，内网域名，如 s3-internal.cn-north-1.jcloudcs.com|
|**bucket**|String|True| |输入对象存储 bucket，必须参数|
|**objectKey**|String|True| |输入对象存储 objectKey，必须参数|
|**title**|String|False| |输入视频标题，可选参数，默认会从 objectKey 中截取|
|**templateIds**|String[]|True| |转码模板ID集合，必须参数，非空集合|
|**outputConfig**|[TranscodeOutputConfig](submittranscodejob#transcodeoutputconfig)|True| |输出配置，必须参数|

### <div id="transcodeoutputconfig">TranscodeOutputConfig</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**accessKey**|String|False| |输出对象存储 accessKey，可选参数，默认与输入 accessKey 保持一致|
|**secretKey**|String|False| |输出对象存储 secretKey，可选参数，默认与输入 secretKey 保持一致|
|**endpoint**|String|False| |输出对象存储 endpoint。可选参数，内网域名，默认与输入 endpoint 保持一致，如 s3-internal.cn-north-1.jcloudcs.com|
|**bucket**|String|False| |输出对象存储 bucket，可选参数，默认与输入 bucket 保持一致|
|**outputList**|[TranscodeOutputObject[]](submittranscodejob#transcodeoutputobject)|True| |输出集合，必须参数，非空集|
### <div id="transcodeoutputobject">TranscodeOutputObject</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**objectKey**|String|True| |输出对象存储 objectKey，必须参数|
|**templateId**|String|True| |关联模板ID，必须参数|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](submittranscodejob#result)|提交转码作业结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**jobId**|String|转码作业ID|
|**taskIds**|String[]|转码任务ID集合|

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
https://mps.jdcloud-api.com/v1/mt/transcodeJobs:submit

```
```
{
    "accessKey": "Input OSS Access Key", 
    "bucket": "Input OSS bucket", 
    "endpoint": "Input OSS endpoint", 
    "objectKey": "Input OSS Object Key", 
    "outputConfig": {
        "accessKey": "Output OSS Access Key", 
        "bucket": "Output OSS bucket", 
        "endpoint": "Output OSS endpoint", 
        "outputList": [
            {
                "objectKey": "Output OSS Object Key", 
                "templateId": "Related transcode template ID"
            }
        ], 
        "secretKey": "Output OSS Secret Key"
    }, 
    "secretKey": "Input OSS Secret Key", 
    "templateIds": [
        "10001"
    ], 
    "title": "Input file title"
}
```

## 返回示例
```
{
    "requestId": "d2e394ff-f7ff-42b5-8544-8866f999507e", 
    "result": {
        "jobId": "10001", 
        "taskIds": [
            "10001"
        ]
    }
}
```
