# modifyRule


## 描述
编辑规则组内的规则

## 请求方式
POST

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
|**rule**|[Rule](modifyrule#rule)|True| |规则详情|
|**dbId**|String|False| |数据库ID|

### <div id="rule">Rule</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**ruleId**|String|False| |规则Id|
|**ruleName**|String|False| |规则名称，长度限制32字节|
|**riskLevel**|Integer|False| |风险级别: 0->无风险，1->低风险，2->中风险，3->高风险,4->致命风险|
|**ruleDesc**|String|False| |规则描述，长度限制128字节|
|**editable**|Boolean|False| |是否可被编辑|
|**status**|Boolean|False| |规则状态（启用/禁用）|
|**clientIpRule**|[RuleLogic](modifyrule#rulelogic)|False| | |
|**clientToolRule**|[RuleLogic](modifyrule#rulelogic)|False| | |
|**clientOsRule**|[RuleLogic](modifyrule#rulelogic)|False| | |
|**clientOsHostRule**|[RuleLogic](modifyrule#rulelogic)|False| | |
|**sqlLineRule**|[RuleLogic](modifyrule#rulelogic)|False| | |
|**keywordRule**|[RuleLogic](modifyrule#rulelogic)|False| | |
|**sqlRegexRule**|[RuleLogic](modifyrule#rulelogic)|False| | |
|**privilegeOperateRule**|[RuleLogic](modifyrule#rulelogic)|False| | |
|**operateTypeRule**|[RuleLogic](modifyrule#rulelogic)|False| | |
|**tableGroupRule**|[RuleLogic](modifyrule#rulelogic)|False| | |
|**columnRule**|[RuleLogic](modifyrule#rulelogic)|False| | |
|**dbAndSchemaRule**|[RuleLogic](modifyrule#rulelogic)|False| | |
|**goalTableRule**|[RuleLogic](modifyrule#rulelogic)|False| | |
|**respondTimeRule**|[RuleLogic](modifyrule#rulelogic)|False| | |
|**influenceRowRule**|[RuleLogic](modifyrule#rulelogic)|False| | |
|**authenticationRule**|[RuleLogic](modifyrule#rulelogic)|False| | |
|**patternGroupRule**|[RuleLogic](modifyrule#rulelogic)|False| | |
|**dbuserRule**|[RuleLogic](modifyrule#rulelogic)|False| | |
|**cveRule**|[CveRule](modifyrule#cverule)|False| | |
### <div id="cverule">CveRule</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**cveId**|String|False| |CVE编号|
|**cveName**|String|False| |CVE名称，长度限制32字节|
|**cveType**|String|False| |CVE类型|
|**cveInfo**|String|False| |CVE描述|
### <div id="rulelogic">RuleLogic</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**enabled**|Boolean|False| |是否启用|
|**logic**|Integer|False| |逻辑: 0->不包含, 1->包含, 2->等于, 3->小于等于, 4->小于, 5->大于等于, 6->大于, 7->不等于, 8->正则|
|**value**|String|False| |值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String| |


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
