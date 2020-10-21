# abortHistoricalReplicatTask


## 描述
停止bucket名称获取该bucket下的同步任务

## 请求方式
POST

## 请求地址
https://ossopenapi.jdcloud-api.com/v1/regions/{regionId}/buckets/{bucketName}/historical_replicat_task/{taskId}/abort

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**taskId**|String|True| |任务ID|
|**regionId**|String|True| |区域ID|
|**bucketName**|String|True| |Bucket名称|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String| |


## 返回码
|返回码|描述|
|---|---|
|**200**|success|
