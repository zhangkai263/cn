# describeDispatchRules


## 描述
查询某个实例下的防护调度规则

## 请求方式
GET

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/dispatchRules

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |高防实例 Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码, 默认为1|
|**pageSize**|Integer|False|10|分页大小, 默认为10, 取值范围[10, 100]|
|**name**|String|False| |实例名称, 可模糊匹配|
|**innerIp**|String|False| |云内IP, 可模糊匹配|
|**serviceIp**|String|False| |高防IP, 可模糊匹配|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describedispatchrules#result)| |
|**requestId**|String| |
|**error**|[Error](describedispatchrules#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](describedispatchrules#err)| |
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
|**dataList**|[DispatchRule[]](describedispatchrules#dispatchrule)| |
|**currentCount**|Integer|当前页数量|
|**totalCount**|Integer|总数|
|**totalPage**|Integer|总页数|
### <div id="dispatchrule">DispatchRule</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|规则 Id|
|**name**|String|规则名称|
|**cname**|String|规则的 CNAME|
|**serviceIp**|String|高防 IP|
|**innerIps**|String[]|云内IP|
|**dispatchThresholdMbps**|Long|触发调度的流量阈值, 单位 Mbps|
|**dispatchThresholdPps**|Long|触发调度的报文阈值, 单位 pps|
|**status**|Integer|0: 防御状态, 1: 回源状态|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
