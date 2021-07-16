# deleteAuditFromAgent


## 描述
取消对该数据库的审计，支持批量，多个ID用英文逗号分隔

## 请求方式
DELETE

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/agents/{agentId}/database/{databaseId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|
|**databaseId**|String|True| |数据库ID|
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
