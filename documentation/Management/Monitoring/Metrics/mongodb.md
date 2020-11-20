# 云数据库MongoDB
MongoDB提供副本集和分片集群两种类型。  
产品线监控数据的servicecode：mongodb ，其提供的监控指标如下：

## 副本集
- 获取Primary节点监控数据时，其tags中的role赋值为M
- 获取Secondary节点监控数据时，其tags中的role赋值为S  


metric | 中文名称 | 英文名称 | 单位 | 说明
---|--- |--- |---|---
jmiss.mongo.instance.cpu_percent|CPU使用率|CPU Usage|%|
jmiss.mongo.instance.mem_percent|内存使用率|Memory Usage|%|
jmiss.mongo.instance.disk_percent|磁盘使用率|Disk Usage|%|
jmiss.mongo.instance.iops_percent|IOPS使用率|IOPS Utilization Rate|%|
jmiss.mongo.instance.connections|connections|connections|个|
jmiss.mongo.instance.network_bytesIn|network_bytesIn|network_bytesIn|Bytes|
jmiss.mongo.instance.network_bytesOut|network_bytesOut|network_bytesOut|Bytes|
jmiss.mongo.instance.network_numRequests|network_numRequests|network_numRequests|counts|
jmiss.mongo.instance.op_command|op_command|op_command|counts|
jmiss.mongo.instance.op_delete|op_delete|op_delete|counts|
jmiss.mongo.instance.op_getmore|op_getmore|op_getmore|counts|
jmiss.mongo.instance.op_insert|op_insert|op_insert|counts|
jmiss.mongo.instance.op_query|op_query|op_query|counts|
jmiss.mongo.instance.op_update|op_update|op_update|counts|
jmiss.mongo.instance.cursor_timeout|cursor_timeout|cursor_timeout|counts|
jmiss.mongo.instance.cursor_totalOpen|cursor_totalOpen|cursor_totalOpen|counts|
jmiss.mongo.instance.globalLock_cq_readers|globalLock_cq_readers|globalLock_cq_readers|counts|
jmiss.mongo.instance.globalLock_cq_total|globalLock_cq_total|globalLock_cq_total|counts|
jmiss.mongo.instance.globalLock_cq_writers|globalLock_cq_writers|globalLock_cq_writers|counts|
jmiss.mongo.instance.wt_bytes_read_into_cache|wt_bytes_read_into_cache|wt_bytes_read_into_cache|counts|
jmiss.mongo.instance.wt_bytes_written_from_cache|wt_bytes_written_from_cache|wt_bytes_written_from_cache|counts|
jmiss.mongo.instance.wt_max_bytes_config|wt_max_bytes_config|wt_max_bytes_config|counts|



## 分片集群  

提供Mongos、Shard维度的监控数据。  
1. Mongos下有多个节点信息，其tags中的shardId需要指定具体的节点ID。
2. Shard下也有多个节点信息，同时区分Primary和Secondary。获取监控数据时，tags中的shardId需要指定具体的节点ID
- tags中role赋值为M时，获取数据为指定shard，Primary节点的数据；
- tags中role赋值为S时，获取数据为指定shard，Secondary节点的数据；


metric | 中文名称 | 英文名称 | 单位 | 说明
---|--- |--- |---|---
jmiss.mongo.instance.cpu_percent|CPU使用率|CPU Usage|%|
jmiss.mongo.instance.mem_percent|内存使用率|Memory Usage|%|
jmiss.mongo.instance.disk_percent|磁盘使用率|Disk Usage|%|
jmiss.mongo.instance.iops_percent|IOPS使用率|IOPS Utilization Rate|%|
jmiss.mongo.instance.connections|connections|connections|个|
jmiss.mongo.instance.network_bytesIn|network_bytesIn|network_bytesIn|Bytes|
jmiss.mongo.instance.network_bytesOut|network_bytesOut|network_bytesOut|Bytes|
jmiss.mongo.instance.network_numRequests|network_numRequests|network_numRequests|counts|
jmiss.mongo.instance.op_command|op_command|op_command|counts|
jmiss.mongo.instance.op_delete|op_delete|op_delete|counts|
jmiss.mongo.instance.op_getmore|op_getmore|op_getmore|counts|
jmiss.mongo.instance.op_insert|op_insert|op_insert|counts|
jmiss.mongo.instance.op_query|op_query|op_query|counts|
jmiss.mongo.instance.op_update|op_update|op_update|counts|
jmiss.mongo.instance.cursor_timeout|cursor_timeout|cursor_timeout|counts|
jmiss.mongo.instance.cursor_totalOpen|cursor_totalOpen|cursor_totalOpen|counts|
jmiss.mongo.instance.globalLock_cq_readers|globalLock_cq_readers|globalLock_cq_readers|counts|
jmiss.mongo.instance.globalLock_cq_total|globalLock_cq_total|globalLock_cq_total|counts|
jmiss.mongo.instance.globalLock_cq_writers|globalLock_cq_writers|globalLock_cq_writers|counts|
jmiss.mongo.instance.wt_bytes_read_into_cache|wt_bytes_read_into_cache|wt_bytes_read_into_cache|counts|
jmiss.mongo.instance.wt_bytes_written_from_cache|wt_bytes_written_from_cache|wt_bytes_written_from_cache|counts|
jmiss.mongo.instance.wt_max_bytes_config|wt_max_bytes_config|wt_max_bytes_config|counts|
