# queryCallbackSettings


## 描述
查询回调配置

## 请求方式
GET

## 请求地址
https://mps.jdcloud-api.com/v1/settings:queryCallbackSettings


## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](user-content-querycallbacksettings#result)|查询回调配置结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**callbackEvents**|String[]|回调事件列表。取值范围：<br>- snapshot_complete 截图完成，包括成功和失败<br>|
|**callbackType**|String|回调方式，目前只支持 http|
|**httpUrl**|String|回调方式为 http 时，此为必须参数|
|**disabled**|String|是否禁用回调，默认值为 false，即开启回调|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|

## 请求示例
GET
```
https://mps.jdcloud-api.com/v1/settings:queryCallbackSettings

```

## 返回示例
```
{
    "requestId": "bgvmivir54gddpgi764se9f4kfr7ge41", 
    "result": {
        "callbackEvents": [
            "snapshot_complete"
        ], 
        "callbackType": "http", 
        "createTime": "2019-11-27T06:52:34Z", 
        "disabled": false, 
        "httpUrl": "https://example.com/callback", 
        "updateTime": "2019-11-27T06:52:34Z"
    }
}
```
