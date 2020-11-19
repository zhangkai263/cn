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
|**targetSpecs**|[TargetSpec[]](#targetspec)|True| |注册Target列表|

### <div id="TargetSpec">TargetSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**instanceId**|String|False| |Target所属实例的Id，只有type为vm或container时此项才需要|
|**type**|String|False| |Target所属的type，取值为vm、container或ip，默认为vm。vm和container类型对应服务器组的instance类型，ip类型对应服务器组的ip类型。|
|**port**|Integer|False| |Target提供服务的端口，取值范围：0-65535，其中0表示与backend的端口相同，默认为0。 <br>【dnlb】使用限制：dnlb同一TargetGroup下，同一实例/ip仅允许一个端口提供服务|
|**weight**|Integer|False|10|该Target的权重，取值范围：0-100 ，默认为10。0表示不参与流量转发，仅alb支持权重为0的target|
|**ipAddress**|String|False| |Target的ip地址。仅当type为ip时，此项必须配置。|

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
