# selectDetailList


## 描述
查询资源和绑定资源

## 请求方式
GET

## 请求地址
https://edgesecurity.jdcloud-api.com/v1/regions/{regionId}/instances:selectDetailList

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**resourceList**|String|True| |资源列表，以英文逗号隔开，不允许重复|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|[ResourceInfo[]](#resourceinfo)| |
### <div id="resourceinfo">ResourceInfo</div>
|名称|类型|描述|
|---|---|---|
|**resourceId**|String|实例id|
|**resourceName**|String|实例名称|
|**remark**|Object| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
