# **多主机共享公网IP**

## 应用场景

实现相同VPC下的多台主机通过一台作为NAT网关的主机访问公网，共享IP带宽。假定目前存在VPC名为NAT01（10.1.0.0/16），下属两个子网：SNAT01(10.1.1.0/24)、SNAT02(10.1.2.0/24)，SNAT02下存在多台主机，实现子网SNAT02下的多台主机可通过子网SNAT01下一台作为NAT GW的主机上网。

## 前提条件及限制

- 确保您已经[注册京东云账号](https://user.jdcloud.com/register?returnUrl=https%3A%2F%2Fwww.jdcloud.com%2F)，并实现[实名认证](https://docs.jdcloud.com/cn/real-name-verification/introduction)；
- 确保您已经创建一个私有网络，且已经创建两个子网；
- 
- 确保您有足够的资源配额，如配额已满。可通过[工单申请](https://ticket.jdcloud.com/applyorder/submit)提升配额。

## 操作步骤

### 子网下创建一台作为NAT网关的主机

步骤1：访问[云主机控制台](https://cns-console.jdcloud.com/host/compute/list)，即进入实例列表页面。或访问[京东云控制台](https://console.jdcloud.com)点击顶部导航栏**弹性计算-云主机**进入实例列表页。
步骤2：选择地域，点击【创建】进入主机创建页，需要实例规格、镜像、私有网络、安全组信息等，镜像镜像选择CentOS-7.2 64位 NAT Gateway，子网选择SNAT01；

步骤3：配置公网IP类型、带宽

步骤4：点击【立即购买】按钮则触发购买，支付完成即完成创建主机。

更多操作请参考[创建云主机](../../..//Elastic-Compute/Virtual-Machines/Operation-Guide/Instance/Create-Instance.md)

```
注：可通过创建NAT网关实现多主机共享公网IP，具体请参考NAT网关操作指南。
```


**配置子网的路由表**

配置子网SNAT02的路由表，配置路由策略指向NAT网关，
步骤1：打开控制台，选择 网络 -> 【私有网络】 -> 【路由表】，进入路由表列表页；

步骤2：定位需要配置路由规则的路由表，点击路由表名称进入路由表详情页，点击路由策略进入路由规则页签，点击【编辑】按钮，管理路由表规则；

步骤3：点击【新增一条】添加路由策略；补充相应的配置项，下一跳类型：云主机，下一跳：上述创建的主机；

配置完成后，子网SNAT02下的所有主机都可以通过作为NAT网关的主机进行公网访问。

同理，可配置相同VPC下其他的子网路由。

**注意：如主机需要通过NAT网关通信，不能选择与主机所在子网绑定同一张路由表的子网内的主机作为NAT网关。**

## 相关参考
- [创建云主机](../../../Elastic-Compute/Virtual-Machines/Operation-Guide/Instance/Create-Instance.md)
- [创建NAT网关](https://docs.jdcloud.com/cn/nat-gateway/create-nat-gateway)
- [云主机使用NAT网关](https://docs.jdcloud.com/cn/nat-gateway/create-natgateway)
