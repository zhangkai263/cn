# describeInstanceTemplatesCustomdata


## 描述
查询模板自定义元数据


## 请求方式
GET

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instanceTemplatesCustomData

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**filters**|[Filter[]](describeinstancetemplatescustomdata#filter)|False| |instanceTemplateId - 启动模板ID，精确匹配，支持多个，最多支持10个|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeinstancetemplatescustomdata#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**instanceTemplatesCustomData**|[InstanceTemplateCustomData[]](describeinstancetemplatescustomdata#instancetemplatecustomdata)| |
|**totalCount**|Number| |
### <div id="instancetemplatecustomdata">InstanceTemplateCustomData</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|模板ID|
|**metadata**|[Metadata[]](describeinstancetemplatescustomdata#metadata)|自定义元数据信息 key-value键值对，key、value不区分大小写|
|**userdata**|[Userdata[]](describeinstancetemplatescustomdata#userdata)|自定义脚本，目前仅支持"launch-script"，为启动脚本。value为base64格式|
### <div id="userdata">Userdata</div>
|名称|类型|描述|
|---|---|---|
|**key**|String|键，当前仅支持launch-script|
|**value**|String|值，最大长度21848字符|
### <div id="metadata">Metadata</div>
|名称|类型|描述|
|---|---|---|
|**key**|String|键，最大长度256字符，支持全字符|
|**value**|String|值，最大长度16k字符，支持全字符|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
