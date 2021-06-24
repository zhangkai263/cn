# 私有网络中部署云主机实例 

本文将详细介绍如何在私有网络中部署云主机实例。

### 应用场景

您的业务迁移上云，或业务增量，需增加部署服务器，大致流程如下：

### 操作流程

![](../../../../image/Networking/Virtual-Private-Cloud/Getting-Started/Create-Virtual-Machine-Instance-In-VPC/Create-Virtual-Machine-Instance-In-VPC-1.png)

### 前提条件

- 确保您已经[注册京东云账号](https://user.jdcloud.com/register?returnUrl=https%3A%2F%2Fwww.jdcloud.com%2F)，并实现[实名认证](https://realname.jdcloud.com/account/verify)；

- 确保账户中有足够余额；

- 确保需要创建的资源数量配额充足，如需提升配额请提[工单申请](https://ticket.jdcloud.com/applyorder/submit)。


### 操作步骤
- [创建私有网络](create-virtual-machine-instance-in-vpc#user-content-1)
- [创建子网](create-virtual-machine-instance-in-vpc#user-content-2)
- [在子网中部署云主机](create-virtual-machine-instance-in-vpc#user-content-3)
- [创建弹性公网IP](create-virtual-machine-instance-in-vpc#user-content-4)
- [绑定公网IP](create-virtual-machine-instance-in-vpc#user-content-5)

```
以下步骤中选择地域操作，均可先在列表页选择后进入创建页面。亦可进入创建页后重新选择。
```

####  创建私有网络

<div id="user-content-1"> </div>

步骤1：登录京东云控制台，进入控制台导航页面；

步骤2：在控制台左侧导航栏，选择网络-私有网络，进入私有网络列表页；

步骤3：点击【创建】，出现创建弹窗，选择需要部署资源的地域，

```

地域一旦确定后，就确定了后续其他资源的部署地域，不可更改，请根据实际业务选择地域。
```
步骤4：填充相关信息，选择私有网络CIDR，京东云支持的网段如下：
  - 10.0.0.0/16~10.255.0.0/28
  - 172.16.0.0/16~172.32.0.0/28
  - 192.168.0.0/16~192.168.0.0/28
```

如业务需支持IPv6，请提交工单申请相应的权限。
```
步骤5：确认信息后，点击【确定】完成创建VPC。


#### 创建子网

<div id="user-content-2"> </div>

步骤1：登录京东云控制台，进入控制台导航页面；

步骤2：在控制台左侧导航栏，选择网络-私有网络-【子网】，进入子网列表页；

步骤3：点击【创建】，弹出子网创建弹窗，在私有网络选项中选择上述创建的私有网络；

```
如需选择上述创建的私有网络，须选择该私有网络所在的地域。
```
步骤4：补充子网名称，选择子网CIDR，选择路由表；

```
如有特殊需求可选择先关联默认路由表，完成子网创建，然后创建新的路由表，将子网与自定义的路由表关联，如须访问公网，自定义路由表须配置访问Internet的路由策略。
```
步骤5：确认信息后，点击【确定】完成创建子网。



#### 在子网中部署云主机

<div id="user-content-3"> </div>

步骤1：登录京东云控制台，进入控制台导航页面；

步骤2：在控制台左侧导航栏，选择弹性计算-【云主机】，默认进入云主机实例列表页；

步骤3：选择上述子网或私有网络的地域，点击【创建】，进入云主机创建页面。

步骤4：选择创建方式、镜像、规格、硬盘等，更多请参考[创建云主机实例](https://docs.jdcloud.com/cn/virtual-machines/create-instance)；

步骤5：找到网络模块，选择上述创建的私有网络和子网，将本次创建的云主机部署在该私有网络的子网下；

步骤6：选择安全组，可选择默认安全组，京东云支持三组默认安全组，请根据业务需求选择安全组，如自定义安全组，默认拒绝所有访问，需[配置安全组规则](https://docs.jdcloud.com/cn/virtual-private-cloud/security-group-configuration)；

步骤6：完成相关信息编辑后，点击【立即购买】进入订单确定页，完成支付即完成云主机创建。

#### 创建弹性公网IP

<div id="user-content-4"> </div>

```
如已有公网IP，且公网IP处于未绑定状态，可直接进入绑定云主机环节。
```

步骤1：登录京东云控制台，进入控制台导航页面；

步骤2：在控制台左侧导航栏，选择网络-私有网络-【弹性公网IP】，进入弹性公网IP列表页；

步骤3：定位上述云主机所在地域，选择对应的地域，点击【申请】，进入公网IP申请页面；

步骤4：选择公网IP计费模式，支持包年包月、按配置、按用量计费三种类型，然后定义公网IP带宽上限，1~200Mbps，具体计费信息可参考[公网IP计费规则](https://docs.jdcloud.com/cn/elastic-ip/billing-rules)；
步骤5：点击【立即购买】，进入订单确定页，完成支付即完成云主机创建。

#### 绑定云主机

<div id="user-content-5"> </div>

```
IP绑定云主机，可从IP侧绑定云资源，也可以从云主机列表页绑定公网IP，实现云主机与公网IP绑定。
```

步骤1：登录京东云控制台，进入控制台导航页面；

步骤2：在控制台左侧导航栏，选择网络-私有网络-【弹性公网IP】，进入弹性公网IP列表页；

步骤3：定位上述申请的弹性公网IP，在操作列点击【绑定资源】

步骤4：选择云主机，选中上述创建的云主机资源，点击【确定】完成绑定操作。

完成上述步骤，即可在私有网络中完成部署云主机，可进入网络测试环节，如使用云主机绑定的公网IP ping https://www.jdcloud.com/ ，如能成功ping通，则表示环境初步搭建完成，如未能ping通，请检查安全组规则和路由策略。



## 相关参考
- [配置VPC](../Operation-Guide/VPC-Configuration.md)
- [配置子网](../Operation-Guide/Subnet-Configuration.md)
- [创建云主机实例](https://docs.jdcloud.com/cn/virtual-machines/create-instance)
- [弹性公网IP](https://docs.jdcloud.com/cn/elastic-ip/product-overview)
- [云主机使用公网IP](../../Elastic-IP/Getting-Started/Elastic-IP-with-VM/Associate-Elastic-IP-to-VM.md)
- [配置安全组](../Operation-Guide/Security-Group-Configuration.md)
- [配置路由表](../Operation-Guide/Route-Table-Configuration.md)
- [创建负载均衡](https://docs.jdcloud.com/cn/application-load-balancer/create-instance)

