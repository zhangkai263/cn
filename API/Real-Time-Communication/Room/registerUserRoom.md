# registerUserRoom


## 描述
注册用户房间号-将业务接入方定义的userRoomId注册为jrtc系统内可识别和流转的房间号


## 请求方式
POST

## 请求地址
https://openjrtc.jdcloud-api.com/v1/registerUserRoom


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**userRoomId**|String|True| |业务接入方定义的房间号|
|**roomName**|String|True| |房间名称|
|**appId**|String|True| |应用ID|
|**roomType**|Integer|False| |房间类型 1-小房间(音频单流订阅) 2-大房间(音频固定订阅),默认取控制台APP对应的房间类型|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](registeruserroom#result)|房间信息|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**roomId**|Long|jrtc系统房间号|
|**userRoomId**|String|业务接入方定义的且在JRTC系统内注册过的房间号|
|**roomName**|String|房间名称|
|**roomType**|Integer|房间类型 1-小房间(音频单流订阅) 2-大房间(音频固定订阅)|
|**appId**|String|appId|
|**createTime**|String|创建时间|
|**updateTime**|String|更新时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
POST
```
https://openjrtc.jdcloud-api.com/v1/registerUserRoom

```

## 返回示例
```
{
    "code": 200, 
    "error": null, 
    "requestId": "10-12-212-116-2561fbd6-23cb-4697-8379-7cbb762ee9c3", 
    "result": {
        "appId": "febf9a1401763b06490e14739c4be622", 
        "createTime": "2020-12-08T02:23:37Z", 
        "roomId": 666, 
        "roomName": "房间名称", 
        "roomType": 1, 
        "updateTime": "2020-12-08T02:23:37Z", 
        "userRoomId": "userRoomId"
    }
}
```
