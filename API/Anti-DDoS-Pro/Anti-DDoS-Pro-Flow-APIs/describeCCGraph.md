# describeCCGraph


## 描述
CC 防护流量报表

## 请求方式
GET

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/charts:CCGraph

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**startTime**|String|True| |开始时间, 只能查询最近 90 天以内的数据, UTC 时间, 格式: yyyy-MM-dd'T'HH:mm:ssZ|
|**endTime**|String|False|当前时间|查询的结束时间, UTC 时间, 格式: yyyy-MM-dd'T'HH:mm:ssZ|
|**instanceId**|String[]|False| |高防实例 Id 列表|
|**subDomain**|String[]|False| |规则域名列表|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeccgraph#result)| |
|**requestId**|String| |
|**error**|[Error](describeccgraph#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](describeccgraph#err)| |
### <div id="err">Err</div>
|名称|类型|描述|
|---|---|---|
|**code**|Long|同http code|
|**details**|Object| |
|**message**|String| |
|**status**|String|具体错误|
### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**postProtect**|Long[]|防护后 CC 次数|
|**preProtect**|Long[]|防护前 CC 次数|
|**time**|String[]|时间, 格式: yyyy-MM-dd'T'HH:mm:ssZ|
|**unit**|String|流量单位|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
