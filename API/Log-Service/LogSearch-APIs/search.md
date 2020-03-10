# search


## 描述
搜索日志

## 请求方式
GET

## 请求地址
https://logs.jcloud.com/v1/regions/{regionId}/logsets/{logsetUID}/logtopics/{logtopicUID}/search

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|
|**logsetUID**|String|True| |日志集ID|
|**logtopicUID**|String|True| |日志主题ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**action**|String|True| |"preview"表示预览, "fulltext"表示全文检索, "advance"表示按照搜索语句检索|
|**expr**|String|False| |Base64编码的搜索表达式,|
|**caseSensitive**|Boolean|False| |搜索关键字大小写敏感， 默认false|
|**startTime**|String|False| |开始时间。格式 “YYYY-MM-DDThh:mm:ssTZD”, 比如 “2018-11-09T15:34:46+0800” 当action != preview时，必填|
|**endTime**|String|False| |结束时间。格式 “YYYY-MM-DDThh:mm:ssTZD”, 比如 “2018-11-09T15:34:46+0800” 当action != preview时，必填|
|**pageNumber**|Long|False| |页数。 最小为1，最大为99|
|**pageSize**|Long|False| |每页个数。默认为10，最大100|
|**sort**|String|False| |返回排序,不填或者为空，默认为desc，"asc":按照时间正序返回结果，"desc":按照时间倒序返回结果|
|**filters**|[Filter[]](search#filter)|False| |指定返回字段，只对系统日志生效，不填默认按照产品线配置返回字段，Name支持：key，Values填入返回字段|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|False| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq (Optional)|
|**values**|String[]|False| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](search#result)|搜索结果|
|**requestId**|String|请求的标识id|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|Object[]|数据|
|**total**|Long|总数|

## 返回码
|返回码|描述|
|---|---|
|**200**|搜索结果|
