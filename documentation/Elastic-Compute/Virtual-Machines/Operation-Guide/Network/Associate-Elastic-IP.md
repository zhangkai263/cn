# 绑定弹性公网IP

如果实例需要直接访问公网，可为其绑定弹性公网IP。

## 前提条件
* 实例须处于 **运行中** 或 **已停止** 状态；
* 已在实例所在地域创建了弹性公网IP，详见[创建弹性公网IP](https://docs.jdcloud.com/cn/elastic-ip/create-elastic-ip)。

## 操作步骤

1. 访问[云主机控制台](https://cns-console.jdcloud.com/host/compute/list)，即进入实例列表页面。或访问[京东云控制台](https://console.jdcloud.com)点击顶部导航栏 **弹性计算-云主机** 进入实例列表页。
2. 选择地域后在实例列表中选择需要绑定弹性公网IP的实例，点击名称进入详情页。
3. 点击 **弹性网卡Tab**，选择需要绑定弹性公网IP的网卡，找到需要绑定的内网IP，点击 **弹性公网IP** 按钮。
4. 在弹出的弹窗中，选择需要绑定的弹性公网IP，点击 **确定**。
		
		
此外，您还可以：

* 在实例列表页操作对实例主网卡主内网IP绑定弹性公网IP，操作步骤如下：
	1. 访问[云主机控制台](https://cns-console.jdcloud.com/host/compute/list)，即进入实例列表页面。或访问[京东云控制台](https://console.jdcloud.com)点击顶部导航栏 **弹性计算-云主机** 进入实例列表页。
	2. 选择地域后在实例列表中选择需要对主网卡主内网IP绑定弹性公网IP的实例，点击 **操作-更多-绑定弹性公网IP**。
	3. 在弹出的弹窗中，选择需要绑定的弹性公网IP，点击 **确定**。
	 
* 从弹性网卡控制台进行绑定操作，详细步骤请参见[弹性网卡侧绑定公网IP](../../../../Networking/Elastic-Network-Interface/Operation-Guide/Private-IP-Management/Associate-Elastic-IP.md)。

## 相关参考

[创建弹性公网IP](https://docs.jdcloud.com/cn/elastic-ip/create-elastic-ip)

[弹性网卡侧绑定公网IP](../../../../Networking/Elastic-Network-Interface/Operation-Guide/Private-IP-Management/Associate-Elastic-IP.md)
