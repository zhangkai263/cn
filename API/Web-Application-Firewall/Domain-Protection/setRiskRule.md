# setRiskRule


## 描述
新增网站业务风控防护规则

## 请求方式
POST

## 请求地址
https://waf.jdcloud-api.com/v1/regions/{regionId}/wafInstanceIds/{wafInstanceId}/risk:setRiskRule

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |实例所属的地域ID|
|**wafInstanceId**|String|True| |实例Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**req**|[SetRiskRuleReq](setriskrule#setriskrulereq)|True| |请求|
|**userPin**|String|True| |用户pin|
|**content-language**|String|True| |语言，"en":英文，"zh":中文|

### <div id="setriskrulereq">SetRiskRuleReq</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**id**|Integer|False| |规则id,新增时传0|
|**wafInstanceId**|String|True| |WAF实例id|
|**domain**|String|True| |域名|
|**name**|String|True| |规则名称|
|**uri**|String|True| |uri 以/开头|
|**action**|String|True| |动作 支持notice / verify@captcha|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|此次请求的ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|BAD_REQUEST|
