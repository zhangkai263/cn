# batchCreateLiveDomain


## 描述
创建直播域名

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/liveDomain:batchCreate


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**playDomain**|String|True| |播放域名|
|**publishDomain**|String|False| |创建推流域名时，必传推流域名|
|**sourceType**|String|True| |回源类型只能是[ips,domain]中的一种|
|**backHttpType**|String|False| | |
|**defaultSourceHost**|String|False| |默认回源host|
|**siteType**|String|True| |站点类型pull(拉流)push(推流)|
|**backSourceType**|String|False| |回源类型，目前只能为rtmp|
|**ipSource**|[IpSourceInfo[]](batchcreatelivedomain#ipsourceinfo)|False| | |
|**domainSource**|[DomainSourceInfo[]](batchcreatelivedomain#domainsourceinfo)|False| | |
|**accelerateRegion**|String|False| |加速区域(mainland:中国大陆，nonMainland:海外加港澳台，all:全球)不传时默认为中国大陆，目前仅支持中国大陆|

### <div id="DomainSourceInfo">DomainSourceInfo</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**priority**|Integer|True| |优先级（1-10）|
|**sourceHost**|String|False| |自定义回源host，仅中国境内加速域名可配置|
|**domain**|String|True| |回源域名|
### <div id="IpSourceInfo">IpSourceInfo</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**master**|Integer|True| |1：主；2：备|
|**ip**|String|True| |回源IP|
|**ratio**|Double|False| |占比|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|Object| |
|**requestId**|String| |


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
