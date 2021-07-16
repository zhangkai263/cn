# describeAgentDatabases


## 描述
获取数据库审计agent审计的数据库列表

## 请求方式
GET

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/agents/{agentId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|
|**agentId**|String|True| |agentId/主机Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码；默认为1|
|**pageSize**|Integer|False|10|分页大小；默认为10；取值范围[10, 100]|
|**nameFilter**|String|False| |检索的数据库名称|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeagentdatabases#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**auditInfo**|[AuditInfo](describeagentdatabases#auditinfo)| |
### <div id="auditinfo">AuditInfo</div>
|名称|类型|描述|
|---|---|---|
|**dbName**|String|数据库名称|
|**dbType**|Integer|数据库类型: <br>0->Oracle<br>1->SQLServer<br>2->DB2<br>3->MySQL<br>4->Cache<br>5->Sybase<br>6->DM7<br>7->Informix<br>9->人大金仓<br>10->Teradata<br>11->Postgresql<br>12->Gbase<br>16->Hive<br>17->MongoDB<br>|
|**dbAddress**|String|数据库地址|
|**dbPort**|String|数据库端口|
|**insId**|String|数据库审计实例ID|
|**insName**|String|数据库审计实例名称|
|**insAddress**|String|数据库审计实例地址|
|**createTime**|String|数据库添加时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|Not Found|
