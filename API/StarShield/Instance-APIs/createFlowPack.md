# createFlowPack


## 描述
购买流量包

## 请求方式
POST

## 请求地址
https://starshield.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/flowPack

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|
|**instanceId**|String|True| |实例ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**flowPackNum**|Integer|True| |流量包数量|
|**returnUrl**|String|False| |支付成功返回路径|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createFlowPack#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**buyId**|String|购买ID|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
