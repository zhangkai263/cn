## 确定配置项

- 计费模式

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 提供 **包年包月** 和 **按配置** 两种计费模式，详见[计费规则](../Pricing/Billing-Rules.md)。

- 地域与可用区

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 当前提供 **华北-北京** 地域，更多地域还在筹备中。

- 规格

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 提供 **计算**、**存储** 、**GPU** 三类实例规格，您可根据不同的业务场景选择最优配置，参考[产品规格](../Introduction/Specifications.md)。

- 镜像

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;例如，现阶段支持“标准镜像类型。

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;目前支持 **标准镜像**。镜像类型包括 CentOS6.6、7.1、7.2、7.5，Ubuntu14.04、16.04、18.04和Windows Server 2016标准版64位中文版。详细情况参见[镜像使用说明](../Operation-Guide/Image/Description-Image.md)。

- 存储

选取系统盘和数据盘的RAID模式。

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 选取 **系统盘** 和 **数据盘** 的RAID模式。某些机型的系统盘或数据盘RAID模式是固定的，请根据实际情况做选择，详情参见[产品规格](../Introduction/Specifications.md)。）

#### 基础网络实例

- 网络

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **内部网络** ：基础网络模式下，用户只有第一次配置网络的时候可以选择内网CIDR地址段。后续创建的云物理服务器将使用第一次配置的内网CIDR地址段。

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **防火墙** ：操作系统安装完成后，系统对外网网络只开放IN方向的22端口。操作系统安装成功后，用户可自行登录操作系统更改iptable设置。详情请参考[防火墙设置操作指南](../Operation-Guide/Network-And-Security/Steps-Network-And-Security.md)。

- 带宽

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **公网IP**：用户可以在创建云物理服务器时选择购买或不购买公网IP。选择购买基础网络实例时，公网IP和云物理服务器是绑定的。公网IP由系统自动分配，用户不可修改公网IP,**但是云物理服务器创建后不可添加公网IP**。（选择购买私有网络实例时，若不够买公网IP，可以待实例创建成功后绑定公网IP。）

用户可选择1-200Mbps的公网带宽速率，并可在创建后做升配操作。
具体操作步骤参见[调整公网带宽](../../Operation-Guide/Instance/Description-Adjust-Public-Network-Bandwidth.md)。

#### 私有网络实例

- 配置服务器基本信息：
配置服务器名称、描述、操作系统密码。

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **实例名称** ：实例名称是指云物理服务器的别名，用户可以自定义设置，设置完成后可以通过云物理服务器列表中使用别名来筛选。一次购买多台云物理服务器的情况下，默认在设置名称后面加上数字，以递增的形式来标志多台云物理服务器。

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **主机名** ：主机名是指云物理服务器操作系统内部的计算机名，用户可以自定义设置，云物理服务器成功生产后可以通过登录云物理服务器内部查看。一次购买多台云物理服务器的情况下，默认在设置名称后面加上数字，以递增的形式来标志多台云物理服务器。

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 主机名为可选项，如果不输入主机名，则默认使用“host-内网IPv4地址第三段-内网IPv4地址第四段”为主机名。


![配置服务器](../Image/CPS-create-basicinfo.png)



- 配置购买时长：
购买时长1-9个月、1、2、3年。

![配置购买时长](https://github.com/jdcloudcom/cn/blob/edit/image/Hyper-Converged-IDC/Cloud-Physical-Server/cn-Create-8Quantity.png)

- 点击**立即购买**按钮，跳转到订单确认页

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;按照京东云统一的订单计费流程支付成功后，跳转回控制台列表页面。
