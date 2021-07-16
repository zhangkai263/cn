# addRuleGroup


## 描述
新增规则组

## 请求方式
POST

## 请求地址
https://dbaudit.jdcloud-api.com/v1/regions/{regionId}/instances/{insId}/ruleGroups

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|
|**insId**|String|True| |审计实例ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**ruleGroup**|[RuleGroup](addrulegroup#rulegroup)|True| |规则组详情|
|**dbId**|String|False| |数据库ID|

### <div id="rulegroup">RuleGroup</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**ruleGroupId**|String|False| |规则组ID(新建规则组时不需要传递此值)|
|**ruleGroupName**|String|False| |规则组名称|
|**dbUserCase**|Boolean|False| |数据库用户是否区分大小写|
|**osUserCase**|Boolean|False| |操作系统用户是否区分大小写|
|**programCase**|Boolean|False| |客户端程序是否区分大小写|
|**enabled**|Boolean|False| |规则组是否启用|
|**copyFromId**|Integer|False| |标识从哪个规则组复制而来|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](addrulegroup#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**ruleGroup**|[RuleGroup](addrulegroup#rulegroup)| |
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
