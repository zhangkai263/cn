# listBotUsrRules


## 描述
获取网站自定义类型bot规则

## 请求方式
POST

## 请求地址
https://waf.jdcloud-api.com/v1/regions/{regionId}/wafInstanceIds/{wafInstanceId}/bot:listUsrRule

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |实例所属的地域ID|
|**wafInstanceId**|String|True| |实例Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**req**|[ListRulesReq](listbotusrrules#listrulesreq)|True| |请求|
|**userPin**|String|True| |用户pin|
|**content-language**|String|True| |语言，"en":英文，"zh":中文|

### <div id="listrulesreq">ListRulesReq</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**wafInstanceId**|String|True| |WAF实例id|
|**domain**|String|True| |域名|
|**ruleType**|String|False| |规则类型|
|**pageIndex**|Integer|False| |页码，[1-100]，默认是1|
|**pageSize**|Integer|False| |页大小，[1-100]，默认是10|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](listbotusrrules#result)| |
|**requestId**|String|此次请求的ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**pageIndex**|Integer|页码|
|**pageSize**|Integer|页大小|
|**totalCount**|Integer|配置总数|
|**list**|[UsrBotRules](listbotusrrules#usrbotrules)|自定义类型bot规则|
### <div id="usrbotrules">UsrBotRules</div>
|名称|类型|描述|
|---|---|---|
|**id**|Integer|规则id|
|**ruleName**|String|规则名|
|**detectThrsd**|Integer|次数阈值|
|**detectPeriod**|Integer|检测时长，秒|
|**matchItems**|[BotMatchItem[]](listbotusrrules#botmatchitem)|匹配条件集,总长度不能超过4096|
|**action**|[DenyActionCfg](listbotusrrules#denyactioncfg)|动作配置，默认为告警|
|**disable**|Integer|0-使用中 1-禁用|
|**updateTime**|Integer|更新时间|
### <div id="denyactioncfg">DenyActionCfg</div>
|名称|类型|描述|
|---|---|---|
|**atOp**|Integer|黑名单匹配动作类型 1-4 分别表示forbidden@1 redirect@2 verify@captcha3 verify@jscookie4 5-告警(自定义bot增加)，6-302cookie(自定义bot增加)|
|**atVal**|String|黑名单匹配动作内容 当atOp为3/4时，atVal为空，atOp=1时，atVal为自定义页面,atOp=2时，atVal为跳转url。|
### <div id="botmatchitem">BotMatchItem</div>
|名称|类型|描述|
|---|---|---|
|**field**|String|匹配字段，ruleType为general时，可为ip,uri,user_agent,referer,cookie， uri只能设置一个。ruleType为advanced时，可为fingerExist(是否存在),fingerValid(合法性)|
|**logic**|Integer|0-完全匹配 1-包含匹配, field为fingerExist/fingerValid时无意义。|
|**value**|String|filed为ip时支持8/16/24位掩码和完全匹配，field为uri且logic为0时需以"/"开头|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|BAD_REQUEST|
