## 确定配置项

- 计费模式

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 提供 **包年包月** 和 **按配置** 两种计费模式，详见[计费规则](../Pricing/Billing-Rules.md)。

- 节点与运营商

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 当前提供 **华东-台州（电信1）** 边缘节点，更多节点还在筹备中。选择最靠近您的节点，可降低访问延时、提高下载速度。

- 规格

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 提供 **计算**、**存储** 两类实例规格，您可根据不同的业务场景选择最优配置，详见[产品规格](../Introduction/Specifications.md)。

- 镜像

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 目前支持 **标准镜像** 。镜像类型包括CentOS6.6、7.1、7.2和7.5，Ubuntu14.04、16.04和18.04。详见[镜像使用说明](../Operation-Guide/Image/Description-Image.md)。

- 存储

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 选取 **系统盘** 和 **数据盘** 的RAID模式。某些机型的系统盘或数据盘RAID模式是固定的，请根据实际情况做选择，详见[产品规格](../Introduction/Specifications.md)。

- 网口数量与名称

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 支持 **单网口** 和 **双网口** 模式。单网口对应主网口（bond0）；双网口对应主网口（eth0）和辅网口（eth1）。<br/>

- 网口与带宽设置

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **主网口** 信息：<br/>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 私有网络与子网：用户需要先行规划并创建私有网络和子网。<br/>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 内部IP ：为用户指定主网口的内网IP地址，可在所选子网可用IP地址内任意指定，也可以选择由系统自动分配。内网IP一旦分配至分布式云物理服务器将不可更改。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 别名IP范围 ：如果您有多项服务在一台分布式云物理服务器上运行，并且希望为每项服务分配一个不同的 IP 地址，可以使用别名IP范围功能实现。单实例主网口最多可添加50个，详见[别名IP范围](../Operation-Guide/Networking/Alias-IP.md)。 <br/>       

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 公网带宽 ：如果实例要访问公网网络，可以在创建实例时勾选为其绑定弹性公网IP（由系统自动分配，不支持用户修改），也可以在实例创建后另行购买，支持与实例绑定、解绑。（创建后为主网口的弹性公网IP）</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 带宽计费模式 ：支持按固定带宽-包年包月、按固定带宽-按配置、加入共享带宽3种计费方式。（注意：按配置计费实例不支持与按固定带宽-包年包月弹性公网IP关联购买）。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 线路 ：目前边缘节点支持单线，目前已上线节点支持电信。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 带宽 ：用户可选择带宽范围为1Mbps到10000Mbps的公网带宽速率，根据不同节点该带宽最大值可能会不同，请根据实际节点合理选择。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 额外上行带宽 ：用户可选择额外上行带宽范围为0Mbps到10000Mbps的公网带宽速率，根据不同节点该带宽最大值可能会不同，请根据实际节点合理选择。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;按固定带宽计费的EIP会根据您设定的“带宽”、“额外上行带宽”上限进行收费和限速，您可以根据业务需求随时调整带宽上限。

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **辅网口** 信息：</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 私有网络与子网 ：用户需要先行规划并创建私有网络和子网。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 内部IP ：为用户指定辅网口的内网IP地址，可在所选子网可用IP地址内任意指定，也可以选择由系统自动分配。内网IP一旦分配至分布式云物理服务器将不可更改。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 别名IP范围 ：如果您有多项服务在一台分布式云物理服务器上运行，并且希望为每项服务分配一个不同的 IP 地址，可以使用别名IP范围功能实现。单实例辅网口最多可添加50个，详见[别名IP范围](../Operation-Guide/Networking/Alias-IP.md)。 </br>       

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 公网带宽 ：如果实例要访问公网网络，可以在创建实例时勾选为其绑定弹性公网IP（由系统自动分配，不支持用户修改），也可以在实例创建后另行购买，支持与实例绑定、解绑。（创建后为辅网口的弹性公网IP）</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 带宽计费模式 ：支持按固定带宽-包年包月、按固定带宽-按配置、加入共享带宽3种计费方式。（注意：按配置计费实例不支持与按固定带宽-包年包月弹性公网IP关联购买）。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 线路 ：目前边缘节点支持单线，目前已上线节点支持电信。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 带宽 ：用户可选择带宽范围为1Mbps到10000Mbps的公网带宽速率，根据不同节点该带宽最大值可能会不同，请根据实际节点合理选择。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 额外上行带宽 ：用户可选择额外上行带宽范围为0Mbps到10000Mbps的公网带宽速率，根据不同节点该带宽最大值可能会不同，请根据实际节点合理选择。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;按固定带宽计费的EIP会根据您设定的“带宽”、“额外上行带宽”上限进行收费和限速，您可以根据业务需求随时调整带宽上限。

- 安全设置

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **防火墙** ：操作系统安装完成后，系统对外网网络只开放IN方向的22端口。操作系统安装成功后，用户可自行登录操作系统更改iptable设置。详见[防火墙设置操作指南](../Operation-Guide/Network-And-Security/Steps-Network-And-Security.md)。</br>

- 基本信息

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 实例名称 ：实例名称是指分布式云物理服务器的名称，用户可以自定义设置，设置完成后可以通过分布式云物理服务器列表中使用名称来搜索。若单次购买多台分布式云物理服务器的情况下，默认在设置名称后面加上数字，以递增的形式来标志多台服务器。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 描述 ：可选择为实例添加描述。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 主机名 ：主机名是指分布式云物理服务器操作系统内部的计算机名，用户可以自定义设置，分布式云物理服务器实例成功生产后可以通过登录服务器内部查看。若单次购买多台分布式云物理服务器的情况下，默认在设置名称后面加上数字，以递增的形式来标志多台服务器。（主机名为可选项，如果不输入主机名，则默认使用“host-内网IPv4地址第三段-内网IPv4地址第四段”为主机名。）</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 用户名 ：根据所选操作系统自动设置，Linux系统默认为 **root** 。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 登录方式 ：密码同时用于远程登录和控制台登录。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1、自定义密码：即“立即设置密码”，实例创建后支持修改；<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2、自动生成密码登录：即暂不设置密码，系统会以短信和邮件方式发送默认密码；<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3、密钥登录：对于Linux系统，可以选择SSH密钥登录，若采用密钥登录方式须先创建或导入密钥，详见[SSH密钥](../Operation-Guide/SSH-Key-Pair/Step-SSH-Key-Pair.md)。<br/>                                                                  
- 高级设置 </br>   

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  **自定义数据** ：用于启动时配置实例，仅在实例系统首次启动时执行，详见[自定义数据](../Operation-Guide/User-Data/User-Data-Overview.md)。

- 购买量</br>     

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  **自动续费** ：包年包月资源开通自动续费功能。勾选自动续费待资源创建后，自动续费属性和时长均修改。按月购买，则自动续费周期为1个月；按年购买，则自动续费周期为1年，按年自动续费享受自动续费折扣。</br>  

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  在完成全部配置后，确定购买实例数量，购买数量受限与该节点您分布式云物理服务器、弹性公网IP及所选子网剩余IP数量，若限额不够，可通过[提交工单](https://ticket.jdcloud.com/applyorder/submit)提升配额。


