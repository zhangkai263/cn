# createJsPageOfWebRule


## 描述
添加网站类规则允许插入JS指纹的页面

## 请求方式
POST

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/webRules/{webRuleId}/jsPages

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |高防实例 Id|
|**webRuleId**|String|True| |网站规则 Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**jsPageSpec**|[JsPageSpec](createjspageofwebrule#jspagespec)|True| |添加 JS 指纹页面请求参数|

### <div id="jspagespec">JsPageSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**uri**|String|False| |允许插入JS指纹的页面 URI|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createjspageofwebrule#result)| |
|**requestId**|String| |
|**error**|[Error](createjspageofwebrule#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](createjspageofwebrule#err)| |
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
|**code**|Integer|0: 添加失败, 1: 添加成功|
|**message**|String|添加失败时给出具体原因|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
