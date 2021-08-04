# 配置说明

本教程将指导您在私有网络中为负载均衡绑定弹性公网IP，实现负载均衡对于公网流量访问云主机的分流服务。

### 前提条件

- 确保您已经[注册京东智联云账号](https://user.jdcloud.com/register?returnUrl=https%3A%2F%2Fwww.jdcloud.com%2F)，并实现实名认证[实名认证](https://realname.jdcloud.com/account/verify)。

- 确保您已经创建一个弹性公网IP，且未绑定云资源。

### 操作步骤

步骤1：首先您要创建一个专有网络（VPC）

步骤2：基于您创建的私有网络，创建一个负载均衡

步骤3：创建负载均衡的过程中，您可以选择分配弹性公网IP或不分配弹性公网IP，本教程以不分配弹性公网IP为例进行说明

步骤4：为您创建的负载均衡绑定弹性公网IP，[绑定负载均衡](https://docs.jdcloud.com/cn/elastic-ip/associate-elastic-ip-to-lb)

### 后续测试

负载均衡与弹性公网IP绑定之后，您可以通过Ping弹性公网IP地址的方式来检测弹性公网IP的连通性。



## 相关参考

- [使用限制](../../Introduction/Restrictions.md)
- [创建负载均衡](https://docs.jdcloud.com/cn/application-load-balancer/create-alb-instance)
- [创建公网IP](https://docs.jdcloud.com/cn/elastic-ip/create-elastic-ip)
- [解绑公网IP](https://docs.jdcloud.com/cn/elastic-ip/disassociate-elastic-ip)
- [绑定负载均衡](https://docs.jdcloud.com/cn/elastic-ip/associate-elastic-ip-to-lb)
