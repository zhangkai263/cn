## Juniper防火墙设备IPsec VPN配置
在[VPN连接控制台](https://cns-console.jdcloud.com/host/vpnConnection/list)创建VPN隧道后，还需要在客户本地设备上进行相应配置才可以协商建立VPN隧道。

本文以Juniper SRX12.1X47-D20.7虚拟防火墙为例，讲述如何在Juniper设备上配置VPN，适用于Juniper 12.1X47的SRX software，其它版本设备请参考此示例进行配置。
```
  ACX Series, EX Series, M Series, MX Series, PTX Series, QFabric, QFX Series, SRX Series, and T Series等硬件设备可参考此文章中的内容进行配置。
```

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
|  | DH Group | Group2 |
|  | 认证算法 | SHA1 |
|  | 加密算法 | aes128 |
|  | IKE SA Lifetime(s) | 14400 |
| IPsec配置 | 报文封装模式 | 隧道模式 |
|  | 安全协议 | ESP |
|  | DH Group | Group2 |
|  | 认证算法 | SHA1 |
|  | 加密算法 | aes128 |
|  | IPsec SA Lifetime(s) | 3600 |
|  | IPsec SA Lifetime(Byte) | 0 |
|  | IPsec SA Lifetime(Packet) | 0 |
|  | DPD | 开启 |

#### 主要配置步骤
1.登录防火墙设备的命令行配置界面；

2.配置网络、安全域和地址簿等基本信息：
```
  set security zones security-zone trust address-book address addr_10_0_0_0_16 10.0.0.0/16
  set security zones security-zone untrust address-book address addr_192_168_0_0_24 192.168.0.0/24
```

2.配置IKE策略：
```
  set security ike proposal jdcloud-ike-proposal-test authentication-method pre-shared-keys
  set security ike proposal jdcloud-ike-proposal-test authentication-algorithm sha1
  set security ike proposal jdcloud-ike-proposal-test encryption-algorithm aes-128-cbc
  set security ike proposal jdcloud-ike-proposal-test lifetime-seconds 14400
  set security ike proposal jdcloud-ike-proposal-test dh-group group2

  set security ike policy jdcloud-ike-policy-test mode main
  set security ike policy jdcloud-ike-policy-test proposals jdcloud-ike-proposal-test
  set security ike policy jdcloud-ike-policy-test pre-shared-key ascii-text "secret"
```

3.配置网关、出接口和协议版本：
```
  set security ike gateway jdcloud-ikegw-test ike-policy jdcloud-ike-policy-test
  set security ike gateway jdcloud-ikegw-test external-interface ge-0/0/0.0
  set security ike gateway jdcloud-ikegw-test address 116.xxx.xxx.10

  set security ike gateway jdcloud-ikegw-test dead-peer-detection
```

4.配置IPsec策略：
```
  set security ipsec proposal jdcloud-ipsec-proposal-test protocol esp
  set security ipsec proposal jdcloud-ipsec-proposal-test authentication-algorithm hmac-sha1-96
  set security ipsec proposal jdcloud-ipsec-proposal-test encryption-algorithm aes-128-cbc
  set security ipsec proposal jdcloud-ipsec-proposal-test lifetime-seconds 3600

  set security ipsec policy jdcloud-ipsec-policy-test perfect-forward-secrecy keys group2

  set security ipsec policy jdcloud-ipsec-policy-test proposal-set standard

  set security ipsec vpn jdcloud-vpn-test bind-interface st0.1
  set security ipsec vpn jdcloud-vpn-test ike gateway jdcloud-ikegw-test
  set security ipsec vpn jdcloud-vpn-test ike ipsec-policy jdcloud-ipsec-policy-test
  set security ipsec vpn jdcloud-vpn-test establish-tunnels immediately
```

5.配置隧道
```
  set interfaces st0.1 family inet address 169.254.1.1/30
  set interfaces st0.1 family inet mtu 1436
  set security zones security-zone trust interfaces st0.1

  #配置允许进站的IKE流量
  set security zones security-zone untrust host-inbound-traffic system-services ike

  # 配置允许进站的路由协议
  set security zones security-zone trust host-inbound-traffic protocols all
```

6.配置ACL，允许所需的网段通信：
```
  # 配置出站策略
  set security policies from-zone trust to-zone untrust policy jdcloud-security-policy-outbound match source-address addr_10_0_0_0_16
  set security policies from-zone trust to-zone untrust policy jdcloud-security-policy-outbound match destination-address addr_192_168_0_0_24
  set security policies from-zone trust to-zone untrust policy jdcloud-security-policy-outbound match application any
  set security policies from-zone trust to-zone untrust policy jdcloud-security-policy-outbound then permit

  # 配置入站策略
  set security policies from-zone untrust to-zone trust policy jdcloud-security-policy-inbound match source-address addr_192_168_0_0_24
  set security policies from-zone untrust to-zone trust policy jdcloud-security-policy-inbound match destination-address addr_10_0_0_0_16
  set security policies from-zone untrust to-zone trust policy jdcloud-security-policy-inbound match application any
  set security policies from-zone untrust to-zone trust policy jdcloud-security-policy-inbound then permit
```

7.配置路由(以静态路由为例)：
```
  ip route 192.168.0.0 255.255.255.0 116.xxx.xxx.10
  set routing-options static route 192.168.0.0/24 qualified-next-hop 10.10.10.1
```

8.配置云端路由，详见[配置边界网关路由表](../../Operation-Guide/Route-Management/Border-Gateway-Route-Configuration.md)。

9.测试连通性：
在云端子网创建主机，ping企业IDC内网中的一台实例的内网地址。

其它要求，请参考[限制说明](../../Introduction/Restrictions.md)。
