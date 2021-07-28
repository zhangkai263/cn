# describeUserRoom


## 描述
查询注册房间号


## 请求方式
GET

## 请求地址
https://openjrtc.jdcloud-api.com/v1/describeUserRoom/{appId}

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
|**result**|[Result](describeuserroom#result)|房间信息|
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
GET
```
https://openjrtc.jdcloud-api.com/v1/describeUserRoom/febf9a1401763b06490e14739c4be622?userRoomId=roomId1

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
        "roomId": 123, 
        "roomName": "房间名称", 
        "roomType": 1, 
        "updateTime": "2020-12-08T02:23:37Z", 
        "userRoomId": "room123"
    }
}
```
