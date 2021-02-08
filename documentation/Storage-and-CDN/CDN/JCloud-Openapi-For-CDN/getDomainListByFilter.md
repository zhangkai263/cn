# getDomainListByFilter


## 描述
通过标签查询加速域名接口

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/domain:query


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**keyWord**|String|False| |根据关键字进行模糊匹配|
|**pageNumber**|Integer|False|1|pageNumber,默认值为1|
|**pageSize**|Integer|False|20|pageSize,默认值为20,最大值为50|
|**status**|String|False| |根据域名状态查询, 可选值[offline, online, configuring, auditing, audit_reject]|
|**type**|String|False| |域名类型，(web:静态小文件，download:大文件加速，vod:视频加速，live:直播加速)，不传查所有|
|**accelerateRegion**|String|False| |加速区域，(mainLand:中国大陆，nonMainLand:海外加港澳台，all:全球)，不传查所有|
|**tagFilters**|[TagFilter[]](getdomainlistbyfilter#tagfilter)|False| |标签过滤条件|

### <div id="tagfilter">TagFilter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**key**|String|False| | |
|**values**|String[]|False| | |

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](getdomainlistbyfilter#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**totalCount**|Integer| |
|**pageSize**|Integer| |
|**pageNumber**|Integer| |
|**domains**|[ListDomainItemByFilter[]](getdomainlistbyfilter#listdomainitembyfilter)| |
### <div id="listdomainitembyfilter">ListDomainItemByFilter</div>
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
|**tags**|[Tag[]](getdomainlistbyfilter#tag)| |
### <div id="tag">Tag</div>
|名称|类型|描述|
|---|---|---|
|**key**|String| |
|**value**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
