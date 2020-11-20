# createPlayBackDomain


## 描述
创建回看域名

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/playBackDomain/{domain}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|True| |用户域名|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**x-jdcloud-channel**|String|False|cdn|域名来源cdn/cdn,video视频云|
|**referDomain**|String|True| |关联的直播域名|
|**externId**|String|True| |外部Id|
|**startTime**|String|False| |开始时间，格式为yyyy-MM-dd HH:mm:ss|
|**endTime**|String|False| |结束时间，格式为yyyy-MM-dd HH:mm:ss|
|**shiftTime**|Long|False| |偏移时间单位秒|
|**allowReviewTimeSpan**|Long|False| |允许最大可看时间单位秒|
|**accelerateRegion**|String|False| |(mainLand:中国大陆，nonMainLand:海外加港澳台，all:全球)默认为中国大陆|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Object| |
|**requestId**|String| |


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
