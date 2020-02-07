# describeTargetGroups


## 描述
查询虚拟服务器组列表详情

## 请求方式
GET

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/targetGroups/

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码, 默认为1, 取值范围：[1,∞), 页码超过总页数时, 显示最后一页|
|**pageSize**|Integer|False|20|分页大小，默认为20，取值范围：[10,100]|
|**filters**|[Filter[]](describetargetgroups#filter)|False| |targetGroupIds - TargetGroup ID列表，支持多个<br>targetGroupNames - TargetGroup名称列表，支持多个<br>loadBalancerId － TargetGroup所属负载均衡的Id，支持单个<br>loadBalancerType - 负载均衡类型，取值为：alb、nlb、dnlb，默认alb，支持单个<br>|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describetargetgroups#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**targetGroups**|[TargetGroup[]](describetargetgroups#targetgroup)|TargetGroup资源信息列表|
|**totalCount**|Integer|总数量|
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
|**targets**|[Target[]](describetargetgroups#target)|Target列表。该字段即将下线，请勿使用，已经使用该字段查询Target详情的服务请尽快切换使用describeTargets接口|
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
