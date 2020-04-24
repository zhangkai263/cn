## 基础架构

#### 概述

专线服务整体架构图如下：

 ![](../../../../image/Networking/Direct-Connect-Service/Introduction/Infrastructure.png)

#### 专线服务的组件

专线连接(Direct Connect)：
  - 物理连接(Connection)：用于连接京东云机房和客户IDC机房的物理链路。
  - 专线通道(Private Virtual Interface)：用于连接企业IDC和公有云的逻辑链路。

  托管连接(Hosted Connect)：
  - 托管专线(Hosted Connection)：用于连接京东云机房和客户所在的京东云托管区的物理链路。
  - 托管通道(Hosted Private Virtual Interface)：用于连接托管区和公有云的逻辑链路。

边界网关(BGW，Border Gateway)：承载VPC之间、VPC与外部环境进行南北向内网通信的网关，目前已承载的功能为专线连接、托管连接、VPN连接。

VPC接口(VPC Attachment)：京东云VPC与边界网关之间的互联接口。

#### 高可用架构

专线服务的所有组件全部采用/支持高可用架构设计，其中：

- 物理连接/托管专线，建议客户在同地域接入两根以上的物理链路，以保障物理链路的高可用性。
- 边界网关，客户创建边界网关时，会默认创建双活模式的边界网关。
- 专线通道/托管通道，客户创建通道时，会默认创建双活模式的专线通道/托管通道。
