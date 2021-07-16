# setBotStdRules


## 描述
设置网站已知类型bot规则

## 请求方式
POST

## 请求地址
https://waf.jdcloud-api.com/v1/regions/{regionId}/wafInstanceIds/{wafInstanceId}/bot:setStdRule

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |实例所属的地域ID|
|**wafInstanceId**|String|True| |实例Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**req**|[SetBotStdRuleReq](setbotstdrules#setbotstdrulereq)|True| |请求|
|**userPin**|String|True| |用户pin|
|**content-language**|String|True| |语言，"en":英文，"zh":中文|

### <div id="setbotstdrulereq">SetBotStdRuleReq</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|True| |域名|
|**botType**|String|True| |要设置的bot类型，list列表中的值|
|**action**|[DenyActionCfg](setbotstdrules#denyactioncfg)|False| |动作配置，默认为告警，仅支持1和4和5三种类型动作|
|**disable**|Integer|False| |0-启用 1-禁用|
### <div id="denyactioncfg">DenyActionCfg</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**atOp**|Integer|True| |黑名单匹配动作类型 1-4 分别表示forbidden@1 redirect@2 verify@captcha3 verify@jscookie4 5-告警(自定义bot增加)，6-302cookie(自定义bot增加)|
|**atVal**|String|True| |黑名单匹配动作内容 当atOp为3/4时，atVal为空，atOp=1时，atVal为自定义页面,atOp=2时，atVal为跳转url。|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|此次请求的ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|BAD_REQUEST|
