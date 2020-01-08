# getDomainDetail


## 描述
查询加速域名详情

## 请求方式
GET

## 请求地址
https://cdn.jdcloud-api.com/v1/domain/{domain}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|True| |用户域名|

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
|**allStatus**|String| |
|**allowNoReferHeader**|String| |
|**allowNullReferHeader**|String| |
|**dailyBandWidth**|Integer| |
|**forbiddenType**|String| |
|**maxFileSize**|Long| |
|**minFileSize**|Long| |
|**sumFileSize**|Long| |
|**avgFileSize**|Long| |
|**referList**|String[]| |
|**referType**|String| |
|**domain**|String| |
|**cname**|String| |
|**archiveNo**|String| |
|**type**|String| |
|**created**|String| |
|**modified**|String| |
|**status**|String| |
|**auditStatus**|String| |
|**source**|[BackSourceInfo](#backsourceinfo)| |
|**sourceType**|String| |
|**defaultSourceHost**|String|默认的回源host|
|**backSourceType**|String| |
|**httpType**|String| |
|**certificate**|String| |
|**rsaKey**|String| |
|**jumpType**|String| |
|**certFrom**|String| |
|**sslCertId**|String| |
|**certName**|String| |
|**certType**|String| |
|**sslCertStartTime**|String| |
|**sslCertEndTime**|String| |
|**accelerateRegion**|String|加速区域|
### <div id="BackSourceInfo">BackSourceInfo</div>
|名称|类型|描述|
|---|---|---|
|**ips**|[IpSourceInfo[]](#ipsourceinfo)| |
|**domain**|[DomainSourceInfo[]](#domainsourceinfo)| |
|**ossSource**|String| |
### <div id="DomainSourceInfo">DomainSourceInfo</div>
|名称|类型|描述|
|---|---|---|
|**priority**|Integer|优先级（1-10）|
|**sourceHost**|String|回源host|
|**domain**|String|回源域名|
### <div id="IpSourceInfo">IpSourceInfo</div>
|名称|类型|描述|
|---|---|---|
|**master**|Integer|1：主；2：备|
|**ip**|String|回源IP|
|**ratio**|Double|占比|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
