## 通过VPN连接，实现京东云跨地域资源互通
本教程将为您介绍如何通过京东智联云IPsec VPN，建立京东智联云VPC到跨地域VPC的内网安全访问，同地域访问建议使用VPC Peering，或直接通过边界网关进行互通。

### 业务场景
客户基于业务可用性的角度考虑，将业务部署到京东云的多个不同地域，多个地域的业务之间需要互相访问或实现故障切换/灾备。<br />
![](../../../../image/Networking/VPN/Best-Practices/connection-with-jdcloud.png)

### 前置条件
京东智联云本端VPC内的网段与对端跨地域的VPC内的网段不能重叠。

### 注意事项
* 京东智联云VPN连接之间互通只能使用静态路由，由于两端边界网关的BGP ASN相同，以及隧道内层地址不支持自定义指定，故不能基于EBGP建立动态路由；

### 详细步骤
###### 步骤1.在京东智联云本端地域创建边界网关

a)登录[边界网关控制台](https://cns-console.jdcloud.com/host/borderGateway/list)；  <br />
b)选择使用VPN的本端地域，点击创建边界网关；<br />
c)边界网关支持运行BGP路由协议，当前边界网关的BGP ASN固定为65000，后续会开放修改；<br />

更多内容，详见[边界网关管理](../Operation-Guide/Border-Gateway-Management/Border-Gateway-Configuration.md).

###### 步骤2.在京东智联云本端地域创建VPC接口

a)登录[VPC接口控制台](https://cns-console.jdcloud.com/host/vpcAttachment/list)；  <br />
b)选择使用VPN的本端地域，点击创建VPC接口；<br />
c)选择步骤1中创建的边界网关，选择要通过该边界网关路由流量的VPC，选择要传播到该边界网关中的VPC网段，创建VPC接口后，被选择的网段将自动添加到该边界网关的传播路由表中，下一跳指向此步骤创建的VPC接口；<br />

更多内容，详见[VPC接口管理](../Operation-Guide/Border-Gateway-Management/VPC-Attachment-Configuration.md)。

###### 步骤3.在京东智联云本端地域创建客户网关

a)登录[客户网关控制台](https://cns-console.jdcloud.com/host/customerGateway/list)；  <br />
b)选择使用VPN的本端地域，点击创建客户网关；<br />
c)客户网关是客户端VPN设备在云端的逻辑表示，客户将基于边界网关和客户网关创建VPN连接。客户网关本身仅代表客户端设备的相关信息(``只涉及公网地址和BGP ASN，无具体地理位置的概念``)，理论上并没有地域的属性，但由于云内资源几乎都有地域的属性，故也为客户网关分配了地域属性。相同配置的客户网关可以在不同地域重复创建，仅在创建资源的地域内可用，地域之间互不影响。<br />
d)若客户端设备支持BGP路由协议，推荐使用BGP路由，此处请指定客户端的BGP ASN，京东智联云的边界网关当前仅支持固定的BGP ASN，故两个边界网关之间无法运行EBGP路由，仅支持运行静态路由；<br />
e)客户端配置两个公网地址，并任意指定两个公网可路由的地址，待对端地域的VPN Connection分配了公网地址后，需要对京东智联云本端地域的客户网关公网地址进行更新；<br />

更多内容，详见[客户网关管理](../Operation-Guide/Customer-Gateway-Management/Customer-Gateway-Configuration.md)。

###### 步骤5.在京东智联云对端地域创建边界网关

a)登录[边界网关控制台](https://cns-console.jdcloud.com/host/borderGateway/list)；  <br />
b)选择使用VPN的对端地域，点击创建边界网关；<br />
c)边界网关支持运行BGP路由协议，当前边界网关的BGP ASN固定为65000，后续会开放修改；<br />

更多内容，详见[边界网关管理](../Operation-Guide/Border-Gateway-Management/Border-Gateway-Configuration.md).

###### 步骤6.在京东智联云对端地域创建VPC接口

a)登录[VPC接口控制台](https://cns-console.jdcloud.com/host/vpcAttachment/list)；  <br />
b)选择使用VPN的对端地域，点击创建VPC接口；<br />
c)选择步骤5中创建的边界网关，选择要通过该边界网关路由流量的VPC，选择要传播到该边界网关中的VPC网段，创建VPC接口后，被选择的网段将自动添加到该边界网关的传播路由表中，下一跳指向此步骤创建的VPC接口；<br />

更多内容，详见[VPC接口管理](../Operation-Guide/Border-Gateway-Management/VPC-Attachment-Configuration.md)。

###### 步骤7.在京东智联云对端地域创建客户网关

a)登录[客户网关控制台](https://cns-console.jdcloud.com/host/customerGateway/list)；  <br />
b)选择使用VPN的对端地域，点击创建客户网关；<br />
c)客户网关是客户端VPN设备在云端的逻辑表示，客户将基于边界网关和客户网关创建VPN连接。客户网关本身仅代表客户端设备的相关信息(``只涉及公网地址和BGP ASN，无具体地理位置的概念``)，理论上并没有地域的属性，但由于云内资源几乎都有地域的属性，故也为客户网关分配了地域属性。相同配置的客户网关可以在不同地域重复创建，仅在创建资源的地域内可用，地域之间互不影响。<br />
d)若客户端设备支持BGP路由协议，推荐使用BGP路由，此处请指定客户端的BGP ASN，京东智联云的边界网关当前仅支持固定的BGP ASN，故两个边界网关之间无法运行EBGP路由，仅支持运行静态路由；<br />
e)客户端配置两个公网地址，并任意指定两个公网可路由的地址，待本端地域的VPN Connection分配了公网地址后，需要对京东智联云对端地域的客户网关公网地址进行更新；<br />

更多内容，详见[客户网关管理](../Operation-Guide/Customer-Gateway-Management/Customer-Gateway-Configuration.md)。

###### 步骤8.在京东智联云对端地域创建VPN连接

a)登录[VPN连接控制台](https://cns-console.jdcloud.com/host/vpnConnection/list)；  <br />
b)选择使用VPN的对端地域，点击创建VPN连接；<br />
c)选择用于创建VPN连接的边界网关；<br />
d)选择表示客户端VPN设备的客户网关；<br />
e)选择连接类型，当前仅支持配置均为IPv4地址簇的隧道内外层地址，未来会支持IPv6地址簇；<br />
f)选择是否启用BGP路由，基于业务高可用的考虑，默认启用BGP路由，静态路由仍然可生效，建议将启用BGP路由前面的勾去掉；<br />
g)创建VPN连接后，会自动分配两个云端公网地址，用于和客户端公网地址间建立VPN隧道；<br />

更多内容，详见[VPN连接管理](../Operation-Guide/VPN-Connection-Management/VPN-Connection-Configuration.md)。

###### 步骤9.在京东智联云本端地域更新客户网关公网地址

以对端地域的VPN Connection分配的两个云端公网地址来更新本端地域的客户网关的两个公网地址。

###### 步骤10.在京东智联云本端地域创建VPN连接

a)登录[VPN连接控制台](https://cns-console.jdcloud.com/host/vpnConnection/list)；  <br />
b)选择使用VPN的本端地域，点击创建VPN连接；<br />
c)选择用于创建VPN连接的边界网关；<br />
d)选择表示客户端VPN设备的客户网关；<br />
e)选择连接类型，当前仅支持配置均为IPv4地址簇的隧道内外层地址，未来会支持IPv6地址簇；<br />
f)选择是否启用BGP路由，基于业务高可用的考虑，默认启用BGP路由，静态路由仍然可生效，建议将启用BGP路由前面的勾去掉；<br />
g)创建VPN连接后，会自动分配两个云端公网地址，用于和客户端公网地址间建立VPN隧道；<br />

更多内容，详见[VPN连接管理](../Operation-Guide/VPN-Connection-Management/VPN-Connection-Configuration.md)。

###### 步骤11.在京东智联云对端地域更新客户网关公网地址

以本端地域的VPN Connection分配的两个云端公网地址来更新对端地域的客户网关的两个公网地址。

###### 步骤12.在京东智联云本端地域创建VPN隧道

a)登录[VPN连接控制台](https://cns-console.jdcloud.com/host/vpnConnection/list)；  <br />
b)选择使用VPN的本端地域，选择VPN连接；<br />
c)点击“资源信息”Tab中的“添加隧道”，自动初始化两条隧道的创建页面，第一条隧道的两端公网地址是VPN连接的云端公网地址中的第一个，以及客户网关公网地址中的第一个，第二条隧道的两端公网地址是云端公网地址的第二个和客户网关公网地址中的第二个； <br />
d)同一VPN连接下的所有VPN隧道使用相同的路由方式，即在VPN连接上设置的路由方式；<br />
e)为每个VPN隧道分别配置两阶段协商所使用的参数，包括IKE版本、预共享密钥、隧道两端网关标识、隧道内层IP(用于隧道内路由数据包，静态路由由于是使用的点对点隧道，故内层地址不生效，且在此场景下会冲突，忽略即可)，以及两阶段的认证算法、加密算法、SA声明周期等；<br />

```
  基于安全性和性能的综合考虑，给出了默认的隧道IKE和IPsec推荐配置，建议客户按推荐配置协商建立VPN隧道。
```

f)同时创建多条隧道时，其它隧道可复用隧道1的IKE和IPsec配置参数，以简化配置过程，同时也可以自定义每个隧道的IKE和IPsec配置参数；<br />

更多内容，详见[VPN隧道管理](../Operation-Guide/VPN-Connection-Management/VPN-Tunnel-Configuration.md)。

###### 步骤13.在京东智联云对端地域创建VPN隧道

a)登录[VPN连接控制台](https://cns-console.jdcloud.com/host/vpnConnection/list)；  <br />
b)选择使用VPN的对端地域，选择VPN连接；<br />
c)点击“资源信息”Tab中的“添加隧道”，自动初始化两条隧道的创建页面，第一条隧道的两端公网地址是VPN连接的云端公网地址中的第一个，以及客户网关公网地址中的第一个，第二条隧道的两端公网地址是云端公网地址的第二个和客户网关公网地址中的第二个； <br />
d)同一VPN连接下的所有VPN隧道使用相同的路由方式，即在VPN连接上设置的路由方式；<br />
e)根据本端地域创建VPN隧道时指定的配置，为对端地域每个VPN隧道分别配置两阶段协商所使用的参数，包括IKE版本、预共享密钥、隧道两端网关标识、隧道内层IP(用于隧道内路由数据包，静态路由由于是使用的点对点隧道，故内层地址不生效，且在此场景下会冲突，忽略即可)，以及两阶段的认证算法、加密算法、SA声明周期等；<br />

```
  基于安全性和性能的综合考虑，给出了默认的隧道IKE和IPsec推荐配置，建议客户按推荐配置协商建立VPN隧道。
```

f)同时创建多条隧道时，其它隧道可复用隧道1的IKE和IPsec配置参数，以简化配置过程，同时也可以自定义每个隧道的IKE和IPsec配置参数；<br />

更多内容，详见[VPN隧道管理](../Operation-Guide/VPN-Connection-Management/VPN-Tunnel-Configuration.md)。

###### 步骤8.在京东智联云配置路由

a)京东智联云VPN连接支持在云端和客户端之间使用静态路由/BGP动态路由，此处请使用静态路由；<br />
b)不同路由的配置方式：<br />
  * 配置静态路由，在边界网关的静态路由表中配置去往客户端的静态路由，目的端为客户端网段，下一跳为VPN连接。在客户端VPN设备上配置去往云端的静态路由，目的端为云端网段，下一跳为VPN隧道的接口；<br />
  * 配置BGP动态路由，边界网关和客户端VPN设备建立BGP会话后，边界网关会自动将已配置的所有路由全部发布到Peer客户端，客户端需发布客户端网段路由到Peer云端。<br />
c)无论边界网关和客户端VPN设备间运行何种路由协议，由于边界网关和VPC间创建了VPC接口并设置了路由传播，故去往客户端网段的路由也会自动传播到VPC路由表，参见[VPC接口路由传播](https://docs.jdcloud.com/cn/direct-connection/vpc-interface-features)；<br />

更多内容，详见[配置边界网关路由](../Operation-Guide/Route-Management/Border-Gateway-Route-Configuration.md)和[配置VPC路由](../Operation-Guide/Route-Management/VPC-Route-Configuration.md)。

###### 步骤9.测试连通性

a)登录[京东智联云主机控制台](https://cns-console.jdcloud.com/host/compute/list)，在创建了VPN连接的地域下，要和对端地域VPC内网网段互通的本端VPC中创建一台云主机，确认该云主机所在子网的路由表中存在正确去往对端地域VPC内网网段的路由；  <br />
b)以a中相同的方式在对端地域的VPC中创建云主机并配置相应的去往本端地域VPC的路由； <br />
b)使用a中创建的云主机ping b中创建的云主机的内网地址，验证内网通信是否正常，通过后再执行反向ping测试，通过后即可正常使用；<br />
