# modifyCCProtectionRuleOfWebRule


## 描述
修改网站类规则的 CC 防护规则

## 请求方式
PATCH

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/webRules/{webRuleId}/ccProtectionRules/{ccProtectionRuleId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |高防实例 Id|
|**webRuleId**|String|True| |网站规则 Id|
|**ccProtectionRuleId**|String|True| |网站类规则的 CC 防护规则 Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**ccProtectionRuleSpec**|[CCProtectionRuleSpec](modifyccprotectionruleofwebrule#ccprotectionrulespec)|True| |修改 CC 防护规则请求参数|

### <div id="ccprotectionrulespec">CCProtectionRuleSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |CC 防护规则名称, 不允许为空, 长度不超过 32 个字符, 支持中文, 大小写字母, 数字及字符'-'、'/'、'.'、'_'|
|**uri**|String|True| |uri, 不允许为空, 以 / 开头, 长度不超过 2048 个字符|
|**matchType**|Integer|True| |匹配 uri 类型, 0: 精确匹配, 1: 前缀匹配|
|**detectPeriod**|Long|True| |检测周期, 单位为秒, 取值范围[5, 10800]|
|**singleIpLimit**|Long|True| |ip 访问次数, 取值范围[2, 2000]|
|**blockType**|Integer|True| |阻断类型, 1: 封禁并返回自定义页面, 2: 人机交互|
|**blockTime**|Long|True| |阻断持续时间, 单位为秒, 取值范围[10, 86400]|
|**pageId**|String|False| |关联的自定义页面id, 阻断类型为封禁时有效, 为空时封禁并返回默认页面|
|**pageName**|String|False| |关联的自定义页面名称|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](modifyccprotectionruleofwebrule#result)| |
|**requestId**|String| |
|**error**|[Error](modifyccprotectionruleofwebrule#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](modifyccprotectionruleofwebrule#err)| |
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
|**code**|Integer|0: 修改失败, 1: 修改成功|
|**message**|String|修改失败时给出具体原因|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
