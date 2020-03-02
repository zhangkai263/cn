## 不支持三层子接口的设备专线配置
``以专线连接为例，托管连接配置方式同专线连接。``
在[专线通道控制台](https://cns-console.jdcloud.com/host/dedicatedVif/list)创建专线通道后，还需要在客户本地设备上进行相应配置才可以协商建立业务通道。

本文以华为不支持三层子接口的设备为例，讲述如何在客户端设备上配置专线，若您使用的是其他品牌不支持三层子接口的设备，请参考如下信息进行配置。

网络拓扑示例如下(``以下拓扑及操作步骤的配置仅为示例，实际配置时，请将示例配置项中的值替换为您使用的实际参数值``)：

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
  Vlan 100
  Vlan 101

  Interface te1/0/1
    port link-mode bridge
    port link-type trunk
    port trunk permit vlan 100-101

  Interface te1/0/2
    port link-mode bridge
    port link-type trunk
    port trunk permit vlan 100-101

  int vlan 100
    ip address 192.168.1.1 30

  int vlan 101
    ip address 192.168.1.5 30
```

8.配置云端路由，详见[配置边界网关路由表](../../Operation-Guide/Route-Management/Border-Gateway-Route-Configuration.md)。

9.测试连通性：
在云端子网创建主机，ping企业IDC内网中的一台实例的内网地址。

其它要求，请参考[限制说明](../../Introduction/Restrictions.md)。
