# VPC对等连接配置

本文将详细介绍如何配置VPC对等连接（VPC Peering），包括如何创建VPC Peering、配置相关路由策略以及删除VPC Peering。

## 操作背景

您需要通过内网连通分属于两个VPC的云资源。

## 前提条件及限制

- 确保您已经[注册京东云账号](https://user.jdcloud.com/register?returnUrl=https%3A%2F%2Fwww.jdcloud.com%2F)，并实现[实名认证](https://docs.jdcloud.com/cn/real-name-verification/introduction)；
- 确保您已创建了两个私有网络(VPC)，两个VPC未通过VPC Peering连通；
- VPC通过VPC Peering连通不具传递性，如VPC1与VPC2连通，VPC2与VPC3连通，不表示VPC1与VPC3连通；
- VPC Peering支持同地域下的VPC进行连通，也支持跨账号同地域的VPC连通；
- 对等连接的两端私有网络 CIDR 不可以重叠；
- 对等连接任意一方可以随时中断对等连接，中断后两个私有网络间流量则立即中断；
- 同地域对等连接无带宽上限。

## **操作步骤**

#### **创建VPC对等连接**

步骤1：进入[京东云控制台](https://console.jdcloud.com/overview)，点击左侧导航条选择 网络->【私有网络】-> 【VPC对等连接】，进入VPC对等连接列表页；

步骤2：在VPC对等连接列表页点击【创建】按钮，打开创建VPC对等连接创建窗口；

步骤3：在VPC对等连接创建窗口中配置VPC对等连接相关信息，点击确定完成创建。弹窗将提示创建成功，请前往路由表配置相关路由。点击前往配置进入路由表列表页，点击稍后配置返回VPCpeering列表。配置信息如下：
|配置项|说明|示例|
|---|---|---|
|地域|选择VPC所在的地域|华北-北京|
|名称|设置名称，不可为空，只支持中文、数字、大小写字母、英文下划线“_”及中划线“-”，且不能超过32字符|vpc1-vpc2|
|本端VPC|选择要发起VPC对等连接的VPC|--| 
|对端VPC ID|填写VPC Peering对端VPC的ID|vpc-ofxxrkkw0r|
|描述|设置VPC Peering的描述，描述只支持中文、数字、大小写字母及英文下划线“_”且不能超过256个字符|从VPC1到VPC2|

步骤4：补充完相关信息后，点击【确定】按钮，完成VPC Peering一端创建；

步骤5：VPC对等连接创建完成后，需要配置路由，支持立即配置或稍后配置，本例选择【立即配置】，稍后配置请参考[配置路由策略](Route-Table-Configuration.md)

步骤6：定位本端VPC下的路由表，点击路由表名称进入详情页；

步骤7：选择【路右策略】tab，点击【编辑】按钮，点击【新增一条】按钮添加路由策略；

步骤8：补充配置项信息，目的端填写对等VPC的网段，下一跳类型选择【VPC对等连接】，下一跳选择上述步骤中创建的VPC对等连接，编辑描述信息；

步骤9：点击【保存】，确认信息无误后，点击【确认】按钮；

步骤10：将路由表绑定至需要与对端网络连通的子网上，路由表只有绑定子网后路由策略才会生效。

步骤11：将对端私有网络作为本端VPC重复上述步骤，创建对端私有网络的VPC对等连接并配置路由策略。

完成上述步骤后，两端VPC下的资源支持通过内网通信。



#### 删除VPC对等连接

删除VPC对等连接会断开与对端VPC的连接。请您在确保已与对端VPC管理员充分沟通的前提下进行该操作。

步骤1：进入[京东云控制台](https://console.jdcloud.com/overview)，点击左侧导航条选择 网络->【私有网络】-> 【VPC对等连接】，进入VPC对等连接列表页；

步骤2：选择要删除的VPC对等连接，点击【删除】按钮进入删除VPC对等连接窗口，点击确认，完成删除VPC对等连接操作。

## 相关参考

- [VPC对等连接](../Introduction/Features/VPC-Peering-Features.md)
- [配置路由表](Route-Table-Configuration.md)
- [使用限制](../Introduction/Restrictions.md)
- [常见问题](../FAQ/FAQ.md)
