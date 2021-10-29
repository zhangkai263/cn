# selectDetailList


## 描述
套餐实例续费回调查询

## 请求方式
GET

## 请求地址
https://starshield.jdcloud-api.com/v1/regions/{regionId}/instances:selectDetailList

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**resourceList**|String|True| |资源列表|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](selectDetailList#result)| |
|**requestId**|String|此次请求的ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**data**|Object[]| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
