# createBackup


## 描述
创建备份

## 请求方式
POST

## 请求地址
https://mongodb.jdcloud-api.com/v1/regions/{regionId}/backups

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**instanceId**|String|True| |实例ID|
|**backupName**|String|False| |备份名称|
|**backupMethod**|String|False| |备份方式，Logical - 逻辑备份、Physical - 物理备份|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createbackup#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**backupId**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
