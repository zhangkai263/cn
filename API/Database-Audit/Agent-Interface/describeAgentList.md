# describeAgentList


## 描述
获取数据库审计agent主机列表

## 请求方式
GET

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/agents

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码；默认为1|
|**pageSize**|Integer|False|10|分页大小；默认为10；取值范围[10, 100]|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeagentlist#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**totalCount**|Integer| |
|**list**|[AgentInfo[]](describeagentlist#agentinfo)|数据库审计agent列表|
### <div id="agentinfo">AgentInfo</div>
|名称|类型|描述|
|---|---|---|
|**agnetId**|String|agentID|
|**hostId**|String|主机ID|
|**osType**|String|操作系统类型 Windows Server | CentOS|
|**hostName**|String|主机名称|
|**agentStatus**|Integer|agent运行状态 0 安装中 1 运行中 2 离线 3 已卸载 4 待配置 5 安装失败(ifrit安装失败，需要重试或者手动安装)|
|**ifritStatus**|Integer|ifrit客户端的状态 0 安装成功 1 离线状态|
|**auditCount**|Integer|agent审计的数据库数量|
|**limitStatus**|Integer|是否限制CPU/MEM<br>0 否 <br>1 是 此时cpuLimit/memLimit为必填项<br>|
|**cpuLimit**|Float|CPU限制，单位%|
|**memLimit**|Float|内存限制，单位%|
|**cpuPercent**|Float|CPU实时占比，单位%|
|**memPercert**|Float|内存实时占比，单位%|
|**memTotal**|Integer|内存总量,单位MB|
|**cpuTotal**|Integer|CPU核数,单位核数|
|**installTime**|String|agent安装时间|
|**lastUpdateTime**|String|最后一次上报数据时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|Not Found|
