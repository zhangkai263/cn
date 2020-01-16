# listVqdTasks


## 描述
查询视频质检任务列表
支持过滤查询：
  - createTime,ge 最早任务创建时间
  - createTime,le 最晚任务创建时间
  - status,in 任务状态


## 请求方式
GET

## 请求地址
https://vqd.jdcloud-api.com/v1/vqdTasks


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码；默认值为 1|
|**pageSize**|Integer|False|10|分页大小；默认值为 10；取值范围 [10, 100]|
|**filters**|[Filter[]](listvqdtasks#filter)|False| | |

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤器属性名|
|**operator**|String|False| |过滤器操作符，默认值为 eq|
|**values**|String[]|True| |过滤器属性值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](listvqdtasks#result)|查询视频质检模板列表信息结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**pageNumber**|Integer|当前页码|
|**pageSize**|Integer|每页数量|
|**totalElements**|Integer|查询总数|
|**totalPages**|Integer|总页数|
|**content**|[VqdTaskObject[]](listvqdtasks#vqdtaskobject)|分页内容|
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
|**500**|Internal server error|
|**503**|Service unavailable|

## 请求示例
GET
```
https://vqd.jdcloud-api.com/v1/vqdTasks

```

## 返回示例
```
{
    "requestId": "bgvmivir54gddpgi764se9f4kfr7ge41", 
    "result": {
        "content": [
            {
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
        ], 
        "pageNumber": 1, 
        "pageSize": 10, 
        "totalElements": 1, 
        "totalPages": 1
    }
}
```
