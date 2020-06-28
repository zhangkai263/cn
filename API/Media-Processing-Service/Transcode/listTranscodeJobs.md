# listTranscodeJobs


## 描述
查询转码作业列表。
支持如下过滤器：
- title[eq] 按照输入视频标题进行精确匹配


## 请求方式
GET

## 请求地址
https://mps.jdcloud-api.com/v1/transcodeJobs


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码；默认值为 1|
|**pageSize**|Integer|False|10|分页大小；默认值为 10；取值范围 [10, 100]|
|**filters**|[Filter[]](user-content-listtranscodejobs#filter)|False| | |

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤器属性名|
|**operator**|String|False| |过滤器操作符，默认值为 eq|
|**values**|String[]|True| |过滤器属性值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](user-content-listtranscodejobs#result)|查询转码作业列表结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**pageNumber**|Integer|当前页码|
|**pageSize**|Integer|每页数量|
|**totalElements**|Integer|查询总数|
|**totalPages**|Integer|总页数|
|**content**|[TranscodeJobInfo[]](user-content-listtranscodejobs#transcodejobinfo)|分页内容|
### <div id="transcodejobinfo">TranscodeJobInfo</div>
|名称|类型|描述|
|---|---|---|
|**jobId**|String|作业ID|
|**title**|String|输入文件标题|
|**tasks**|[TranscodeTaskInfo[]](user-content-listtranscodejobs#transcodetaskinfo)|转码任务集合|
### <div id="transcodetaskinfo">TranscodeTaskInfo</div>
|名称|类型|描述|
|---|---|---|
|**jobId**|String|作业ID|
|**taskId**|String|任务ID|
|**objectKey**|String|输出文件 objectKey|
|**format**|String|输出视频格式|
|**width**|String|输出画面宽度|
|**height**|String|输出画面高度|
|**bitrate**|String|输出码率|
|**framerate**|String|输出帧率|
|**definition**|String|输出清晰度|
|**status**|String|任务状态。in-process, succeeded, failed<br>|
|**finishTime**|String|任务结束时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**500**|Internal server error|
|**503**|Service unavailable|

## 请求示例
GET
```
https://mps.jdcloud-api.com/v1/mt/transcodeJobs?pageNumber=1&pageSize=10

```

## 返回示例
```
{
    "requestId": "bgvmivir54gddpgi764se9f4kfr7ge41", 
    "result": {
        "content": [
            {
                "jobId": "10001", 
                "tasks": [
                    {
                        "bitrate": "32767", 
                        "definition": "HD", 
                        "finishTime": "2020-02-12T12:14:43Z", 
                        "format": "mp4", 
                        "framerate": "25", 
                        "height": "768", 
                        "jobId": "10001", 
                        "objectKey": "冠状病毒怎么预防.mp4", 
                        "status": "1", 
                        "taskId": "10001", 
                        "width": "1024"
                    }
                ], 
                "title": "冠状病毒怎么预防"
            }
        ], 
        "pageNumber": 1, 
        "pageSize": 10, 
        "totalElements": 100, 
        "totalPages": 10
    }
}
```
