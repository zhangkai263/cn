# updateTargets


## 描述
修改target信息

## 请求方式
POST

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/targetGroups/{targetGroupId}:updateTargets

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**targetGroupId**|String|True| |TargetGroup Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**targetUpdateSpecs**|[TargetUpdateSpec[]](#targetupdatespec)|True| |修改target信息|

### <div id="TargetUpdateSpec">TargetUpdateSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**targetId**|String|True| |Target Id|
|**port**|Integer|False| |Target提供服务的端口，取值范围：0-65535，其中0表示与backend的端口相同 <br>【dnlb】使用限制：dnlb同一TargetGroup下，同一实例/ip仅允许一个端口提供服务|
|**weight**|Integer|False| |Target的权重，取值范围：0-100。0表示不参与流量转发|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Request field x.y.z is missing.|
|**404**|Target 'xxx' not found; TargetGroup 'xxx' not found.|
|**500**|internal server error|
