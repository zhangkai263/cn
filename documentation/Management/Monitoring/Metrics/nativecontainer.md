# 原生容器 
原生容器下有“容器实例”和“Pod”两款子产品。
## 容器实例
容器实例其servicecode为nativecontainer。监控指标数据包含实例和磁盘两个维度，具体指标如下：

**实例**  

metric | 中文名称 | 英文名称 | 单位 | 说明
---|--- |--- |---|---
nativecontainer.cpu.util | CPU使用率|CPU Usage| % |
nativecontainer.avg.load1 | CPU平均负载1min | CPU AverageLoad 1min | 无 |
nativecontainer.avg.load15| CPU平均负载15min | CPU AverageLoad 15min | 无 | 
nativecontainer.tcp.connect.established | TCP有效连接数 | tcpConnection userful | 个|
nativecontainer.tcp.connect.total | TCP连接总数 | tcpConnection total | 个| 
nativecontainer.memory.usage | 内存使用率 | Memory Usage | % |
nativecontainer.disk.bytes.read | 系统盘读流量 | Disk Read Throughput | Bps| 
nativecontainer.disk.bytes.write |系统盘写流量 | Disk Write Throughput| Bps| 
nativecontainer.network.bytes.incoming |网络进流量 | Network Inbound Traffic | bps | 
nativecontainer.network.bytes.outgoing |网络出流量 | Network Outbound Traffic| bps | 
nativecontainer.power_state | 电源状态 | NativeContainer Power State | 无|


**磁盘**  
指标数据上报的tag，其key为mountPoint 和containerName，可查看对应container和挂载点的监控数据  

metric | 中文名称 | 英文名称 | 单位 | 说明
---|--- |--- |---|---
nativecontainer.disk.dev.used |磁盘使用率 | Disk Usage | % | 
nativecontainer.disk.dev.total|磁盘总量  | Disk Total | Bytes| 
nativecontainer.disk.dev.free |磁盘空闲量 | Disk Free | Bytes| 
nativecontainer.disk.dev.inode.used | inode使用率 | Inode Usage | % | 
nativecontainer.disk.dev.inode.total | inode总量 | Inode Total | 个 | 
nativecontainer.disk.dev.inode.free | inode空闲量| Inode Free | 个| 


## Pod
Pod其servicecode为pod，监控指标数据包含实例和磁盘两个维度，具体指标如下：

**实例**  

metric | 中文名称 | 英文名称 | 单位 | 说明
---|--- |--- |---|---
pod.cpu.util | CPU使用率|CPU Usage| % |
pod.avg.load1 | CPU平均负载1min | CPU AverageLoad 1min | 无 |
pod.avg.load15| CPU平均负载15min | CPU AverageLoad 15min | 无 | 
pod.tcp.connect.established | TCP有效连接数 | tcpConnection userful | 个|
pod.tcp.connect.total | TCP连接总数 | tcpConnection total | 个| 
pod.memory.usage | 内存使用率 | Memory Usage | % |
pod.disk.bytes.read | 系统盘读流量 | Disk Read Throughput | Bps| 
pod.disk.bytes.write |系统盘写流量 | Disk Write Throughput| Bps| 
pod.network.bytes.incoming |网络进流量 | Network Inbound Traffic | bps | 
pod.network.bytes.outgoing |网络出流量 | Network Outbound Traffic| bps | 
pod.power_state | 电源状态 | NativeContainer Power State | 无|

**磁盘** 
指标数据上报的tag，其key为mountPoint 和containerName，可查看对应pod和挂载点的监控数据  

metric | 中文名称 | 英文名称 | 单位 | 说明
---|--- |--- |---|---
pod.disk.dev.used |磁盘使用率 | Disk Usage | % | 
pod.disk.dev.total|磁盘总量  | Disk Total | Bytes| 
pod.disk.dev.free |磁盘空闲量 | Disk Free | Bytes| 
pod.disk.dev.inode.used | inode使用率 | Inode Usage | % | 
pod.disk.dev.inode.total | inode总量 | Inode Total | 个 | 
pod.disk.dev.inode.free | inode空闲量| Inode Free | 个| 
