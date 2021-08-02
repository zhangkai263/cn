# describeRoomUsersNum


## 描述
统计房间内人数


## 请求方式
GET

## 请求地址
https://openjrtc.jdcloud-api.com/v1/describeRoomUsersNum/{appId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**appId**|String|True| |应用ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**userRoomId**|String|True| |业务接入方定义的且在JRTC系统内注册过的房间号|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeroomusersnum#result)|房间人数统计|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**appId**|String|appId|
|**userRoomId**|String|用户定义的房间号|
|**onlineNumber**|Integer|在线人数|
|**offlineNumber**|Integer|离线人数|
|**total**|Integer|合计人数|

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
https://openjrtc.jdcloud-api.com/v1/describeRoomUsersNum/292bc340011234a7b1ad1ea7c6c7?roomUserId=userRoomId

```

## 返回示例
```
{
    "code": 200, 
    "error": null, 
    "requestId": "10-160-134-176-3da8e36f-0137-4ebe-a2a4-51d1ea8e88be", 
    "result": {
        "appId": "292bc340011234a7b1ad1ea7c6c7", 
        "offlineNumber": 638, 
        "onlineNumber": 30, 
        "total": 668, 
        "useRoomId": "8911"
    }
}
```
