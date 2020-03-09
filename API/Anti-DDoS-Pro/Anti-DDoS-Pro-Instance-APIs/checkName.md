# checkName


## 描述
检测实例名称是否合法

## 请求方式
GET

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/checkName

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |待检测实例名称|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](checkname#result)| |
|**requestId**|String| |
|**error**|[Error](checkname#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](checkname#err)| |
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
|**code**|Integer|检测结果 code, 0: 不可用, 1: 可用|
|**message**|String|检测结果, 不可用时给出具体原因|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
