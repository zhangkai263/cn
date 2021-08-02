# describeUserRooms


## 描述
查询注册房间号列表
允许通过条件过滤查询，支持的过滤字段如下：
           - startTime[eq] 房间注册时间段开始时间-UTC时间 startTime,endTime同时有值时生效
           - endTime[eq] 房间注册时间段结束时间-UTC时间   startTime,endTime同时有值时生效


## 请求方式
GET

## 请求地址
https://openjrtc.jdcloud-api.com/v1/describeUserRooms/{appId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**appId**|String|True| |应用ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码；默认值为 1|
|**pageSize**|Integer|False|10|分页大小；默认值为 10；取值范围 [10, 100]|
|**filters**|[Filter[]](describeuserrooms#filter)|False| |传参字段描述:<br>  - startTime[eq] 按房间注册时间段查询-UTC时间 startTime,endTime同时有值时生效<br>  - endTime[eq] 按房间注册时间段查询-UTC时间   startTime,endTime同时有值时生效<br>|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤器属性名|
|**operator**|String|False| |过滤器操作符,默认值为 eq<br>enum:<br>  - eq<br>|
|**values**|String[]|True| |过滤器属性值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeuserrooms#result)|查询房间列表分页数据|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**pageNumber**|Integer|当前页码|
|**pageSize**|Integer|每页数量|
|**totalElements**|Integer|查询总数|
|**totalPages**|Integer|总页数|
|**content**|[UserRoomInfoObj[]](describeuserrooms#userroominfoobj)|分页内容|
### <div id="userroominfoobj">UserRoomInfoObj</div>
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
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|

## 请求示例
GET
```
https://openjrtc.jdcloud-api.com/v1/describeUserRooms/febf9a1401763b06490e14739c4be622?filters.1.name=startTime&filters.1.values.1=2020-12-08T02:23:37Z&filters.1.operator=eq&filters.2.name=startTime&filters.2.values.1=2020-12-08T03:23:37Z&filters.2.operator=eq

```

## 返回示例
```
{
    "code": 200, 
    "error": null, 
    "requestId": "10-12-221-161-37013926-7f4f-4ffa-b352-8328defc377c", 
    "result": {
        "content": [
            {
                "appId": "febf9a1401763b06490e14739c4be622", 
                "createTime": "2020-12-08T02:23:37Z", 
                "roomName": "房间名称", 
                "roomType": 1, 
                "updateTime": "2020-12-08T02:23:37Z", 
                "userRoomId": "room123"
            }
        ], 
        "pageNumber": 1, 
        "pageSize": 10, 
        "totalElements": 1
    }
}
```
