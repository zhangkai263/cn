# describeRegisterUsers


## 描述
查询注册用户列表
允许通过条件过滤查询，支持的过滤字段如下：
           - startTime[eq] 用户注册时间段开始时间-UTC时间 startTime,endTime同时有值时生效
           - endTime[eq] 用户注册时间段结束时间-UTC时间 startTime,endTime同时有值时生效


## 请求方式
GET

## 请求地址
https://openjrtc.jdcloud-api.com/v1/describeRegisterUsers/{appId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**appId**|String|True| |应用ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码；默认值为 1|
|**pageSize**|Integer|False|10|分页大小；默认值为 10；取值范围 [10, 100]|
|**filters**|[Filter[]](describeregisterusers#filter)|False| |传参字段描述:<br>  startTime[eq]:   用户注册时间段开始时间-UTC时间 startTime,endTime同时有值时生效<br>  endTime[eq]:     用户注册时间段结束时间-UTC时间 startTime,endTime同时有值时生效<br>|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤器属性名|
|**operator**|String|False| |过滤器操作符,默认值为 eq<br>enum:<br>  - eq<br>|
|**values**|String[]|True| |过滤器属性值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeregisterusers#result)|查询注册用户分页数据|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**pageNumber**|Integer|当前页码|
|**pageSize**|Integer|每页数量|
|**totalElements**|Integer|查询总数|
|**totalPages**|Integer|总页数|
|**content**|[RegisterUserInfoObj[]](describeregisterusers#registeruserinfoobj)|分页内容|
### <div id="registeruserinfoobj">RegisterUserInfoObj</div>
|名称|类型|描述|
|---|---|---|
|**appId**|String|应用ID|
|**peerId**|Long|jrtc系统用户id|
|**userId**|String|业务接入方用户体系定义的且在JRTC系统内注册过的userId|
|**userName**|String|用户名称|
|**temporary**|Boolean|是否临时用户|
|**createTime**|String|创建时间|

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
https://openjrtc.jdcloud-api.com/v1/describeRegisterUsers/febf9a1401763b06490e1421739c4be2?filters.1.name=startTime&filters.1.values.1=2020-08-18T13:05:49Z&filters.1.operator=eq&filters.2.name=endTime&filters.2.values.1=2020-08-19T13:05:49Z&filters.2.operator=eq&pageNumber=1&pageSize=10

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
                "appId": "febf9a1401763b06490e1421739c4be2", 
                "createTime": "2020-12-08T02:23:37Z", 
                "peerId": 667, 
                "temporary": false, 
                "userId": "LX0CLJdzCL3Jcr+ma7I8Q", 
                "userName": "LX0CLJdzCL3Jcr+ma7I8Q"
            }
        ], 
        "pageNumber": 1, 
        "pageSize": 10, 
        "totalElements": 1
    }
}
```
