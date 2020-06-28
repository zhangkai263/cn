# updateCert


## 描述
更新证书<br>敏感操作，可开启<a href="https://docs.jdcloud.com/cn/security-operation-protection/operation-protection">MFA操作保护</a>

## 请求方式
POST

## 请求地址
https://ssl.jdcloud-api.com/v1/sslCert:updateCert


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**certId**|String|True| |证书ID|
|**keyFile**|String|True| |私钥|
|**certFile**|String|True| |证书|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Result| |
|**requestId**|String|请求的标识Id|

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**certId**|String|待更新证书ID|
|**digest**|String|对私钥文件使用sha256算法计算的摘要信息|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
