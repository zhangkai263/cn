# queryExtraCacheTime


## 描述
查询异常码缓存时间

## 请求方式
GET

## 请求地址
https://cdn.jdcloud-api.com/v1/domain/{domain}/extraCacheTime:query

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**domain**|String|True| |用户域名|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](queryextracachetime#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**domain**|String| |
|**extraCacheTimes**|[ExtraCacheTime[]](queryextracachetime#extracachetime)|异常码缓存时间列表|
### <div id="ExtraCacheTime">ExtraCacheTime</div>
|名称|类型|描述|
|---|---|---|
|**httpCode**|String|http状态码|
|**cacheTime**|Long|缓存时间|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**404**|NOT_FOUND|
