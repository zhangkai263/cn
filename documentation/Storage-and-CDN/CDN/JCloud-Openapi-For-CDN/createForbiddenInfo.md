# createForbiddenInfo


## 描述
设置封禁，中国境外/全球加速时暂不支持该配置

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/forbiddenInfo:create


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**forbiddenType**|String|True| |封禁类型，domain 域名封禁,url url封禁|
|**forbiddenDomain**|String|True| |封禁域名|
|**forbiddenUrl**|String|False| |封禁url,多个以;隔开|
|**reason**|String|True| |封禁原因|
|**linkOther**|String|True| |y,n y表示是，n表示否|
|**shareCacheDomainFlag**|String|False| |是否同步操作共享缓存域名,0:仅操作本域名,1:同步操作共享缓存域名,默认为0|
|**token**|String|False| |用于封禁前缀识别的URL,应为单个特殊字符，如：~|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String| |


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
