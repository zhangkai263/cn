# deleteApp


## 描述
删除应用

## 请求方式
DELETE

## 请求地址
https://ias.jdcloud-api.com/v1/regions/{regionId}/app/{clientId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**clientId**|String|True| |应用ID，应用创建时由京东云分配的16位数字ID|
|**regionId**|String|True| |地域编码，参考OpenAPI公共说明|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String| |
|**result**|Result|删除应用返回结果|

### Result
|名称|类型|描述|
|---|---|---|
|**count**|Integer|删除结果[1:删除成功,0:删除失败]|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Bad request|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
