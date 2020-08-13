# queryDomainStream


## 描述
查询域名禁播流信息列表

## 请求方式
GET

## 请求地址
https://cdn.jdcloud-api.com/v1/liveDomain/{domain}/stream:forbiddenInfo

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|True| |用户域名|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|pageNumber|
|**pageSize**|Integer|False|20|pageSize|
|**forbiddenObjType**|String|False|stream|封禁对象类型|
|**isStop**|String|False| |是否要查询踢流列表|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**total**|Integer| |
|**streamList**|[ForbiddenStream[]](#forbiddenstream)| |
### <div id="ForbiddenStream">ForbiddenStream</div>
|名称|类型|描述|
|---|---|---|
|**stream**|String|禁播流|
|**app**|String|封禁推流的app|
|**publishIp**|String|禁播Ip|
|**forbiddenType**|String|禁播类型:forever永不禁播limit限时禁播stop剔流|
|**ttl**|Long|禁播时长|
|**forbiddenTypeDesc**|String|禁播类型说明|
|**startTime**|String|开始禁播时间|
|**endTime**|String|结束禁播时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
