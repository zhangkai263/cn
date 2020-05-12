# modifyBackupPolicy


## 描述
修改缓存Redis实例的自动备份策略，可修改备份周期和备份时间

## 请求方式
PATCH

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/cacheInstance/{cacheInstanceId}/backupPolicy

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|
|**cacheInstanceId**|String|True| |缓存Redis实例ID，是访问实例的唯一标识|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**backupTime**|String|True| |备份时间，格式为：HH:mm-HH:mm 时区，例如"01:00-02:00 +0800"，表示东八区的1点到2点|
|**backupPeriod**|String|True| |备份周期，包括：Monday，Tuesday，Wednesday，Thursday，Friday，Saturday，Sunday，多个用逗号分隔|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|本次请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
