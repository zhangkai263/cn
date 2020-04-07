# deleteBackupSynchronicities


## 描述
删除跨地域备份同步服务

## 请求方式
DELETE

## 请求地址
https://mongodb.jdcloud-api.com/v1/regions/{regionId}/backupSynchronicities/{serviceId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**serviceId**|String|True| |service ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](deletebackupsynchronicities#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**serviceId**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
