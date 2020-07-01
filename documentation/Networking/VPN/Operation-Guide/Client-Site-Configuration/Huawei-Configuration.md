## 华为防火墙设备IPsec VPN配置
在[VPN连接控制台](https://cns-console.jdcloud.com/host/vpnConnection/list)创建VPN隧道后，还需要在客户本地设备上进行相应配置才可以协商建立VPN隧道。

本文以华为 USG6530为例，讲述如何在华为设备上配置VPN，适用于HUAWEI USG6500系列防火墙，其它系列设备请参考此示例进行配置。

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
|  | DH Group | Group19 |
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
  ike dpd type periodic
  ike dpd idle-time 10
  ike dpd retransmit-interval 5

  # config ike algorithm
  ike proposal 1
    encryption-algorithm aes-128
    dh group19
    authentication-algorithm sha2-256
    authentication-method pre-share
    integrity-algorithm hmac-sha2-256
    prf hmac-sha2-256
    sa duration 14400
```

3.配置身份认证及预共享密钥：
```
  # config authentication and psk
  ike peer jdcloud_ike_peer_test
    undo version 1
    exchange-mode auto
    pre-shared-key secret
    ike-proposal 1
    remote-address 116.xxx.xxx.10
```

4.配置IPsec策略及隧道：
```
  ipsec sha2 compatible enable

  # config ipsec security protocol
  ipsec proposal jdcloud_ipsec_proposal_test
    esp authentication-algorithm sha2-256
    esp encryption-algorithm aes-128

  # config ipsec policy and logic interface
  ipsec policy jdcloud_ipsec_policy_test 1 isakmp
    pfs dh-group14
    security acl 3002
    ike-peer jdcloud_ike_peer_test
    proposal jdcloud_ipsec_proposal_test
    tunnel local 220.xxx.xxx.150
    sa trigger-mode auto
    sa duration traffic-based 0
    sa duration time-based 3600
    route inject dynamic
```

5.配置隧道：
```
  # use ipsec with physical interface
  interface GigabitEthernet1/0/0
    description jdcloud_test
    undo shutdown
    ip address xxx.xxx.xxx.xxx 255.255.255.248
    vrrp vrid 107 virtual-ip 220.xxx.xxx.150 255.255.255.224 active
    gateway 220.xxx.xxx.1
    service-manage https permit
    service-manage ping permit
    redirect-reverse next-hop 220.xxx.xxx.1
    ipsec policy jdcloud_ipsec_policy_test
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
