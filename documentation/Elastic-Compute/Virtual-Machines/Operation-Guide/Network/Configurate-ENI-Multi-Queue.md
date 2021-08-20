# 配置网卡多队列

单个vCPU处理网络中断存在瓶颈，您可以通过配置网卡多队列将实例中的网卡中断分散给不同的vCPU处理，提升网络处理性能。


## 前提条件及限制

### 实例规格支持情况

* 不同实例规格支持的网卡队列数量不同，详情见[实例规格类型](../../Introduction/Instance-Type-Family.md)。

### 镜像支持情况
* 不同镜像版本对网卡多队列支持情况不同。详细情况如下：

#### 官方镜像：

* CentOS
  * 7.4及以上版本：支持且默认开启，并按最大支持队列配置
  * 6.6/6.8/6.9/7.1/7.2/7.2 NAT Gateway/7.3：支持，但未配置默认开启，需要参照下方配置方法安装脚本以实现自动配置
  * 6.5及以下版本：不支持
* Ubuntu
  * 20.04/18.04：支持且默认开启，并按最大支持队列配置
  * 14.04/16.04：支持，但未配置默认开启，需要参照下方配置方法安装脚本以实现自动配置
* Windows Server
  * 暂不支持

#### 私有镜像：

* 基于官方镜像制作的私有镜像，网卡多队列支持情况视原始官方镜像情况，及制作镜像前主机内是否通过脚本实现了自动开启的配置
* 通过[导入镜像](../Image/Import-Private-Image.md)生成的私有镜像，如确定版本本身支持且需要使用网卡多队列，须请[提交工单](https://ticket.jdcloud.com/applyorder/submit)申请后才可使用此项功能。

#### 共享镜像：

共享镜像实际为其他用户的私有镜像共享给您使用，支持情况同私有镜像。

#### 第三方镜像：

暂不支持。


## 操作步骤

### 临时配置
对于支持但未开启网卡多队列功能的镜像，可通过下述方法临时配置多队列，但重启后配置会失效。此方法可用作测试多队列开启对网络性能的影响，如确定要开启网卡多队列，请参照下方永久配置方法。
下文以CentOS 6.9为例，介绍配置步骤。

1. [登录实例](../../Getting-Start-Linux/Connect-to-Linux-Instance.md)。
2. 运行`ethtool -l eth0`查看网卡是否支持多队列以及目前支持的最大队列数。`Pre-set maximums`和`Current hardware settings`中的`Combined`分别为支持设置的队列数和当前生效的队列数。
	
	```shell
	[root@test ~]# ethtool -l eth0
	Channel parameters for eth0:
	Pre-set maximums:
	RX:		0
	TX:		0
	Other:		0
	Combined:	4      # 此行代表最多支持4个队列
	Current hardware settings:
	RX:		0
	TX:		0
	Other:		0
	Combined:	1      # 此行代表当前生效1个队列

	
3. 运行`ethtool -L eth0 combined x`，设置网卡当前使用多队列，x为设置的队列数。

4. 对于有多个网卡的实例，可以同时对多个网卡分别进行设置，只需将上述命令中`eth0`替换成其他网卡设备名即可。
	
5. 建议运行`systemctl start irqbalance `开启irqbalance服务，让系统自动调整网卡中断在多个vCPU核上的分配。
	
	
	
### 永久配置	
1. 下载脚本。各地域内网下载地址如下：
* 华北-北京：https://bj-jcs-agent-linux.s3-internal.cn-north-1.jdcloud-oss.com/multi-queue-jd.tgz
* 华南-广州：https://gz-jcs-agent-linux.s3-internal.cn-south-1.jdcloud-oss.com/multi-queue-jd.tgz
* 华东-宿迁：https://sq-jcs-agent-linux.s3-internal.cn-east-1.jdcloud-oss.com/multi-queue-jd.tgz
* 华东-上海：https://sh-jcs-agent-linux.s3-internal.cn-east-2.jdcloud-oss.com/multi-queue-jd.tgz

2. 解压并安装。

```shell
tar zxvf multi-queue-jd.tgz
cd multi-queue-jd
bash install.sh <image-type> <version-num>
```

  其中，系统类型和主版本号填写参考如下，如当前镜像为CentOS 6.9，则安装指令为`bash install.sh centos 6`。
   >* image-type: centos | ubuntu 
   >* centos version-num: 6 | 7 | 8
   >* ubuntu version-num: 14 | 16

3. 安装信息中出现`Starting multi-queue-jd: OK`即表明网卡多队列配置成功，完成配置后可将安装脚本删除。
  
## 相关参考

[登录实例](../../Getting-Start-Linux/Connect-to-Linux-Instance.md)


