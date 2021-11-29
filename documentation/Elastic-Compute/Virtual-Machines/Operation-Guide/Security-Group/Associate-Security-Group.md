# 绑定安全组
您可以在实例创建时绑定安全组，也可以在实例创建之后单独为实例绑定安全组，或者在修改实例的私有网络配置时绑定安全组。

## 前提条件及限制
* 实例的每块网卡至少绑定一个、至多绑定五个安全组。
* 实例仅允许绑定相同私有网络内的安全组，即针对实例的网卡，若需要

## 操作影响
实例绑定安全组后 ，安全组的规则对实例立即生效。

## 操作步骤
为已创建的实例绑定安全组操作步骤如下：
1. 访问[云主机控制台](https://cns-console.jdcloud.com/host/compute/list)，即进入实例列表页面。或访问[京东云控制台](https://console.jdcloud.com)点击顶部导航栏**弹性计算-云主机**进入实例列表页。
2. 选择地域。
3. 在实例列表中选择需要绑定安全组的实例，点击名称进入详情页。
4. 点击**安全组Tab-添加**按钮。
5. 在弹出弹窗中，选择一个或多个安全组，点击**确定**。<br>![](https://img1.jcloudcs.com/cn/image/vm/Operation-Guide-SG-bind1.png)

> 实例侧仅支持对实例主网卡进行安全组绑定操作，若要对实例辅助网卡操作，请从安全组侧操作。
	
此外您还可以从安全组控制台进行绑定操作，详细步骤请参见[安全组侧绑定实例](../../../../Networking/Virtual-Private-Cloud/Operation-Guide/Security-Group-Configuration.md)。
也可以在修改实例的私有网络配置时进行绑定操作，详细步骤参见[修改私有网络配置](../Network/Modify-VPC-Attribute.md)。

## 相关参考
[安全组侧绑定实例](../../../../Networking/Virtual-Private-Cloud/Operation-Guide/Security-Group-Configuration.md)

[修改私有网络配置](../Network/Modify-VPC-Attribute.md)
