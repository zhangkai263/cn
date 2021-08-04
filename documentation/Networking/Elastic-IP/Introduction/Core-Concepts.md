# 核心概念
本文主要介绍弹性公网IP帮助文档中使用到的概念。

| 英文 | 中文 | 说明 |
| :- | :- | :- |
| Elastic IP | 弹性公网IP | 弹性公网IP是可以独立申请的公网IP地址，支持与云主机、负载均衡、NFV实例等资源进行动态绑定和解绑，云资源绑定公网IP后，可访问公网或被公网访问 |
| Standard Elastic IP | 标准公网IP | 标准弹性公网IP在地域中心可用区发布，可以绑定中心可用区的资源 |
| Edge Elastic IP | 边缘公网IP | 边缘公网IP在边缘可用区发布，可以绑定边缘可用区的资源。最终客户可以就近接入，满足客户高带宽、低时延的要求 |
| Instance | 实例 | 实例是京东云提供的一种云计算基础服务单元，提供处理能力可弹性伸缩的计算服务。包括CPU、内存、操作系统、存储、网络、安全等，每种资源都提供多种规格，以满足不同业务的个性化需求 |
| NFV Instance | NFV实例 | NFV为Network Function Virtualization的缩写。NFV实例是采用软件技术与虚拟化技术所实现的具备传统网络功能的虚拟网络设备。例如：以镜像方式创建的VPN网关、NAT网关虚机实例等 |
| BGP | 边界网关协议 | BGP为Border Gateway Protocol的缩写。网络运营商之间通过BGP协议互相宣告IP地址段，BGP IP可以实现单IP多线路，达到不同运营商用户可以高速访问的效果 |
| Region | 地域 | 不同的地域即不同的地理区域。目前京东云有四个地域，分别为华北-北京、华南-广州、华东-宿迁、华东-上海 |
| AZ | 可用区 | AZ为Availability Zone的缩写。单个地域下可以包含多个AZ，不同AZ之间实现资源隔离，保障资源的高可用性。同地域下的AZ通常采用低延迟与高带宽的线路进行互联 |
| VPN Gateway | VPN网关 | VPN为Virtual Private Network的缩写。VPN网关是基于互联网，通过加密隧道技术将企业数据中心与云上VPC进行安全互联的产品 |
| NAT Gateway | NAT网关 | NAT为Network Address Translator的缩写。NAT网关可以为用户提供企业级VPC公网接入服务 |
| Load Balancer | 负载均衡 | 负载均衡可以对多台云主机进行流量分发，提升应用系统的对外服务能力，消除单点故障 |
|Shared Bandwidth Package|共享带宽包|多个公网IP的一种聚合计费和管理模式，支持多个公网IP复用共享一条带宽，实现对多个公网IP的统一管理、统一计费、统一监控|

以下是边缘公网IP相关的概念及其解释，请参考。

| 英文 | 中文 | 说明 |
| :- | :- | :- |
| Edge Ip Provider | 边缘公网IP线路 | 边缘公网IP的线路信息，包括边缘公网IP的线路接入区、资源关联范围、服务类型、可用区 |
| Point of Access | 边缘公网IP线路接入区 | 为边缘公网IP发布地域，即边缘IP的公网流量出入京东云的边缘节点。 用边缘可用区ID进行标识 |
| Association Scope| 边缘公网IP资源关联范围 | 边缘公网IP绑定的实例资源所在可用区范围，目前支持边缘可用区（edge zone，ez）IP挂载本边缘可用区的实例资源，业务流量在该边缘可用区完成交互|
| Service Type | 边缘公网IP服务类型 | 边缘公网IP的运营商服务类型。BGP为多运营商服务线路，电信、联通、移动为各运营商提供的单线路服务 |
| az | 边缘公网IP可用区 | 可用区：该边缘公网IP线路的可用区。其值与“线路接入区”一致时，基于该线路创建的边缘公网IP仅能关联该边缘可用区下的实例资源、不能关联任何中心可用区的实例资源 |

## 相关参考
- [产品概述](Product-Overview.md)
- [计费概述](../Pricing/Billing-Overview.md)
- [常见问题](../FAQ/FAQ.md)
- [共享带宽包](https://docs.jdcloud.com/cn/shared-bandwidth-package/product-overview)
