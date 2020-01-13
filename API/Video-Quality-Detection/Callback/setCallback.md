# setCallback


## 描述
设置回调配置

## 请求方式
POST

## 请求地址
https://vqd.jdcloud-api.com/v1/settings:setCallback


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**callbackType**|String|True| |回调方式，目前只支持 http|
|**httpUrl**|String|False| |HTTP方式的该字段为必选项|
|**callbackEvents**|String[]|True| |回调事件列表。<br>- VqdSuccess 视频质检成功<br>- VqdFailure 视频质检失败<br>- VqdStart 视频质检开始<br>|


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
https://vqd.jdcloud-api.com/v1/settings:setCallback

```
```
{
    "callbackEvents": [
        "VqdSuccess", 
        "VqdFailure"
    ], 
    "callbackType": "http", 
    "httpUrl": "https://example.com/callback"
}
```

