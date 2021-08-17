# 配置弹性网卡删除属性

通过配置该属性，可实现删除实例时一起删除其绑定的弹性网卡。

## 前提条件
* 实例须处于 **运行中** 或 **已停止** 状态
* 仅支持配置弹性网卡的删除属性，主网卡默认随实例删除，且不可修改。

## 操作步骤

1. 访问[云主机控制台](https://cns-console.jdcloud.com/host/compute/list)，即进入实例列表页面。或访问[京东云控制台](https://console.jdcloud.com)点击顶部导航栏 **弹性计算-云主机** 进入实例列表页。
2. 选择地域后在实例列表中选择需要配置弹性网卡删除属性的实例，点击名称进入详情页。
3. 点击 **弹性网卡Tab**，选择需要配置的弹性网卡，点击 **删除属性** 后的 **修改**ICON。

![](https://img1.jcloudcs.com/cn/image/vm/eni-delete-attributes1.png)

5. 在弹出弹窗中根据需要配置，点击 **确定**。

<div align="center"><img src="https://img1.jcloudcs.com/cn/image/vm/eni-delete-attributes2.png" width="500"></div>
		
此外您还可以从弹性网卡控制台进行配置操作，详细步骤请参见[弹性网卡侧配置删除属性](../../../../Networking/Elastic-Network-Interface//Operation-Guide/Elastic-Network-Interface-Management/Enable-Delete-with-VM.md)。


## 相关参考

[弹性网卡侧配置删除属性](../../../../Networking/Elastic-Network-Interface//Operation-Guide/Elastic-Network-Interface-Management/Enable-Delete-with-VM.md)

