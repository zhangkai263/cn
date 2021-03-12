# describeRoomOnlineUserNum


## 描述
查询房间实时在线人数


## 请求方式
GET

## 请求地址
https://openjrtc.jdcloud-api.com/v1/describeRoomOnlineUserNum/{roomId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**roomId**|Long|True| |房间ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeroomonlineusernum#result)|房间实时在线人数|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**appId**|String|应用ID|
|**roomId**|Long|房间ID|
|**number**|Integer|房间在线人数|
|**createTime**|String|创建时间UTC|

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
https://openjrtc.jdcloud-api.com/v1/describeOnlineUserNum/252

```

## 返回示例
```
{
    "code": 200, 
    "error": null, 
    "requestId": "10-12-221-161-37013926-7f4f-4ffa-b352-8328defc377c", 
    "result": {
        "appId": "febf9a1401763b06490e14739c4be622", 
        "createTime": "2020-12-08T02:23:37Z", 
        "number": 100, 
        "roomId": 252, 
        "userId": 9527
    }
}
```
