# describeAuditLog


## 描述
查看审计日志详情

## 请求方式
GET

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/instances/{insId}/logs/{logId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|
|**insId**|String|True| |审计实例ID|
|**logId**|String|True| |审计日志ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeauditlog#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**auditLogDetail**|[AuditLogDetail](describeauditlog#auditlogdetail)| |
### <div id="auditlogdetail">AuditLogDetail</div>
|名称|类型|描述|
|---|---|---|
|**clientIp**|String|客户端IP|
|**clientIpName**|String|客户端IP名称|
|**clientPort**|Integer|客户端端口|
|**clientMac**|String|客户端MAC|
|**clientHostName**|String|客户端主机名称|
|**clientMacAddr**|String|客户端主机MAC地址|
|**dbName**|String|操作的数据库名称|
|**tableName**|String|操作的数据库表名称|
|**dbUser**|String|数据库用户名|
|**dbTool**|String|数据库工具|
|**sqlIdentity**|String|查询语句标识|
|**sqlType**|String|操作类型|
|**target**|String|操作对象|
|**affectLines**|Integer|影响行数|
|**duration**|String|执行时间,如5μs,3ms|
|**captureTime**|String|捕获时间|
|**sqlQuery**|String|SQL详细语句|
|**sqlResult**|String|SQL语句执行结果|
|**riskLevel**|Integer|风险级别: 0->无风险，1->低风险，2->中风险，3->高风险|
|**riskRuleId**|String|命中规则ID|
|**riskRuleName**|String|命中规则名称|
|**riskRuleType**|String|命中规则类型|
|**riskRuleGroup**|String|命中规则所属规则组名称|
|**riskDesc**|String|命中规则详细描述|
|**executeResult**|Integer|执行结果：<br>0：默认<br>1：未知<br>2：登录成功<br>3：登录失败<br>4：超时<br>5：执行成功<br>6：执行失败<br>7：语句不合法<br>8：注销<br>9：会话开始<br>10：阻断<br>11：会话断开|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
