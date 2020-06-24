# queryDomainStreamHistory


## 描述
查询域名禁播流历史信息列表

## 请求方式
GET

## 请求地址
https://cdn.jdcloud-api.com/v1/liveDomain/{domain}/stream:forbiddenHistory

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|True| |用户域名|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|pageNumber|
|**pageSize**|Integer|False|20|pageSize|
|**forbiddenType**|String|False| |禁播类型，不传查询全部禁播类型|
|**app**|String|False| |app名，传空代表查询全部|
|**stream**|String|False| |流名,传空代表查询全部|
|**publishIp**|String|False| |推流IP，传空代表查询全部|
|**forbiddenObjType**|String|False|stream|封禁对象类型|
|**startTime**|String|True| |开始禁播时间，格式：yyyy-MM-dd HH:mm|
|**endTime**|String|True| |结束禁播时间，格式：yyyy-MM-dd HH:mm|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**total**|Integer| |
|**streamList**|[ForbiddenStreamHistoryItem[]](#forbiddenstreamhistoryitem)| |
### <div id="ForbiddenStreamHistoryItem">ForbiddenStreamHistoryItem</div>
|名称|类型|描述|
|---|---|---|
|**stream**|String|禁播流|
|**app**|String|封禁推流的app|
|**publishIp**|String|封禁的IP|
|**forbiddenType**|String|禁播类型:forever永不禁播limit限时禁播|
|**ttl**|Long|禁播时长|
|**startTime**|String|开始禁播时间|
|**endTime**|String|结束禁播时间|
|**forbiddenTypeDesc**|String|禁播类型说明|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
