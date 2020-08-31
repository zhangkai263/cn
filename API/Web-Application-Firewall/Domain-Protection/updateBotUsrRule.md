# updateBotUsrRule


## 描述
更新网站自定义类型bot规则

## 请求方式
POST

## 请求地址
https://waf.jdcloud-api.com/v1/regions/{regionId}/wafInstanceIds/{wafInstanceId}/bot:updateUsrRule

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |实例所属的地域ID|
|**wafInstanceId**|String|True| |实例Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**req**|[SetBotUsrRuleReq](updatebotusrrule#setbotusrrulereq)|True| |请求|
|**userPin**|String|True| |用户pin|
|**content-language**|String|True| |语言，"en":英文，"zh":中文|

### <div id="setbotusrrulereq">SetBotUsrRuleReq</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**id**|Integer|False| |规则id，新增时为0或不传|
|**domain**|String|True| |域名|
|**ruleName**|String|True| |规则名|
|**detectThrsd**|Integer|True| |次数阈值，[1-20000]|
|**detectPeriod**|Integer|True| |检测时长，秒，[1-20000]|
|**matchItems**|[BotMatchItem[]](updatebotusrrule#botmatchitem)|True| |匹配条件集,总长度不能超过4096|
|**action**|[DenyActionCfg](updatebotusrrule#denyactioncfg)|True| |动作配置，默认为告警,仅支持1和4和5三种动作|
|**ruleType**|String|False| |规则类型，general-通用规则，advanced-高级规则，缺省为general|
### <div id="denyactioncfg">DenyActionCfg</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**atOp**|Integer|True| |黑名单匹配动作类型 1-4 分别表示forbidden@1 redirect@2 verify@captcha3 verify@jscookie4 5-告警(自定义bot增加)，6-302cookie(自定义bot增加)|
|**atVal**|String|True| |黑名单匹配动作内容 当atOp为3/4时，atVal为空，atOp=1时，atVal为自定义页面,atOp=2时，atVal为跳转url。|
### <div id="botmatchitem">BotMatchItem</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**field**|String|True| |匹配字段，ruleType为general时，可为ip,uri,user_agent,referer,cookie， uri只能设置一个。ruleType为advanced时，可为fingerExist(是否存在),fingerValid(合法性)|
|**logic**|Integer|True| |0-完全匹配 1-包含匹配, field为fingerExist/fingerValid时无意义。|
|**value**|String|True| |filed为ip时支持8/16/24位掩码和完全匹配，field为uri且logic为0时需以"/"开头|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|此次请求的ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|BAD_REQUEST|
