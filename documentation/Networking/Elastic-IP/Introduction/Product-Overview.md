# 产品概述

弹性公网IP（Elastic IP Address，简称EIP）是可以独立申请的公网IP地址，支持与云主机、容器、负载均衡、NFV实例等资源进行动态绑定和解绑操作。弹性公网IP的主要作用是屏蔽实例故障，通过手动配置的方式，当实例出现故障时弹性公网IP可以漂移到冗余实例上，从而达到快速响应故障的目的。

京东云目前采用业内领先的双活vRouter（Virtual Router，虚拟路由器）高可用技术，相对于传统的主备vRouter高可用方式，该技术在高并发连接、超大流量负载以及流量突发等场景下可以为用户提供链路冗余以及高可用性。基于该项技术，京东云弹性公网IP最大带宽可以达到用户实际购买带宽的150%，为用户业务提供保障。

基于双活vRouter的流量分担模型，普遍情况下，弹性公网IP的最大带宽为用户实际购买带宽的150%；在极特殊情况下，如单连接FTP下载文件，弹性公网IP最大带宽约为用户实际购买带宽的75%。
### 弹性公网IP类型
**标准公网IP**：为中心可用区提供公网服务能力

**边缘公网IP**：为边缘可用区提供公网服务能力

弹性公网IP的中心可用区及边缘可用区详细介绍请参考[地域及可用区](Region-Az.md)。

### 线路类型
|IP类型|线路|
|-----|------|
|标准公网IP|BGP、ISPBGP|
|边缘公网IP|BGP、telecom（电信）、unicom（联通）、chinamobile（中国移动）|


### 特性优势
* 完全弹性
* 支持多种弹性公网IP类型
* 支持绑定多种云资源
* 支持多种计费类型
* 支持独立购买及持续保留

详情请参考[产品优势](https://docs.jdcloud.com/cn/elastic-ip/benefits)。

### EIP与普通IP的异同点
具体异同点如下表：
|功能点|EIP|普通公网IP|
|-----|------|------|
|提供公网服务|√	|√|
|独立购买/释放|√|× |
|灵活绑定/解绑|√|×|
|持续保留IP|√|×|
|实时调整带宽|√|√|
|IP占有费|√（仅按用量）|×|



### 快速入门
**了解**：①[产品概述](Product-Overview.md)——>②[产品功能](Features.md)——>③[产品优势](Benefits.md)——>④[应用场景](Application-Scenarios.md)——>③[使用限制](Restrictions.md)。

**使用**：①[创建EIP](../Operation-Guide/Elastic-IP-Management/Create-Elastic-IP.md)——>②[绑定云资源](../Operation-Guide/Elastic-IP-Management/Associate-Elastic-IP.md)——>③[调整带宽](../Operation-Guide/Elastic-IP-Management/Modify-Elastic-IP.md)——>④[解绑云资源](../Operation-Guide/Elastic-IP-Management/Disassociate-Elastic-IP.md)——>⑤[删除弹性公网IP](../Operation-Guide/Elastic-IP-Management/Delete-Elastic-IP.md)。

## 相关参考
**产品简介**
- [产品优势](Benefits.md)
- [应用场景](Application-Scenarios.md)
- [地域及可用区](Region-Az.md)
- [使用限制](Restrictions.md)

**产品定价**

- [计费概述](https://docs.jdcloud.com/cn/elastic-ip/billing-overview)
- [价格总览](../Pricing/Price-Overview.md)

**常用操作**
- [创建弹性公网IP](../Operation-Guide/Elastic-IP-Management/Create-Elastic-IP.md)
- [删除弹性公网IP](../Operation-Guide/Elastic-IP-Management/Delete-Elastic-IP.md)
- [绑定弹性公网IP](../Operation-Guide/Elastic-IP-Management/Associate-Elastic-IP.md)
- [解绑弹性公网IP](../Operation-Guide/Elastic-IP-Management/Disassociate-Elastic-IP.md)
- [修改弹性公网IP带宽](../Operation-Guide/Elastic-IP-Management/Modify-Elastic-IP.md)

[**常见问题**](https://docs.jdcloud.com/cn/elastic-ip/faq)

