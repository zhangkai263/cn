# describeAuditLogList


## 描述
获取审计日志列表
时间范围[0-180天]


## 请求方式
GET

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/instances/{insId}/logs

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|
|**insId**|String|True| |审计实例ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码；默认为1|
|**pageSize**|Integer|False|10|分页大小；默认为10；取值范围[10, 100]|
|**startTime**|String|False| |按照时间范围过滤，开始时间|
|**endTime**|String|False| |按照时间范围过滤，结束时间|
|**dbId**|String|False| |按照数据库Id过滤|
|**riskLevel**|String|False| |按照风险级别过滤: 0->无风险，1->低风险，2->中风险，3->高风险，4->致命风险，空字符串查询所有|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeauditloglist#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**totalCount**|Integer|总数|
|**list**|[AuditLogAbstract[]](describeauditloglist#auditlogabstract)| |
### <div id="auditlogabstract">AuditLogAbstract</div>
|名称|类型|描述|
|---|---|---|
|**logId**|String|日志ID|
|**operation**|String|操作类型，如SELECT|
|**captureTime**|String|捕获时间|
|**clientIp**|String|客户端IP|
|**riskLevel**|Integer|风险级别: 0->无风险，1->低风险，2->中风险，3->高风险|
|**duration**|String|执行时间,如5μs,3ms|
|**executeResult**|Integer|执行结果：<br>0：默认<br>1：未知<br>2：登录成功<br>3：登录失败<br>4：超时<br>5：执行成功<br>6：执行失败<br>7：语句不合法<br>8：注销<br>9：会话开始<br>10：阻断<br>11：会话断开<br>|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
