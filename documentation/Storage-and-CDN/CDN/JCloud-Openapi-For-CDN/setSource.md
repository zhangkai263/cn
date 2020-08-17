# setSource


## 描述
设置源站信息

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/domain/{domain}/source

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|True| |用户域名|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**sourceType**|String|True| |回源类型只能是[ips,domain,oss]中的一种|
|**backSourceType**|String|True| |回源方式,只能是[https,http]中的一种,默认http|
|**ipSource**|[IpSourceInfo[]](setsource#ipsourceinfo)|False| | |
|**domainSource**|[DomainSourceInfo[]](setsource#domainsourceinfo)|False| | |
|**ossSource**|String|False| |oss回源域名|
|**defaultSourceHost**|String|False| |默认回源host|

### <div id="domainsourceinfo">DomainSourceInfo</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**priority**|Integer|True| |优先级（1-10）|
|**sourceHost**|String|False| |回源host中国境外/全球加速时暂不支持配置该项|
|**domain**|String|True| |回源域名|
### <div id="ipsourceinfo">IpSourceInfo</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**master**|Integer|True| |1：主；2：备|
|**ip**|String|True| |回源IP|
|**ratio**|Double|False| |占比|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](setsource#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**taskId**|String|任务id|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
