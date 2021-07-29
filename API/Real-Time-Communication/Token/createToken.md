# createToken


## 描述
生成token-用户加入房间时携带token校验通过后方能加入


## 请求方式
POST

## 请求地址
https://openjrtc.jdcloud-api.com/v1/createToken


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**appId**|String|True| |appId|
|**appKey**|String|True| |appKey|
|**userId**|String|True| |用户id|
|**userRoomId**|String|True| |业务接入方定义的且在JRTC系统内注册过的房间号|
|**timestamp**|Long|True| |时间戳-毫秒|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createtoken#result)|token信息|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**appId**|String|appId|
|**appKey**|String|appKey|
|**userId**|String|业务接入方用户体系定义的且在JRTC系统内注册过的userId|
|**userRoomId**|String|业务接入方定义的且在JRTC系统内注册过的房间号|
|**nonce**|String|随机令牌|
|**timestamp**|Long|时间戳-毫秒|
|**token**|String|token|
|**available**|Boolean|是否可用（true-可用,false-不可用）|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|

## 请求示例
POST
```
https://openjrtc.jdcloud-api.com/v1/createToken

```

## 返回示例
```
{
    "code": 200, 
    "error": null, 
    "requestId": "10-12-212-116-2561fbd6-23cb-4697-8379-7cbb762ee9c3", 
    "result": {
        "appId": "febf9a1401763b0e14739c4be622", 
        "appKey": "nfBFR+ZuFXyF98Anu9eD8smheI+kaTT1gYQWLmbQFpjVfOIAoKIeiIF6L2X0FU4BvwL6B4wtqyh2A==", 
        "available": true, 
        "nonce": "AK-3643dc5a-def9-11eb-961a-fa163e94c6c2", 
        "timestamp": 3243435465788, 
        "token": "3243435465788FR+ZuFXyFdMxNAnu9eD8smheI+kaTT1gYQWLmbQFpcITNG", 
        "userId": "3243435465788", 
        "userRoomId": "userRoomId1"
    }
}
```
