# enableWebRuleCCProtectionRule


## 描述
开启网站类规则的自定义 CC 防护规则总开关, 状态为开启的自定义 CC 防护规则生效

## 请求方式
POST

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/webRules/{webRuleId}:enableWebRuleCCProtectionRule

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
|**result**|[Result](enablewebruleccprotectionrule#result)| |
|**requestId**|String| |
|**error**|[Error](enablewebruleccprotectionrule#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](enablewebruleccprotectionrule#err)| |
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
|**code**|Integer|0: 开启失败, 1: 开启成功|
|**message**|String|开启失败时给出具体原因|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
