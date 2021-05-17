# 配置说明

本教程将指导您将弹性公网IP与私有网络中一台云主机绑定，实现云主机对公网访问。

## 前提条件

- 确保您已经[注册京东云账号](https://user.jdcloud.com/register?returnUrl=https%3A%2F%2Fwww.jdcloud.com%2F)，并实现[实名认证](https://realname.jdcloud.com/account/verify)。

- 确保您已经创建一个弹性公网IP，且未绑定云资源。

## 操作步骤

步骤1：首先您要创建一个专有网络（VPC）

步骤2：基于您创建的私有网络，创建一台云主机

步骤3：创建云主机的过程中，您可以选择分配弹性公网IP或不分配弹性公网IP，本教程以不分配弹性公网IP为例进行说明

步骤4：为您创建的云主机绑定弹性公网IP，请查看[弹性公网IP绑定云主机](Associate-Elastic-IP-to-VM.md)


## 后续测试

云主机与弹性公网IP绑定之后，您可以通过Ping弹性公网IP地址的方式来检测弹性公网IP的连通性。

## 相关参考

- [使用限制](../../Introduction/Restrictions.md)
- [创建VPC](https://docs.jdcloud.com/cn/virtual-private-cloud/vpc-configuration)
- [创建云主机](https://docs.jdcloud.com/cn/virtual-machines/create-instance)
- [创建公网IP](https://docs.jdcloud.com/cn/elastic-ip/create-elastic-ip)
- [弹性公网IP绑定云主机](https://docs.jdcloud.com/cn/elastic-ip/associate-elastic-ip-to-vm)
