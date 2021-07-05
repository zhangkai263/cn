## 确定配置项

- 计费模式

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 提供 **包年包月** 和 **按配置** 两种计费模式，详见[计费规则](../Pricing/Billing-Rules.md)。

- 地域与可用区

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 当前提供 **华北-北京** 地域，更多地域还在筹备中。

- 规格

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 提供 **计算**、**存储** 、**GPU** 三类实例规格，您可根据不同的业务场景选择最优配置，参考[产品规格](../Introduction/Specifications.md)。

- 镜像

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;目前支持 **标准镜像**，镜像类型包括 CentOS6.6、7.1、7.2、7.5，Ubuntu14.04、16.04、18.04和Windows Server 2016标准版64位中文版。详细情况参见[镜像使用说明](../Operation-Guide/Image/Description-Image.md)。

- 存储

选取系统盘和数据盘的RAID模式。

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 选取 **系统盘** 和 **数据盘** 的RAID模式。某些机型的系统盘或数据盘RAID模式是固定的，请根据实际情况做选择，详情参见[产品规格](../Introduction/Specifications.md)。

#### 基础网络实例

- 网络

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **内部网络** ：基础网络模式下，用户只有第一次配置网络的时候可以选择内网CIDR地址段。后续创建的云物理服务器将使用第一次配置的内网CIDR地址段。

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **防火墙** ：操作系统安装完成后，系统对外网网络只开放IN方向的22端口。操作系统安装成功后，用户可自行登录操作系统更改iptable设置。详情请参考[防火墙设置操作指南](../Operation-Guide/Network-And-Security/Steps-Network-And-Security.md)。

- 带宽

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **公网IP**：用户可以在创建云物理服务器时选择购买或不购买公网IP。选择购买基础网络实例时，公网IP和云物理服务器是绑定的。公网IP由系统自动分配，用户不可修改公网IP,**但是云物理服务器创建后不可添加公网IP**。（选择购买私有网络实例时，若不够买公网IP，可以待实例创建成功后绑定公网IP。）

用户可选择1-200Mbps的公网带宽速率，并可在创建后做升配操作。
具体操作步骤参见[调整公网带宽](../Operation-Guide/Instance/Description-Adjust-Public-Network-Bandwidth.md)。

#### 私有网络实例

网络接口分为单网口和双网口，根据需求选择。单网口包括主网口（bond0），双网口包括主网口（eth0）和辅网口（eth1）。<br/>

- 网口与带宽设置

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **主网口** 信息：<br/>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 私有网络与子网：用户需要先行规划并创建私有网络和子网。<br/>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 内部IP ：为用户指定主网口的内网IP地址，可在所选子网可用IP地址内任意指定，也可以选择由系统自动分配。内网IP一旦分配至云物理服务器将不可更改。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 别名IP范围 ：如果您有多项服务在一台云物理服务器上运行，并且希望为每项服务分配一个不同的 IP 地址，可以使用别名IP范围功能实现。单实例主网口最多可添加50个，详见[别名IP范围](../Operation-Guide/Networking/Alias-IP.md)。 <br/>       

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 公网IP ：如果实例要访问公网网络，可以在创建实例时勾选为其绑定弹性公网IP（由系统自动分配，不支持用户修改），也可以在实例创建后另行购买，支持与实例绑定、解绑。（创建后为主网口的弹性公网IP）</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 带宽计费模式 ：支持按固定带宽计费方式。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 线路 ：支持BGP类型。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 带宽 ：用户可选择带宽范围为1Mbps到200Mbps的公网带宽速率。按固定带宽计费的EIP会根据您设定的“带宽上限”进行收费和限速，您可以根据业务需求随时调整带宽上限。

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **辅网口** 信息：</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 私有网络与子网 ：用户需要先行规划并创建私有网络和子网。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 内部IP ：为用户指定辅网口的内网IP地址，可在所选子网可用IP地址内任意指定，也可以选择由系统自动分配。内网IP一旦分配至云物理服务器将不可更改。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 别名IP范围 ：如果您有多项服务在一台云物理服务器上运行，并且希望为每项服务分配一个不同的 IP 地址，可以使用别名IP范围功能实现。单实例辅网口最多可添加50个，详见[别名IP范围](../Operation-Guide/Networking/Alias-IP.md)。 </br>       

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 公网IP ：如果实例要访问公网网络，可以在创建实例时勾选为其绑定弹性公网IP（由系统自动分配，不支持用户修改），也可以在实例创建后另行购买，支持与实例绑定、解绑。（创建后为辅网口的弹性公网IP）</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 带宽计费模式 ：支持按固定带宽计费方式。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 线路 ：支持BGP类型。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 带宽 ：用户可选择带宽范围为1Mbps到200Mbps的公网带宽速率。按固定带宽计费的EIP会根据您设定的“带宽上限”进行收费和限速，您可以根据业务需求随时调整带宽上限。

- 安全设置

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **防火墙** ：操作系统安装完成后，系统对外网网络只开放IN方向的22端口。操作系统安装成功后，用户可自行登录操作系统更改iptable设置。详见[防火墙设置操作指南](../Operation-Guide/Network-And-Security/Steps-Network-And-Security.md)。</br>

- 基本信息：

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **实例名称** ：实例名称是指云物理服务器的别名，用户可以自定义设置，设置完成后可以通过云物理服务器列表中使用别名来筛选。一次购买多台云物理服务器的情况下，默认在设置名称后面加上数字，以递增的形式来标志多台云物理服务器。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 描述 ：可选择为实例添加描述。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; **主机名** ：主机名是指云物理服务器操作系统内部的计算机名，用户可以自定义设置，云物理服务器成功生产后可以通过登录云物理服务器内部查看。一次购买多台云物理服务器的情况下，默认在设置名称后面加上数字，以递增的形式来标志多台云物理服务器。（主机名为可选项，如果不输入主机名，则默认使用“host-内网IPv4地址第三段-内网IPv4地址第四段”为主机名。）

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 用户名 ：根据所选操作系统自动设置，Linux系统默认为 **root** 。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 登录方式 ：密码同时用于远程登录和控制台登录。</br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1、自定义密码：即“立即设置密码”，实例创建后支持修改；<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2、自动生成密码登录：即暂不设置密码，系统会以短信和邮件方式发送默认密码；<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3、密钥登录：对于Linux系统，可以选择SSH密钥登录，若采用密钥登录方式须先创建或导入密钥，详见[SSH密钥](../Operation-Guide/SSH-Key-Pair/Description-SSH-Key-Pair.md)。<br/>   

- 高级设置 </br>   

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  **自定义数据** ：用于启动时配置实例，仅在实例系统首次启动时执行，详见[自定义数据](../Operation-Guide/User-Data/User-Data.md)。<br/>   

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  **标签** ：支持创建实例时绑定标签，单个实例最多可绑定10个标签，详见[标签](../Operation-Guide/Tag/Tag.md)。<br/>  

- 购买时长 </br>  

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  **自动续费** ：包年包月资源开通自动续费功能。勾选自动续费待资源创建后，自动续费属性和时长均修改。按月购买，则自动续费周期为1个月；按年购买，则自动续费周期为1年，按年自动续费享受自动续费折扣。</br>  

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 购买时长：包年包月计费方式支持1-9个月、1、2、3年。</br>  

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  购买数量：购买数量受限与该地域您云物理服务器、弹性公网IP及所选子网剩余IP数量，若限额不够，可通过[提交工单](https://ticket.jdcloud.com/applyorder/submit)提升配额。 </br>  

- 点击**立即购买**按钮，跳转到订单确认页，按照京东云统一的订单计费流程支付成功后，跳转至控制台列表查看资源信息。</br>  
