# 边界网关连通私有网络

### 业务场景

在一个地域内，当超过3个以上的VPC之间需要两两互通时，通过VPC对等连接配置操作步骤繁琐，就可以通过多个VPC都与同一个边界网关互联、简化配置。不过通过边界网关互联的VPC互通，网络延迟会比VPC对等连接要高。

本配置指导主要利用VPC路由表和边界网关路由表的静态路由配置为例，动态传播路由方式请参考专线服务的相关具体文档。
本文档以华北地区两个VPC有通过内网IP的通信需求为例，提供配置指导。

### 前提条件及限制 

- 确保您已经[注册京东云账号](https://user.jdcloud.com/register?returnUrl=https%3A%2F%2Fwww.jdcloud.com%2F)，并实现[实名认证](https://realname.jdcloud.com/account/verify)；

- 确保您已经创建了两个VPC，且在各个VPC中分别已部署完一台云主机，如未创建相关资源请参考[私有网络中创建主机实例](https://docs.jdcloud.com/cn/virtual-private-cloud/create-virtual-machine-instance-in-vpc)。

### 操作步骤

- [创建边界网关](border-gateway-connects-vpc#user-content-1)
- [为需要连通的VPC配置BGW路由策略](border-gateway-connects-vpc#user-content-2)
- [为需要连通的私有网络创建路由表](border-gateway-connects-vpc#user-content-3)

#### 创建边界网关

<div id="user-content-1"> </div>

步骤1：登录京东云控制台，进入控制台导航页面；

步骤2：在控制台左侧导航栏，选择网络-混合云连接-边界网关，然后在专线服务菜单中点击边界网关，进入边界网关列表页。

步骤3：在边界网关列表页点击创建，打开创建边界网关创建窗口。

![](/image/Networking/Virtual-Private-Cloud/Getting-Started/Border-Gateway-Connects-VPC/Step2-1.png)

3) 在边界网关创建窗口中配置网关名称，点击确定完成创建，列表页显示新创建的边界网关信息。配置信息如下

- 地域选择华北
- 名称填写BGWA-B 

![](/image/Networking/Virtual-Private-Cloud/Getting-Started/Border-Gateway-Connects-VPC/Step2-2.png)

#### 为需要连通的VPC配置BGW路由策略

<div id="user-content-2"> </div>

步骤1：在边界网关列表页点击“编辑路由策略”前往编辑路由信息

- 配置下一跳指向VPCforBGWA的路由
- 配置下一跳指向VPCforBGWB的路由

![](/image/Networking/Virtual-Private-Cloud/Getting-Started/Border-Gateway-Connects-VPC/Step3-1.png)

#### 为需要连通的私有网络创建路由表

<div id="user-content-3"> </div>

步骤1：登录控制台，在产品菜单的网络栏目中点击私有网络，然后在私有网络菜单中点击路由表，进入路由表列表页。

步骤2：在路由表列表页点击创建，打开路由表创建弹窗。

步骤3：在路由表创建弹窗中配置路由表基本信息，点击确定完成创建。弹窗“显示创建路由表后需要配置路由策略，并关联子网才能生效。是否去配置？”，选择立即配置进入路由表详情页。

路由表配置信息如下：

- 地域选择华北
- 私有网络选择VPCforBGWA
- 名称填写RTBforBGWAtoB

![](/image/Networking/Virtual-Private-Cloud/Getting-Started/Border-Gateway-Connects-VPC/Step4-1.png) 

步骤4：在路由表详情页中，点击路由策略tab，然后点击编辑，开启路由编辑模式，点击新增一条开始编辑新的路由条目。

步骤5：在路由条目中填入相关配置，点击保存完成路由表编辑。详细配置如下：

- 目的端填写192.168.0.0/16
- 下一跳类型选择边界网关
- 下一跳选择BGWA-B
- 如果需要公网访问，还需要添加0.0.0.0/0到internet的路由规则。

![](/image/Networking/Virtual-Private-Cloud/Getting-Started/Border-Gateway-Connects-VPC/Step4-2.png)

步骤6：配置完路由表需将路由表绑定至需要互通的子网。

![](/image/Networking/Virtual-Private-Cloud/Getting-Started/Border-Gateway-Connects-VPC/Step4-3.png) 

步骤7：在第二个VPC中使用同样的步骤创建并配置路由表RTBforBGWBtoA。

配置完成后两端VPC即可通过内网IP建立连接。同理，可以通过边界网关连通同地域下多个私有网络(支持VPC Hub功能)。

## 相关参考

