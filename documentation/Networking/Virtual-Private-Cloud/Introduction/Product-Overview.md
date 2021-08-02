## 产品概述

## 私有网络概述

京东云私有网络(Virtual Private Cloud，简称VPC)，是您在京东公有云上自定义的逻辑隔离的网络空间，与您在数据中心搭建的传统网络类似，此私有网络空间由用户完全掌控，支持自定义网段划分、路由策略等。用户可以在VPC内创建和管理多种云产品，如云主机、负载均衡等，同时可配置网络内的资源连接Internet。另外，您可以通过VPN\专线接入，打通您的IDC内网和京东云网络，实现应用的混合云部署，以及将应用平滑地迁移至云上。


## 私有网络VS传统网络

#### 主要区别

| 私有网络             | 传统数据中心网络   |
|:-------------------- |:------------------ |
| 控制转发分离         | 控制转发耦合       |
| 集中式控制           | 分布式控制         |
| 可编程               | 不可编程           |
| 开放API              | 不开放             |
| 基于虚拟化的网络能力 | 基于硬件的网络能力 |



#### 功能对比

| 私有网络                               | 传统网络                             |
|:----------------------- |:----------------------------------- |
| 通过控制台或API灵活操作网络各组件，以软件定义网络，节省设备及运维成本 | 无法灵活的变更网络配置，运维成本较高 |
| 通过弹性公网IP实现业务灵活切换                               | 不支持公网IP灵活绑定并切换多个业务   |
| 可通过VPN/专线接入连接京东云私有网络至企业IDC，既可降低企业IT运维成本，又保护核心数据安全，轻松构建混合云 | 不支持混合云部署                     |
| 自主配置安全组和ACL策略，从实例级别和子网级别对用户的数据和应用提供多重安全防护 | 达到相同的安全级别，需额外采购设备   |

## 相关功能
一个私有网络的必要组成部分包括一个私有网络网段、[子网](Features/Subnet-Features.md)、[路由表](Features/Route-Table-Features.md)，子网必须绑定一个路由表，京东云支持的私有网段有：10.0.0.0/16、172.16.0.0/16、192.168.0.0/16，每个网段包含65534个可用IP地址（不包含保留地址）。为保障子网内业务安全性，可在子网上绑定[ACL](Features/Network-ACL-Features.md)，制定相关的ACL策略；如需保障子网中某个资源实例的安全，可通过[安全组](Features/Security-Group-Features.md)进行保障，支持自定义安全组规则；若同地域下不同VPC的资源需要进行通信，可通过VPC对等连接实现。
 

## 快速入门

**了解**：①[产品概述](Product-Overview.md)——>②[产品功能](Features/VPC-Features.md)——>③[产品优势](Benefits.md)——>④[应用场景](Application-Scenarios/Basic-Business-Into-Cloud.md)——>③[使用限制](Restrictions.md)。

**使用**：①[创建VPC](../Operation-Guide/VPC-Configuration.md)——>②[配置子网](../Operation-Guide/Subnet-Configuration.md)——>③[配置路由](../Operation-Guide/Route-Table-Configuration.md)



## 相关参考

- [使用限制](Restrictions.md)
- [VPC功能概述](Features/VPC-Features.md)
- [子网功能概述](Features/Subnet-Features.md)
- [路由表功能概述](Features/Route-Table-Features.md)
- [基础架构](Basic-Infrastructure.md)
- [常见问题](../FAQ/FAQ.md)
