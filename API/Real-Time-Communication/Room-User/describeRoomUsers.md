# describeRoomUsers


## 描述
查询房间内人员列表
允许通过条件过滤查询，支持的过滤字段如下：
           - status[eq] 在线状态 1-在线 2-离线
           - startTime[eq] 用户加入时间段开始时间-UTC时间  startTime,endTime同时有值时生效
           - endTime[eq] 用户加入时间段结束时间-UTC时间    startTime,endTime同时有值时生效


## 请求方式
GET

## 请求地址
https://openjrtc.jdcloud-api.com/v1/describeRoomUsers/{appId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**appId**|String|True| |应用ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码；默认值为 1|
|**pageSize**|Integer|False|10|分页大小；默认值为 10；取值范围 [10, 100]|
|**userRoomId**|String|True| |业务接入方定义的且在JRTC系统内注册过的房间号|
|**filters**|[Filter[]](describeroomusers#filter)|False| |传参字段描述:<br>- status[eq] 在线状态 1-在线 2-离线<br>- startTime[eq] 用户加入时间段开始时间-UTC时间 startTime,endTime同时有值时生效<br>- endTime[eq] 用户加入时间段结束时间-UTC时间   startTime,endTime同时有值时生效<br>|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤器属性名|
|**operator**|String|False| |过滤器操作符,默认值为 eq<br>enum:<br>  - eq<br>|
|**values**|String[]|True| |过滤器属性值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeroomusers#result)|房间人员列表分页数据|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**pageNumber**|Integer|当前页码|
|**pageSize**|Integer|每页数量|
|**totalElements**|Integer|查询总数|
|**totalPages**|Integer|总页数|
|**content**|[RoomUserInfoObj[]](describeroomusers#roomuserinfoobj)|分页内容|
### <div id="roomuserinfoobj">RoomUserInfoObj</div>
|名称|类型|描述|
|---|---|---|
|**appId**|String|appId|
|**userRoomId**|String|用户定义的房间号|
|**userId**|String|业务接入方用户体系定义的且在JRTC系统内注册过的userId|
|**nickName**|String|用户房间内昵称|
|**connectId**|String|用户socketIo长连接id|
|**status**|Integer|状态 1-在线 2-离线|
|**joinTime**|String|创建时间|
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
https://openjrtc.jdcloud-api.com/v1/describeRoomUsers/692bc3400134a7b1ad4578a7c16?userRoomId=userRoomId1&filters.1.name=status&filters.1.values.1=1&filters.1.operator=eq&pageNumber=1&pageSize=10

```

## 返回示例
```
{
    "code": 200, 
    "error": null, 
    "requestId": "10-160-134-176-a14c053e-1561-46ba-b8e9-651de90148c8", 
    "result": {
        "content": [
            {
                "appId": "692bc3400134a7b1ad4578a7c16", 
                "connectId": "1cdaf4bd-ab37-4a54-81a8-3da9a9c6c1f1", 
                "joinTime": "2021-06-28T07:50:45Z", 
                "nickName": "wahahauserRoomId125", 
                "status": 1, 
                "updateTime": "2021-07-08T02:17:12Z", 
                "userId": "y4Z8P412x9H8a232V53w44k9d4c0v7F5", 
                "userRoomId": "userRoomId1"
            }, 
            {
                "appId": "692bc3400134a7b1ad4578a7c16", 
                "connectId": "fbddd50e-bfc9-4170-a371-58957081724f", 
                "joinTime": "2021-06-28T07:50:45Z", 
                "nickName": "wahahauserRoomId117", 
                "status": 1, 
                "updateTime": "2021-07-08T02:17:12Z", 
                "userId": "r6n8G8b8L6x4B3w6e430X9u799H5x8U7", 
                "userRoomId": "userRoomId1"
            }, 
            {
                "appId": "692bc3400134a7b1ad4578a7c16", 
                "connectId": "23d6b65e-4c4c-4f01-9c05-97764be9bd39", 
                "joinTime": "2021-06-28T07:50:45Z", 
                "nickName": "wahahauserRoomId18", 
                "status": 1, 
                "updateTime": "2021-07-08T02:17:12Z", 
                "userId": "k2K0o393F0W9Q6K2w5C7U3K8K0A1x1P2", 
                "userRoomId": "userRoomId1"
            }, 
            {
                "appId": "692bc3400134a7b1ad4578a7c16", 
                "connectId": "c8b56bbf-cb47-4055-b935-a27b299b20f5", 
                "joinTime": "2021-06-28T07:50:45Z", 
                "nickName": "wahahauserRoomId15", 
                "status": 1, 
                "updateTime": "2021-07-08T02:17:12Z", 
                "userId": "d124S3y8t8w0F0U2L5X923c9I3W470T2", 
                "userRoomId": "userRoomId1"
            }, 
            {
                "appId": "692bc3400134a7b1ad4578a7c16", 
                "connectId": "d71f95ed-0c71-4f37-b2ea-9abf097b3ffd", 
                "joinTime": "2021-06-28T07:50:45Z", 
                "nickName": "wahahauserRoomId16", 
                "status": 1, 
                "updateTime": "2021-07-08T02:17:12Z", 
                "userId": "F0o6l60612x7e012d2U1D8E6J772X1t5", 
                "userRoomId": "userRoomId1"
            }, 
            {
                "appId": "692bc3400134a7b1ad4578a7c16", 
                "connectId": "079b8d9b-601b-4a68-89e8-17bb590206fa", 
                "joinTime": "2021-06-28T07:50:45Z", 
                "nickName": "wahahauserRoomId13", 
                "status": 1, 
                "updateTime": "2021-07-08T02:17:12Z", 
                "userId": "E3z8T1b7f065Y2Q3n267l7V4K2N9S0J6", 
                "userRoomId": "userRoomId1"
            }, 
            {
                "appId": "692bc3400134a7b1ad4578a7c16", 
                "connectId": "45e430ad-3c21-46f5-8680-872220e22ec1", 
                "joinTime": "2021-06-28T07:50:45Z", 
                "nickName": "wahahauserRoomId14", 
                "status": 1, 
                "updateTime": "2021-07-08T02:17:12Z", 
                "userId": "91Q5z0N9A8w3C7m289I6b6E1s4h3N0M8", 
                "userRoomId": "userRoomId1"
            }, 
            {
                "appId": "692bc3400134a7b1ad4578a7c16", 
                "connectId": "a5f884f5-cbeb-4a1f-b63c-fe374fa47c6e", 
                "joinTime": "2021-06-28T07:50:45Z", 
                "nickName": "wahahauserRoomId12", 
                "status": 1, 
                "updateTime": "2021-07-08T02:17:12Z", 
                "userId": "W8P2N6H6i8v4Z3a0N353x9T3H2U6a763", 
                "userRoomId": "userRoomId1"
            }, 
            {
                "appId": "692bc3400134a7b1ad4578a7c16", 
                "connectId": "10dead53-197f-4199-8c31-09687bb9c7c4", 
                "joinTime": "2021-06-28T07:50:45Z", 
                "nickName": "wahahauserRoomId128", 
                "status": 1, 
                "updateTime": "2021-07-08T02:17:12Z", 
                "userId": "Y3L3x0w2Q8u8H8T6Y7S8I3w333M5A6R3", 
                "userRoomId": "userRoomId1"
            }, 
            {
                "appId": "692bc3400134a7b1ad4578a7c16", 
                "connectId": "3767d9e6-f130-4997-b8e7-03b5f55ba06d", 
                "joinTime": "2021-06-28T07:50:45Z", 
                "nickName": "wahahauserRoomId120", 
                "status": 1, 
                "updateTime": "2021-07-08T02:17:12Z", 
                "userId": "G9B5L8O3Q5U6G3e1m9v3L2v3N0n1d727", 
                "userRoomId": "userRoomId1"
            }
        ], 
        "pageNumber": 1, 
        "pageSize": 10, 
        "totalElements": 31, 
        "totalPages": 4
    }
}
```
