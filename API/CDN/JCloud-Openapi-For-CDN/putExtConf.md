# putExtConf


## 描述
直播域名设置不常用配置

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/liveDomain/{domain}/extConf:putConf

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|True| |用户域名|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**config**|String|True| | |


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
