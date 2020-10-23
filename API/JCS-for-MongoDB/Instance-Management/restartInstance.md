# restartInstance


## 描述
重启实例

## 请求方式
POST

## 请求地址
https://mongodb.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:restartInstance

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**instanceId**|String|True| |Instance ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](restartinstance#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**instanceId**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
