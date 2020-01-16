# queryCallback


## 描述
查询回调配置

## 请求方式
GET

## 请求地址
https://vqd.jdcloud-api.com/v1/settings:queryCallback


## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](querycallback#result)|查询回调配置结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**callbackType**|String|回调方式|
|**httpUrl**|String|HTTP方式的回调URL|
|**callbackEvents**|String[]|回调事件列表|
|**createTime**|String|创建时间|
|**updateTime**|String|修改时间|

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
https://vqd.jdcloud-api.com/v1/settings:queryCallback

```

## 返回示例
```
{
    "requestId": "bgvmivir54gddpgi764se9f4kfr7ge41", 
    "result": {
        "callbackEvents": [
            "VqdSuccess", 
            "VqdFailure"
        ], 
        "callbackType": "http", 
        "createTime": "2019-11-27T06:52:34Z", 
        "httpUrl": "https://example.com/callback", 
        "updateTime": "2019-11-27T06:52:34Z"
    }
}
```
