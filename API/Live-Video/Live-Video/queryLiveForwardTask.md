# queryLiveForwardTask


## 描述
查询直播拉流转推任务


## 请求方式
GET

## 请求地址
https://live.jdcloud-api.com/v1/LiveForwardTask:query


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNum**|Integer|False|1|页码<br>- 取值范围 [1, 100000]<br>|
|**pageSize**|Integer|False|10|分页大小<br>- 取值范围 [10, 100]<br>|
|**filters**|[Filter[]](queryliveforwardtask#filter)|False| |拉流转推任务查询过滤条件:<br>- name:   taskId 任务ID<br>- value:  如果参数为空，则查询全部<br>- name:   taskName 任务名称<br>- value:  如果参数为空，则查询全部<br>|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤器属性名|
|**operator**|String|False| |过滤器操作符，默认值为 eq|
|**values**|String[]|True| |过滤器属性值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](queryliveforwardtask#result)| |
|**requestId**|String|requestId|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**pageNumber**|Integer|当前页码|
|**pageSize**|Integer|每页数量|
|**totalCount**|Integer|查询总数|
|**dataList**|[LiveTaskInfo[]](queryliveforwardtask#livetaskinfo)|模板信息|
### <div id="livetaskinfo">LiveTaskInfo</div>
|名称|类型|描述|
|---|---|---|
|**id**|Integer|任务ID<br>|
|**startMode**|Integer|执行方式<br>- 0  立即执行<br>- 1  定时执行，根据参数设定的时间<br>|
|**sourceUrl**|String|拉流转推地址<br>|
|**pushUrl**|String|推流地址<br>|
|**status**|Integer|任务状态:<br>  - 0  任务启用<br>  - 1  任务运行中<br>  - 4  任务停止<br>  - 5  任务过期<br>  - 6  任务禁用<br>|
|**startTime**|String|任务开始时间<br>- UTC时间， ISO8601示例：2021-07-26T08:08:08Z<br>|
|**endTime**|String|任务结束时间<br>- UTC时间， ISO8601示例：2021-07-26T08:08:08Z<br>|
|**callbackEvent**|Integer|回调类型:<br>  - 0  当callbackUrl为空时，此值为0<br>  - 1  任务开始<br>  - 2  任务结束<br>  - 3  全部回调<br>|
|**callbackUrl**|String|回调地址|

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
https://live.jdcloud-api.com/v1/LiveForwardTask:query

```

```
"https://live.jdcloud-api.com/v1/LiveForwardTask:query?pageNum=1&pageSize=10&filters.1.name=taskId&filters.1.values.1=2"
```

## 返回示例
```
{
    "code": 200, 
    "requestId": "bgvmivir54gddpgi764se9f4kfr7ge41", 
    "result": {
        "liveTaskList": [
            {
                "callbackEvent": 0, 
                "callbackUrl": "", 
                "createTime": "2021-08-20T02:46:23Z", 
                "endTime": "2021-08-26T09:00:00Z", 
                "id": 4, 
                "pushUrl": "rtmp://127.0.0.1", 
                "sourceUrl": "rtmp://127.0.0.1", 
                "startMode": 1, 
                "startTime": "2021-08-20T12:00:00Z", 
                "status": 2, 
                "updateTime": "2021-08-23T06:54:25Z"
            }, 
            {
                "callbackEvent": 3, 
                "callbackUrl": "http://127.0.0.1", 
                "createTime": "2021-08-20T02:46:23Z", 
                "endTime": "2021-08-26T09:00:00Z", 
                "id": 5, 
                "pushUrl": "rtmp://127.0.0.1", 
                "sourceUrl": "rtmp://127.0.0.1", 
                "startMode": 1, 
                "startTime": "2021-08-20T12:00:00Z", 
                "status": 0, 
                "updateTime": "2021-08-23T06:54:25Z"
            }
        ], 
        "pageNumber": 1, 
        "pageSize": 2, 
        "totalCount": 1
    }
}
```
