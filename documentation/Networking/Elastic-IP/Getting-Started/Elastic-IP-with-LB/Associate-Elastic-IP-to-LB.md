# 负载均衡使用弹性公网IP

本文详细地介绍了如何将公网IP绑定到负载均衡实例上，为负载均衡提供公网访问和被公网访问的能力。

## 前提条件

- 确保您已经[注册京东云账号](https://user.jdcloud.com/register?returnUrl=https%3A%2F%2Fwww.jdcloud.com%2F)，并实现[实名认证](https://realname.jdcloud.com/account/verify)；

- 确保您已经创建一个弹性公网IP，且未绑定云资源；

- 确保您已经创建一个负载均衡，且未绑定弹性公网IP。

### 弹性公网IP绑定负载均衡

#### 操作步骤

步骤1：登录京东云控制台，进入控制台导航页面；

步骤2：在控制台左侧导航栏，选择网络-【私有网络】-【弹性公网IP】，进入弹性公网IP列表页；

步骤3：在弹性公网IP列表页，若弹性公网IP处于未绑定状态，则显示绑定资源按键；

步骤4：定位需绑定资源的公网IP，点击【绑定资源】按键，进入弹性公网IP绑定资源弹窗；

	- 目前弹性公网IP支持绑定云主机、负载均衡、容器、弹性网卡等资源
	- 弹性公网IP详情页右上角快捷操作菜单同时提供绑定资源按键，功能与列表页按键保持一致

步骤5：在绑定资源弹窗，点击【资源类型】对应的下拉框选择【负载均衡】；

步骤6：定位弹性公网IP需要绑定的负载均衡资源，点击【确定】按键，完成绑定弹性公网IP操作；

步骤7：返回弹性公网IP列表页，查看弹性公网IP绑定情况。


### 负载均衡绑定弹性公网IP

#### 操作步骤

步骤1：登录京东云控制台，进入控制台导航页面；

步骤2：在控制台左侧导航栏，选择网络-【负载均衡】-【实例】，进入负载均衡列表页；

步骤3：在负载均衡列表页，定位需要绑定IP的负载均衡，在操作列点击【更多】选择【绑定公网IP】；
```
若负载均衡未绑定弹性公网IP，则显示【绑定公网IP】，如已绑定公网IP，则会显示【解绑公网IP】按钮
```
步骤4：点击【绑定公网IP】按键，进入绑定弹性公网IP弹窗；

步骤5：在绑定公网IP弹窗，选择负载均衡需要绑定的弹性公网IP；

步骤6：点击【确定】按钮，完成绑定弹性公网IP操作；

步骤7：返回负载均衡列表页，查看弹性公网IP绑定情况。

### 后续测试

负载均衡实例与弹性公网IP绑定之后，您可以通过访问弹性公网IP地址的方式来负载均衡的后端服务。相关配置请参考[负载均衡配置导览](https://docs.jdcloud.com/cn/network-load-balancer/start-from-here)


## 相关参考

- [使用限制](../../Introduction/Restrictions.md)
- [创建负载均衡](https://docs.jdcloud.com/cn/application-load-balancer/create-alb-instance)
- [创建公网IP](https://docs.jdcloud.com/cn/elastic-ip/create-elastic-ip)
- [解绑公网IP](https://docs.jdcloud.com/cn/elastic-ip/disassociate-elastic-ip)
- [负载均衡配置导览](https://docs.jdcloud.com/cn/network-load-balancer/start-from-here) 
