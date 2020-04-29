## Cisco防火墙设备IPsec VPN配置
在[VPN连接控制台](https://cns-console.jdcloud.com/host/vpnConnection/list)创建VPN隧道后，还需要在客户本地设备上进行相应配置才可以协商建立VPN隧道。

本文以Cisco C3900为例，讲述如何在Cisco设备上配置VPN，适用于Cisco IOS 15.0+ software，其它版本设备请参考此示例进行配置。

网络拓扑示例如下(``以下拓扑及操作步骤的配置仅为示例，实际配置时，请将示例配置项中的值替换为您使用的实际参数值``)：

|  | VPN公网地址 | 互通内网网段 |
|:---:|:---:|:---:|
| 云端 | 116.xxx.xxx.10 | 192.168.0.0/24 |
| 企业IDC端 | 220.xxx.xxx.150 | 10.0.0.0/16 |

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
|  | DH Group | Group19 |
|  | 认证算法 | SHA256 |
|  | 加密算法 | aes128 |
|  | IKE SA Lifetime(s) | 14400 |
| IPsec配置 | 报文封装模式 | 隧道模式 |
|  | 安全协议 | ESP |
|  | DH Group | Group19 |
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
  ! config ike algorithm
  crypto ikev2 proposal proposal_jdcloud
    encryption aes-cbc-128
    integrity sha256
    group 19
  exit

  ! config ike policy
  crypto ikev2 policy policy_jdcloud
    match fvrf any
    proposal proposal_jdcloud
  exit
```

3.配置身份认证及预共享密钥：
```
  ! config authentication and psk
  crypto ikev2 profile ike_profile_jdcloud
    match identity remote address 116.xxx.xxx.10 255.255.255.255
    identity local address 220.xxx.xxx.150
    authentication remote pre-share key secret
    authentication local pre-share key secret
    lifetime 14400
    dpd 10 8 periodic
  exit
```

4.配置IPsec策略：
```
  ! config ipsec security protocol
  crypto ipsec transform-set transform-jdcloud esp-aes esp-sha256-hmac
    mode tunnel
  exit

  !config ipsec policy
  crypto ipsec profile ipsec_profile_jdcloud
    set transform-set transform-jdcloud
    set pfs group19
    set ikev2-profile ike_profile_jdcloud
  exit
```

5.配置隧道：
```
  ! config logic interface
  interface Tunnel1
    ip address 169.254.1.1 255.255.255.252
    ip tcp adjust-mss 1379
    tunnel source 220.xxx.xxx.150
    tunnel mode ipsec ipv4
    tunnel destination 116.xxx.xxx.10
    ip virtual-reassembly
  exit

  ! config sla
  ip sla 100
    icmp-echo 169.254.1.2 source-interface Tunnel1
    frequency 5
  exit

  ip sla schedule 100 life forever start-time now
  track 100 ip sla 100 reachability
```

6.配置ACL，允许所需的网段通信：
```
  access-list 100 permit ip 10.0.0.0 0.0.255.255 192.168.0.0 0.0.0.255
```

7.配置路由(以静态路由为例)：
```
  ip route 192.168.0.0 255.255.255.0 116.xxx.xxx.10
```

8.配置云端路由，详见[配置边界网关路由表](../../Operation-Guide/Route-Management/Border-Gateway-Route-Configuration.md)。

9.测试连通性：
在云端子网创建主机，ping企业IDC内网中的一台实例的内网地址。

其它要求，请参考[限制说明](../../Introduction/Restrictions.md)。
