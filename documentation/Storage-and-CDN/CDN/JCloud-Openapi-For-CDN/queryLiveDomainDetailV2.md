# queryLiveDomainDetailV2


## 描述
查询直播域名详情v2

## 请求方式
GET

## 请求地址
https://cdn.jdcloud-api.com/v1/liveDomains/{domain}

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
|**id**|Integer|域名id|
|**domain**|String|域名|
|**domainType**|String|域名类型,（publish为推流域名；play为播放域名）|
|**playDomainId**|Integer|播放域名id|
|**publishDomain**|String|推流域名|
|**createTime**|String|创建时间|
|**cname**|String|域名对应的cname|
|**siteType**|String|域名所属模式：1,推流push，2,拉流pull，3,混合mix|
|**playProtocol**|String[]|域名所属协议（rtmp,hls,hdl）|
|**status**|String|域名状态|
|**source**|[SnowLeopardBackSourceInfo](#snowleopardbacksourceinfo)|回源信息|
|**sourceType**|String|域名回源类型|
|**backSourceType**|String|回源协议:rtmp,http-flv,https-flv,http-hls,https-hls|
|**videoType**|String|视频格式 H.264|
|**audioType**|String|音频格式AAC|
|**type**|String|域名类型(live)|
|**defaultSourceHost**|String|默认回源host|
|**archiveNo**|String|ICP备案号|
|**forwardCustomVhost**|String|转推地址|
|**flvUrls**|String[]|flv格式路径|
|**hlsUrls**|String[]|hls格式路径|
|**rtmpUrls**|String[]|rtmp格式路径|
|**protocolConverts**|[ProtocolConvert[]](#protocolconvert)|转协议信息|
|**certificate**|String|https证书|
|**rsaKey**|String|https私钥|
|**accesskeyType**|Integer|url鉴权开关（1：on；2：off）|
|**accesskeyKey**|String|url鉴权key|
|**playAuthLifeTime**|Integer|playAuthLifeTime，默认为0|
|**authLifeTime**|Integer|authLifeTime，默认为0|
|**forwardAccessKeyType**|Integer|转推鉴权开关（1：on；0：off）|
|**forwardPrivateKey**|String|转推鉴权key|
|**originAccessKeyType**|Integer|回源鉴权开关（1：on；0：off）|
|**originPrivateKey**|String|回源鉴权key|
|**allowApps**|String[]|允许的app列表|
|**ips**|String[]|ip黑名单列表|
|**blackIpsEnable**|String|是否开启ip黑名单（on；off）|
|**ignoreQueryString**|String|是否忽略参数（on，off）|
|**referType**|String|refer类型|
|**referList**|String[]|refer列表|
|**allowNoReferHeader**|String|允许refer为不规则内容|
|**allowNullReferHeader**|String|允许不带referer头访问url资源|
|**pushWhiteIps**|Arrary|推流IP白名单|
|**publishNormalTimeout**|Integer|推流中断超时时间(单位秒)|
|**notifyCustomUrl**|String|推断流通知Url|
|**notifyCustomAuthKey**|String|推断流通知key|
|**certFrom**|String|证书来源有两种类型：default,ssl|
|**sslCertId**|String|ssl证书id|
|**certName**|String|证书名称|
|**certType**|String|证书类型|
|**sslCertStartTime**|String|开始时间|
|**sslCertEndTime**|String|结束时间|
|**digest**|String|对私钥文件使用sha256算法计算的摘要信息|
|**accelerateRegion**|String|加速区域|
### <div id="ProtocolConvert">ProtocolConvert</div>
|名称|类型|描述|
|---|---|---|
|**sourceProtocol**|String|源协议,目前只能为rtmp|
|**targetProtocol**|String|目标协议|
### <div id="SnowLeopardBackSourceInfo">SnowLeopardBackSourceInfo</div>
|名称|类型|描述|
|---|---|---|
|**ips**|[SnowLeopardIpSourceInfo[]](#snowleopardipsourceinfo)| |
|**domain**|[SnowLeopardDomainSourceInfo[]](#snowleoparddomainsourceinfo)| |
|**ossSource**|String| |
### <div id="SnowLeopardDomainSourceInfo">SnowLeopardDomainSourceInfo</div>
|名称|类型|描述|
|---|---|---|
|**priority**|Integer|优先级（1-10）|
|**sourceHost**|String|回源host|
|**domain**|String|回源域名|
### <div id="SnowLeopardIpSourceInfo">SnowLeopardIpSourceInfo</div>
|名称|类型|描述|
|---|---|---|
|**master**|Integer|1：主；2：备|
|**ip**|String|回源IP|
|**ratio**|Double|占比|
|**isp**|String|运营商|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
