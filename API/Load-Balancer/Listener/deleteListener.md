# deleteListener


## 描述
删除一个监听器

## 请求方式
DELETE

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/listeners/{listenerId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**listenerId**|String|True| |监听器ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
