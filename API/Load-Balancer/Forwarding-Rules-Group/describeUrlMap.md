# describeUrlMap


## 描述
查询转发规则组详情

## 请求方式
GET

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/urlMaps/{urlMapId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**urlMapId**|String|True| |转发规则组Id|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeurlmap#result)|返回结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**urlMap**|[UrlMap](describeurlmap#urlmap)|转发规则组的信息|
### <div id="urlmap">UrlMap</div>
|名称|类型|描述|
|---|---|---|
|**urlMapId**|String|转发规则组的Id|
|**urlMapName**|String|转发规则组的名称|
|**loadBalancerId**|String|转发规则组所属LoadBalancer的Id|
|**listenerIds**|String[]|关联的监听器Id列表|
|**description**|String|转发规则组的描述信息|
|**createdTime**|String|转发规则组的创建时间|
|**rules**|[Rule[]](describeurlmap#rule)|转发规则列表|
### <div id="rule">Rule</div>
|名称|类型|描述|
|---|---|---|
|**ruleId**|String|转发规则Id|
|**backendId**|String|后端服务的Id|
|**host**|String|域名，用于匹配URL的host字段，支持输入IPv4地址和域名。域名支持精确匹配和通配符匹配：1、仅支持输入大小写字母、数字、英文中划线“-”和点“.”，最少包括一个点"."，不能以点"."和中划线"-"开头或结尾，中划线"-"前后不能为点"."，不区分大小写，且不能超过110字符；2、通配符匹配支持包括一个星"\*"，输入格式为\*.XXX或XXX.\*，不支持仅输入一个星“\*”|
|**path**|String|URL访问路径，用于匹配URL的path字段。URL路径支持精确匹配和前缀匹配：1、必须以/开头，仅支持输入大小写字母、数字和特殊字符：$-_.+!'()%:@&=/，区分大小写，且不能超过128字符；2、前缀匹配支持包括一个星"\*"，输入格式为/XXX\*或/\*。仅输入"/"表示精确匹配|
|**action**|String|匹配转发规则后执行的动作，取值为Forward或Redirect。现只支持Forward,表示转发到指定后端服务， 默认为Forward|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
