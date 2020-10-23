## 分布式协调服务 Zookeeper
该产品获取监控数据的servicecode为zk。
其提供指标数据如下：
metric | 中文名称  | 英文名称 |单位 | 说明
---|--- |--- |--- |--- 
jmiss.zk.node.client_connections|客户端连接数|client connections|count|
jmiss.zk.node.znode_count|Znode节点数量|znode count|count|
jmiss.zk.node.outstanding_requests|请求排队数|outstanding requests|count|
jmiss.zk.node.avg_request_latency|平均请求延时|avg request latency|ms|  


```
注：单个Zookeeper实例下有多个节点，查询节点监控数据时，需指定tags的key为nodeID， tags的value需指定对应的NodeID值。若不指定，则tags则将多个节点的数据进行聚合。
```


