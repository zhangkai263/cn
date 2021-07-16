# disableWebRuleCCProtectionRule


## 描述
关闭网站类规则的自定义 CC 防护规则总开关, 所有自定义 CC 防护规则失效

## 请求方式
POST

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/webRules/{webRuleId}:disableWebRuleCCProtectionRule

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |高防实例 Id|
|**webRuleId**|String|True| |网站规则 Id|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](disablewebruleccprotectionrule#result)| |
|**requestId**|String| |
|**error**|[Error](disablewebruleccprotectionrule#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](disablewebruleccprotectionrule#err)| |
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
|**code**|Integer|0: 关闭失败, 1: 关闭成功|
|**message**|String|关闭失败时给出具体原因|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
