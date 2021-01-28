# describeAppKey


## 描述
查询应用appKey


## 请求方式
GET

## 请求地址
https://openjrtc.jdcloud-api.com/v1/applications/{appId}:describeAppKey

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**appId**|String|True| |应用ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeappkey#result)|查询用户应用列表结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**appId**|String|应用ID|
|**appKey**|String|appKey|

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
https://openjrtc.jdcloud-api.com/v1/applications/9f3440230172c69b5e01b1ad1ea7c6c7:describeAppKey

```

## 返回示例
```
{
    "code": 200, 
    "error": null, 
    "requestId": "10-12-221-161-37013926-7f4f-4ffa-b352-8328defc377c", 
    "result": {
        "appId": "9f3440230172c69b5e01b1ad1ea7c6c7", 
        "appKey": "+RSB8FerWxzThgLEMe1/OlOTY92KWpyQZmuvOM74vJ3Q1kXTTcV3Hk5SEVaa2hOF/LX0CLJdzCL3Jcr+ma7I8Q=="
    }
}
```
