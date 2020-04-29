## 分布式事务
获取该产品监控数据的servicecode为jdts，提供集群和节点维度的指标数据。具体如下：  

### 集群
Metric | 中文名称  | 英文名称 |单位 | 说明
---|--- |--- |--- |--- 
dts.cluster.tps|分布式事务tps|dts TPS|次/秒|

### 节点
获取节点的指标数据时，tags中得key需指定为nodeId，tags的vaule值，需要指定具体的节点ID。

Metric | 中文名称  | 英文名称 |单位 | 说明
---|--- |--- |--- |--- 
jdts.container.cpu.util|节点CPU使用率|node cpu usage|%|
jdts.container.memory.usage|节点内存使用率|node memory usage|%|
