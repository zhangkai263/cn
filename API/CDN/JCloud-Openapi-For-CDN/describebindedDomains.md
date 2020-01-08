# describebindedDomains


## 描述
查询关联域名

## 请求方式
GET

## 请求地址
https://cdn.jdcloud-api.com/v1/liveDomain/{domain}:queryBindedDomains

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
|**relatedDomainList**|[RelatedDomains[]](#relateddomains)|相关域名列表|
### <div id="RelatedDomains">RelatedDomains</div>
|名称|类型|描述|
|---|---|---|
|**domainName**|String|域名|
|**domainType**|String|（关联域名类型）publish或play|
|**rtmpUrls**|String[]|该相关域名的rtmp格式|
|**flvUrls**|String[]|该相关域名的flv格式|
|**hlsUrls**|String[]|该相关域名的hls格式|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
