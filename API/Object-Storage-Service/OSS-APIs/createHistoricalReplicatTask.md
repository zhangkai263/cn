# createHistoricalReplicatTask


## 描述
创建历史同步任务

## 请求方式
POST

## 请求地址
https://ossopenapi.jdcloud-api.com/v1/regions/{regionId}/buckets/{bucketName}/historical_replicat_task/

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域ID|
|**bucketName**|String|True| |Bucket名称|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**action**|String|True| |是否覆盖|
|**bucketName**|String|True| |bucket名称|
|**bucketRegion**|String|True| |bucket所属区域|
|**targetBucketName**|String|True| |目标bucket名称|
|**targetBucketRegion**|String|True| |目标bucket所属区域|
|**storageClass**|String|True| |存储类型|
|**prefixSet**|String[]|False| | |


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createhistoricalreplicattask#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**historyReplicationTask**|[HistoryReplicationTask](createhistoricalreplicattask#historyreplicationtask)| |
### <div id="historyreplicationtask">HistoryReplicationTask</div>
|名称|类型|描述|
|---|---|---|
|**taskId**|Long| |

## 返回码
|返回码|描述|
|---|---|
|**200**|success|
|**400**|Invalid parameter|
|**500**|Internal server error|
