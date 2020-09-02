## 查询Url改写配置（queryUrlRule）


### 请求方式
GET

### 请求地址
/v1/domain/{domain}/queryUrlRule

### 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|True| |用户域名|


### 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[QueryUrlRuleResp](queryurlrule#result)| |
|**requestId**|String| |

### <div id="QueryUrlRuleResp">QueryUrlRuleResp</div>
|名称|类型|描述|
|---|---|---|
|**domain**|String|加速域名|
|**beforeRegex**|String|url改写之前的正则表达式|
|**afterRegex**|String|url改写之后的正则表达式|
