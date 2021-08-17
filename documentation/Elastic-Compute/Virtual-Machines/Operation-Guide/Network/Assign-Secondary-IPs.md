# 分配辅助内网IP

辅助内网IP指主网卡或弹性网卡上，除随网卡同生命周期由系统指定的主内网IP外，其他可在子网网段内自行分配或释放的内网IP地址。

您可为实例的主网卡或弹性网卡分配多个内网IP地址，每个内网IP均可以绑定一个弹性公网IP，以此为单实例上不同应用以不同IP地址提供内/外网访问能力。

>提示：
>* 实例在创建时系统会自动创建绑定主网卡，并自动分配主内网IP地址，主网卡和主内网IP均不支持释放。
>* 主内网IP可通过[修改网络配置](https://docs.jdcloud.com/virtual-machines/modify-vpc-attribute)功能修改主内网IP地址。

## 前提条件及限制

* 实例须处于 **运行中** 或 **已停止** 状态；
* 单网卡可分配的内网IP上限为21，即除去主内网IP外可分配20个辅助内网IP；
* 实际可分配内网IP数受限于网卡所在子网剩余可用IP数。

## 操作影响
* 在控制台操作完成分配辅助内网IP后，需要登录实例内部配置才可生效，详见下文“配置实例”；

## 操作步骤

1. 访问[云主机控制台](https://cns-console.jdcloud.com/host/compute/list)，即进入实例列表页面。或访问[京东云控制台](https://console.jdcloud.com)点击顶部导航栏 **弹性计算-云主机** 进入实例列表页。
2. 选择地域后在实例列表中选择需要分配辅助内网IP的实例，点击名称进入详情页。
3. 点击 **弹性网卡Tab**，选择需要分配IP的网卡，点击 **分配内网IP** 按钮。
4. 在弹出的弹窗中添加需要分配的内网IP，可选择由系统自动分配或自定义内网IP地址，如自定义需在当前网卡所在子网CIDR范围内指定，且不能与已占用的地址冲突。支持同时分配多个，配置完成后点击  **确定**。
5.登录实例进行配置，配置方式见下文。

![](https://img1.jcloudcs.com/cn/image/vm/assign-sip1.png)

<div align="center"><img src="https://img1.jcloudcs.com/cn/image/vm/assign-sip2.png" width="600"></div>

此外您还可以从弹性网卡控制台进行分配操作，详细步骤请参见[弹性网卡侧分配辅助IP](../../../../Networking/Elastic-Network-Interface/Operation-Guide/Private-IP-Management/Assign-Secondary-IP.md)。

## 配置实例

>注意：
>* 配置后，如实例通过[修改网络配置](https://docs.jdcloud.com/virtual-machines/modify-vpc-attribute)功能修改了主内网IP地址，需要同步修改配置文件中地址；
>* 此配置方法在实例重启后依旧生效，但是如果为此实例制作私有镜像后，基于镜像创建了其他实例，请根据实例是否需要分配辅助内网IP做上述配置调整或配置还原。

### Linux系统

Linux系统以CentOS 7.2为例，假设实例主内网IP为192.168.0.4，分配的辅助内网IP地址为192.168.0.5，子网掩码为255.255.255.0。详细操作如下：

1. 登录实例，详细请查阅[登录Linux实例](../../Getting-Start-Linux/Connect-to-Linux-Instance.md)

2. 执行以下命令（以主网卡示例，若为辅助网卡则对应修改为eth1、eth2等），查看并修改当前网卡配置。

```shell
vim /etc/sysconfig/network-scripts/ifcfg-eth0
```
将`BOOTPROTO="dhcp"`注释掉，调整为`#BOOTPROTO="dhcp"`，然后追加以下配置项：

```shell
IPADDR="192.168.0.4"
IPADDR1="192.168.0.5"
NETMASK="255.255.255.0"
NETMASK1="255.255.255.0"
GATEWAY="192.168.0.1"
```

3. 重启网卡。

```
systemctl restart network
```

4. 检查 eth0 网卡是否已经加入了 IP 地址。

```
ip addr
```

### Windows系统

Windows系统以Windows Server 2012 R2 标准版 64位 中文版为例，假设实例主内网IP为192.168.2.43，分配的辅助内网IP地址为192.168.2.42，子网掩码为255.255.255.0。详细操作如下：

1. 登录实例，详细请查阅[登录Windows实例](../../Getting-Start-Windows/Connect-to-Windows-Instance.md)。<br>

2. 在左下角右键点击 **开始** 按钮，选择 **网络连接**。<br>

3. 出现网络连接后，右键点击后选择 **属性**。<br>
  <div align="left"><img src="https://img1.jcloudcs.com/cn/image/vm/AssignIP2.png" width="700"></div>

4. 打开属性后，选择 **Internet协议版本4（TCP/IPv4）**，点击 **属性**。<br>
  <div align="left"><img src="https://img1.jcloudcs.com/cn/image/vm/AssignIP3.png" width="400"></div>

5. 打开属性后，显示如下<br>
  <div align="left"><img src="https://img1.jcloudcs.com/cn/image/vm/AssignIP4.png" width="400"></div>

将内容修改为下图所示后，再点击 **高级** <br>
  <div align="left"><img src="https://img1.jcloudcs.com/cn/image/vm/AssignIP5.png" width="400"></div>
  <div align="left"><img src="https://img1.jcloudcs.com/cn/image/vm/AssignIP6.png" width="400"></div>

点击 **添加**，按下图填写确认。<br>
  <div align="left"><img src="https://img1.jcloudcs.com/cn/image/vm/AssignIP7.png" width="400"></div>

点击 **确认** 回到属性页<br>
  <div align="left"><img src="https://img1.jcloudcs.com/cn/image/vm/AssignIP8.png" width="400"></div>

在DNS服务器地址处填写`103.224.222.222`及`103.224.222.223`后点击 **确定** 即设置完成。
  <div align="left"><img src="https://img1.jcloudcs.com/cn/image/vm/AssignIP9.png" width="400"></div>


## 相关参考

[弹性网卡侧分配辅助IP](../../../../Networking/Elastic-Network-Interface/Operation-Guide/Private-IP-Management/Assign-Secondary-IP.md)

[登录Linux实例](../../Getting-Start-Linux/Connect-to-Linux-Instance.md)

[登录Windows实例](../../Getting-Start-Windows/Connect-to-Windows-Instance.md)

[修改网络配置](https://docs.jdcloud.com/virtual-machines/modify-vpc-attribute)
