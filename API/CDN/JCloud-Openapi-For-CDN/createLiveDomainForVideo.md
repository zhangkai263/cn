# createLiveDomainForVideo


## 描述
创建直播域名

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/liveDomain:createForVideo


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**x-jdcloud-channel**|String|False|cdn|域名来源cdn/cdn,video视频云|
|**externId**|String|True| | |
|**playDomain**|String|False| |播放域名（仅siteType=1且publishDomain不为空时可为空）|
|**publishDomain**|String|False| |推流域名（siteType=push时playDomain与publishDomain不能同时传入）|
|**sourceType**|String|False| |回源类型只能是[ips,domain]中的一种|
|**backHttpType**|String|False| | |
|**defaultSourceHost**|String|False| |默认回源host|
|**siteType**|String|True| |站点类型1:push(推流模式),2:pull(拉流模式),3:mix(混合模式)|
|**backSourceType**|String|False| |回源类型，支持rtmp, http-flv, https-flv, http-hls,https-hls，默认rtmp|
|**playProtocol**|String[]|False| |播放协议，默认为rtmp,hdl,hls全选|
|**forwardCustomVhost**|String|False| |转推地址|
|**ipSource**|[IpSourceInfo[]](#ipsourceinfo)|False| |回源IP信息|
|**domainSource**|[DomainSourceInfo[]](#domainsourceinfo)|False| |回源域名信息|
|**videoType**|String|False| |默认为H.264|
|**audioType**|String|False| |默认为AAC|

### <div id="DomainSourceInfo">DomainSourceInfo</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**priority**|Integer|True| |优先级（1-10）|
|**sourceHost**|String|False| |回源host|
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
