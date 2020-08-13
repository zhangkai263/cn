# describeBandwidth


## 描述
查询带宽（出口）详情

## 请求方式
GET

## 请求地址
https://jdccs.jdcloud-api.com/v1/idcs/{idc}/bandwidths/{bandwidthId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**idc**|String|True| |IDC机房ID|
|**bandwidthId**|String|True| |带宽（出口）实例ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describebandwidth#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**bandwidth**|[Bandwidth](describebandwidth#bandwidth)| |
### <div id="bandwidth">Bandwidth</div>
|名称|类型|描述|
|---|---|---|
|**idc**|String|机房英文标识|
|**idcName**|String|机房名称|
|**bandwidthId**|String|带宽实例ID|
|**bandwidthName**|String|带宽名称|
|**status**|String|状态 normal:正常 abnormal:异常|
|**lineType**|String|线路类型 dynamicBGP:动态BGP thirdLineBGP:三线BGP telecom:电信单线 unicom:联通单线 mobile:移动单线|
|**chargeType**|String|计费方式 fixedBandwidth:固定带宽 95thPercentile:95峰值 merge95thPercentile:合并95峰值|
|**bandwidth**|Integer|合同带宽（Mbps）|
|**relatedIp**|[RelatedIp[]](describebandwidth#relatedip)|关联的公网IP|
|**switchboard**|[Switchboard[]](describebandwidth#switchboard)|交换机信息|
### <div id="switchboard">Switchboard</div>
|名称|类型|描述|
|---|---|---|
|**ip**|String|IP|
|**port**|String|端口|
### <div id="relatedip">RelatedIp</div>
|名称|类型|描述|
|---|---|---|
|**cidrAddr**|String|IP地址段|
|**lineType**|String|线路类型 dynamicBGP:动态BGP thirdLineBGP:三线BGP telecom:电信单线 unicom:联通单线 mobile:移动单线|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
