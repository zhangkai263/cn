# describeMaskRuleList


## 描述
获取敏感信息遮蔽规则列表

## 请求方式
GET

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/instances/{insId}/databases/{dbId}/maskRules

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|
|**insId**|String|True| |审计实例ID|
|**dbId**|String|True| |数据库ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码；默认为1|
|**pageSize**|Integer|False|10|分页大小；默认为10；取值范围[10, 100]|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describemaskrulelist#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**totalCount**|Integer|总数|
|**list**|[MaskRuleDetail[]](describemaskrulelist#maskruledetail)| |
### <div id="maskruledetail">MaskRuleDetail</div>
|名称|类型|描述|
|---|---|---|
|**maskRuleId**|String|遮蔽规则ID|
|**insId**|String|遮蔽规则ID|
|**dbId**|String|遮蔽规则ID|
|**maskRuleName**|String|遮蔽规则名称,长度限制32字节|
|**maskRuleContent**|String|遮蔽规则内容|
|**maskRuleResult**|String|遮蔽结果|
|**enabled**|Boolean|遮蔽规则启用状态|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
