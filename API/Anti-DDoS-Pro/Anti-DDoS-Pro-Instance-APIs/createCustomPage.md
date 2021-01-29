# createCustomPage


## 描述
添加自定义页面

## 请求方式
POST

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/customPages

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|
|**instanceId**|String|True| |实例 ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**customPageSpec**|[CustomPageSpec](createcustompage#custompagespec)|True| |添加自定义页面请求参数|

### <div id="custompagespec">CustomPageSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|False| |自定义页面名称, 创建后不可修改, 添加自定义页面时必传|
|**content**|String|True| |自定义页面内容, 添加自定义页面时必传|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createcustompage#result)| |
|**requestId**|String| |
|**error**|[Error](createcustompage#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](createcustompage#err)| |
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
