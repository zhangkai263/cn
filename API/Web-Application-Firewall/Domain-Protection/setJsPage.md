# setJsPage


## 描述
设置js插入页面

## 请求方式
POST

## 请求地址
https://waf.jdcloud-api.com/v1/regions/{regionId}/wafInstanceIds/{wafInstanceId}/js:setPage

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |实例所属的地域ID|
|**wafInstanceId**|String|True| |实例Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**req**|[SetJsPageReq](setjspage#setjspagereq)|True| |请求|
|**userPin**|String|True| |用户pin|
|**content-language**|String|True| |语言，"en":英文，"zh":中文|

### <div id="setjspagereq">SetJsPageReq</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**id**|Integer|False| |规则id,新增时传0|
|**wafInstanceId**|String|True| |WAF实例id|
|**domain**|String|True| |域名|
|**matchOp**|String|False| |匹配类型   完全匹配"" 前缀匹配:"sw"|
|**uri**|String|True| |uri 以/开头|
|**ruleType**|String|True| |risk-风控js，bot-bot js|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|此次请求的ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|BAD_REQUEST|
