# IPv6

#### 创建IPv6私有网络

京东智联云支持IPv4/IPv6双栈私有网络（目前IPv6处于内测中，如需使用，请提交工单，申请内测）

**步骤1：**进入[京东智联云官方网站](https://www.jdcloud.com/)；

**步骤2：**点击网页右上角的控制台，登录京东智联云控制台，进入控制台导航页面；

**步骤3：**点击云服务，选择私有网络，进入私有网络列表页面

**步骤4：**点击创建，进入创建弹窗页

**步骤5：**填写相关信息，【IPv6 CIDR】字段，选择“京东智联云提供的IPv6 CIDR”，点击确定

**步骤6：**完成上述步骤即可完成创建IPv4/IPv6双栈私有网络



#### 创建IPv6子网

私有网络中的IPv6云资源需要部署在IPv6子网中，子网是在私有网络VPC下创建的，因此需要在IPv6 VPC下创建IPv6子网。由于京东智联云目前支持IPv4/IPv6双栈私有网络，因此支持创建双栈子网、IPv4单栈子网

**步骤1：**进入[京东智联云官方网站](https://www.jdcloud.com/)；

**步骤2：**点击网页右上角的控制台，登录京东智联云控制台，进入控制台导航页面；

**步骤3：**点击云服务，选择菜单中的私有网络，进入私有网络列表页面

**步骤4：**点击子网，进入子网产品列表页，点击创建，进入创建弹窗页

**步骤5：**填写相关信息，【私有网络】字段选择IPv6类型的VPC，勾选【IPv6 CIDR】（若不勾选即创建IPv4单栈子网），指定IPv6 CIDR范围

**步骤6：**【路由表】字段选择“默认路由”，点击确定按钮

完成上述步骤即可完成创建双栈子网



#### 创建IPv6云主机

若在双栈子网中部署的云主机，该云主机可同时支持IPv4和IPv6，在单栈子网中部署的云主机仅支持IPv4

**步骤1：**进入[京东智联云官方网站](https://www.jdcloud.com/)；

**步骤2：**点击网页右上角的控制台，登录京东智联云控制台，进入控制台导航页面；

**步骤3：**点击云服务，选择菜单中的云主机，进入云主机产品列表页

**步骤4：**点击创建，进入创建页面

**步骤5：**选择填入相关信息，在网络模块，选择IPv6类型的私有网络，选择IPv4/IPv6双栈子网，勾选“自动分配IPv6地址”

**步骤6：**在登录信息模块，设置访问该云主机的密码，点击立即购买按钮，完成支付

完成上述步骤即可完成创建IPv6云主机



### 配置IPv6安全组规则

您可根据实际使用场景配置IPv6安全组规则，在云主机已有的安全组中配置安全组出入站规则或新建安全组配置完成后绑定相应的云主机均可实现配置IPv6安全组规则。

配置入站规则请参考[配置安全组入站规则](https://docs.jdcloud.com/cn/virtual-machines/configurate-inbound-rules)配置IPv6类型的安全组入站规则，源IP填入IPv6地址。若要使用IPv6特有的协议，如ICMPv6，请选择相应的类型。

配置出站规则请参考[配置安全组出站规则](https://docs.jdcloud.com/cn/virtual-machines/configurate-outbound-rules)配置IPv6类型的安全组出站规则，目的IP填入IPv6地址。若要使用IPv6特有的协议，如ICMPv6，请选择相应的类型。



### 配置IPv6 ACL规则

您可根据实际使用场景配置IPv6 ACL规则，具体请参考[网络ACL配置](https://docs.jdcloud.com/cn/virtual-private-cloud/network-acl-configuration)

**步骤1：**在创建ACL时选择支持IPv6 VPC，创建完成后配置ACL规则

**步骤2：**进入ACL的详情页，点击【关联子网】关联IPv6子网

**步骤3：**分别选择ACL出入站规则，点击【编辑规则】进行配置IPv6相关的出站规则

完成上述步骤即可完成配置IPv6 ACL规则



### 配置IPv6路由

您可根据实际应用场景配置IPv6相关的路由策略，具体操作步骤可参考[路由表配置](https://docs.jdcloud.com/cn/virtual-private-cloud/route-table-configuration)，配置IPv6路由需注意以下几点

1. 创建时，私有网络需选择支持IPv4/IPv6私有网络
2. 创建完成后，需关联子网，选择支持IPv6的子网
3. 进入路由表详情页，选择路由策略，配置IPv6路由策略，目的端填写IPv6地址





## 最佳实践

### IPv4私有网络业务迁移至IPv4/IPv6双栈网络

本教程将介绍如何将已有的IPv4私有网络（本例简称“IPv4 VPC”）业务迁移至IPv4/IPv6双栈网络（简称“IPv4/IPv6 VPC”）中，使得服务能够被IPv4用户和IPv6用户同时访问。

### ![image-20200918173639117](C:\Users\zhengyu164\AppData\Roaming\Typora\typora-user-images\image-20200918173639117.png)前提条件

- 首先您需要有京东智联云的账号，并完成实名认证，若您目前没有账号，请先[注册](https://user.jdcloud.com/register?source=jdcloud&ReturnUrl=https%3A%2F%2Fwww.jdcloud.com)。
- 已有IPv4私有网络部署环境

#### 操作步骤

#### 搭建IPv4/IPv6 VPC

目标创建一个IPv4/IPv6 VPC，包含两个子网，一个负载均衡及多个云主机

<img src="C:\Users\zhengyu164\AppData\Roaming\Typora\typora-user-images\image-20200918173432173.png" alt="image-20200918173432173" style="zoom:70%;" />

**步骤1：**进入[京东智联云官方网站](https://www.jdcloud.com/)；点击网页右上角的控制台，选择私有网络，创建IPv6  VPC，具体操作请参考[VPC配置](https://docs.jdcloud.com/cn/virtual-private-cloud/vpc-configuration)，填写相关信息，【IPv6 CIDR】字段，选择“京东智联云提供的IPv6 CIDR”

**步骤2：**选择子网，在已创建的VPC中分别创建两个支持IPv6的子网1和子网2，具体操作请参考[子网配置](https://docs.jdcloud.com/cn/virtual-private-cloud/subnet-configuration)，【私有网络】字段选择IPv6类型的VPC，勾选【IPv6 CIDR】（若不勾选即创建IPv4单栈子网），指定IPv6 CIDR范围

**步骤3：**在步骤2的一个子网中创建支持IPv6的云主机，在网络配置中选择上述步骤中创建的IPv6私有网络和子网，勾选“自动分配IPv6地址”，其余配置信息可与已有IPv4私有网络中的云主机一致，点击立即购买支付完成即创建成功

**步骤4：**在步骤2创建的另外一个子网中创建支持IPv6的负载均衡，类型与已有IPv4私有网络中的负载均衡类型一致，本例为应用型负载均衡，网络配置中选择上述步骤中创建的IPv6私有网络和子网，勾选“自动分配IPv6地址”，点击立即购买支付完成即创建成功



#### 通过VPC peering连接IPv4 VPC和IPv4/IPv6 VPC

目标：通过VPC peering连接IPv4 VPC和IPv4/IPv6 VPC，使得两个VPC通过内网IP通信。

![image-20200918173740191](C:\Users\zhengyu164\AppData\Roaming\Typora\typora-user-images\image-20200918173740191.png)

**步骤1：**分别以上述两个VPC中的一个VPC作为本端VPC，另外一个VPC的ID作为对端VPC ID创建VPC对等连接，具体操作请参考[创建VPC对等连接](https://docs.jdcloud.com/cn/virtual-private-cloud/vpc-peering-configuration)

**步骤2：**分别配置在IPv4 VPC和IPv4/IPv6 VPC中的路由策略，下一跳类型选择VPC对等连接，下一跳分别选择步骤1中创建的VPC对等连接

**步骤3：**配置完路由表需将路由表绑定至需要互通的子网，并在对端私有网络中需使用同样的步骤创建、配置并绑定路由表。配置完成后两端VPC即可通过内网IP建立连接。

#### 配置负载均衡

目标：将IPv4 VPC中的云主机挂载到IPv4/IPv6 VPC的负载均衡上

![image-20200918173951575](C:\Users\zhengyu164\AppData\Roaming\Typora\typora-user-images\image-20200918173951575.png)

**步骤1：**进入已创建IPv4/IPv6 VPC中负载均衡的详情页，首先选择配置虚拟服务器组，点击新建虚拟服务器组，其中一个类型选择IP，点击注册IP，输入IPv4 VPC中需要支持IPv6地址的云主机的内网IP地址，虚拟服务器组创建完成后进入下一步

**步骤2：**配置监听器，选择监听协议及端口，若选择HTTPS/TLS协议，选择已有证书或新建证书，配置后点击下一步进入后端转发配置，配置相关内容，点击下一步进入健康检查，配置相关内容，点击下一步进入添加服务器组，选择“虚拟服务器组/IP类型”，选择相应的IP类型的服务器组

**步骤3：**进入后端服务，确认创建的后端服务中的健康检查的状态为正常，若状态正常，则进入测试

**步骤4：**访问IPv4/IPv6 VPC中的负载均衡的IPv6地址，若能够访问服务，则表示云主机挂载成功

**步骤5：**将IPv4 VPC中负载均衡的公网IP绑定到IPv4/IPv6中的负载均衡上

![image-20200918174348372](C:\Users\zhengyu164\AppData\Roaming\Typora\typora-user-images\image-20200918174348372.png)

完成上述步骤即可完成在原有只支持IPv4de 业务上升级支持IPv4/IPv6，可对IPv4私有网络中的负载均衡资源进行释放，避免产生不必要的费用。

若需要将业务完全迁移至双栈网络中，请进行以下操作：

**步骤1：**在上面创建的双栈私有网络中创建一个新的子网[创建子网]()；

**步骤2：**在子网中部署多个支持IPv4/IPv6云主机[创建云主机]()

**步骤3：**将上一步中创建的云主机内网IP地址加入上述负载均衡的虚拟服务器组中，新加入的云主机权重均设为0,

![image-20200921103208640](C:\Users\zhengyu164\AppData\Roaming\Typora\typora-user-images\image-20200921103208640.png)

**步骤4：**待到负载均衡的健康检查为正常时，再将权重调整为非0，然后将IPv4 VPC中的云主机权重调为0，

**步骤5：**待IPv4私有网络中云主机的访问量几乎为0时，可将这部分云主机释放。

完成上述步骤即可完成将IPv4私有网络中的服务平滑迁移至双栈私有网络中

注：IPv4私有网络中可能存在其他云资源，若要释放IPv4 VPC请确认所有云资源已迁移。

<img src="C:\Users\zhengyu164\AppData\Roaming\Typora\typora-user-images\image-20200917174554500.png" alt="image-20200917174554500" style="zoom: 50%;" />



## 搭建IPv4/IPv6私有网络

### 简介

京东智联云私有网络提供创建同时支持ipv4地址和ipv6地址的私有网络（目前IPv6处于内测中，如需使用，请提交工单，申请内测），两种类型的地址均可通过内网/公网进行访问。下面将介绍如何搭建IPv4/IPv6 私有网络

### 应用场景

- 业务需要支持IPv6

### 前提条件

首先您需要有京东智联云的账号，并完成实名认证，若您目前没有账号，请先[注册](https://user.jdcloud.com/register?source=jdcloud&ReturnUrl=https%3A%2F%2Fwww.jdcloud.com)。

### 操作步骤

本教程将介绍，在京东智联云上部署同时支持IPv6和IPv4云主机的私有网络。首先在创建云主机之前，需创建支持IPv6的私有网络、子网。

​		注：创建的资源如私有网络、子网、路由表、网络ACL、安全组等需在同一地域下进行

**步骤1：**进入京东智联云控制台，选择私有网络，创建支持Ipv6的私有网络，具体操作参考[创建IPv6私有网络]()

**步骤2：**在步骤1中创建的私有网络下创建路由表，根据需求在路由表详情页进行配置路由策略（也可后续根据业务再配置），具体操作请参考[路由表配置](https://docs.jdcloud.com/cn/virtual-private-cloud/route-table-configuration)

**步骤3：**在步骤1中创建的私有网络下创建支持IPv6的子网，选择步骤2中创建的路由表，具体操作请参考[创建IPv6子网]()

**步骤4：**在步骤1中创建的私有网络下创建网络ACL，关联步骤3中创建的子网，配置ACL出入站规则，具体规则可根据后续业务需求进行修改。具体操作请参考[网络ACL配置](https://docs.jdcloud.com/cn/virtual-private-cloud/network-acl-configuration)

**步骤5：**在步骤1中创建的私有网络下创建安全组，配置安全组出入站规则，具体规则可根据后续业务需求进行修改。具体操作请参考[配置安全组](https://docs.jdcloud.com/cn/virtual-private-cloud/security-group-configuration)

**步骤6：**在步骤2中创建的子网下创建IPv6云主机，设置云主机登录密码，绑定步骤5中创建的安全组。具体操作请参考[创建IPv6云主机]()

完成上述步骤即完成搭建IPv6私有网络，下面进行测试网络的连通性。

#### 测试网络连通性

使用xshell软件进行测试，登录IPv6云主机，ping一个IPv6服务进行测试

**步骤1：**通过xshell登录IPv6云主机，打开xshell，新建会话，输入云主机名称，主机字段输入云主机IPv6地址

**步骤2：**输入云主机的登录用户名及密码，登录成功后，进行测试

**步骤3：**输入ping -6 [其他ipv6地址]，出现下图结果则连通成功

![image-20200908203808838](C:\Users\zhengyu164\AppData\Roaming\Typora\typora-user-images\image-20200908203808838.png)

