# 搭建IPv4/IPv6双栈私有网络

### 简介

  京东云私有网络提供创建同时支持ipv4地址和ipv6地址的私有网络（目前IPv6处于公测中，如需使用，请提交工单，申请公测），两种类型的地址均可通过内网/公网进行访问，下面将介绍如何搭建IPv4/IPv6 私有网络。

### 应用场景

需要提供IPv4/IPv6网络服务。

### 前提条件及限制

- 首先您需要有京东云的账号，并完成实名认证，若您目前没有账号，请先[注册](https://user.jdcloud.com/register?source=jdcloud&ReturnUrl=https%3A%2F%2Fwww.jdcloud.com)。
- 确保账户中有足够余额。

### 操作步骤

  本教程将介绍，在京东云上部署同时支持IPv6和IPv4云主机的私有网络。首先在创建云主机之前，需创建支持IPv6的私有网络、子网。

``
创建的资源如私有网络、子网、路由表、网络ACL、安全组等需在同一地域下进行
``
 步骤1: 进入京东云控制台，选择私有网络，创建支持IPv6的私有网络，具体操作参考[配置双栈VPC](https://docs.jdcloud.com/cn/virtual-private-cloud/vpc-configuration)；

 步骤2：在步骤1中创建的私有网络下创建支持IPv6的子网，选择默认路由表，具体操作请参考[配置子网](https://docs.jdcloud.com/cn/virtual-private-cloud/subnet-configuration)；
 
 步骤3：根据需求在路由表详情页进行配置路由策略（也可后续根据业务再配置），京东云支持创建自定义路由表，具体操作请参考[路由表配置](https://docs.jdcloud.com/cn/virtual-private-cloud/route-table-configuration)；

 步骤4：（可选）可根据业务需求进行创建，在步骤1中创建的私有网络下创建网络ACL，关联步骤2中创建的子网，配置ACL出入站规则，具体操作请参考[网络ACL配置](https://docs.jdcloud.com/cn/virtual-private-cloud/network-acl-configuration)；

 步骤5：在步骤2中创建的子网下创建IPv6云主机，设置云主机登录密码，绑定安全组，支持3种默认安全组，可根据业务需求自定义安全，将自定义的安全组与云主机进行绑定，解绑默认安全组。具体操作请参考[创建云主机](https://docs.jdcloud.com/cn/virtual-machines/create-instance)；

 步骤6：配置安全组出入站规则，具体操作请参考[配置安全组](https://docs.jdcloud.com/cn/virtual-private-cloud/security-group-configuration)；
 
 完成上述步骤即完成搭建IPv4/IPv6私有网络，下面进行测试网络的连通性。


### 测试网络连通性

  本例使用xshell软件进行测试，登录IPv6云主机，ping一个IPv6服务进行测试。

  步骤1：通过xshell登录IPv6云主机，打开xshell，新建会话，输入云主机名称，主机字段输入云主机IPv6地址；

  步骤2：输入云主机的登录用户名及密码，登录成功后，进行测试；

  步骤3：输入ping -6 [其他ipv6地址]，若能ping通则表示连通成功。

## 相关参考
- [配置vpc](../Operation-Guide/VPC-Configuration.md)
- [配置子网](../Operation-Guide/Subnet-Configuration.md)
- [创建云主机实例](https://docs.jdcloud.com/cn/virtual-machines/create-instance)
- [配置安全组](../Operation-Guide/Security-Group-Configuration.md)
- [配置路由表](../Operation-Guide/Route-Table-Configuration.md)
