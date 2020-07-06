# setCallbackSettings


## 描述
设置回调配置

## 请求方式
POST

## 请求地址
https://mps.jdcloud-api.com/v1/settings:setCallbackSettings


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**callbackEvents**|String[]|True| |回调事件列表。取值范围：<br>- snapshot_complete 截图完成，包括成功和失败<br>|
|**callbackType**|String|True| |回调方式，目前只支持 http|
|**httpUrl**|String|False| |回调方式为 http 时，此为必须参数|
|**disabled**|String|False| |是否禁用回调，默认值为 false，即开启回调|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**500**|Internal server error|
|**503**|Service unavailable|

## 请求示例
POST
```
https://mps.jdcloud-api.com/v1/settings:setCallbackSettings

```

```
{
    "callbackEvents": [
        "snapshot_complete"
    ], 
    "callbackType": "http", 
    "disabled": false, 
    "httpUrl": "https://example.com/callback"
}
```
