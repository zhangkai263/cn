# queryForbiddenInfoList


## 描述
查询封禁信息

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/forbiddenInfo:query


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**queryDomain**|String|False| |封禁域名,模糊查询|
|**forbiddenUrl**|String|False| |封禁url,精确查询|
|**pageNumber**|Integer|True| |页码数|
|**pageSize**|Integer|True| |每页size|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](queryforbiddeninfolist#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**total**|Integer|总的数量|
|**list**|[ForbiddenInfo[]](queryforbiddeninfolist#forbiddeninfo)| |
### <div id="ForbiddenInfo">ForbiddenInfo</div>
|名称|类型|描述|
|---|---|---|
|**forbiddenType**|String|封禁类型|
|**id**|long|封禁id|
|**forbiddenDomain**|String|封禁域名|
|**forbiddenUrl**|String|封禁url|
|**reason**|String|封禁原因|
|**forbiddenPreson**|String|封禁人|
|**linkOther**|String|y或n|
|**createTime**|Date|创建时间|
|**updateTime**|Date|更新时间|
|**updateBy**|long|修改人id|
|**token**|String|用于封禁前缀识别的URL，应为单个特殊字符，如：~|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
