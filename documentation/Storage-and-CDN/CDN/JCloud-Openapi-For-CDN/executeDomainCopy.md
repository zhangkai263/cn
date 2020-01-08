# executeDomainCopy


## 描述
域名一键复制配置

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/executeDomainCopy


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|True| |源域名|
|**copyDomains**|String|True| |待复制的域名列表,多个以","分隔,且不超过20个|
|**configKeys**|String|True| |待复制的配置项名字,区分大小写.配置项的含义：originConfig：回源配置信息;refererConfig：referer防盗链;urlAuthConfig：URL鉴权;userAgentConfig：UA访问控制;ipBlackListConfig：IP黑名单;cacheConfig：缓存配置;schemeFollowOriConfig：协议跟随回源;oriFollowRedirectConfig：回源跟随302;filterParamsConfig：过滤参数;rangeConfig：range回源;videoDraftConfig：视频拖拽;httpsConfig：Https配置;httpHeaderConfig：HttpHeader设置;otherConfig：其他配置|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**errorResult**|[ErrorEntity[]](#errorentity)|配置出错的域名错误信息|
### <div id="ErrorEntity">ErrorEntity</div>
|名称|类型|描述|
|---|---|---|
|**domain**|String|配置出错的域名|
|**msg**|String[]|配置出错的原因|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
