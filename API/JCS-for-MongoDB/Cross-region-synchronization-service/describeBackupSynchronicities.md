# describeBackupSynchronicities


## 描述
查询跨区域备份同步服务

## 请求方式
GET

## 请求地址
https://mongodb.jdcloud-api.com/v1/regions/{regionId}/backupSynchronicities

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False| |页码；默认为1，取值范围：[1,∞)|
|**pageSize**|Integer|False| |分页大小；默认为10；取值范围[1, 100]|
|**filters**|[Filter[]](describebackupsynchronicities#filter)|False| | |

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describebackupsynchronicities#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**backupSynchronicities**|[BackupSynchronicity[]](describebackupsynchronicities#backupsynchronicity)| |
|**totalCount**|Integer| |
|**pageNumber**|Integer| |
### <div id="backupsynchronicity">BackupSynchronicity</div>
|名称|类型|描述|
|---|---|---|
|**serviceId**|String|跨地域备份同步服务ID|
|**instanceId**|String|MongoDB 实例ID|
|**instanceName**|String|MongoDB 实例名称|
|**serviceStatus**|String|跨地域备份同步服务状态，正常，running；错误，error|
|**srcRegion**|String|源实例所在地域|
|**dstRegion**|String|跨地域备份同步服务的目的地域|
|**engine**|String|数据库类型|
|**engineVersion**|String|数据库版本|
|**createTime**|String|创建时间|
|**newestDataTime**|String|跨地域备份的最新数据时间点|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
