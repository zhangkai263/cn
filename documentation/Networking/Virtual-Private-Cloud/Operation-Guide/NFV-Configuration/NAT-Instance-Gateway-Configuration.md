## **NAT实例网关配置**

#### **创建NAT Gateway的云主机**

步骤1：访问[云主机控制台](https://cns-console.jdcloud.com/host/compute/list)，即进入实例列表页面。或访问[京东云控制台](https://console.jdcloud.com)点击顶部导航栏 弹性计算-> 【云主机】进入实例列表页。
步骤2：选择地域，点击【创建】进入主机创建页，需要实例规格、镜像、私有网络、安全组信息等，镜像镜像选择CentOS-7.2 64位 NAT Gateway；

步骤3：配置公网IP类型、带宽；

步骤4：点击【立即购买】按钮则触发购买，支付完成即完成创建主机。

更多操作请参考[创建云主机](../../..//Elastic-Compute/Virtual-Machines/Operation-Guide/Instance/Create-Instance.md)
![](/image/Networking/Virtual-Private-Cloud/Operation-Guide/NFV-Configuration/NAT-Mirror-Gateway-Configuration/vmNatGateway.png)



#### **配置路由表路由规则**

1. 进入京东智联云控制台相应VPC路由表的详情页面，选择新建路由策略。
2. 添加路由策略，目的端为公网地址，下一跳类型为云主机，下一跳选择之前通过NAT Gateway镜像创建的云主机。
3. 将该路由表关联到有访问Internet的需求的实例所在的子网上。需要注意NAT Instance不能在此子网内，即子网内云主机只能通过同一私有网络下不同子网内的NAT Instance访问公网。

![](/image/Networking/Virtual-Private-Cloud/Operation-Guide/NFV-Configuration/NAT-Mirror-Gateway-Configuration/Step2.png)

![](/image/Networking/Virtual-Private-Cloud/Operation-Guide/NFV-Configuration/NAT-Mirror-Gateway-Configuration/Step3.png)
