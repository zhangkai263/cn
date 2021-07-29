# registerUser


## 描述
注册用户-将业务接入方用户体系的userId注册为jrtc系统内可识别和流转的用户id


## 请求方式
POST

## 请求地址
https://openjrtc.jdcloud-api.com/v1/registerUser


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**appId**|String|True| |应用ID|
|**userName**|String|True| |用户名称|
|**userId**|String|True| |业务接入方用户体系定义的userId|
|**temporary**|Boolean|True| |是否临时用户|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](registeruser#result)|注册用户信息返回结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**appId**|String|应用ID|
|**userId**|String|业务接入方的用户ID|
|**peerId**|Long|jrtc系统用户ID|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
POST
```
https://openjrtc.jdcloud-api.com/v1/registerUser

```

## 返回示例
```
{
    "code": 200, 
    "error": null, 
    "requestId": "10-12-212-116-2561fbd6-23cb-4697-8379-7cbb762ee9c3", 
    "result": {
        "appId": "febf9a1401763b06490e14739c4be622", 
        "peerId": 666, 
        "userId": "LX0CLJdzCL3Jcrma7I8Q"
    }
}
```
