# batchCreate


## 描述
创建点播加速域名

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/domain:batchCreate


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domains**|String[]|True| | |
|**sourceType**|String|True| |回源类型只能是[ips,domain,oss]中的一种|
|**cdnType**|String|True| |点播域名的类型只能是[vod,download,web]中的一种|
|**backSourceType**|String|True| |回源方式,只能是[https,http]中的一种,默认http|
|**dailyBandWidth**|Long|True| |日带宽(Mbps)|
|**quaility**|String|False| |服务质量,只能是[good,general]中的一种,默认为good|
|**maxFileSize**|Long|False| | |
|**minFileSize**|Long|False| | |
|**sumFileSize**|Long|False| | |
|**avgFileSize**|Long|False| | |
|**defaultSourceHost**|String|False| | |
|**httpType**|String|True| |只能为http,如设置https,需二次调用sethttptype接口 |
|**ipSource**|[IpSourceInfo[]](#ipsourceinfo)|False| | |
|**domainSource**|[DomainSourceInfo[]](#domainsourceinfo)|False| | |
|**ossSource**|String|False| | |
|**accelerateRegion**|String|False| |加速区域 (mainLand:中国大陆，nonMainLand:海外加港澳台，all:全球)默认为中国大陆|

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
