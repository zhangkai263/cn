# describeDatabases


## 描述
获取数据库列表

## 请求方式
GET

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/instances/{insId}/databases

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|
|**insId**|String|True| |审计实例ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describedatabases#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**insDomain**|String|Agent域名|
|**totalCount**|Integer|总数量|
|**list**|[Database[]](describedatabases#database)| |
### <div id="database">Database</div>
|名称|类型|描述|
|---|---|---|
|**dbId**|String|数据库ID|
|**dbName**|String|数据库名称,长度限制32字节,允许英文字母,数字,下划线,中划线和中文|
|**dbDesc**|String|数据库的描述,长度限制128字节|
|**dbPort**|Integer|数据库端口|
|**dbVersion**|String|数据库版本|
|**dbType**|Integer|数据库类型: <br>0->Oracle<br>1->SQLServer<br>2->DB2<br>3->MySQL<br>4->Cache<br>5->Sybase<br>6->DM7<br>7->Informix<br>9->人大金仓<br>10->Teradata<br>11->Postgresql<br>12->Gbase<br>16->Hive<br>17->MongoDB<br>|
|**agentPort**|Integer|审计端口|
|**dbAddr**|String|数据库地址，如 ip:port 或 域名:port|
|**state**|Integer|数据库启用状态, 0 停用 1 运行中 2 创建中 3 创建失败|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
