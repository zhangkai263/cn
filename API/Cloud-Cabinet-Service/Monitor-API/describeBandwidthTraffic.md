# describeBandwidthTraffic


## 描述
查询带宽（出口）流量（资源）详情

## 请求方式
GET

## 请求地址
https://jdccs.jdcloud-api.com/v1/idcs/{idc}/bandwidthTraffics/{bandwidthId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**idc**|String|True| |IDC机房ID|
|**bandwidthId**|String|True| |带宽（出口）实例ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describebandwidthtraffic#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**bandwidthTraffic**|[BandwidthTraffic](describebandwidthtraffic#bandwidthtraffic)|带宽（出口）流量（资源）详情|
### <div id="bandwidthtraffic">BandwidthTraffic</div>
|名称|类型|描述|
|---|---|---|
|**idc**|String|机房英文标识|
|**idcName**|String|机房名称|
|**bandwidthId**|String|带宽实例ID|
|**bandwidthName**|String|带宽名称|
|**totalTrafficIn**|Double|总上行实时流量|
|**totalTrafficOut**|Double|总下行实时流量|
|**bandwidth**|Integer|总带宽|
|**lineType**|String|线路类型 dynamicBGP:动态BGP thirdLineBGP:三线BGP telecom:电信单线 unicom:联通单线 mobile:移动单线|
|**relatedIp**|[RelatedIp[]](describebandwidthtraffic#relatedip)|关联的公网IP|
|**switchboard**|[DescribeSwitchboard[]](describebandwidthtraffic#describeswitchboard)|交换机信息|
### <div id="describeswitchboard">DescribeSwitchboard</div>
|名称|类型|描述|
|---|---|---|
|**ip**|String|IP|
|**port**|String|端口|
|**trafficIn**|Double|上行实时流量|
|**trafficOut**|Double|下行实时流量|
|**alarmStatus**|String|报警状态 normal:正常 alarm:报警|
### <div id="relatedip">RelatedIp</div>
|名称|类型|描述|
|---|---|---|
|**cidrAddr**|String|IP地址段|
|**lineType**|String|线路类型 dynamicBGP:动态BGP thirdLineBGP:三线BGP telecom:电信单线 unicom:联通单线 mobile:移动单线|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
