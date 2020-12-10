# describeDatabase


## 描述
获取数据库详情

## 请求方式
GET

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/instances/{insId}/databases/{dbId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|
|**insId**|String|True| |审计实例ID|
|**dbId**|String|True| |数据库ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describedatabase#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**databaseDetail**|[DatabaseDetail](describedatabase#databasedetail)| |
### <div id="databasedetail">DatabaseDetail</div>
|名称|类型|描述|
|---|---|---|
|**dbId**|String|京东云数据库引擎ID, dbaudit-aabbccddeeffgg, 全局唯一|
|**dbName**|String|数据库名称，库名|
|**dbAddr**|String|数据库地址, 可以是IP或域名|
|**dbPort**|Integer|数据库端口|
|**dbType**|Integer|数据库类型: <br>0->Oracle<br>1->SQLServer<br>2->DB2<br>3->MySQL<br>4->Cache<br>5->Sybase<br>6->DM7<br>7->Informix<br>9->人大金仓<br>10->Teradata<br>11->Postgresql<br>12->Gbase<br>16->Hive<br>17->MongoDB<br>|
|**dbVersion**|String|数据库版本|
|**dbDesc**|String|数据库的描述|
|**username**|String|用户名，SQLServer获取登录信息使用|
|**password**|String|密码，SQLServer获取登录信息使用|
|**dataMask**|Boolean|是否对数据进行掩码|
|**auditResponse**|Boolean|是否对响应进行审计|
|**state**|Integer|数据库启用状态, 0 停用 1 运行中 2 创建中 3 创建失败|
|**ruleGroups**|[DatabaseRuleGroup[]](describedatabase#databaserulegroup)|数据库引用的规则组|
### <div id="databaserulegroup">DatabaseRuleGroup</div>
|名称|类型|描述|
|---|---|---|
|**ruleGroupId**|String|规则组ID|
|**ruleGroupName**|String|规则组名称|
|**databaseRule**|[DatabaseRule[]](describedatabase#databaserule)|规则组内的所有规则|
### <div id="databaserule">DatabaseRule</div>
|名称|类型|描述|
|---|---|---|
|**ruleId**|String|规则ID|
|**ruleName**|String|规则名称,长度限制32字节,允许英文字母,数字,下划线,中划线和中文|
|**enabled**|Boolean|规则启用状态|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
