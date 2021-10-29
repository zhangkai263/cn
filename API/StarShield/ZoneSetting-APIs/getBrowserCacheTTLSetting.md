# getBrowserCacheTTLSetting


## 描述
浏览器缓存TTL（以秒为单位）指定星盾缓存资源将在访问者的计算机上保留多长时间。星盾将遵守服务器指定的任何更长时间。


## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/zones/{zone_identifier}/settings$$browser_cache_ttl

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**zone_identifier**|String|True| | |

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
|**data**|[BrowserCacheTTL](#browsercachettl)| |
### <div id="BrowserCacheTTL">BrowserCacheTTL</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|域设置的ID|
|**value**|Number|该配置的有效值|
|**editable**|Boolean|该配置是否可以修改|
|**modified_on**|String|上次修改此设置的时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|request successful|
