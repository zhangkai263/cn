## 华三防火墙设备IPsec VPN配置
在[VPN连接控制台](https://cns-console.jdcloud.com/host/vpnConnection/list)创建VPN隧道后，还需要在客户本地设备上进行相应配置才可以协商建立VPN隧道。

本文以华三 MSR800为例，讲述如何在华三设备上配置VPN，适用于H3C MSR系列防火墙，其它系列设备请参考此示例进行配置。

网络拓扑示例如下(``以下拓扑及操作步骤的配置仅为示例，实际配置时，请将示例配置项中的值替换为您使用的实际参数值``)：

|  | VPN公网地址 | 互通内网网段 |
|:---:|:---:|:---:|
| 云端 | 116.xxx.xxx.10 | 192.168.0.0/24 |
| 企业IDC | 220.xxx.xxx.150 | 10.0.0.0/16 |

VPN隧道配置示例如下(``以一条隧道为例，为保证业务的高可用，请使用VPN云端的两个公网地址分别于客户端创建隧道``)：

| 参数类型 | 参数 | 取值 |
|:---:|:---:|:---:|
| 通用 | 云端公网地址 | 116.xxx.xxx.10 |
|  | 客户网关公网地址 | 220.xxx.xxx.150 |
|  | Local ID | 116.xxx.xxx.10 |
|  | Remote ID | 220.xxx.xxx.150 |
|  | 隧道IP | 169.254.1.1/30 |
| IKE配置 | 预共享密钥 | secret |
|  | IKE版本 | v2 |
|  | DH Group | Group2 |
|  | 认证算法 | SHA256 |
|  | 加密算法 | aes128 |
|  | IKE SA Lifetime(s) | 14400 |
| IPsec配置 | 报文封装模式 | 隧道模式 |
|  | 安全协议 | ESP |
|  | DH Group | Group14 |
|  | 认证算法 | SHA256 |
|  | 加密算法 | aes128 |
|  | IPsec SA Lifetime(s) | 3600 |
|  | IPsec SA Lifetime(Byte) | 0 |
|  | IPsec SA Lifetime(Packet) | 0 |
|  | DPD | 开启 |

#### 主要配置步骤
1.登录防火墙设备的命令行配置界面；

2.配置IKE策略：
```
  # config dpd
  ike dpd jdvpndpd
    interval-time 10
    time-out 10
  quit

  # config ike algorithm
  ike proposal 1
    encryption-algorithm aes-cbc
    authentication-method pre-share
    dh group2
    sa duration 14400
    authentication-algorithm sha
  quit
```

3.配置身份认证及预共享密钥：
```
  # config authentication and psk
  ike peer jdcloud_ike_peer_test
    remote-address 116.xxx.xxx.10
    pre-shared-key secret
    exchange-mode main
    proposal 1
    dpd jdvpndpd
  quit
```

4.配置IPsec策略及隧道：
```
  ipsec sha2 compatible enable

  # config ipsec security protocol
  ipsec transform-set jdcloud_ipsec_proposal_test
    encapsulation-mode tunnel
    esp encryption-algorithm aes-cbc-128
    esp authentication-algorithm sha1
  quit

  # config ipsec policy and logic interface
  ipsec profile jdcloud_ipsec_profile_test
    ike-peer jdcloud_ike_peer_test
    pfs dh-group2
    sa duration time-based 3600
    transform-set jdcloud_ipsec_proposal_test
  quit

  ipsec anti-replay check
    ipsec anti-replay window 128
```

5.配置隧道：
```
  # use ipsec with physical interface
  interface jdcloud_tunnel1
    ip address 169.254.1.1 255.255.255.252
    ip virtual-reassembly
    source 220.xxx.xxx.150
    destination 116.xxx.xxx.10
    tunnel-protocol ipsec ipv4
    ipsec profile jdcloud_ipsec_profile_test
    tcp mss 1380
    undo shutdown
  quit
```

6.配置ACL，允许所需的网段通信：
```
  acl number 3002
    rule 5 permit ip source 10.0.0.0 0.0.255.255 destination 192.168.0.0 0.0.0.255
```

7.配置路由(以静态路由为例)：
```
  ip route-static 192.168.0.0 255.255.255.0 116.xxx.xxx.10
```

8.配置云端路由，详见[配置边界网关路由表](../../Operation-Guide/Route-Management/Border-Gateway-Route-Configuration.md)。

9.测试连通性：
在云端子网创建主机，ping企业IDC内网中的一台实例的内网地址。

其它要求，请参考[限制说明](../../Introduction/Restrictions.md)。
