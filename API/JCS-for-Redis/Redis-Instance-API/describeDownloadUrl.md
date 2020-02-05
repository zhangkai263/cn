# describeDownloadUrl


## 描述
获取缓存Redis实例的备份文件临时下载地址

## 请求方式
GET

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/cacheInstance/{cacheInstanceId}/backup:describeDownloadUrl

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|
|**cacheInstanceId**|String|True| |缓存Redis实例ID，是访问实例的唯一标识|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**baseId**|String|True| |备份任务ID|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#Result)|结果|
|**requestId**|String|本次请求ID|

### <a name="Result">Result</a>
|名称|类型|描述|
|---|---|---|
|**downloadUrls**|[DownloadUrl[]](#DownloadUrl)|备份文件下载信息列表|
### <a name="DownloadUrl">DownloadUrl</a>
|名称|类型|描述|
|---|---|---|
|**name**|String|名称|
|**link**|String|下载链接|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
