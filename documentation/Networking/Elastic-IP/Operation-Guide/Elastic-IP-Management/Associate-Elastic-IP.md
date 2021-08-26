# 绑定弹性公网IP

京东云支持将独立创建的弹性公网IP与云资源进行绑定，如云主机、负载均衡、容器、弹性网卡等，本文将介绍云资源如何与弹性公网IP进行绑定关联。

### 操作场景

云主机、负载均衡或容器等云资源需访问公网或支持被公网访问。

### 前提条件及限制

- 确保您已经[注册京东云账号](https://user.jdcloud.com/register?returnUrl=https%3A%2F%2Fwww.jdcloud.com%2F)，并实现[实名认证](https://docs.jdcloud.com/cn/real-name-verification/introduction)；
- 确保您已经创建一个弹性公网IP，且未绑定云资源；
- 确保您已经创建一个云资源（云主机、负载均衡等），且未绑定弹性公网IP；
- 一个弹性公网IP同时只能绑定一个云资源。

### 操作步骤

步骤1：登录京东云控制台，进入控制台导航页面。

步骤2：在控制台左侧导航栏，选择网络-【私有网络】-【弹性公网IP】，进入弹性公网IP列表页。

步骤3：在弹性公网IP列表页，若弹性公网IP处于未绑定状态，则显示【绑定资源】按键。

步骤4：点击【绑定资源】按钮，进入弹性公网IP绑定资源弹窗。


> 1. 标准公网IP支持绑定云主机、负载均衡、容器、弹性网卡等资源；
> 2. 边缘公网IP目前仅支持绑定所在可用区的云主机；
> 3. 弹性公网IP详情页右上角快捷操作菜单同时提供绑定资源按键，功能与列表页按键保持一致。
	
步骤5：在绑定资源弹窗，选择弹性公网IP需要绑定的资源类型，包括云主机、负载均衡、弹性网卡、容器、pod。

步骤6：选中需要绑定公网IP的资源，点击【确定】按键，完成绑定弹性公网IP操作。

步骤7：返回弹性公网IP列表页，查看弹性公网IP绑定情况。

## 相关参考

- [使用限制](../../Introduction/Restrictions.md)
- [常见问题](https://docs.jdcloud.com/cn/elastic-ip/faq)
- [解绑公网IP](https://docs.jdcloud.com/cn/elastic-ip/associate-elastic-ip)
- [创建云主机](https://docs.jdcloud.com/cn/virtual-machines/create-instance)
