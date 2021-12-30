# imageTasks


## 描述

查询镜像任务详情。

任务关联操作说明请参考帮助文档：
[导入私有镜像](https://docs.jdcloud.com/cn/virtual-machines/import-private-image)
[导出私有镜像](https://docs.jdcloud.com/cn/virtual-machines/export-private-image)

## 接口说明
- 调用该接口可查询镜像导入或导出的任务详情。


## 请求方式
GET

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/imageTasks

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**taskAction**|String|是|ImportImage|任务操作类型。<br>可选值：`ImportImage`：镜像导入、`ExportImage`：镜像导出。|
|**taskIds**|String[]|否|\["101","102"]|任务id列表。|
|**taskStatus**|String|否|finished|任务状态。可选值：`pending、running、failed、finished`。|
|**startTime**|String|否|2020-07-02 17:34:44|任务开始时间。|
|**endTime**|String|否|2020-07-02 17:35:00|任务结束时间。|
|**pageNumber**|Integer|否| |页码。默认为1。|
|**pageSize**|Integer|否| |分页大小。取值范围：`[1, 10]`，默认为10；。|


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**result**|[Result](imageTasks#user-content-result)| |响应结果。|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

### <div id="user-content-result">Result</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**taskSet**|[TaskInfo[]](imageTasks#user-content-taskinfo)| |镜像导入/导出任务详情。|
|**totalCount**|Integer| |总数量|

### <div id="user-content-taskinfo">TaskInfo</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**taskId**|String| 7094|任务ID。|
|**action**|String|ImportImage|任务操作类型。可能值：`ImportImage、ExportImage`。|
|**taskStatus**|String|finished|任务状态。可能值：`pending、running、failed、finished`。|
|**progress**|Integer|50|任务进度，仅显示数值，单位为百分比。|
|**message**|String| |任务额外信息。任务失败时此参数显示具体原因。|
|**createdTime**|String|2020-07-02 17:34:44|任务创建时间。|
|**finishedTime**|String|2020-07-02 17:35:00|任务完成时间。|


## 请求示例
GET

```
/v1/regions/cn-north-1/imageTasks?TaskAction=ImportImage&taskIds.1=709&taskIds.2=794
```



## 返回示例
```
{
    "requestId": "69db71cd3b3e1de601ff3485183866bf", 
    "result": {
        "taskSet": [
            {
                "action": "ImportImageTask", 
                "createdTime": "2021-07-02 17:34:44", 
                "errorInfo": "", 
                "finishedTime": "2021-07-02 17:42:05", 
                "message": "", 
                "progress": 100, 
                "taskId": "7094", 
                "taskStatus": "finished"
            }, 
            {
                "action": "ImportImageTask", 
                "createdTime": "2020-11-30 22:11:07", 
                "errorInfo": "", 
                "finishedTime": "2020-11-30 22:12:35", 
                "message": "", 
                "progress": 100, 
                "taskId": "709", 
                "taskStatus": "finished"
            }
        ], 
        "totalCount": 2
    }
}
```

## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**400**|OUT_OF_RANGE|PageSize out of range|分页大小超出规定范围。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
