## 配置分布式云物理服务器

- 计费模式

提供**包年包月**和**按配置**两种计费模式，请参考[计费规则](../Pricing/Billing-Rules.md)。

- 节点与运营商

当前提供**华东-台州（电信1）**边缘节点，更多节点还在筹备中。选择最靠近您的节点，可降低访问延时、提高下载速度。

- 规格

提供**计算、存储**两类实例规格，您可根据不同的业务场景选择最优配置，参考[产品规格](../Introduction/Specifications.md)。

- 镜像

目前支持**标准镜像**镜像类型。镜像类型支持CentOS6.6、7.1、7.2和7.5，Ubuntu14.04、16.04和18.04。详细情况参见[镜像使用说明](../Operation-Guide/Image/Description-Image.md)。

- 存储

选取系统盘和数据盘的RAID模式。某些机型的系统盘或数据盘RAID模式是固定的，请根据实际情况做选择，详情参见[产品规格](../Introduction/Specifications.md)。）

- 网络数量与名称

支持单网口和双网口两种模式。若选择单网口(指逻辑网口接口)，默认显示主网口（bond0）；若选择双网口，默认显示主网口（eth0）和辅网口（eth1）。

- 网口与带宽设置

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **内部网络** ：用户只有第一次配置网络的时候可以选择内网CIDR地址段。后续创建的分布式云物理服务器将使用第一次配置的内网CIDR地址段。

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **防火墙** ：操作系统安装完成后，系统对外网网络只开放IN方向的22端口。操作系统安装成功后，用户可自行登录操作系统更改iptable设置。详情请参考[防火墙设置操作指南](../Operation-Guide/Network-And-Security/Steps-Network-And-Security.md)。

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **公网带宽** ：

弹性公网IP可以绑定分布式云物理服务器。

用户可以在创建分布式云物理服务器时选择购买或不购买弹性公网IP。购买时勾选弹性公网IP，则由系统自动分配，用户不可修改弹性公网IP。

用户可选择范围从1M最高至10240Mbps的公网带宽速率（10240Mbps为可提供的带宽最大值，根据不同节点该带宽值可能会不同，请根据实际节点合理选择），并可在创建后执行“修改带宽”操作。
具体操作步骤参见[修改公网带宽](../Operation-Guide/Adjust-Public-Network-Bandwidth/Description-Adjust-Public-Network-Bandwidth.md)章节。

- 配置服务器基本信息：
配置服务器名称、描述、操作系统密码。

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **实例名称** ：实例名称是指分布式云物理服务器的别名，用户可以自定义设置，设置完成后可以通过分布式云物理服务器列表中使用别名来筛选。一次购买多台分布式云物理服务器的情况下，默认在设置名称后面加上数字，以递增的形式来标志多台分布式云物理服务器。

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **主机名** ：主机名是指分布式云物理服务器操作系统内部的计算机名，用户可以自定义设置，分布式云物理服务器成功生产后可以通过登录分布式云物理服务器内部查看。一次购买多台分布式云物理服务器的情况下，默认在设置名称后面加上数字，以递增的形式来标志多台分布式云物理服务器。

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 主机名为可选项，如果不输入主机名，则默认使用“host-内网IPv4地址第三段-内网IPv4地址第四段”为主机名。

![配置服务器](https://github.com/jdcloudcom/cn/blob/cn-distributed-cloud-physical-service/documentation/Hyper-Converged-IDC/Distributed-Cloud-Physical-Server/Image/DCPS-030.png)


- 配置购买时长：
购买时长1-9个月、1、2、3年。

![配置购买时长](https://github.com/jdcloudcom/cn/blob/cn-distributed-cloud-physical-service/documentation/Hyper-Converged-IDC/Distributed-Cloud-Physical-Server/Image/DCPS-031.png)

- 点击“立即购买”按钮，跳转到订单确认页

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;按照京东云统一的订单计费流程支付成功后，跳转回控制台列表页面。
