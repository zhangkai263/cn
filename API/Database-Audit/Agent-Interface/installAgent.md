# installAgent


## 描述
安装数据库审计agent

## 请求方式
POST

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/agents

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**agentSpec**|[AgentSpec](installagent#agentspec)|True| |数据库审计agent配置信息|

### <div id="agentspec">AgentSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**hostId**|String[]|False| |主机ID|
|**limitStatus**|Integer|False| |是否限制CPU/MEM<br>0 否 <br>1 是 此时cpuLimit/memLimit为必填项<br>|
|**cpuLimit**|Float|False| |CPU占用百分比限制,[1,50]单位%|
|**memLimit**|Float|False| |内存占用限制,[1,50]单位%|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](installagent#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**message**|String|安装信息|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|Not Found|
