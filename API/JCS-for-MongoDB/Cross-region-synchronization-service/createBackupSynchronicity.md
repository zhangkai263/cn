# createBackupSynchronicity


## 描述
创建跨区域备份同步服务

## 请求方式
POST

## 请求地址
https://mongodb.jdcloud-api.com/v1/regions/{regionId}/backupSynchronicities

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**instanceId**|String|True| |源实例ID|
|**srcRegion**|String|True| |源实例所在地域|
|**dstRegion**|String|True| |备份同步的目标地域|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createbackupsynchronicity#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**serviceId**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
