# uninstallAgent


## 描述
卸载agent，支持批量，多个ID用英文逗号分隔

## 请求方式
DELETE

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/agents/{agentId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|
|**agentId**|String|True| |agentId/主机Id|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String| |


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|Not Found|
