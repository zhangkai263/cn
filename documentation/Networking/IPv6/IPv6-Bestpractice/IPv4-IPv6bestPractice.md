### IPv4私有网络业务迁移至IPv4/IPv6双栈网络

本教程将介绍如何将已有的IPv4私有网络（本例简称“IPv4 VPC”）业务迁移至IPv4/IPv6双栈网络（简称“IPv4/IPv6 VPC”）中，使得服务能够被IPv4用户和IPv6用户同时访问。

 ![dd](../../../../image/Networking/ipv6/image-20200918173639117.png)
 

### 前提条件

- 首先您需要有京东智联云的账号，并完成实名认证，若您目前没有账号，请先[注册](https://user.jdcloud.com/register?source=jdcloud&ReturnUrl=https%3A%2F%2Fwww.jdcloud.com)。
- 已有IPv4私有网络部署环境

#### 操作步骤

#### 搭建IPv4/IPv6双栈VPC

目标创建一个IPv4/IPv6 VPC，包含一个子网，一个负载均衡


 ![dd](../../../../image/Networking/ipv6/v6-vpc.png)

 **步骤1：** 进入[京东智联云官方网站](https://www.jdcloud.com/)；点击网页右上角的控制台，选择私有网络，创建IPv6  VPC，具体操作请参考[VPC配置](https://docs.jdcloud.com/cn/virtual-private-cloud/vpc-configuration)，填写相关信息，【IPv6 CIDR】字段，选择“京东智联云提供的IPv6 CIDR”

**步骤2：** 选择子网，在已创建的VPC中分别创建两个支持IPv6的子网1和子网2，具体操作请参考[子网配置](https://docs.jdcloud.com/cn/virtual-private-cloud/subnet-configuration)，【私有网络】字段选择IPv6类型的VPC，勾选【IPv6 CIDR】（若不勾选即创建IPv4单栈子网），指定IPv6 CIDR范围

**步骤3：** 在步骤2的一个子网中创建支持IPv6的云主机，在网络配置中选择上述步骤中创建的IPv6私有网络和子网，勾选“自动分配IPv6地址”，其余配置信息可与已有IPv4私有网络中的云主机一致，点击立即购买支付完成即创建成功

**步骤4：** 在步骤2创建的另外一个子网中创建支持IPv6的负载均衡，类型与已有IPv4私有网络中的负载均衡类型一致，本例为应用型负载均衡，网络配置中选择上述步骤中创建的IPv6私有网络和子网，勾选“自动分配IPv6地址”，点击立即购买支付完成即创建成功



#### 通过VPC peering连接IPv4 VPC和IPv4/IPv6 VPC

目标：通过VPC peering连接IPv4 VPC和IPv4/IPv6 VPC，使得两个VPC通过内网IP地址进行通信。
 ![dd](../../../../image/Networking/ipv6/vpc-peering.png)


**步骤1：** 分别以上述两个VPC中的一个VPC作为本端VPC，另外一个VPC的ID作为对端VPC ID创建VPC对等连接，具体操作请参考[创建VPC对等连接](https://docs.jdcloud.com/cn/virtual-private-cloud/vpc-peering-configuration)

**步骤2：** 分别配置在IPv4 VPC和IPv4/IPv6 VPC中的路由策略，下一跳类型选择VPC对等连接，下一跳分别选择步骤1中创建的VPC对等连接

**步骤3：** 配置完路由表需将路由表绑定至需要互通的子网，并在对端私有网络中需使用同样的步骤创建、配置并绑定路由表。配置完成后两端VPC即可通过内网IP建立连接。

#### 配置负载均衡

目标：将IPv4 VPC中的云主机挂载到IPv4/IPv6 VPC的负载均衡上

 ![dd](../../../../image/Networking/ipv6/配置负载均衡.png)

**步骤1：** 进入已创建IPv4/IPv6 VPC中负载均衡的详情页，首先选择配置虚拟服务器组，点击新建虚拟服务器组，其中一个类型选择IP，点击注册IP，输入IPv4 VPC中需要支持IPv6地址的云主机的内网IP地址，虚拟服务器组创建完成后进入下一步

**步骤2：** 配置监听器，选择监听协议及端口，若选择HTTPS/TLS协议，选择已有证书或新建证书，配置后点击下一步进入后端转发配置，配置相关内容，点击下一步进入健康检查，配置相关内容，点击下一步进入添加服务器组，选择“虚拟服务器组/IP类型”，选择相应的IP类型的服务器组

**步骤3：** 进入后端服务，确认创建的后端服务中的健康检查的状态为正常，若状态正常，则进入测试

**步骤4：** 访问IPv4/IPv6 VPC中的负载均衡的IPv6地址，若能够访问服务，则表示云主机挂载成功

**步骤5：** 将IPv4 VPC中负载均衡的公网IP绑定到IPv4/IPv6中的负载均衡上

 ![dd](../../../../image/Networking/ipv6/del-v4LB.png)

完成上述步骤即可完成在原有只支持IPv4de 业务上升级支持IPv4/IPv6，可对IPv4私有网络中的负载均衡资源进行释放，避免产生不必要的费用。

若需要将业务完全迁移至双栈网络中，请进行以下操作：

**步骤1：** 在上面创建的双栈私有网络中创建一个新的子网[创建子网]()；

**步骤2：** 在子网中部署多个支持IPv4/IPv6云主机[创建云主机]()

**步骤3：** 将上一步中创建的云主机内网IP地址加入上述负载均衡的虚拟服务器组中，新加入的云主机权重均设为0,

 ![dd](../../../../image/Networking/ipv6/v6-vm.png)

**步骤4：** 待到负载均衡的健康检查为正常时，再将权重调整为非0，然后将IPv4 VPC中的云主机权重调为0，

**步骤5：** 待IPv4私有网络中云主机的访问量几乎为0时，可将这部分云主机释放。

完成上述步骤即可完成将IPv4私有网络中的服务平滑迁移至双栈私有网络中

注：IPv4私有网络中可能存在其他云资源，若要释放IPv4 VPC请确认所有云资源已迁移。

 ![dd](../../../../image/Networking/ipv6/finished.png)
