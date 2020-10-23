# setDomainConfig


## 描述
更新域名配置

## 请求方式
POST

## 请求地址
https://cdn.jdcloud-api.com/v1/domain/{domain}/config

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|True| |用户域名|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**httpType**|String|True| |http类型,只能为http或者https|
|**backSourceType**|String|False| |回源类型|
|**jumpType**|String|True| |有三种类型：default、http、https|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**taskId**|String|任务taskId|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
