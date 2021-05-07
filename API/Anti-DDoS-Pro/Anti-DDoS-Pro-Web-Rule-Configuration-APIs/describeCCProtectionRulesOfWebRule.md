# describeCCProtectionRulesOfWebRule


## 描述
查询网站类规则的 CC 防护规则列表

## 请求方式
GET

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/webRules/{webRuleId}/ccProtectionRules

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
|**result**|[Result](describeccprotectionrulesofwebrule#result)| |
|**requestId**|String| |
|**error**|[Error](describeccprotectionrulesofwebrule#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](describeccprotectionrulesofwebrule#err)| |
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
|**dataList**|[CCProtectionRule[]](describeccprotectionrulesofwebrule#ccprotectionrule)| |
|**currentCount**|Long|当前页数量|
|**totalCount**|Long|总数|
|**totalPage**|Long|总页数|
### <div id="ccprotectionrule">CCProtectionRule</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|CC 防护规则 ID|
|**webRuleId**|String|CC 防护规则对应的网站规则 ID|
|**instanceId**|String|CC 防护规则对应的实例 ID|
|**name**|String|CC 防护规则名称, 30 字符以内|
|**enable**|Integer|CC 防护规则状态: 0: 关闭, 1: 开启|
|**uri**|String|uri, 以 / 开头, 200 字符以内|
|**matchType**|Integer|匹配 uri 类型, 0: 精确匹配, 1: 前缀匹配|
|**detectPeriod**|Long|检测周期, 单位为秒, 取值范围[5, 10800]|
|**singleIpLimit**|Long|ip 访问次数, 取值范围[2, 2000]|
|**blockType**|Integer|阻断类型, 1: 封禁并返回自定义页面, 2: 人机交互|
|**blockTime**|Long|阻断持续时间, 单位为秒, 取值范围[10, 86400]|
|**pageId**|String|关联的自定义页面id, 阻断类型为封禁时有效, 为空时封禁并返回默认页面|
|**pageName**|String|关联的自定义页面名称|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
