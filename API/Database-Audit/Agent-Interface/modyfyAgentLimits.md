# modyfyAgentLimits


## 描述
修改agent资源限额,支持多个agentId,英文逗号分隔

## 请求方式
PATCH

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/agents/{agentId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|
|**agentId**|String|True| |agentId/主机Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**limitStatus**|Integer|False| |是否限制 0 不限制 1 限制(cpuLimit/memLimit必填)|
|**cpuLimit**|Integer|False| |cpu使用限制（1%-100%）|
|**memLimit**|Integer|False| |内存占用限额（1%-100%）|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String| |


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|Not Found|
