# 使用限制
本文将详细介绍私有网络、子网、安全组、路由表、ACL、VPCpeering资源的配额及相关使用限制。
- [私有网络（VPC）](restrictions#user-content-1)
- [子网](restrictions#user-content-2)
- [路由表](restrictions#user-content-3)
- [安全组](restrictions#user-content-4)
- [ACL](restrictions#user-content-5)
- [VPC对等连接](restrictions#user-content-6)
- [可用区限制](restrictions#user-content-7)

## 私有网络（VPC）

<div id="user-content-1"> </div>

**限制**

- VPC有地域属性，不支持跨地域部署，例如横跨华东-上海地域和华北-北京地域；
- VPC不支持组播或广播；
- VPC可以包含多个子网，每个子网的网络块均为私有网络CIDR的子集，多个子网的CIDR网络块不可以重叠。；
- VPC中添加云主机时，系统默认会在指定子网内为该实例随机分配一个可用的内网 IP，用户也可指定所选子网内未分配的内网IP进行分配；
- 支持创建IPv4/IPv6双栈VPC，不支持创建仅支持IPv6的私有网络；
- 不支持IPv4私有网络直接转换成双栈VPC；
- 预设CIDR的VPC创建后，不支持修改CIDR；
- 删除VPC前须删除其关联的子网、路由表、安全组、ACL等资源。

**配额**
| 资源	| 限制	| 特殊配额及需求	|
| :---- | :----| :---- |
|VPC CIDR掩码范围	|16至28	| [工单申请](https://ticket.jdcloud.com/applyorder/form?cateId=1135&questionId=1155)	|
|同一地域内私有网络个数	|10	| [工单申请](https://ticket.jdcloud.com/applyorder/form?cateId=1135&questionId=1155)	|


## 子网

<div id="user-content-2"> </div>

**限制**

- 子网创建后，CIDR网络块不可修改；
- 同一个VPC下的子网CIDR不可重叠；
- 边缘子网和标准子网的资源之间内网不互通，不同边缘可用区的资源之间内网不互通；
- 子网CIDR的第一个地址为网络地址，最后一个地址为广播地址，第二个和第三个IP地址已被京东云预留用作网络的管理，例如子网的CIDR为10.1.0.0/24，其中10.1.0.0为网络地址，10.1.0.255为广播地址，10.1.0.1和10.1.0.2被京东云预留，用户是不可以使用的，故该子网的可用IP个数为252；
- 删除子网资源前须删除其关联的云主机、负载均衡、VPC对等连接。

**配额**

| 资源	| 限制	| 特殊配额及需求	|
| :---- | :----| :---- |
|子网CIDR掩码范围	|16至28	| 不可修改	|
|每个VPC内子网个数	|10	| [工单申请](https://ticket.jdcloud.com/applyorder/form?cateId=1135&questionId=1155)	|



## 路由表

<div id="user-content-3"> </div>

**限制**

- 每个子网必须关联一张路由表，每张路由表可以关联多个子网；
- 默认路由表及已经关联了子网的自定义路由表不支持删除；
- 默认 Local 路由规则不可编辑、不可删除；
- 不支持动态路由协议。
- 路由表只能关联相同属性的子网，即已关联标准子网的路由表，不能再关联边缘子网，已关联边缘子网的路由表，不能再关联标准子网，也不能关联不同边缘可用区的边缘子网。




**配额**

| 资源	| 限制	| 特殊配额及需求	|
| :---- | :----| :---- |
|同VPC内路由表张数	|10	| [工单申请](https://ticket.jdcloud.com/applyorder/form?cateId=1135&questionId=1155)	|
|每个子网可以关联路由表的张数	|1	| 不可修改	|
|每张路由表的静态路由规则数	|50	| [工单申请](https://ticket.jdcloud.com/applyorder/form?cateId=1135&questionId=1155)	|
|每张路由表的传播路由规则数（包括未生效的传播路由数）	|100	| [工单申请](https://ticket.jdcloud.com/applyorder/form?cateId=1135&questionId=1155)	|


## 安全组
<div id="user-content-4"> </div>

**限制**

- 一个云资源最多能绑定5个安全组；
- 默认的安全规则不支持修改或删除；
- 安全组规则入方向：拒绝所有流量，出方向：由于内部服务需要，开放TCP 80端口及UDP 67、68、161端口，其余流量均拒绝；
- 自定义的安全组规则策略始终是“允许”；您无法创建“拒绝”访问的规则；
- 安全组是有状态的————如果您配置出站规则允许云主机向外部发送一个请求，则无论入站安全组规则如何，都将允许该请求的响应流量流入，反之亦然。


**配额**
| 资源	| 限制	| 特殊配额及需求	|
| :---- | :----| :---- |
|同VPC内安全组个数	|50	| [工单申请](https://ticket.jdcloud.com/applyorder/form?cateId=1135&questionId=1155)	|
|每个安全组双向规则数(进站+出站)	|100	| [工单申请](https://ticket.jdcloud.com/applyorder/form?cateId=1135&questionId=1155)	|
|每个主机实例可以关联的安全组个数	|5	| [工单申请](https://ticket.jdcloud.com/applyorder/form?cateId=1135&questionId=1155)	|
|一个安全组绑定资源数|无限制|--|

## ACL

<div id="user-content-5"> </div>

**限制**

- 每个子网同时只能绑定一个ACL；
- 默认的出入站规则不支持修改或删除。

**配额**

| 资源	| 限制	| 特殊配额及需求	|
| :---- | :----| :---- |
|每个子网可以关联的ACL个数	|1	| 不可修改	|
|同VPC内ACL个数	|20	| [工单申请](https://ticket.jdcloud.com/applyorder/form?cateId=1135&questionId=1155)	|
|每个ACL双向规则数(进站+出站)	|100	| [工单申请](https://ticket.jdcloud.com/applyorder/form?cateId=1135&questionId=1155)	|

## VPC对等连接

<div id="user-content-6"> </div>

**限制**

- 要使对等连接两端实现通信，必须保证本端和对端的相关路由表上配置相关路由规则；
- 支持同地域下VPC之间创建VPC对等连接，不支持跨地域创建VPC对等连接；
- 支持同地域跨账号创建VPC对等连接；
- 对等连接的两端私有网络 CIDR 不可以重叠，重叠时创建会报错；
- 对等连接任意一方可以随时中断对等连接，中断后两个私有网络间流量则立即中断；
- 同地域对等连接无带宽上限。

**配额**
| 资源	| 限制	| 特殊配额及需求	|
| :---- | :----| :---- |
|每个VPC可以建立的VPC对等连接数	|10	| [工单申请](https://ticket.jdcloud.com/applyorder/form?cateId=1135&questionId=1155)	|
|相同的两个VPC间可以创建的VPC对等连接个数	|1	| 不可修改	|


## 可用区限制

<div id="user-content-7"> </div>

- 在独立边缘可用区支持产品：边缘子网、边缘公网IP、ACL、安全组、路由表、本地存储云主机、虚机镜像和SSH密钥等，暂不支持NAT网关、LB、BGW、VPN和原生容器等产品；

- 路由表只能关联多个标准子网，或者关联相同独立边缘可用区的边缘子网；

- 边缘子网和标准子网的资源之间内网不互通，不同独立边缘可用区的资源之间内网不互通。

## 购买门槛限制

购买门槛只涉及计费产品，免费产品不受购买门槛限制，具体计费产品请参考[门槛说明](https://docs.jdcloud.com/cn/billing/postpay)

## 相关参考
- [常见问题](../FAQ/FAQ.md)
- [配置VPC](../Operation-Guide/VPC-Configuration.md)
- [配置子网](../Operation-Guide/Subnet-Configuration.md)
- [配置路由表](../Operation-Guide/Route-Table-Configuration.md)
- [配置安全组](../Operation-Guide/Security-Group-Configuration.md)
- [配置ACL](../Operation-Guide/Network-ACL-Configuration.md)
- [地域及可用区](Region-Az.md)
- [计费概览](../Pricing/Billing-Overview.md)
