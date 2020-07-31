## strongSwan IPsec VPN配置
在[VPN连接控制台](https://cns-console.jdcloud.com/host/vpnConnection/list)创建VPN隧道后，还需要在客户本地设备上进行相应配置才可以协商建立VPN隧道。

本文以strongSwan 5.3.5为例，讲述如何在Ubuntu 16.04 x86_64主机上配置strongSwan VPN，适用于开源软件客户端。

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
1.Ubuntu安装strongSwan：
```
  apt-get install -y strongswan
  ipsec version   #查看已安装的strongswan版本
```

2.配置IKE和IPsec策略，编辑/etc/ipsec.conf文件：
```
  # ipsec.conf - strongSwan IPsec configuration file
  # basic configuration
  config setup
     uniqueids=no

  conn %default
      authby=psk
      type=tunnel

  conn jdcloud_tunnel1
      auto=start
      left=%defaultroute    # 若客户端VPN网关位于NAT设备之后，则此处填写客户端VPN网关的内网地址
      leftid=220.xxx.xxx.150
      right=116.xxx.xxx.10
      leftsubnet=0.0.0.0/0    #开放全部网段互通
      rightsubnet=0.0.0.0/0   #开放全部网段互通
      type=tunnel
      leftauth=psk
      rightauth=psk
      keyexchange=ikev2
      ikelifetime=4h
      ike=aes128-sha1-modp1024    #根据配置隧道时指定的加密算法、认证算法、DH组进行组装
      esp=aes128-sha1-modp1024
      lifetime=1h
      keyingtries=%forever
      mobike=no
      dpddelay=10s
      dpdtimeout=30s
      dpdaction=restart
      mark=100  #每个隧道使用不同的标记值，以确保唯一性
```

3.配置预共享密钥，编辑/etc/ipsec.secrets文件：
```
  220.xxx.xxx.150 116.xxx.xxx.10 : PSK "secret"
```

4.配置隧道，使用虚拟隧道接口VTI(Virtual Tunnel Interface)：
```
  sudo ip link add jdcloud_tunnel1 type vti local 10.0.0.x remote 116.xxx.xxx.10 key 100    #其中local推荐使用网关的内网地址
  sudo ip addr add 169.254.1.1/30 remote 169.254.1.2/30 dev jdcloud_tunnel1
  sudo ip link set jdcloud_tunnel1 up mtu 1450
```

5.配置iptables，允许所需的网段通信：
```
  sudo iptables -t mangle -A FORWARD -o jdcloud_tunnel1 -p tcp --tcp-flags SYN,RST SYN -j TCPMSS --clamp-mss-to-pmtu
  sudo iptables -t mangle -A INPUT -p esp -s 116.xxx.xxx.10 -d 220.xxx.xxx.150 -j MARK --set-xmark 100   # 若客户端VPN网关位于NAT设备之后，则-d填写客户端VPN网关的内网地址
```

6.设置strongSwan使用系统默认的路由表，编辑/etc/strongswan.d/charon.conf文件：
```
  install_routes=no    #默认为yes，此处将注释去掉，并改为no，目的是防止隧道创建新的路由表，以使不同的隧道使用相同的路由表，即main路由表
```

7.开启系统IP转发，编辑/etc/sysctl.conf文件，之后执行“sudo sysctl -p”：
```
  net.ipv4.ip_forward = 1
```

8.修改接口/网卡的网络配置，编辑/etc/sysctl.conf文件，之后执行“sudo sysctl -p”：
```
  net.ipv4.conf.jdcloud_tunnel1.rp_filter=2   #允许linux处理非对称路由
  net.ipv4.conf.jdcloud_tunnel1.disable_policy=1  #禁用接口的SPD策略检查
  net.ipv4.conf.eth0.disable_xfrm=1   #禁用物理网卡的IPsec加密
  net.ipv4.conf.eth0.disable_policy=1   #禁用物理网卡的SPD策略检查
```

9.配置路由(以静态路由为例)：
```
  ip route add 192.168.0.0/16 dev jdcloud_tunnel1 metric 100
```

10.启动strongSwan：
```
  ipsec start
```

11.配置云端路由，详见[配置边界网关路由表](../../Operation-Guide/Route-Management/Border-Gateway-Route-Configuration.md)。

12.测试连通性：
在云端子网创建主机，ping企业IDC内网中的一台实例的内网地址。

有关strongSwan的更多内容，详见[strongSwan文档](https://strongswan.org/documentation.html?spm=a2c4g.11186623.2.13.2d4c346eTfyt9H)。

其它要求，请参考[限制说明](../../Introduction/Restrictions.md)。
