# describeTargetGroups


## 描述
查询虚拟服务器组列表详情，返回target详情功能3个月后将会下线，建议用户直接使用describeTargets接口查询target详情

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
|**type**|String|实例或IP|
### <div id="target">Target</div>
|名称|类型|描述|
|---|---|---|
|**targetId**|String|Target的Id|
|**targetGroupId**|String|TargetGroup的Id|
|**type**|String|Target的类型，取值为vm、container或ip, 默认为vm|
|**instanceId**|String|Target所属实例（vm或container）的Id|
|**port**|Integer|Target提供服务的端口，取值范围：0-65535，其中0表示与backend的端口相同，默认为0。 <br>【dnlb】使用限制：dnlb同一TargetGroup下，同一实例/ip仅允许一个端口提供服务|
|**weight**|Integer|该Target的权重，取值范围：0-100 ，默认为10。0表示不参与流量转发，仅alb支持权重为0的target|
|**privateIpAddress**|String|Target所属实例（vm或container）的内网IP地址|
|**ipAddress**|String|Target的IP地址。当Target类型为vm或container时，表示vm或container的内网IP地址；当Target类型为ip时，表示注册Target时指定的IP地址|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Request field x.y.z is 'xxx', expected one of [yyy,zzz].|
|**404**|TargetGroup 'xxx' not found.|
|**500**|internal server error|
