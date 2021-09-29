# 修改网络配置

如在创建实例时选错VPC/子网，亦或在与其他网络环境打通时存在IP地址冲突，可通过修改网络配置功能调整实例的内网IP地址，进而实现网络的重新规划。
修改后**启动实例生效**。<br>

>提示：<br>
>1. 修改网络配置功能目前为灰度开放，如需使用请提交工单申请；<br>
>2. 宿迁地域暂不支持此功能。

## 前提条件及限制
* 实例必须处于**已停止**状态。若实例处于**运行中**状态，请先停止实例；若实例处于其他非稳定状态，还请等待前序操作执行完成后再操作调整；
* 不能调整已加入负载均衡-后端服务器组的实例。如需调整，请先从后端服务器组中移除；
* 调整的目标子网中须有可用内网IP地址；
* 绑定弹性网卡的实例不支持修改VPC，仅支持在同VPC下修改子网和内网IP，如需修改VPC请先解绑弹性网卡；
* 高可用组内的实例（包括K8S工作节点组内的实例）不支持修改VPC，仅支持在同VPC下修改子网和内网IP；
* 主网卡分配了辅助内网IP的实例不支持修改VPC和子网，仅支持在同子网下修改内网IP，如需修改VPC或子网请先释放辅助内网IP；
* 如修改VPC则必须重新指定目标VPC下的安全组进行绑定，如在同VPC下调整，则不支持调整同时修改安全组。

## 操作步骤
1、访问[云主机控制台](https://cns-console.jdcloud.com/host/compute/list)，即进入实例列表页面。或访问[京东云控制台](https://console.jdcloud.com)点击左侧顶部导航 **弹性计算-云主机** 进入实例列表页。<br>
2、在停止状态下点击 **操作-更多-修改网络配置** 按钮。<br>
3、在弹窗中选择调整方式，修改网络配置支持以下三种形式的调整：

* [不修改VPC和子网，仅调整内网IP地址](Modify-VPC-Attribute#user-content-method1)
* [不修改VPC，仅修改子网](Modify-VPC-Attribute#user-content-Method2)
* [修改VPC及子网](Modify-VPC-Attribute#user-content-Method3)

### <div id="user-content-method1">① 不修改VPC和子网，仅调整内网IP地址</div>
* 调整方式选择“同子网修改内网IP”；<br>
* 此调整方式下仅支持重新指定内网IPv4地址，且须自定义，其他属性均不支持调整。<br>

<div align="center"><img src="https://img1.jcloudcs.com/cn/image/vm/iv-modifyvpc1.png" width="600"></div>

<div id="user-content-method2"></div>

### ② 不修改VPC，仅修改子网
* 调整方式选择“同VPC修改子网”；<br>
* 在当前VPC下重新选择子网，并指定内网IPv4地址的分配方式；<br>
* 如新选子网支持IPv6，可选择是否分配IPv6地址。<br>

<div align="center"><img src="https://img1.jcloudcs.com/cn/image/vm/iv-modifyvpc2.png" width="600"></div>

<div id="user-content-method3"></div>

### ③ 修改VPC及子网
* 调整方式选择“修改VPC和子网”；<br>
* 重新选择VPC和子网，并指定内网IPv4地址的分配方式；<br>
* 如新选子网支持IPv6，可选择是否分配IPv6地址；<br>
* 选择新VPC下的安全组，最多可同时指定5个。

<div align="center"><img src="https://img1.jcloudcs.com/cn/image/vm/iv-modifyvpc3.png" width="600"></div>

4、点击【确定】调整，控制台实例相关网络信息即刻更新，但须启动实例才可在实例系统内生效。

