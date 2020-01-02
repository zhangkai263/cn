# describeBackups


## 描述
查询缓存Redis实例的备份结果（备份文件列表），可分页、可指定起止时间或备份任务ID

## 请求方式
GET

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/cacheInstance/{cacheInstanceId}/backup

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|
|**cacheInstanceId**|String|True| |缓存Redis实例ID，是访问实例的唯一标识|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False| |页码；默认为1|
|**pageSize**|Integer|False| |分页大小；默认为10；取值范围[10, 100]|
|**startTime**|String|False| |开始时间|
|**endTime**|String|False| |结束时间|
|**baseId**|String|False| |备份任务ID|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#Result)|结果|
|**requestId**|String|本次请求ID|

### <a name="Result">Result</a>
|名称|类型|描述|
|---|---|---|
|**backups**|[Backup[]](#Backup)|备份结果（备份文件）列表|
|**totalCount**|Integer|备份结果总数|
### <a name="Backup">Backup</a>
|名称|类型|描述|
|---|---|---|
|**baseId**|String|备份操作ID|
|**backupFileName**|String|备份文件的名称|
|**cacheInstanceId**|String|备份文件对应的实例ID|
|**backupStartTime**|String|备份开始时间（ISO 8601标准的UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ）|
|**backupEndTime**|String|备份结束时间（ISO 8601标准的UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ）|
|**backupType**|Integer|备份类型，1表示手动备份，0表示自动备份|
|**backupSize**|Long|备份文件总字节大小，如果实例是集群版，则表示每个分片备份文件大小的总和|
|**backupStatus**|Integer|备份任务状态状态，0表示备份中，1表示失败，2表示成功|
|**backupDownloadURL**|String|备份文件下载地址（已废弃，调用获取备份文件下载地址接口获取）|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
