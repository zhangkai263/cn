# registerTargets


## 描述
往TargetGroup中加入Target

## 请求方式
POST

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/targetGroups/{targetGroupId}:registerTargets

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**targetGroupId**|String|True| |TargetGroup Id|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**targetSpecs**|[TargetSpec[]](registertargets#targetspec)|True| |注册Target列表|

### <div id="targetspec">TargetSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**instanceId**|String|True| |Target所属实例的Id  <br>【dnlb】使用限制：dnlb同一TargetGroup下，同一实例仅允许一个端口提供服务。|
|**type**|String|False| |Target所属的type，取值为vm或container，默认为vm。|
|**port**|Integer|False| |Target提供服务的端口，取值范围：0-65535，其中0表示与backend的端口相同，默认为0|
|**weight**|Integer|False|10|Target的权重，取值范围：1-100 ，默认为10。|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**requestId**|String|请求ID|


## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Request field x.y.z is missing; Target is already register to same TargetGroup.|
|**404**|Target 'xxx' not found; TargetGroup 'xxx' not found.|
|**500**|internal server error|
