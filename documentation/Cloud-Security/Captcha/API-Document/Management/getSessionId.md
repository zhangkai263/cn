# getSessionId


## 描述
获取会话id

## 请求方式
POST

## 请求地址
https://captcha.jdcloud-api.com/v1/captcha:getsessionid


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**appId**|Long|True| |应用id|
|**sceneId**|Long|True| |场景id|
|**secret**|String|True| |密钥，从界面获取|
|**uuid**|String|True| |uuid，ios客户端传openudid, android客户端传androidid|
|**ip**|String|True| |客户端ip|
|**userAgent**|String|True| |客户端userAgent|
|**fingerPrint**|String|True| |指纹，客户端sdk获取|
|**clientType**|String|True| |客户端类型, android, ios|
|**clientVersion**|String|False| |客户端版本，用户端app版本，可选|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Result| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|SessionDataResp| |
### <div id="SessionDataResp">SessionDataResp</div>
|名称|类型|描述|
|---|---|---|
|**code**|String|代号, 0000:通过，0001:拒绝，0002:内部错误，0003:补充验证|
|**sessionId**|String|会话id，0003补充验证时返回|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**500**|Internal Server Error|
|**400**|Bad Request|
