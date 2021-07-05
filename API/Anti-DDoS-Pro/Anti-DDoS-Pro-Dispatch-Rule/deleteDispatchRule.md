# deleteDispatchRule


## 描述
删除防护调度规则

## 请求方式
DELETE

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/dispatchRules/{dispatchRuleId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |高防实例 Id|
|**dispatchRuleId**|String|True| |防护调度规则 Id|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](deletedispatchrule#result)| |
|**requestId**|String| |
|**error**|[Error](deletedispatchrule#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](deletedispatchrule#err)| |
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
|**code**|Integer|0: 删除规则失败, 1: 删除规则成功|
|**message**|String|删除规则失败时给出具体原因|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
