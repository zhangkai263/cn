# verifyToken


## 描述
验证verifyToken

## 请求方式
POST

## 请求地址
https://captcha.jdcloud-api.com/v1/captcha:verifytoken


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**verifyToken**|String|True| |提交后台校验的token，客户端sdk获取|
|**sessionId**|String|True| |验证码会话id，getsessionid返回|
|**appId**|Long|True| |应用id|
|**sceneId**|Long|True| |场景id|
|**ip**|String|True| |客户端ip|
|**userAgent**|String|True| |客户端userAgent|
|**fingerPrint**|String|True| |指纹，客户端sdk获取|
|**clientType**|String|True| |客户端类型, android, ios|
|**clientVersion**|String|False| |客户端版本，用户端app版本，可选|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|Object| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**500**|Internal Server Error|
|**400**|Bad Request|
