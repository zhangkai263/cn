# describeLiveRestartDomainCertificate


## 描述
查询直播回看播放证书

## 请求方式
GET

## 请求地址
https://live.jdcloud-api.com/v1/liveRestartDomainCertificate


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**restartDomain**|String|True| |直播回看域名<br>- 仅支持精确匹配<br>|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Result| |
|**requestId**|String|requestId|

### <a name="Result">Result</a>
|名称|类型|描述|
|---|---|---|
|**restartDomain**|String|直播回看域名|
|**certStatus**|String|直播回看播放证书状态<br>  on: 开启<br>  off: 关闭<br>|
|**cert**|String|直播回看证书|
|**title**|String|直播回看证书别名|

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
https://live.jdcloud-api.com/v1/liveRestartDomainCertificate?restartDomain=restart.yourdomain.com
```

## 返回示例
```
{
    "requestId": "bgvmivir54gddpgi764se9f4kfr7ge41", 
    "result": {
        "cert": "xxx", 
        "certStatus": "on", 
        "restartDomain": "restart.yourdomain.com", 
        "title": "restart cert"
    }
}
```
