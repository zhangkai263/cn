# getSslCertDetail


## 描述
查看证书详情

## 请求方式
GET

## 请求地址
https://cdn.jdcloud-api.com/v1/sslCert/{sslCertId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**sslCertId**|String|True| |证书 Id|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**sslCertModel**|[SslCertModel](#sslcertmodel)| |
### <div id="SslCertModel">SslCertModel</div>
|名称|类型|描述|
|---|---|---|
|**sslCertId**|String|证书Id|
|**certName**|String|证书名称|
|**commonName**|String|绑定域名|
|**certType**|String|证书类型|
|**sslCertStartTime**|String|开始时间|
|**sslCertEndTime**|String|结束时间|
|**deletable**|Integer|是否允许被删除,1允许,0不允许|
|**digest**|String|对私钥文件使用sha256算法计算的摘要信息|
|**relatedDomains**|String[]|绑定的域名|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
