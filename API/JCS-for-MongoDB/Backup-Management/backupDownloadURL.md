# backupDownloadURL


## 描述
获取备份下载链接

## 请求方式
GET

## 请求地址
https://mongodb.jdcloud-api.com/v1/regions/{regionId}/backups/{backupId}/downloadURL

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**backupId**|String|True| |backup ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](backupdownloadurl#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**backupDownloadURL**|[BackupDownloadURL](backupdownloadurl#backupdownloadurl)| |
### <div id="backupdownloadurl">BackupDownloadURL</div>
|名称|类型|描述|
|---|---|---|
|**backupName**|String|备份名称|
|**backupInternetDownloadURL**|String|公网下载链接的地址|
|**backupIntranetDownloadURL**|String|内网下载链接的地址|
|**linkExpiredTime**|String|公网和内网的下载链接过期时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
