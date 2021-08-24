# modifyInstanceVpcAttribute


## 描述

修改一台云主机的子网或内网IP地址。

详细操作说明请参考帮助文档：[修改网络配置](https://docs.jdcloud.com/cn/virtual-machines/modify-vpc-attribute)

## 接口说明
- 调该接口之前实例必须处于停止 `stopped` 状态。
- 修改VPC及子网
  - 内网IPv4：可指定或由系统分配。
  - IPv6：如新子网支持IPv6，可选是否分配，如分配仅支持系统分配。
  - 安全组：须指定新VPC下的安全组。
- 不修改VPC，仅修改子网
  - 内网IPv4：可指定或由系统分配。
  - IPv6：如新子网支持IPv6，可选是否分配，如分配仅支持系统分配。
  - 安全组：不支持绑定新安全组。
- 不修改VPC及子网，仅更换内网IP
  - 内网IPv4：须指定IP地址。
  - IPv6：不支持修改。
  - 安全组：不支持绑定新安全组。
- 一些限制及注意事项：
  - 已加入负载均衡-后端服务器组中的实例不允许修改。
  - 绑定弹性网卡的实例不支持修改VPC，仅支持在同VPC下修改子网和内网IP。
  - 主网卡分配了辅助内网IP的实例不支持修改VPC和子网，仅支持在同子网下修改内网IP。
  - 如实例在高可用组内，则不允许修改VPC，仅可在同VPC内修改子网或内网IPv4地址。
  - 仅在更换VPC时传入安全组ID才有效，且安全组须隶属于目标VPC。
  - 如指定内网IPv4，须确保IP地址在子网网段内且未被占用；如不指定则随机分配，须确保子网可用IP充足。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:modifyInstanceVpcAttribute

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|
|**instanceId**|String|是|i-eumm****d6|云主机ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**subnetId**|String|是|subnet-c2p3****9o|子网Id。|
|**assignIpv6**|Boolean|否| |`true`: 分配IPV6地址。<br>`false`: 不分配IPV6地址。<br>|
|**privateIpAddress**|String|否| |Ipv4地址。<br>不变更 `vpc` 及子网时必须指定Ipv4地址<br>|
|**securityGroups**|String[]|否| |安全组列表。<br>更换 `vpc` 时必须指定新的安全组。<br>不更换 `vpc` 时不可以指定安全组。<br>|


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|



## 请求示例
POST

```
/v1/regions/cn-north-1/instances/i-eumm****d6:modifyInstanceVpcAttribute
{
    "subnetId" : "subnet-c2p3****9o",
    "privateIpAddress" : "",
    "securityGroups" : ["sg-p2d1****ya", "sg-zn1a****3c"]
}
```



## 返回示例
```
{
    "requestId": "a0633f72670e59f8c6db36b1ee257011"
}
```

## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**400**|FAILED_PRECONDITION|Conflict with underlay task 'xx'|云主机实例正在执行其它任务，请稍后再试。|
|**400**|FAILED_PRECONDITION|Invalid instance status xx|错误的云主机状态。|
|**400**|FAILED_PRECONDITION|too many securityGroup. less than 5|最多只能指定5个安全组。|
|**400**|FAILED_PRECONDITION|'xx' have multi port, Not allowed to change vpc|实例绑定了辅助网卡，不允许操作。|
|**400**|FAILED_PRECONDITION|'xx' in availability_group, not allowed to change vpc|实例使用了高可用组，不允许操作。|
|**400**|FAILED_PRECONDITION|Miss security group|更换vpc时未指定安全组。|
|**400**|FAILED_PRECONDITION|Need specify privateIpAddress|未变更子网时需要指定Ipv4地址。|
|**400**|FAILED_PRECONDITION|Not support change ipv6|未变更子网时不支持变更Ipv6。|
|**400**|FAILED_PRECONDITION|The vpc of 'xx' and 'xx' not in same vpc|安全组和子网不在相同vpc下。|
|**400**|FAILED_PRECONDITION|'xx' have SecondaryIps, Not allowed to change subnet.|分配了辅助内网IP的情况下不允许修改子网。|
|**404**|NOT_FOUND|Instance 'xx' not found.|云主机实例不存在。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
