## **NAT实例网关配置**

#### **创建NAT Gateway的云主机**

步骤1：访问[云主机控制台](https://cns-console.jdcloud.com/host/compute/list)，即进入实例列表页面。或访问[京东云控制台](https://console.jdcloud.com)点击顶部导航栏 弹性计算-> 【云主机】进入实例列表页。
步骤2：选择地域，点击【创建】进入主机创建页，需要实例规格、镜像、私有网络、安全组信息等，镜像镜像选择CentOS-7.2 64位 NAT Gateway；

步骤3：配置公网IP类型、带宽；

步骤4：点击【立即购买】按钮则触发购买，支付完成即完成创建主机。

更多操作请参考[创建云主机](../../..//Elastic-Compute/Virtual-Machines/Operation-Guide/Instance/Create-Instance.md)
![](/image/Networking/Virtual-Private-Cloud/Operation-Guide/NFV-Configuration/NAT-Mirror-Gateway-Configuration/vmNatGateway.png)



#### **配置路由表路由策略**

步骤1：打开控制台，选择 网络 -> 【私有网络】 -> 【路由表】，进入路由表列表页；

步骤2：定位需要配置路由规则的路由表，点击路由表名称进入路由表详情页，点击路由策略进入路由规则页签，点击【编辑】按钮，管理路由表规则；

步骤3：点击【新增一条】添加路由策略；补充相应的配置项，下一跳类型：云主机，下一跳：通过NAT Gateway镜像创建的云主机；

步骤4： 将该路由表关联到有访问Internet的需求的实例所在的子网上。需要注意NAT Instance不能在此子网内，即子网内云主机只能通过同一私有网络下不同子网内的NAT Instance访问公网。

配置完成后，子网SNAT02下的所有主机都可以通过作为NAT网关的主机进行公网访问。

## 相关参考

- [NAT实例网关访问公网](../../Getting-Started/NAT-Instance-Gateway.md)
- [创建云主机](../../../../Elastic-Compute/Virtual-Machines/Operation-Guide/Instance/Create-Instance.md)
- [创建NAT网关](https://docs.jdcloud.com/cn/nat-gateway/create-nat-gateway)
