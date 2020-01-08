# getDomainListForTag


## 描述
域名列表

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/domain:queryForTag


## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domains**|String[]|True| | |


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**domains**|[Domain[]](#domain)| |
|**total**|Integer| |
### <div id="Domain">Domain</div>
|名称|类型|描述|
|---|---|---|
|**domain**|String| |
|**status**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
