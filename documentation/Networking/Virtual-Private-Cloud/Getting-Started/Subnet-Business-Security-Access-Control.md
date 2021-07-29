## **子网业务安全访问控制**

## 操作场景

通过此教学您可以在京东云完成基础的网络模型部署并对其访问进行控制，本教程将网络分为三层，分别是负责对外的WEB层、负责逻辑的APP层、负责数据的DB层。其中WEB层只能与公网和APP层互通，APP层只能与WEB层和DB层互通，DB层只能与APP层互通。完成后可获得以下资源：

- 1个私有网络
- 3个子网
- 3个ACL

## 前提条件及限制

- 确保您已经[注册京东云账号](https://user.jdcloud.com/register?returnUrl=https%3A%2F%2Fwww.jdcloud.com%2F)，并实现[实名认证](https://docs.jdcloud.com/cn/real-name-verification/introduction)；


## **操作步骤**

- [创建私有网络](Subnet-Business-Security-Access-Control#user-content-1)
- [创建子网WEB层、APP层、DB层子网](Subnet-Business-Security-Access-Control#user-content-2)
- [配置并绑定ACL](Subnet-Business-Security-Access-Control#user-content-3)
- [第一步：创建私有网络](Subnet-Business-Security-Access-Control#user-content-1)
- [第一步：创建私有网络](Subnet-Business-Security-Access-Control#user-content-1)
- [第一步：创建私有网络](Subnet-Business-Security-Access-Control#user-content-1)

### **创建私有网络**

<div id="user-content-1"> </div>

步骤1：进入[京东云控制台](https://console.jdcloud.com/overview)，点击左侧导航条选择 网络->【私有网络】，进入私有网络列表页；
步骤2：点击【创建】按钮，弹出创建配置窗口；
步骤3：根据需求选择的地域，填写名称，填写CIDR，点击创建即可获得1个私有网络，本教程中将该私有网络的CIDR设置为10.0.0.0/16。更多详细步骤可参考[配置VPC](../Operation-Guide/VPC-Configuration.md)。



### **创建子网WEB层、APP层、DB层子网**

<div id="user-content-2"> </div>


步骤1：进入[京东云控制台](https://console.jdcloud.com/overview)，点击左侧导航条选择 网络->【私有网络】-> 【子网】，进入子网列表页；

步骤2：选择创建子网所属地域，点击【创建】按钮，进入创建弹窗；

步骤3：输入子网名称、子网CIDR、关联的路由表、描述等信息，点击【确定】按钮。更多详细步骤请参考[子网配置](../Operation-Guide/Subnet-Configuration.md)重复三遍即可获得3个子网。本教程中将WEB层子网CIDR设置为10.0.1.0/24，APP层子网CIDR设置为10.0.1.0/24，DB层子网CIDR设置为10.0.2.0/24。


### **配置并绑定ACL**

<div id="user-content-3"> </div>


#### 创建ACL

步骤1：进入[京东云控制台](https://console.jdcloud.com/overview)，点击左侧导航条 【私有网络 】-> 【网络ACL】，进入网络ACL列表页面

步骤2：点击【创建】按钮，弹出网络ACL创建弹框；

步骤3：选择VPC，并输入网络ACL名称、描述，确定信息无误后，点击【确认】按钮；详细操作请参考[ACL配置](../Operation-Guide/Network-ACL-Configuration.md)，重复三次创建三个网络ACL，本教程分别命名WEB层ACL、APP层ACL、DB层ACL。

#### **WEB层ACL配置**

##### 配置入站规则

步骤1：配置WEB层与APP层之间入站允许规则，将优先级设为200，类型设为ALL traffic，源IP设为10.0.1.0/24，策略设为接受。
步骤2：配置WEB层与该VPC内其他网段之间入站拒绝规则，将优先级设为10000，类型设为ALL traffic，源IP设为10.0.0.0/16，策略设为拒绝。
步骤3：配置WEB层与公网之间入站允许规则，将优先级设为20000，类型设为ALL traffic，源IP设为0.0.0.0/0，策略设为接受。


##### 配置出站规则

步骤1：配置WEB层与APP层之间出站允许规则，将优先级设为200，类型设为ALL traffic，目的IP设为10.0.1.0/24，策略设为接受。
步骤2：配置WEB层与该VPC内其他网段之间出站拒绝规则，将优先级设为10000，类型设为ALL traffic，目的IP设为10.0.0.0/16，策略设为拒绝。
步骤3：配置WEB层与公网之间出站允许规则，将优先级设为20000，类型设为ALL traffic，目的IP设为0.0.0.0/0，策略设为接受。

#### **ACL关联子网**

步骤1：在网络ACL列表页面，点击【关联子网】按钮；

步骤2：在弹窗中选择WEB层子网；

    注：一个网络ACL可以绑定多个子网、一个子网只能绑定一个网络ACL。

步骤3：点击【确定】，即可将网络ACL规则绑定到子网，绑定完成后及时生效。



#### **APP层ACL配置**

##### 配置入站规则

步骤1：配置APP层与WEB层之间入站允许规则，将优先级设为200，类型设为ALL traffic，源IP设为10.0.0.0/24，策略设为接受。
步骤2：配置APP层与DB层之间入站允许规则，将优先级设为300，类型设为ALL traffic，源IP设为10.0.2.0/24，策略设为接受。
步骤3：配置APP层与该VPC内其他网段之间入站拒绝规则，将优先级设为10000，类型设为ALL traffic，源IP设为10.0.0.0/16，策略设为拒绝。

##### 配置出站规则

步骤1：配置APP层与WEB层之间出站允许规则，将优先级设为200，类型设为ALL traffic，目的IP设为10.0.0.0/24，策略设为接受。
步骤2：配置APP层与DB层之间出站允许规则，将优先级设为300，类型设为ALL traffic，目的IP设为10.0.2.0/24，策略设为接受。
步骤3：配置APP层与该VPC内其他网段之间出站拒绝规则，将优先级设为10000，类型设为ALL traffic，目的IP设为10.0.0.0/16，策略设为拒绝。

重复关联子网步骤，将APP层子网与APP层ACL关联起来。



#### **DB层ACL配置**

##### 配置入站规则

步骤1：配置DB层与APP层之间入站允许规则，将优先级设为200，类型设为ALL traffic，源IP设为10.0.1.0/24，策略设为接受。
步骤2：配置DB层与该VPC内其他网段之间入站拒绝规则，将优先级设为10000，类型设为ALL traffic，源IP设为10.0.0.0/16，策略设为拒绝。


##### 配置出站规则

步骤1：配置DB层与APP层之间出站允许规则，将优先级设为200，类型设为ALL traffic，目的IP设为10.0.1.0/24，策略设为接受。
步骤2：配置DB层与该VPC内其他网段之间出站拒绝规则，将优先级设为10000，类型设为ALL traffic，目的IP设为10.0.0.0/16，策略设为拒绝。


重复关联子网步骤，将DB层子网与DB层ACL关联起来。

完成上述操作，即可完成基于子网级别的访问进行控制，保障业务安全运行。

## 相关参考

- [ACL概述]()
- [ACL配置](../Operation-Guide/Network-ACL-Configuration.md)
- [安全组概述](../Introduction/Features/Security-Group-Features.md)
- [安全组配置](../Operation-Guide/Security-Group-Configuration.md)
