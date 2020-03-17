## Cisco防火墙设备专线配置
``以专线连接为例，托管连接配置方式同专线连接。``
在[专线通道控制台](https://cns-console.jdcloud.com/host/dedicatedVif/list)创建专线通道后，还需要在客户本地设备上进行相应配置才可以协商建立业务通道。

本文以Cisco支持三层子接口的设备为例，讲述如何在客户端设备上配置专线，请Cisco支持三层子接口的设备参考此示例进行配置。

网络拓扑示例如下(``建议通过两条专线接入公有云，以下拓扑及操作步骤的配置仅为示例，实际配置时，请将示例配置项中的值替换为您使用的实际参数值``)：

|  | 云端 | 企业IDC |
|:---:|:---:|:---:|
| 互通网段 | 192.168.0.0/24 | 10.0.0.0/16 |
| vlanId | 10 | 10 |
| BGP ASN | 64512 | 65001 |
| 互联地址 | 172.16.0.2/30 | 172.16.0.1/30 |
|  | 172.16.0.6/30 | 172.16.0.5/30 |

#### 主要配置步骤
1.登录防火墙设备的命令行配置界面，参考如下配置信息进行配置vlan及BGP信息：
```
  # 端口1配置第一对互联
  interface Ethernet1/1
    no switchport
    speed 1000
    no negotiate auto

  interface Ethernet1/1.10  //用C-tag建立子接口
    description customer_primary_link
    ip address 172.16.0.1  255.255.255.252  //配置接口地址，使用第一个地址
    encapsulation dot1Q 10    //配置dot1q封装，使用c-tag

  router bgp 65001  //配置BGP协议，自治系统号
  bgp router-id <loopback>   //配置 BGP router-id, 使用loopback口地址
  bgp log-neighbor-changes   //configure log neighbor changes

  neighbor 172.16.0.2/30   //配置BGP邻居关系
    remote-as 64512             //指定邻居的AS号
    description Primary_line_peer  //describe neighbor
    ebgp-multihop 2                //配置EBGP多跳
    address-family ipv4 unicast

  address-family ipv4 unicast
    network 10.0.0.0 255.255.0.0  //宣告需要访问云VPC的子网

    # 端口2/另一台路由器配置第二对互联，若设备仅支持一个物理端口配置，请在以上的子接口中使用subip配置第二对互联地址
    interface Ethernet1/2
      no switchport
      speed 1000
      no negotiate auto

    interface Ethernet1/2.10  //用C-tag建立子接口
      description customer_secondary_link
      ip address 172.16.0.5  255.255.255.252  //配置接口地址，使用第一个地址
      encapsulation dot1Q 10    //配置dot1q封装，使用c-tag

    router bgp 65001  //配置BGP协议，自治系统号
    bgp router-id <loopback>   //配置 BGP router-id, 使用loopback口地址
    bgp log-neighbor-changes   //configure log neighbor changes

    neighbor 172.16.0.6/30   //配置BGP邻居关系
      remote-as 64512
      description Secondary_line_peer
      ebgp-multihop 2
      address-family ipv4 unicast

    address-family ipv4 unicast
      network 10.0.0.0 255.255.0.0  //宣告需要访问云VPC的子网
```

8.配置云端路由，详见[配置边界网关路由表](../../Operation-Guide/Route-Management/Border-Gateway-Route-Configuration.md)。

9.测试连通性：
在云端子网创建主机，ping企业IDC内网中的一台实例的内网地址。

其它要求，请参考[限制说明](../../Introduction/Restrictions.md)。
