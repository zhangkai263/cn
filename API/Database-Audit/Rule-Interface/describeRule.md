# describeRule


## 描述
获取规则详情

## 请求方式
GET

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/instances/{insId}/ruleGroups/{ruleGroupId}/rule/{ruleId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|
|**insId**|String|True| |审计实例ID|
|**ruleGroupId**|String|True| |规则组ID|
|**ruleId**|String|True| |规则ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**dbId**|String|False| |数据库ID|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describerule#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**rule**|[Rule](describerule#rule)| |
### <div id="rule">Rule</div>
|名称|类型|描述|
|---|---|---|
|**ruleId**|String|规则Id|
|**ruleName**|String|规则名称，长度限制32字节|
|**riskLevel**|Integer|风险级别: 0->无风险，1->低风险，2->中风险，3->高风险,4->致命风险|
|**ruleDesc**|String|规则描述，长度限制128字节|
|**editable**|Boolean|是否可被编辑|
|**status**|Boolean|规则状态（启用/禁用）|
|**clientIpRule**|[RuleLogic](describerule#rulelogic)| |
|**clientToolRule**|[RuleLogic](describerule#rulelogic)| |
|**clientOsRule**|[RuleLogic](describerule#rulelogic)| |
|**clientOsHostRule**|[RuleLogic](describerule#rulelogic)| |
|**sqlLineRule**|[RuleLogic](describerule#rulelogic)| |
|**keywordRule**|[RuleLogic](describerule#rulelogic)| |
|**sqlRegexRule**|[RuleLogic](describerule#rulelogic)| |
|**privilegeOperateRule**|[RuleLogic](describerule#rulelogic)| |
|**operateTypeRule**|[RuleLogic](describerule#rulelogic)| |
|**tableGroupRule**|[RuleLogic](describerule#rulelogic)| |
|**columnRule**|[RuleLogic](describerule#rulelogic)| |
|**dbAndSchemaRule**|[RuleLogic](describerule#rulelogic)| |
|**goalTableRule**|[RuleLogic](describerule#rulelogic)| |
|**respondTimeRule**|[RuleLogic](describerule#rulelogic)| |
|**influenceRowRule**|[RuleLogic](describerule#rulelogic)| |
|**authenticationRule**|[RuleLogic](describerule#rulelogic)| |
|**patternGroupRule**|[RuleLogic](describerule#rulelogic)| |
|**dbuserRule**|[RuleLogic](describerule#rulelogic)| |
|**cveRule**|[CveRule](describerule#cverule)| |
### <div id="cverule">CveRule</div>
|名称|类型|描述|
|---|---|---|
|**cveId**|String|CVE编号|
|**cveName**|String|CVE名称，长度限制32字节|
|**cveType**|String|CVE类型|
|**cveInfo**|String|CVE描述|
### <div id="rulelogic">RuleLogic</div>
|名称|类型|描述|
|---|---|---|
|**enabled**|Boolean|是否启用|
|**logic**|Integer|逻辑: 0->不包含, 1->包含, 2->等于, 3->小于等于, 4->小于, 5->大于等于, 6->大于, 7->不等于, 8->正则|
|**value**|String|值|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
