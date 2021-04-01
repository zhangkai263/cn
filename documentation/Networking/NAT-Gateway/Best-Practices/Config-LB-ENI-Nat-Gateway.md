# 配置SNAT功能的VPC云主机对外提供服务

NAT网关可以为VPC内云主机提供SNAT功能，即为VPC内无公网IP的云主机提供访问互联网的代理服务。如果VPC内某些云主机仍需要提供Telent、SSH等通过互联网主动访问的云主机的服务，可用过配置辅助网卡和负载均衡方式实现。

- 绑定辅助网卡方式：如配置SNAT功能的VPC内网云主机仍需通过Telnet、SSH等方式登录云主机进行其他配置，可为云主机绑定辅助网卡，您通过Telent、SSH辅助网卡的公网IP登录云主机；
- 负载均衡方式：如配置SNAT功能的VPC内云主机仍需对外提供高可用服务，可将多台云主机绑定负载均衡，您通过负载均衡的公网IP访问云主机服务。

## 绑定辅助网卡方式

### 配置说明
1. 创建NAT网关、配置NAT网关所在子网绑定路由表路由（目的地址0.0.0.0/0，下一跳为Internet）、配置VPC内云主机所在子网绑定路由表路由（目的地址0.0.0.0/0，下一跳为NAT网关）。NAT网关与VPC内云主机必须属于不同子网。具体可参照步骤[云主机使用NAT网关](../Getting-Started/Create-NatGateway.md)
2. 参照步骤[云主机使用NAT网关](https://docs.jdcloud.com/cn/elastic-network-interface/linux-permanent-configuration)
![NAT网关绑定辅助网卡](../../../../image/Networking/Nat-Gateway/natgw-eni.png)

## 绑定负载均衡方式
