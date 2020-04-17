## 数据仓库 JDW

该产品的servicecode为jdw，支持查看Master节点和Segment节点的监控数据。

### Master

- 获取Master节点的指标数据时， tags中role需要赋值为mdw。  

metric | 中文名称  | 英文名称 |单位 | 说明
---|--- |--- |--- |--- 
jdw.instance.connections|连接数|Connections|个|
jdw.instance.cpu_utilization|CPU使用率|CPU utilization|%|
jdw.instance.memory_utilization|内存使用率|Memory utilization|%|
jdw.instance.disk_used|磁盘使用量|Disk space used|MB|
jdw.instance.iops_total|IOPS总量|Total IOPS|个|
jdw.instance.iops_write|写入IOPS|Write IOPS|个|
jdw.instance.iops_read|读取IOPS|Read IOPS|个|
jdw.instance.network_receive|网络接收吞吐量|Network receive Throughput|kbps|
jdw.instance.network_transmit|网络传输吞吐量|Network transmit Throughput|kbps|

### Segment
- Segment节点类型下有多个多个节点，获取指标数据时，tags中role需要指定对应的节点名称，例如：sdw1、sdw2.  
 
metric | 中文名称  | 英文名称 |单位 | 说明
---|--- |--- |--- |--- 
jdw.node.cpu_utilization|CPU使用率|CPU utilization|%|
jdw.node.memory_utilization|内存使用率|Memory utilization|%|
jdw.node.disk_percen|磁盘使用率|Percentage disk space used|%|
jdw.node.disk_used|磁盘使用量|Disk space used|MB|
jdw.node.network_receive|网络接收吞吐量|Network receive Throughput|kbps|
jdw.node.network_transmit|网络传输吞吐量|Network transmit Throughput|kbps|
jdw.node.iops_write|写入IOPS|Write IOPS|个|
jdw.node.throughput_write|写入吞吐量|Write throughput|kbps|
jdw.node.iops_read|读取IOPS|Read IOPS|个|
jdw.node.throughput_read|读取吞吐量|Read throughput|kbps|
