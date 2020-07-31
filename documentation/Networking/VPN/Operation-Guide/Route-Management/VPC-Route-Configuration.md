## VPC路由配置
在云端配置完VPN连接及VPN隧道后，还需要配置相应的路由，包括边界网关路由表路由和VPC路由表路由。

### 操作步骤
##### 1.创建VPC接口
创建VPC接口并设置VPC传播网段，详见[VPC接口管理](../../Operation-Guide/Border-Gateway-Management/VPC-Attachment-Configuration.md)。

##### 2.VPC路由表添加去往边界网关的路由
在VPC和边界网关之间创建VPC接口后，可以在VPC路由表中设置将边界网关路由表的路由传播到VPC路由表。
a)登录[VPC路由表控制台](https://cns-console.jdcloud.com/host/routeTable/list)；  <br />
b)点击相应的VPC路由表，进入VPC路由表详情页；<br />
c)在“路由传播”Tab中将展示从边界网关中学习到的路由条目，可添加路由传播。点击“添加”，选择与该路由表所在VPC之间创建了VPC接口的边界网关，选择要传入该路由表的边界网关路由的网段范围。选定后，会自动将边界网关有效路由表中处于该范围内的目的端路由传入该路由表。

有关VPC路由表设置路由传播的更多内容，详见[VPC路由表路由传播](https://docs.jdcloud.com/cn/virtual-private-cloud/route-table-features)；

```
  若VPC路由表所在的VPC和边界网关之间尚未创建VPC接口时，请先创建VPC接口。
```

![](../../../../../image/Networking/VPN/Operation-Guide/vpcroutetable-addroutepropagation.png)

##### (可选)3.VPC路由表添加去往边界网关的静态路由
a)登录[VPC路由表控制台](https://cns-console.jdcloud.com/host/routeTable/list)；  <br />
b)点击相应的VPC路由表，进入VPC路由表详情页；<br />
c)在“路由策略”Tab中将展示当前VPC路由表的静态路由、传播路由，点击“编辑”，选择“新增一条”，目的端为客户端网段(如：10.0.0.0/16)，下一跳类型为边界网关，下一跳为与该路由表所在的VPC间创建了VPC接口的边界网关，可对该路由添加备注。
``推荐使用路由传播的方式自动添加路由。``

![](../../../../../image/Networking/VPN/Operation-Guide/vpcroutetable-addroute.png)
