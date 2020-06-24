# describeWebRuleRSGeoAreas


## 描述
查询网站类转发规则按地域回源配置 geoRsRoute 可设置的区域

## 请求方式
GET

## 请求地址
https://ipanti.jdcloud-api.com/v1/regions/{regionId}/describeWebRuleRSGeoAreas

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |区域 ID, 高防不区分区域, 传 cn-north-1 即可|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describewebrulersgeoareas#result)| |
|**requestId**|String| |
|**error**|[Error](describewebrulersgeoareas#error)| |

### <div id="error">Error</div>
|名称|类型|描述|
|---|---|---|
|**err**|[Err](describewebrulersgeoareas#err)| |
### <div id="err">Err</div>
|名称|类型|描述|
|---|---|---|
|**code**|Long|同http code|
|**details**|Object| |
|**message**|String| |
|**status**|String|具体错误|
### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**dataList**|[Country[]](describewebrulersgeoareas#country)| |
### <div id="country">Country</div>
|名称|类型|描述|
|---|---|---|
|**label**|String|国家或地区名称|
|**value**|String|国家或地区编码|
|**children**|[Country[]](describewebrulersgeoareas#country)| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
