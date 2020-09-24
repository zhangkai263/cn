# addMaskRule


## 描述
添加敏感信息遮蔽规则

## 请求方式
POST

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
|**maskRuleSpec**|[MaskRuleSpec](addmaskrule#maskrulespec)|True| |敏感信息遮蔽规则|

### <div id="maskrulespec">MaskRuleSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**maskRuleName**|String|False| |遮蔽规则名称，长度限制3字节|
|**maskRuleContent**|String|False| |遮蔽规则内容|
|**maskRuleResult**|String|False| |遮蔽结果|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String| |


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
