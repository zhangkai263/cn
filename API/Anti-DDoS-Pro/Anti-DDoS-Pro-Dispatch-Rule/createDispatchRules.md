# createDispatchRules


## 描述
批量添加防护调度规则

## 请求方式
POST

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:createDispatchRules

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |高防实例 Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**dispatchRuleSpecList**|[CreateDispatchRuleSpec[]](createdispatchrules#createdispatchrulespec)|True| |批量添加防护调度规则请求参数|

### <div id="createdispatchrulespec">CreateDispatchRuleSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |规则名称|
|**serviceIp**|String|False| |高防 IP|
|**innerIps**|String[]|True| |云内IP|
|**dispatchThresholdMbps**|Long|True| |触发调度的流量阈值, 单位 Mbps|
|**dispatchThresholdPps**|Long|True| |触发调度的报文阈值, 单位 pps|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createdispatchrules#result)|批量创建结果|
|**requestId**|String| |
|**error**|[Error](createdispatchrules#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](createdispatchrules#err)| |
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
|**dispatchRuleIds**|String[]|创建成功的防护调度规则id|
|**failRules**|[FailedRule[]](createdispatchrules#failedrule)|创建失败的防护调度规则域名|
### <div id="failedrule">FailedRule</div>
|名称|类型|描述|
|---|---|---|
|**name**|String|规则名称|
|**message**|String|错误原因|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
