kubernetes集群获取监控数的servicecode为jke，提供集群、节点组和节点三个维度的指标数据。具体如下：

**集群** 

metric | 中文名称 | 英文名称 | 单位 | 说明
---|--- |--- |---|---
jke.node.status.ready | 节点就绪状态 | Node Ready Status | 无| 
jke.node.status.notready | 节点未就绪状态 | Node NotReady Status | 无 | 
jke.node.status.unknown | 节点未知状态 | Node Unknown Status | 无 | 
jke.pod.pending.count | 节点中待运行Pod数量 | Pending Pod Count | 无| 
jke.pod.running.count | 节点中运行中Pod数量 | Running Pod Count |无| 
jke.pod.succeeded.count | 节点中成功Pod数量 |  Succeeded Pod Count | 无| 
jke.pod.failed.count | 节点中失败Pod数量 | Failed Pod Count | 无| 
jke.pod.unknown.count| 节点中未知状态Pod数量 | Unknown Pod Count | 无| 
jke.api.request.count | API请求次数 | Api Request Count | 次| 
jke.api.request.size | API请求字节 | Api Reqeust Size | byte | 
jke.api.response.size | API响应字节 | Api Response Size  | byte | 
jke.cpu_util | CPU使用率 | CPU Usage | % | 
jke.memory.usage | 内存使用率 | Memory Usage | % |
jke.vm.disk.bytes.read | 系统盘读流量 | Disk Read Bytes | Bps | 
jke.vm.disk.bytes.write | 系统盘写流量 | Disk Write Bytes | Bps |
jke.vm.network.bytes.incoming | 网络进流量 | Network Incoming Bytes | bps|
jke.vm.network.bytes.outgoing | 网络出流量 | NNetwork Outgoing Bytes | bps|

**节点组/节点**  
- 获取节点组监控数据时，tags中的nodegroup_id需指定需查询的节点组ID。
- 获取节点监控数据时，需要指定节点所在的节点组及节点信息，tags中nodegroup_id需指定节点所属的节点组ID，node_id需指定查询的节点ID。

metric | 中文名称 | 英文名称 | 单位 | 说明
---|--- |--- |---|---
jke.cpu_util | CPU使用率 | CPU Usage | % | 
jke.memory.usage | 内存使用率 | Memory Usage | % |
jke.vm.disk.bytes.read | 系统盘读流量 | Disk Read Bytes | Bps | 
jke.vm.disk.bytes.write | 系统盘写流量 | Disk Write Bytes | Bps |
jke.vm.network.bytes.incoming | 网络进流量 | Network Incoming Bytes | bps|
jke.vm.network.bytes.outgoing | 网络出流量 | NNetwork Outgoing Bytes | bps|
