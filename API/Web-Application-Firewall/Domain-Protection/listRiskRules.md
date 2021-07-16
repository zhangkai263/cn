# listRiskRules


## 描述
获取网站业务风控规则

## 请求方式
POST

## 请求地址
https://waf.jdcloud-api.com/v1/regions/{regionId}/wafInstanceIds/{wafInstanceId}/risk:listRiskRules

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |实例所属的地域ID|
|**wafInstanceId**|String|True| |实例Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**req**|[ListRulesReq](listriskrules#listrulesreq)|True| |请求|
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
|**result**|[Result](listriskrules#result)| |
|**requestId**|String|此次请求的ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**pageIndex**|Integer|页码|
|**pageSize**|Integer|页大小|
|**count**|Integer|配置总数|
|**data**|[RiskRuleCfg](listriskrules#riskrulecfg)|规则|
### <div id="riskrulecfg">RiskRuleCfg</div>
|名称|类型|描述|
|---|---|---|
|**id**|Integer|规则id|
|**wafInstanceId**|String|WAF实例id|
|**domain**|String|域名|
|**name**|String|规则名称|
|**uri**|String|uri 以/开头|
|**action**|String|动作 支持notice / verify@captcha|
|**disable**|Integer|0-使用中 1-禁用|
|**updateTime**|Integer|更新时间，s|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|BAD_REQUEST|
