# removeAllRoomUsers


## 描述
移除房间内所有人员


## 请求方式
PUT

## 请求地址
https://openjrtc.jdcloud-api.com/v1/roomUser/{appId}/removeAll/{roomId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**appId**|String|True| |应用ID|
|**roomId**|Long|True| |房间ID|

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
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|

## 请求示例
PUT
```
https://openjrtc.jdcloud-api.com/v1/roomUser/febf9a1401763b06490e14739c4be622/removeAll/9527

```

## 返回示例
```
{
    "code": 200, 
    "error": null, 
    "requestId": "10-12-212-116-2561fbd6-23cb-4697-8379-7cbb762ee9c3"
}
```
