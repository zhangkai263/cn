# describeAttackStatistics


## 描述
查询攻击次数及流量峰值

## 请求方式
GET

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/attacklog:describeAttackStatistics

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**startTime**|String|True| |开始时间, 只能查询最近 90 天以内的数据, UTC 时间, 格式: yyyy-MM-dd'T'HH:mm:ssZ|
|**endTime**|String|False|当前时间|查询的结束时间, UTC 时间, 格式: yyyy-MM-dd'T'HH:mm:ssZ|
|**instanceId**|String[]|False| |高防实例 ID|
|**type**|Integer|True| |攻击类型, 0 为 DDoS, 1 为 CC|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeattackstatistics#result)| |
|**requestId**|String| |
|**error**|[Error](describeattackstatistics#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](describeattackstatistics#err)| |
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
|**flow**|Double|攻击流量峰值|
|**count**|Integer|攻击次数|
|**unit**|String|流量单位, bps、Kbps、Mbps、Gbps|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
