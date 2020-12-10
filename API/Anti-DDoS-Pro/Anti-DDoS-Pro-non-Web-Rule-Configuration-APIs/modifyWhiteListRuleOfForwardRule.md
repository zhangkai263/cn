# modifyWhiteListRuleOfForwardRule


## 描述
修改转发规则的白名单规则

## 请求方式
PATCH

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/forwardRules/{forwardRuleId}/forwardWhiteListRule

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |高防实例 Id|
|**forwardRuleId**|String|True| |转发规则 Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**modifySpec**|[ModifyWhiteListRuleOfForwardRuleSpec](modifywhitelistruleofforwardrule#modifywhitelistruleofforwardrulespec)|True| |修改转发规则的黑名单规则请求参数|

### <div id="modifywhitelistruleofforwardrulespec">ModifyWhiteListRuleOfForwardRuleSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**ipSetId**|String|True| |待引用的 IP 黑白名单 Id|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](modifywhitelistruleofforwardrule#result)| |
|**requestId**|String| |
|**error**|[Error](modifywhitelistruleofforwardrule#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](modifywhitelistruleofforwardrule#err)| |
### <div id="err">Err</div>
|名称|类型|描述|
|---|---|---|
|**code**|Long|同http code|
|**details**|Object| |
|**message**|String| |
|**status**|String|具体错误|
### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**code**|Integer|修改结果, 0: 修改失败, 1: 修改成功|
|**message**|String|修改失败时给出具体原因|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
