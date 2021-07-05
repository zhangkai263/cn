# modifyDispatchRule


## 描述
更新防护调度规则

## 请求方式
PATCH

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/dispatchRules/{dispatchRuleId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |高防实例 Id|
|**dispatchRuleId**|String|True| |防护调度规则 Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**modifyDispatchRuleSpec**|[ModifyDispatchRuleSpec](modifydispatchrule#modifydispatchrulespec)|True| |更新防护调度规则请求参数|

### <div id="modifydispatchrulespec">ModifyDispatchRuleSpec</div>
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
|**result**|[Result](modifydispatchrule#result)| |
|**requestId**|String| |
|**error**|[Error](modifydispatchrule#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](modifydispatchrule#err)| |
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
|**code**|Integer|0: 更新规则失败, 1: 更新规则成功|
|**message**|String|更新规则失败时给出具体原因|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
