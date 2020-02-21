# disableDicts


## 描述
关闭自定义字典。同时清除用户已上传的字典

## 请求方式
DELETE

## 请求地址
https://es.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}/dicts

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |regionId|
|**instanceId**|String|True| |实例ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](disabledicts#result)|结果|
|**requestId**|String|本次请求的ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**instanceId**|String|实例ID|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
