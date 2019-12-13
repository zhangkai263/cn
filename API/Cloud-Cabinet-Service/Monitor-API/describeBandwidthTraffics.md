# describeBandwidthTraffics


## 描述
查询带宽（出口）流量列表

## 请求方式
GET

## 请求地址
https://jdccs.jdcloud-api.com/v1/idcs/{idc}/bandwidthTraffics

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**idc**|String|True| |IDC机房ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码, 默认为1|
|**pageSize**|Integer|False|20|分页大小，默认为20|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describebandwidthtraffics#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**bandwidthTraffics**|[DescribeBandwidthTraffic[]](describebandwidthtraffics#describebandwidthtraffic)|带宽（出口）流量列表|
|**pageNumber**|Integer|页码|
|**pageSize**|Integer|分页大小|
|**totalCount**|Integer|总数量|
### <div id="describebandwidthtraffic">DescribeBandwidthTraffic</div>
|名称|类型|描述|
|---|---|---|
|**idc**|String|机房英文标识|
|**idcName**|String|机房名称|
|**bandwidthId**|String|带宽实例ID|
|**bandwidthName**|String|带宽名称|
|**totalTrafficIn**|Double|总上行实时流量|
|**totalTrafficOut**|Double|总下行实时流量|
|**bandwidth**|Integer|总带宽|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
