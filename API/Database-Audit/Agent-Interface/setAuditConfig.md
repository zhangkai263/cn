# setAuditConfig


## 描述
配置数据库审计信息

## 请求方式
PATCH

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/agents

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**auditConfig**|[AuditConfig](setauditconfig#auditconfig)|True| |数据库审计信息|

### <div id="auditconfig">AuditConfig</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**agentId**|String[]|False| |agentID列表|
|**auditSpec**|[AuditSpec[]](setauditconfig#auditspec)|False| |实例配置信息|
|**netCard**|String[]|False| |网卡列表|
### <div id="auditspec">AuditSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**insId**|String|False| |数据库审计实例ID|
|**dbId**|String|False| |数据库审计实例下的dbId,支持多个,用英文逗号分隔|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String| |


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|Not Found|
