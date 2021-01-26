# Linux服务器弹性网卡配置

本文将介绍如何在Linux中配置弹性网卡相关信息，Linux包括CentOS和Ubuntu两种镜像类型，且不同版本的镜像配置弹性网卡步骤稍有不同，下面将对有差异的版本分别进行详细介绍。

### 场景概述

当服务器只有单个网卡无法满足您的业务需求时，您需要使用辅助网卡，使用辅助网卡需配置策略路由，使网卡的进出流量能够同进同出，否则会出现网卡不可用的情况。

本教程基于下图所示场景进行介绍如何配置辅助网卡，在VPC不同的子网中分别创建云主机1、云主机2及辅助网卡，其中云主机1已绑定辅助网卡，如未绑定请参考[绑定网卡](../Elastic-Network-Interface-Management/Associate-Elastic-Network-Interface.md)。对云主机1的辅助网卡进行配置，使云主机2能分别ping通云主机1的主/辅网卡IP地址。

注：windows镜像不支持策略路由，如使用多网卡，仅支持同网段资源访问，本例不适用于windows。
![eniforvm](../../../../image/Networking/Elastic-Network-Interface/eni-004.png)

### 配置步骤

- 网络配置，使辅助网卡的主IP地址在绑定的云主机上生效；
- 配置路由，包括配置策略路由和路由规则，经过辅助网卡的流量需要指定新的路由表，否则会路由不可达，无法使用辅助网卡。

```
注：中括号中的内容需您根据您实际配置自行填写
```



#### [配置CentOS 6.9或CentOS 7.6](6.9  7.6)


#### [配置Ubuntu 14.04、Ubuntu 16.04或Ubuntu 18.04](14、16、18)



#### 配置CentOS 6.9或CentOS 7.6

步骤1：通过ssh登录云主机1

步骤2：通过以下命令查看云主机1的网卡

```
ip a
```

步骤3：打开网卡配置文件：

```
vi /etc/sysconfig/network-scripts/[ifcfg-eth1]
```

步骤4：在网卡配置文件中加入配置信息：

```
DEVICE=[eth1]				#辅助网卡名称，本例中为eth1
NM_CONTROLLED=yes
ONBOOT=yes
IPADDR=[10.0.16.3]         	#辅助网卡的主IP
NETMASK=[255.255.240.0]		#辅助网卡IP的子网掩码
```

步骤5：配置永久路由，执行以下命令打开文件

```
vi /etc/sysconfig/network-scripts/[route-eth1]
```

步骤6：在文件中增加命令行，添加路由规则，本例如下，具体需根据您网络配置实际情况填写：

```
default via [10.0.16.1] dev [eth1] table [1000] pref [100]    	  #配置网关
[10.0.16.0/20] dev [eth1] src [10.0.16.3] table [1000]		  #配置路由
```

步骤7：配置永久策略路由，执行以下命令打开文件：

```
vi /etc/sysconfig/network-scripts/[rule-eth1]
```

步骤8：在文件中添加以下命令行，配置策略路由：

```
from [10.0.16.3] table [1000]			
```

CentOS  7.6需额外执行以下命令，使上述步骤中新增的配置文件能够被执行：

```
yum install NetworkManager-config-routing-rules 		#安装服务
systemctl enable NetworkManager-dispatcher.service 		#使服务可用
systemctl start NetworkManager-dispatcher.service		#启动服务
```

步骤9：执行以下命令重启网络服务：

``` 
service network restart
```

步骤10：验证配置：登录云主机2，通过云主机2分别ping云主机1的主/辅网卡IP，若均能ping通则表示配置成功

```
ping [10.0.32.5]    #ping主网卡IP
ping [10.0.16.3]	#ping辅助网卡IP
```



#### 配置Ubuntu 14.04、Ubuntu 16.04或Ubuntu 18.04

##### 配置Ubuntu 14.04、Ubuntu 16.04

步骤1：通过ssh登录云主机1

步骤2：通过以下命令查看云主机1的网卡：

```
ip a
```

步骤3：执行以下命令，为辅助网卡创建配置文件

Ubuntu14

```
vi /etc/network/interfaces 
```

Ubuntu16

```
vi /etc/network/interfaces.d/[51-eth1].cfg
```

步骤4：将以下命令添加到上述文件中，本例中添加的辅助网卡是eth1，具体配置信息根据实际情况进行配置

```
auto [eth1]						##辅助网卡名称
iface [eth1] inet static
address [172.16.64.3]			#辅助网卡的主IP
netmask [255.255.240.0]			#辅助网卡IP的子网掩码

# 配置默认网关
up ip route add default via [172.16.64.1] dev [eth1] table [100]

# 配置路由表及策略路由
up ip route add [172.16.64.3] dev [eth1] table [100]
up ip rule add from [172.16.64.3] lookup [100]

```

步骤5：执行命令行重启网卡，使配置文件生效：

Ubuntu14

```
(ifdown [eth1] && ifup [eth1])
```

Ubuntu16

```
systemctl restart networking
```

步骤6：验证配置：登录云主机2，通过云主机2分别ping云主机1的主/辅网卡IP，若均能ping通则表示配置成功

```
ping [172.16.0.4]    #ping主网卡IP
ping [172.16.64.3]	#ping辅助网卡IP
```



##### 配置Ubuntu18.04

步骤1：通过ssh登录云主机

步骤2：输入命令行查看云主机的网卡：

```
ip a
```

若已绑定辅助网卡，通过上述命令未显示辅助网卡信息，重启云主机后重复上面操作。

步骤3：为辅助网卡创建一个配置文件：

```
vi /etc/netplan/[51-eth1].yaml
```

步骤4：将以下命令添加到上一步的文件中，具体配置信息根据实际情况进行配置：

```
network:
  version: 2
  renderer: networkd
  ethernets:
    [eth1]:
      addresses:
       - [172.16.0.6/20]     # 辅助网卡IP地址，可配置多个
      dhcp4: no
      routes:              	 # 配置路由表
        - to: 0.0.0.0/0
         via: [172.16.0.1]   #默认网关，为辅助网卡所在子网的首个地址
         table: [1000]
        - to: [172.16.0.6]
         via: 0.0.0.0
         scope: link
         table: [1000]
      routing-policy:        #配置策略路由
        - from: [172.16.0.6]
          table: [1000]
```

注：配置信息要严格按照yaml语言的语法格式，否则netplan命令会报错。

步骤5：执行如下命令，使网络配置生效：

```
netplan --debug apply
```

步骤6：验证配置，使用云主机2分别ping 云主机1的主/辅网卡IP，若均能ping通则表示配置成功。

```
ping [172.16.0.4]    #ping主网卡IP
ping [172.16.64.3]	#ping辅助网卡I:P
```

