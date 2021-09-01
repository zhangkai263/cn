# 停止实例

如果您需要暂停实例服务或作为其他操作的前置条件，如[重置系统](https://docs.jdcloud.com/virtual-machines/rebuild-instance)及[调整配置](https://docs.jdcloud.com/virtual-machines/resize-instance)等，您可操作停止实例。

## 前提条件及限制

实例必须处于**运行**状态。若实例处于**停止**状态，则说明实例已完成停止操作，无需二次操作；若实例处于其他非稳定状态，还请等待前序操作执行完成后再操作停止。
	

## 操作影响

* 触发停止操作后实例将进入**停止中**状态，实例将无法进行其他操作。当停止完成后，实例将进入**停止**状态。
* 对于包年包月计费的实例，停止后不会影响实例及关联资源的计费状态。
* 对于按配置计费且满足[停机不计费](https://docs.jdcloud.com/virtual-machines/uncharged_for_stopped_vm)的实例，操作停止时可选择是否选择**停机不计费**，设置停机不计费后，**停止**状态的实例不再计费，但关联资源仍正常计费。

>请注意：<br> 1、停止操作会造成您业务中断，还请谨慎操作；<br>2、选择停机不计费并成功停止后的实例，其vCPU、内存、GPU资源将释放，本地数据盘数据将被清空，后续启动时受当时库存限制，可能存在库存不足导致无法启动的情况，还请谨慎操作。


## 操作步骤
1. 访问[云主机控制台](https://cns-console.jdcloud.com/host/compute/list)，即进入实例列表页面。或访问[京东云控制台](https://console.jdcloud.com)点击顶部导航栏**弹性计算-云主机**进入实例列表页。
2. 选择地域。
3. 在实例列表中选择需要停止的实例，确认其状态为“运行”。如果需要同时操作多台实例，可通过多选实现。
4. 单台操作：点击**操作-停止**按钮，或点击实例名称进入详情页后点击**操作-停止**按钮；
<br>批量操作：点击列表下方**停止**按钮
![](https://img1.jcloudcs.com/cn/image/vm/stopinstance1.jpeg)
5. 在弹出的**停止实例**弹窗中，确认信息，点击**确定**提交启动。满足停机不计费条件的实例在确认信息时可再次选择当前实例是否开启停机不计费功能，开关状态默认值为最近一次操作停止时设置的对应值，若未操作过**停止**则为创建该实例时设置的对应值。<div align="center"><img src="https://img1.jcloudcs.com/cn/image/vm/stopinstance-2.png"></div>

操作后实例将进入**停止中**状态，过程中实例将无法进行其他操作。当停止完成后，实例将进入**已停止**状态。


## 相关参考

[重置系统](https://docs.jdcloud.com/virtual-machines/rebuild-instance)

[调整配置](https://docs.jdcloud.com/virtual-machines/resize-instance)

[实例停机不计费](https://docs.jdcloud.com/virtual-machines/uncharged_for_stopped_vm)
