# describeRegisterUser


## 描述
查询注册用户


## 请求方式
GET

## 请求地址
https://openjrtc.jdcloud-api.com/v1/describeRegisterUser/{appId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**appId**|String|True| |应用ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**userId**|String|True| |业务接入方用户体系定义的且在JRTC系统内注册过的userId|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeregisteruser#result)|用户信息|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
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
https://openjrtc.jdcloud-api.com/v1/describeRegisterUser/9f3440230172c69b5e01b1ad1ea7c6c7?userId=LX0CLJdzCL3Jcr+ma7I8Q

```

## 返回示例
```
{
    "code": 200, 
    "error": null, 
    "requestId": "10-12-221-161-37013926-7f4f-4ffa-b352-8328defc377c", 
    "result": {
        "appId": "9f3440230172c69b5e01b1ad1ea7c6c7", 
        "createTime": "2021-05-13T02:23:37Z", 
        "peerId": 667, 
        "temporary": false, 
        "userId": "LX0CLJdzCL3Jcrma7I8Q", 
        "userName": "test"
    }
}
```
