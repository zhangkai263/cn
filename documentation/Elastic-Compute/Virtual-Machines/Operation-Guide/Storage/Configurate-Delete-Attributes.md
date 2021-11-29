# 配置云硬盘随实例删除属性

通过配置“随实例删除”属性，可实现删除实例时一并删除其挂载的云硬盘。该属性为实例属性而非云硬盘自身属性，因此须在云硬盘挂载至实例后在实例侧配置。

## 前提条件及限制

* 仅支持按配置计费且非多点挂载的云硬盘配置该属性（包年包月计费或多点挂载云硬盘，在实例删除时默认保留）。


## 操作步骤
1. 访问[云主机控制台](https://cns-console.jdcloud.com/host/compute/list)，即进入实例列表页面。或访问[京东云控制台](https://console.jdcloud.com)点击顶部导航栏 **弹性计算-云主机** 进入实例列表页。
2. 选择地域后在实例列表中选择需要配置云硬盘删除属性的实例，点击名称进入详情页。
3. 点击**磁盘Tab**，选择需要配置的云硬盘，点击 **操作-修改属性** 按钮。
<div align="center"><img src="https://img1.jcloudcs.com/cn/image/vm/deleteattribute1.png" width="900"></div>

4. 在弹出弹窗中根据需要配置，点击**确定**。
<div align="center"><img src="https://img1.jcloudcs.com/cn/image/vm/deleteattribute2.png" width="500"></div>


