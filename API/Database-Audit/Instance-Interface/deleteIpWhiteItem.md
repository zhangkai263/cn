# deleteIpWhiteItem


## 描述
删除一条IP白名单记录

## 请求方式
DELETE

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/instances/{insId}/ipwhitelist

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|
|**insId**|String|True| |审计实例ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**cidr**|String|False| |IP白名单记录，支持掩码|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
