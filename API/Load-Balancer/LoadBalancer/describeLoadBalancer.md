# describeLoadBalancer


## 描述
查询负载均衡详情

## 请求方式
GET

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/loadBalancers/{loadBalancerId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|
|**loadBalancerId**|String|True| |LB ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeloadbalancer#result)|返回结果|
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**loadBalancer**|[LoadBalancer](describeloadbalancer#loadbalancer)|负载均衡的信息|
### <div id="loadbalancer">LoadBalancer</div>
|名称|类型|描述|
|---|---|---|
|**loadBalancerId**|String|LoadBalancer的Id|
|**loadBalancerName**|String|LoadBalancer的名称|
|**subnetId**|String|LoadBalancer所属子网的Id|
|**vpcId**|String|负载均衡所属vpc Id|
|**type**|String|LoadBalancer的类型|
|**state**|[LoadBalancerState](describeloadbalancer#loadbalancerstate)|LoadBalancer的状态|
|**azs**|String[]|LoadBalancer所属availability Zone列表|
|**securityGroupIds**|String[]|LoadBalancer绑定的安全组列表|
|**privateIp**|[PrivateIpAddress](describeloadbalancer#privateipaddress)|描述LB的私有对象信息|
|**charge**|[Charge](describeloadbalancer#charge)|计费配置|
|**tags**|[Tag[]](describeloadbalancer#tag)|tag信息|
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
