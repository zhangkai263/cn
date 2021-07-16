# describeRuleGroups


## 描述
获取规则组列表

## 请求方式
GET

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/instances/{insId}/ruleGroups

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|
|**insId**|String|True| |审计实例ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**dbId**|String|False| |数据库ID|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describerulegroups#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**totalCount**|Integer| |
|**list**|[RuleGroup[]](describerulegroups#rulegroup)| |
### <div id="rulegroup">RuleGroup</div>
|名称|类型|描述|
|---|---|---|
|**ruleGroupId**|String|规则组ID(新建规则组时不需要传递此值)|
|**ruleGroupName**|String|规则组名称|
|**dbUserCase**|Boolean|数据库用户是否区分大小写|
|**osUserCase**|Boolean|操作系统用户是否区分大小写|
|**programCase**|Boolean|客户端程序是否区分大小写|
|**enabled**|Boolean|规则组是否启用|
|**copyFromId**|Integer|标识从哪个规则组复制而来|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
