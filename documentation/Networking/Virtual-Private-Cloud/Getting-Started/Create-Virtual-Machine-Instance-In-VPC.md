# 私有网络中部署云主机实例 

本文将详细介绍如何在私有网络中部署云主机实例。

### 操作背景及流程

您的业务迁移上云，或业务增量，需增加部署服务器，大致流程如下：

![](../../../../image/Networking/Virtual-Private-Cloud/Getting-Started/Create-Virtual-Machine-Instance-In-VPC/Create-Virtual-Machine-Instance-In-VPC-1.png)


### 前提条件

- 确保您已经[注册京东云账号](https://user.jdcloud.com/register?returnUrl=https%3A%2F%2Fwww.jdcloud.com%2F)，并实现[实名认证](https://realname.jdcloud.com/account/verify)；

- 确保账户中有足够余额；

- 确保需要创建的资源数量配额充足，如需提升配额请提[工单申请](https://ticket.jdcloud.com/applyorder/submit)。


### 操作步骤

####  创建私有网络

- 在左边栏餐单中依次点击网络->私有网络->私有网络，进入私有网络列表页，点击创建，弹出创建配置窗口。
- 根据需求选择的地域，填写名称，填写CIDR，点击创建即可获得1个私有网络。

![](/image/Networking/Virtual-Private-Cloud/Getting-Started/Create-Virtual-Machine-Instance-In-VPC/Step1.png)



#### 创建子网

- 在左边栏餐单中依次点击网络->私有网络->子网，进入子网列表页，点击创建，弹出创建配置窗口。
- 根据需求选择的地域，选择刚刚创建的私有网络，填写子网名称，填写子网CIDR，选择关联路由表，点击创建即可获得1个子网。

![](/image/Networking/Virtual-Private-Cloud/Getting-Started/Create-Virtual-Machine-Instance-In-VPC/Step2.png)



#### 在该子网中创建云主机

- 在左边栏餐单中依次点击弹性计算->云主机->实例，进入实例列表页，点击创建，弹出创建配置窗口。
- 在实例创建的配置页找到网络模块，选择刚刚创建的私有网络和子网，其余配置根据云主机向导即可，点击创建即可创建1台指定私有网络、子网的云主机。

![](/image/Networking/Virtual-Private-Cloud/Getting-Started/Create-Virtual-Machine-Instance-In-VPC/Step3.png)
