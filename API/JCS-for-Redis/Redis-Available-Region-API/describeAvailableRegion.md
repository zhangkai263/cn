# describeAvailableRegion


## 描述
查询支持的地域列表

## 请求方式
GET

## 请求地址
https://redis.jdcloud-api.com/v1/regions/{regionId}/availableRegion

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |缓存Redis实例所在区域的Region ID。目前有华北-北京、华南-广州、华东-上海三个区域，Region ID分别为cn-north-1、cn-south-1、cn-east-2|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeavailableregion#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**availableRegions**|[AvailableRegion[]](describeavailableregion#availableregion)|地域列表|
### <div id="availableregion">AvailableRegion</div>
|名称|类型|描述|
|---|---|---|
|**regionId**|String|地域id|
|**regionName**|String|地域名|
|**soldOut**|Boolean|是否售罄|
|**quota**|[QuotaInfo](describeavailableregion#quotainfo)|用户配额|
|**availableZones**|[AzInfo[]](describeavailableregion#azinfo)|可用区列表|
### <div id="azinfo">AzInfo</div>
|名称|类型|描述|
|---|---|---|
|**azId**|String|逻辑可用区id|
|**azName**|String|逻辑可用区名|
|**soldOut**|Boolean|是否售罄|
### <div id="quotainfo">QuotaInfo</div>
|名称|类型|描述|
|---|---|---|
|**max**|Integer|配额上限|
|**used**|Integer|已使用|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
