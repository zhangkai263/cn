# searchLogContext


## 描述
搜索日志上下文

## 请求方式
POST

## 请求地址
https://logs.jcloud.com/v1/regions/{regionId}/logsets/{logsetUID}/logtopics/{logtopicUID}/logcontext

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 Id|
|**logsetUID**|String|True| |日志集 UID|
|**logtopicUID**|String|True| |日志主题 UID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**anchor**|Object[]|True| |查询anchor,基于该值偏移进行上下文检索|
|**direction**|String|False| |搜索方向,默认both,可取值:up,down,both|
|**filters**|[Filter[]](searchlogcontext#filter)|False| |指定返回字段，只对系统日志生效，不填默认按照产品线配置返回字段，Name支持：key，Values填入返回字段|
|**id**|String|True| |日志记录ID|
|**lineSize**|Long|True| |查看上下文行数大小，最大支持200|
|**time**|Long|True| |查询日志时返回的时间戳|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|False| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq (Optional)|
|**values**|String[]|False| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](searchlogcontext#result)|搜索结果|
|**requestId**|String|请求的标识id|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|Object[]|数据|
|**total**|Long|总数|

## 返回码
|返回码|描述|
|---|---|
|**200**|搜索上下文结果|
