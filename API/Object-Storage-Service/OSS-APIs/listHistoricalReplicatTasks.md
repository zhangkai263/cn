# listHistoricalReplicatTasks


## 描述
根据bucket名称获取该bucket下的同步任务列表

## 请求方式
GET

## 请求地址
https://ossopenapi.jdcloud-api.com/v1/regions/{regionId}/buckets/{bucketName}/historical_replicat_task/

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域ID|
|**bucketName**|String|True| |Bucket名称|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**marker**|String|False| |同步任务列表开始的key|
|**limit**|Integer|False| |每次查询返回的结果数，默认为1000|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](listhistoricalreplicattasks#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**listResult**|[ListResult](listhistoricalreplicattasks#listresult)| |
### <div id="listresult">ListResult</div>
|名称|类型|描述|
|---|---|---|
|**historyReplicationTaskInfoList**|[HistoryReplicationTaskInfo[]](listhistoricalreplicattasks#historyreplicationtaskinfo)| |
|**nextMarker**|String|下次查询开始的object|
### <div id="historyreplicationtaskinfo">HistoryReplicationTaskInfo</div>
|名称|类型|描述|
|---|---|---|
|**taskId**|Long| |
|**action**|String|是否覆盖|
|**bucketName**|String|bucket名称|
|**bucketRegion**|String|bucket所属区域|
|**targetBucketName**|String|目标bucket名称|
|**targetBucketRegion**|String|目标bucket所属区域|
|**storageClass**|String|存储类型|
|**prefixSet**|String[]| |
|**createdTime**|String|任务创建时间|
|**progress**|Double|任务进度|
|**status**|String|任务状态|

## 返回码
|返回码|描述|
|---|---|
|**200**|success|
