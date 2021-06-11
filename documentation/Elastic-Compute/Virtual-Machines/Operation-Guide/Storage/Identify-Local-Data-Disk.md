# 查看本地数据盘

本地数据盘为实例提供临时的块存储空间。本地盘是从实例所在物理机的本地存储区域内划分的一块存储区域。本地数据盘适用于频繁变更且需频繁访问的临时数据如缓存或临时数据等，或在一组实例间同步的数据（如负载均衡后端服务器的服务状态数据）。

仅部分实例规格配置有本地数据盘（可查阅[实例规格类型](https://docs.jdcloud.com/virtual-machines/instance-type-family)），而不同规格本地数据盘块数及单盘容量也有所区别。对于同一实例规格，本地数据盘块数及单盘容量均不可调整，如须调整请通过调整实例规格综合CPU、内存等多项配置参数选择。

>**重要提示**：<br>
>本地数据为临时存储，有丢失数据的风险（比如发生迁移或宿主机宕机等情况），不适用于应用层没有数据冗余架构的使用场景， 建议您使用云硬盘存储重要数据。
	
为了确保不同类型数据存储在合适的存储介质中，您需要在系统内识别并区分本地数据盘和云硬盘数据盘，详细步骤参考如下。

## 操作步骤

### Linux系统

Linux以 CentOS 7.4 系统为例，操作步骤如下：

1. 访问[云主机控制台](https://cns-console.jdcloud.com/host/compute/list)，即进入实例列表页面。或访问[京东云控制台](https://console.jdcloud.com)点击顶部导航栏 **弹性计算-云主机** 进入实例列表页。
2. 选择地域后在实例列表中选择需要查看本地数据盘的实例，[登录Linux实例](https://docs.jdcloud.com/cn/virtual-machines/connect-to-linux-instance)
3. 输入：
```
ll /dev/disk/by-id
```
	
4. 如下图所示，其中virtio-Ephemeral\_Disk\_1至virtio-Ephemeral\_Disk\_4即为对应四块本地数据盘<br>
![](../../../../../image/vm/localdatadisklinux.png)


### Windows系统

Windows以 Windows 2008 标准版 系统为例，操作步骤如下：

1. 访问[云主机控制台](https://cns-console.jdcloud.com/host/compute/list)，即进入实例列表页面。或访问[京东云控制台](https://console.jdcloud.com)，点击顶部导航栏 **弹性计算-云主机** 进入实例列表页。
2. 选择地域后在实例列表中选择需要查看本地数据盘的实例，[登录Windows实例](https://docs.jdcloud.com/cn/virtual-machines/connect-to-windows-instance)
3. 输入：

```wmic
diskdrive get PNPDeviceID,SerialNumber
```
	
4. 如下图所示，其中序列号Ephemeral\_Disk\_1至Ephemeral\_Disk\_4即为对应四块本地数据盘<br>![](../../../../../image/vm/localdatadiskwin.png)

## 相关参考

[登录Linux实例](https://docs.jdcloud.com/cn/virtual-machines/connect-to-linux-instance)

[登录Windows实例](https://docs.jdcloud.com/cn/virtual-machines/connect-to-windows-instance)

[实例规格类型](https://docs.jdcloud.com/virtual-machines/instance-type-family)
