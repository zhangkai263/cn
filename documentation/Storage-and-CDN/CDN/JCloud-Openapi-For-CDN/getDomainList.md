# getDomainList


## 描述
查询加速域名接口

## 请求方式
GET

## 请求地址
https://cdn.jdcloud-api.com/v1/domain


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**keyWord**|String|False| |根据关键字进行模糊匹配|
|**pageNumber**|Integer|False|1|pageNumber,默认值1|
|**pageSize**|Integer|False|20|pageSize,最大值50,默认值20|
|**status**|String|False| |根据域名状态查询, 可选值[offline, online, configuring, auditing, audit_reject]|
|**type**|String|False| |域名类型，(web:静态小文件，download:大文件加速，vod:视频加速，live:直播加速),不传查所有|
|**accelerateRegion**|String|False| |加速区域，(mainLand:中国大陆，nonMainLand:海外加港澳台，all:全球),不传查所有|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](getdomainlist#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**totalCount**|Integer| |
|**pageSize**|Integer| |
|**pageNumber**|Integer| |
|**domains**|[ListDomainItem[]](getdomainlist#listdomainitem)|域名列表|
### <div id="listdomainitem">ListDomainItem</div>
|名称|类型|描述|
|---|---|---|
|**cname**|String| |
|**description**|String| |
|**domain**|String| |
|**created**|String| |
|**modified**|String| |
|**status**|String| |
|**wafStatus**|String| |
|**type**|String| |
|**auditStatus**|String| |
|**accelerateRegion**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
