# deleteRoom


## 描述
删除房间


## 请求方式
DELETE

## 请求地址
https://openjrtc.jdcloud-api.com/v1/rooms/{appId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**appId**|String|True| |应用ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**roomId**|Long|True| |房间ID|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
DELETE
```
https://openjrtc.jdcloud-api.com/v1/rooms/febf9a1401763b06490e14739c4be622?roomId=1

```

## 返回示例
```
{
    "code": 200, 
    "error": null, 
    "requestId": "10-12-212-116-2561fbd6-23cb-4697-8379-7cbb762ee9c3"
}
```
