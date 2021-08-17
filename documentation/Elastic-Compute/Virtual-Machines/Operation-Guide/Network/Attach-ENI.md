# 绑定弹性网卡

弹性网卡是一种虚拟网络接口，您可以通过为实例绑定弹性网卡以使实例接入不同网络。弹性网卡可以在构建业务流量分离、多业务承载以及网络高可用等应用场景时提供支持。

弹性网卡的创建请参考[创建弹性网卡](https://docs.jdcloud.com/elastic-network-interface/create-elastic-network-interface)。


## 前提条件及限制
 
* 实例须处于 **运行中** 或 **已停止** 状态；
* 仅支持将同VPC的弹性网卡绑定至实例；
* 二代裸金属规格`g.n2.metal`及`s.i2.metal`不支持绑定弹性网卡；
* 不同实例规格支持绑定的弹性网卡数量不同，详见[实例规格类型](https://docs.jdcloud.com/virtual-machines/instance-type-family)。

## 操作影响
* 操作绑定后可能需要几分钟才可生效，还请耐心等待后点击Tab页签刷新结果；
* 绑定后需要登录实例进行相关路由及IP配置，详见[配置路由](../../../../Networking/Elastic-Network-Interface/Operation-Guide/VM-Configuration/Linux-Permanent-Configuration.md)。

## 操作步骤

1. 访问[云主机控制台](https://cns-console.jdcloud.com/host/compute/list)，即进入实例列表页面。或访问[京东云控制台](https://console.jdcloud.com)点击顶部导航栏 **弹性计算-云主机**  进入实例列表页。
2. 选择地域后在实例列表中选择需要绑定弹性网卡的实例，点击名称进入详情页。
3. 点击 **弹性网卡Tab**下 **绑定弹性网卡** 按钮。
4. 在弹出弹窗中，选择一个弹性网卡，配置随实例删除属性后，点击 **确定**。

![](https://img1.jcloudcs.com/cn/image/vm/attach-eni1.png)

<div align="center"><img src="https://img1.jcloudcs.com/cn/image/vm/attach-eni2.png" width="700"></div>


此外您还可以从弹性网卡控制台进行绑定操作，详细步骤请参见[弹性网卡侧绑定弹性网卡](../../../../Networking/Elastic-Network-Interface/Operation-Guide/Elastic-Network-Interface-Management/Associate-Elastic-Network-Interface.md)。

## 相关参考
[实例规格类型](https://docs.jdcloud.com/virtual-machines/instance-type-family)

[配置路由](../../../../Networking/Elastic-Network-Interface/Operation-Guide/VM-Configuration/Linux-Permanent-Configuration.md)

[弹性网卡侧绑定弹性网卡](../../../../Networking/Elastic-Network-Interface/Operation-Guide/Elastic-Network-Interface-Management/Associate-Elastic-Network-Interface.md)
