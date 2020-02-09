# describeTargetGroup


## 描述
查询TargetGroup详情

## 请求方式
GET

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/targetGroups/{targetGroupId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**targetGroupId**|String|True| |TargetGroup Id|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describetargetgroup#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**targetGroup**|[TargetGroup](describetargetgroup#targetgroup)|TargetGroup资源信息|
### <div id="targetgroup">TargetGroup</div>
|名称|类型|描述|
|---|---|---|
|**targetGroupId**|String|TargetGroup的Id|
|**targetGroupName**|String|TargetGroup的名字|
|**loadBalancerId**|String|TargetGroup所属LoadBalancer的Id|
|**loadBalancerType**|String|TargetGroup所属负载均衡类型，取值为：alb、nlb、dnlb|
|**loadBalancerName**|String|TargetGroup所属LoadBalancer的名称|
|**description**|String|TargetGroup的描述信息|
|**createdTime**|String|TargetGroup的创建时间|
|**targets**|[Target[]](describetargetgroup#target)|Target列表。该字段即将下线，请勿使用，已经使用该字段查询Target详情的服务请尽快切换使用describeTargets接口|
### <div id="target">Target</div>
|名称|类型|描述|
|---|---|---|
|**targetId**|String|Target的Id|
|**targetGroupId**|String|TargetGroup的Id|
|**type**|String|Target的类型，取值为vm或container, 默认为vm|
|**instanceId**|String|Target所属实例的Id|
|**port**|Integer|Target提供服务的端口，取值范围：0-65535，其中0表示与backend的端口相同，默认为0|
|**weight**|Integer|Target的权重，取值范围：1-100 ，默认为10|
|**privateIpAddress**|String|Target的内网IP地址|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Request field x.y.z is 'xxx', expected one of [yyy,zzz].|
|**404**|TargetGroup 'xxx' not found.|
|**500**|internal server error|
