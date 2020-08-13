## 查询回源改写配置（queryBackSourceRule）

**接口说明**

### 请求方式
GET

### 请求地址
/v1/domain/{domain}/queryBackSourceRule

### 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|是| |用户域名|

### 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[QueryBackSourceRuleResp](querybacksourcerule#result)| |
|**requestId**|String| 请求id,每次请求的唯一标识|

### <div id="QueryBackSourceRuleResp">QueryBackSourceRuleResp</div>
|名称|类型|描述|
|---|---|---|
|**domain**|String|加速域名|
|**beforeRegex**|String|回源改写之前的正则表达式|
|**afterRegex**|String|回源改写之后的正则表达式|
