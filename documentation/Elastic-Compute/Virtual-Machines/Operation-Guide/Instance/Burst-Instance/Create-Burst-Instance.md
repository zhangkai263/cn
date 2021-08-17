# 创建突发性能型实例

可参考下方步骤创建突发型实例，也可通过 [调整配置](https://docs.jdcloud.com/virtual-machines/resize-instance) 功能将普通规格实例调整为突发型实例。

## 前提条件及限制
* 仅支持使用云盘系统盘镜像创建突发型实例；
* 突发性能型实例目前处于公测中，如需购买请提交工单申请权限。

## 操作步骤
1. 访问 [云主机控制台](https://cns-console.jdcloud.com/host/compute/list)，即进入实例列表页面。或访问 [京东云控制台](https://console.jdcloud.com) 点击顶部导航栏 **弹性计算-云主机-实例** 进入实例列表页。
2. 选择地域后点击 **创建**，进入实例创建页面。
3. 在规格分类选择处，选择**突发性能**，在规格列表中选中需要的突发型规格。如须开启无性能约束模式，请勾选下方的“开启 突发性能型实例 性能无约束模式”，也可以在创建后 [调整性能模式](https://docs.jdcloud.com/virtual-machines/instancevoucher-overview/modify-burst-mode)。
<div align="center"><img src="https://img1.jcloudcs.com/cn/image/vm/create-burstinstance1.png" width="850"></div>

4. 其他配置项可参考 [Linux入门指南-确定配置项](https://docs.jdcloud.com/virtual-machines/select-configuration-linux) 或 [Windows入门指南-确定配置项](https://docs.jdcloud.com/virtual-machines/select-configuration-windows) 进行选择和填写。

## 相关参考
[调整配置](https://docs.jdcloud.com/virtual-machines/resize-instance) 

[调整性能模式](https://docs.jdcloud.com/virtual-machines/instancevoucher-overview/modify-burst-mode)

[Linux入门指南-确定配置项](https://docs.jdcloud.com/virtual-machines/select-configuration-linux)

[Windows入门指南-确定配置项](https://docs.jdcloud.com/virtual-machines/select-configuration-windows)
