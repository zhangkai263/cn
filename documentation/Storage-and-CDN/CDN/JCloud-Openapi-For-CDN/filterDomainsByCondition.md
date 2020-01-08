# filterDomainsByCondition


## 描述
条件查询域名

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/domain:filter


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domainGroupIds**|String[]|False| |域名组id|
|**domainType**|String|False| |业务类型|
|**deleted**|Boolean|False| |是否包含已经删除的|
|**tagFilters**|[TagFilter[]](#tagfilter)|False| | |

### <div id="TagFilter">TagFilter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**key**|String|False| | |
|**values**|String[]|False| | |

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|String[]| |
|**count**|Integer| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
