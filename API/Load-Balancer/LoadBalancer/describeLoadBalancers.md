# describeLoadBalancers


## 描述
查询负载均衡列表详情

## 请求方式
GET

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/loadBalancers/

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码, 默认为1, 取值范围：[1,∞), 页码超过总页数时, 显示最后一页|
|**pageSize**|Integer|False|20|分页大小，默认为20，取值范围：[10,100]|
|**filters**|[Filter[]](describeloadbalancers#filter)|False| |loadBalancerType - 负载均衡类型，取值为：alb、nlb、dnlb，默认alb，支持单个<br>loadBalancerIds - 负载均衡ID列表，支持多个<br>loadBalancerNames - 负载均衡名称列表，支持多个<br>vpcId - 负载均衡所在Vpc的Id，支持单个<br>|
|**tags**|[TagFilter[]](describeloadbalancers#tagfilter)|False| |Tag筛选条件|

### <div id="tagfilter">TagFilter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**key**|String|False| |Tag键|
|**values**|String[]|False| |Tag值|
### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeloadbalancers#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**loadBalancers**|[LoadBalancer[]](describeloadbalancers#loadbalancer)|负载均衡资源信息列表|
|**totalCount**|Integer|总数量|
### <div id="loadbalancer">LoadBalancer</div>
|名称|类型|描述|
|---|---|---|
|**loadBalancerId**|String|LoadBalancer的Id|
|**loadBalancerName**|String|LoadBalancer的名称|
|**subnetId**|String|LoadBalancer所属子网的Id|
|**vpcId**|String|负载均衡所属vpc Id|
|**type**|String|LoadBalancer的类型|
|**state**|[LoadBalancerState](describeloadbalancers#loadbalancerstate)|LoadBalancer的状态|
|**azs**|String[]|LoadBalancer所属availability Zone列表|
|**securityGroupIds**|String[]|LoadBalancer绑定的安全组列表|
|**privateIp**|[PrivateIpAddress](describeloadbalancers#privateipaddress)|描述LB的私有对象信息|
|**charge**|[Charge](describeloadbalancers#charge)|计费配置|
|**tags**|[Tag[]](describeloadbalancers#tag)|tag信息|
|**description**|String|LoadBalancer的描述信息|
|**deleteProtection**|Boolean|删除保护，取值为True(开启)或False(关闭)|
|**createdTime**|String|LoadBalancer的创建时间|
### <div id="tag">Tag</div>
|名称|类型|描述|
|---|---|---|
|**key**|String| |
|**value**|String| |
### <div id="charge">Charge</div>
|名称|类型|描述|
|---|---|---|
|**chargeMode**|String|支付模式，取值为：prepaid_by_duration，postpaid_by_usage或postpaid_by_duration，prepaid_by_duration表示预付费，postpaid_by_usage表示按用量后付费，postpaid_by_duration表示按配置后付费，默认为postpaid_by_duration|
|**chargeStatus**|String|费用支付状态，取值为：normal、overdue、arrear，normal表示正常，overdue表示已到期，arrear表示欠费|
|**chargeStartTime**|String|计费开始时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|
|**chargeExpiredTime**|String|过期时间，预付费资源的到期时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ，后付费资源此字段内容为空|
|**chargeRetireTime**|String|预期释放时间，资源的预期释放时间，预付费/后付费资源均有此值，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|
### <div id="privateipaddress">PrivateIpAddress</div>
|名称|类型|描述|
|---|---|---|
|**privateIpAddress**|String|LoadBalancer的VIP(IPv4地址)|
|**elasticIpId**|String|弹性公网IP ID|
|**elasticIpAddress**|String|弹性公网IP地址|
### <div id="loadbalancerstate">LoadBalancerState</div>
|名称|类型|描述|
|---|---|---|
|**code**|String|Lb的状态码，CREATING,ACTIVE,DOWN,DELETING,STOPPING,STARTING,CREATE_FAILED|
|**reason**|String|state的描述|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Request field x.y.z is 'xxx', expected one of [yyy,zzz].|
|**404**|LoadBalancer 'xxx' not found.|
|**500**|internal server error|
