# 云主机监控指标说明
京东云为实例提供以下监控指标，按采集上报的前提条件来区分，可以分为三类：
* 由实例所在宿主机采集，不依赖于云主机内监控插件，此类指标共有4个，中英文展示名具有后缀‘（Host）’，包括：
  * 磁盘读吞吐量（Host）：vm.disk.bytes.read
  * 磁盘写吞吐量（Host）：vm.disk.bytes.write
  * 网络入带宽（Host）：vm.network.bytes.incoming
  * 网络出带宽（Host）：vm.network.bytes.outgoing
* 由云主机内官方系统组件采集，所有历史版本组件均支持采集，只要不对组件进行卸载均可获取数据，此类指标共有2个，包括：
  * CPU使用率：cpu_util
  * 内存使用率：memory.usage
* 其余指标由云主机内官方系统组件采集，仅不低于'3.0.989'版本的JCS-Agent组件支持采集。
如无法在监控页面查看到此类指标说明您当前环境内的系统组件版本过低，请参照本文底部 **监控插件安装说明** 进行安装。

## 指标详情
产品线监控数据的servicecode：vm ，指标详细信息如下：
### 实例
metric | 中文名称 | 英文名称 | 单位 | 说明
---|--- |--- |---|---
cpu_util | CPU使用率 | CPU Usage | % | 
memory.usage | 内存使用率| Memory Usage | % | 
vm.memory.used.bytes | 内存使用量 | Memory Used |  Bytes | 
vm.avg.load1 | 平均负载1min | CPU Average Load 1min | - | 
vm.avg.load5 | 平均负载5min | CPU Average Load 5min |  - | 
vm.avg.load15 | 平均负载15min | CPU Average Load 15min |  - | 
vm.disk.dev.bytes.read | 磁盘读吞吐量 | Disk Read Throughout | Bps|
vm.disk.dev.bytes.write | 磁盘写吞吐量| Disk Write Throughout| Bps|
vm.disk.dev.io.read | 磁盘读IOPS | Disk Read Requests | Count/s | 
vm.disk.dev.io.write |磁盘写IOPS | Disk Write Requests| Count/s | 
vm.network.dev.bytes.in| 网络进速率 | Network Inbound Rate | bps | 
vm.network.dev.bytes.out | 网络出速率 | Network Outbound Rate | bps | 
vm.network.dev.packets.in |网络进包量 | Network Inbound Packets | pps | 
vm.network.dev.packets.out |网络出包量| Network Outbound Packets |  pps | 
vm.netstat.tcp.established |TCP连接数 | TCP Connections |Count | 裸金属无该指标
vm.disk.bytes.read |磁盘读吞吐量(host)|Disk Read Throughout(host) |Bps |裸金属无该指标
vm.disk.bytes.write|磁盘写吞吐量(host)| Disk Write Throughout(host)| Bps | 裸金属无该指标
vm.network.bytes.incoming | 网络进速率(host) |Network Inbound Rate(host)  |bps | 裸金属无该指标
vm.network.bytes.outgoing|网络出速率(host) |Network Outbound Rate(host) |bps  | 裸金属无该指标


###  设备-磁盘
#### 用量  
**Linux按挂载点上报，Windows按盘符上报。tag的key为mountPoint，值为‘/’,‘C:’...**

metric | 中文名称 | 英文名称 | 单位 | 说明
---|--- |--- |---|---
vm.disk.dev.used | 磁盘使用率 | Disk Usage | % | 
vm.disk.dev.used.bytes | 磁盘使用量 | Disk Used | Bytes | 
vm.disk.dev.inode.used | 磁盘inode使用率 | Disk inode Usage | % | 


#### 读写
**Linux按分区设备名上报，Windows按盘符上报。tag的key为devName，值为‘/dev/vda1’,‘C:’...**

metric | 中文名称 | 英文名称 | 单位 | 说明
---|--- |--- |---|---
vm.disk.dev.bytes.read | 磁盘读吞吐量 | Disk Read Throughout | Bps | 
vm.disk.dev.bytes.write| 磁盘写吞吐量| Disk Write Throughout| Bps|
vm.disk.dev.io.read | 磁盘读IOPS | Disk Read Requests | Count/s | 
vm.disk.dev.io.write |磁盘写IOPS | Disk Write Requests| Count/s | 


###  设备-网络  
**tag的key为devName，值为'eth0','eth1'...'eth7'**
 
metric | 中文名称 | 英文名称 | 单位 | 说明
---|--- |--- |---|---
vm.network.dev.bytes.in| 网络进速率 | Network Inbound Rate | bps | 
vm.network.dev.bytes.out | 网络出速率 | Network Outbound Rate | bps | 
vm.network.dev.packets.in |网络进包量 | Network Inbound Packets | pps | 
vm.network.dev.packets.out |网络出包量| Network Outbound Packets |  pps | 


###  设备-GPU 
**GPU实例类型的主机才有此指标。tag的key为gpu_index，值为'0','1'，'2'，‘3’**

metric | 中文名称 | 英文名称 | 单位 | 说明
---|--- |--- |---|---
vm.gpu.util.gpu| GPU核使用率 | GPU Core Usage | % | 
vm.gpu.util.mem | GPU内存使用率 | GPU Memory Usage | % | 
vm.gpu.used.mem.bytes | GPU内存使用量 | GPU Memory Used | Bytes | 
vm.gpu.power |GPU功耗| GPU Power |  w | 
vm.gpu.temperature | GPU温度 | GPU Temperature | ℃  | 
vm.gpu.util.encoder | GPU编码器占用率 | GPU Encoder Usage | % | 
vm.gpu.util.decoder | GPU解码器占用率 | GPU Decoder Usage | % |



## 监控插件安装说明
云主机监控数据的采集和上报依赖于官方镜像系统组件'JCS-Agent'中的'MonitorPlugin'插件，官方镜像在2019年5月-7月期间进行升级默认安装了升级工具'ifrit'以实现JCS-Agent的自动升级。<br>
如您当前实例中未安装JCS-Agent或已安装但版本过低不具备自动升级能力，可在确保已卸载早期系统组件cloud-init和QGA的前提下，直接安装ifrit，安装完成10分钟内，JCS-Agent会被自动安装/更新为最新版本。<br>
* cloud-init和QGA卸载方法以及Ifrit安装方法详见：[官方镜像系统组件-JCS-Agent](https://docs.jdcloud.com/cn/virtual-machines/default-agent-in-public-image#user-content-1)
* JCS-Agent版本查看方式：
  * Linux：
  `
   ps -ef|grep MonitorPlugin
  `
  * Windows：
  `
  wmic process where caption="MonitorPlugin.exe" get caption,commandline /value
  `
