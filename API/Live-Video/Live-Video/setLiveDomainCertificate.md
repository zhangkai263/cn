# setLiveDomainCertificate


## 描述
设置(直播or时移)播放证书
-- 设置成功之后30分钟以内生效


## 请求方式
POST

## 请求地址
https://live.jdcloud-api.com/v1/liveDomainCertificate


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**playDomain**|String|True| |(直播or时移)播放域名|
|**certStatus**|String|True| |(直播or时移)播放证书状态<br>  on: 开启<br>  off: 关闭<br>- 当播放证书状态on(开启)时,cert和key不能为空<br>|
|**cert**|String|False| |(直播or时移)播放证书<br>- 取值: 最大支持4098<br>- 当播放证书状态on(开启)时,cert不能为空<br>|
|**key**|String|False| |(直播or时移)播放证书key<br>- 取值: 最大支持2048<br>- 当播放证书状态on(开启)时,key不能为空<br>|
|**title**|String|False| |(直播or时移)播放证书别名<br>- 取值: 支持大小写字母和数字 长度最大256<br>|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|requestId|


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
POST
```
https://live.jdcloud-api.com/v1/liveDomainCertificate

```
```
{
    "cert": "xxx", 
    "certStatus": "on", 
    "key": "xxx", 
    "playDomain": "play.yourdomain.com", 
    "title": "my cert"
}
```

## 返回示例
```
{
    "requestId": "bgvmivir54gddpgi764se9f4kfr7ge41"
}
```
