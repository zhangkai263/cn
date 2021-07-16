# createLoadBalancer


## 描述
创建负载均衡

## 请求方式
POST

## 请求地址
https://lb.jdcloud-api.com/v1/regions/{regionId}/loadBalancers/

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |Region ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**loadBalancerName**|String|True| |LoadBalancer的名称,只允许输入中文、数字、大小写字母、英文下划线“_”及中划线“-”，不允许为空且不超过32字符|
|**subnetId**|String|True| |LoadBalancer所属子网的Id|
|**type**|String|False| |LoadBalancer的类型，取值：alb、nlb、dnlb，默认为alb|
|**azs**|String[]|True| |【alb，nlb】LoadBalancer所属availability Zone列表,对于alb,nlb是必选参数 <br>【dnlb】全可用区可用，不必传该参数|
|**chargeSpec**|[ChargeSpec](createloadbalancer#chargespec)|False| |【alb】支持按用量计费，默认为按用量。【nlb】支持按用量计费。【dnlb】支持按配置计费|
|**elasticIp**|[ElasticIpSpec](createloadbalancer#elasticipspec)|False| |负载均衡关联的弹性IP规格|
|**securityGroupIds**|String[]|False| |【alb】 安全组 ID列表|
|**description**|String|False| |LoadBalancer的描述信息,允许输入UTF-8编码下的全部字符，不超过256字符|
|**deleteProtection**|Boolean|False| |删除保护，取值为True(开启)或False(关闭)，默认为False|
|**userTags**|[Tag[]](createloadbalancer#tag)|False| |用户tag 信息|

### <div id="tag">Tag</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**key**|String|False| | |
|**value**|String|False| | |
### <div id="elasticipspec">ElasticIpSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**bandwidthMbps**|Integer|True| |弹性公网IP的限速（单位：Mbps），取值范围为[1-200]|
|**provider**|String|True| |IP线路信息。当IP类型为标准公网IP时，取值为bgp或no_bgp，cn-north-1：bgp；cn-south-1：bgp；cn-east-1：bgp；cn-east-2：bgp。当IP类型为边缘公网IP时，其值可通过调用describeEdgeIpProviders、获取不同边缘节点的边缘公网IP线路信息|
|**chargeSpec**|[ChargeSpec](createloadbalancer#chargespec)|False| |计费配置。边缘公网IP支持包年包月、按配置；标准公网IP支持包年包月、按配置、按流量|
### <div id="chargespec">ChargeSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**chargeMode**|String|False|postpaid_by_duration|计费模式，取值为：prepaid_by_duration，postpaid_by_usage或postpaid_by_duration，prepaid_by_duration表示预付费，postpaid_by_usage表示按用量后付费，postpaid_by_duration表示按配置后付费，默认为postpaid_by_duration.请参阅具体产品线帮助文档确认该产品线支持的计费类型|
|**chargeUnit**|String|False| |预付费计费单位，预付费必填，当chargeMode为prepaid_by_duration时有效，取值为：month、year，默认为month|
|**chargeDuration**|Integer|False| |预付费计费时长，预付费必填，当chargeMode取值为prepaid_by_duration时有效。当chargeUnit为month时取值为：1~9，当chargeUnit为year时取值为：1、2、3|
|**autoRenew**|Boolean|False| |True=：OPEN——开通自动续费、False=CLOSE—— 不开通自动续费，默认为CLOSE|
|**buyScenario**|String|False| |产品线统一活动凭证JSON字符串，需要BASE64编码，目前要求编码前格式为 {"activity":{"activityType":必填字段, "activityIdentifier":必填字段}}|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createloadbalancer#result)| |
|**requestId**|String|请求ID|

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**loadBalancerId**|String|负载均衡id|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Request field x.y.z is 'xxx', expected one of [yyy,zzz].|
|**403**|'xxx' forbidden.|
|**404**|'xxx' not found.|
|**409**|'xxx' inuse.|
|**429**|lb xxx quota exceeded.|
|**500**|internal server error|
