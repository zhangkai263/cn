#  监控指标说明

##   基础监控组

###   CPU监控

|   监控指标   |  单位   | metric	  |   说明   | 
| :--- | :---  |:---  |:---  |
| 	实例平均CPU使用率  | 	%	   |   | 单位时间内Redis实例所有Master节点的平均CPU使用率  | 
| 	实例最大CPU使用率   |   %	 |   |   单位时间内Redis实例所有Master节点中最大节点的CPU使用率   |   
| 	代理CPU使用率   |   %	   |   jmiss.redis.proxy.container.cpu.util   |   单位时间内单个proxy代理的CPU使用率   |   
| 	CPU使用率（节点）   |   %	   |   jmiss.redis.instance.container.cpu.util   |   单位时间内单个节点的CPU使用率。可单独查看master节点、slave节点、shard分片维度的情况。   |   


###  内存监控
|   监控指标   |  单位   | metric	  |   说明   | 
| :--- | :---  |:---  |:---  |
| 	实例内存使用量   |  Bytes   |  jmiss.redis.cluster.used_memory	   |  单位时间内Redis实例的内存使用量数据   |  
| 	实例内存使用率   |  %	   |  jmiss.redis.cluster.memory_usage	   |  单位时间内Redis实例的内存使用率。为实际使用内存和申请总内存之比   |  
| 	实例节点最大内存使用率   |  %	   |  jmiss.redis.cluster.memory_max_usage	   |  单位时间内Redis实例所有节点中的最大内存使用率   |  
| 	实例Key数量   |  count	   |  jmiss.redis.cluster.db_keys   |  	当前实例的Key数量总计   |  
| 	带过期时间Key数量   |  count	   |  jmiss.redis.cluster.expired_keys	   |  当前实例所有带有过期时间Key的数量   |  
| 	实例驱逐Key数量   |  count	   |  jmiss.redis.cluster.evicted_keys	   |  单位时间内实例驱逐了的Key数量   |  
| 	实例已经过期Key数量   |  count   |  	jmiss.redis.cluster.expires_keys   |  	单位时间内实例上已经过期的Key数量   |  
| 	实例使用内存Rss   |  Bytes	   |  jmiss.redis.cluster.used_memory_rss   |  	单位时间内实例使用内存Rss   |  
| 	代理内存使用率   |  %	   |  jmiss.redis.proxy.memory_usage	   |  proxy代理的内存使用率   |  
| 	内存使用量（节点or 分片）   |  Bytes	   |  jmiss.redis.instance.used_memory   |  	单位时间内的内存使用量数据  |  
| 	内存使用率（节点 or 分片）   |  	%   |  	jmiss.redis.instance.memory_usage	   |  单位时间内的内存使用率。为实际使用内存和申请总内存之比   |  
| 	Key数量（节点or 分片）   |  	count	   |  jmiss.redis.instance.db_keys   |  	当前节点上的Key数量总计   |  
| 	带过期时间Key数量（节点or 分片）	   |  count   |  	jmiss.redis.instance.expired_keys	   |  当前节点上的带有过期时间Key的数量   |  
| 	驱逐Key数量（节点or 分片）	   |  count	   |  jmiss.redis.instance.evicted_keys   |  	当前节点的已被驱逐了的Key数量   |  
| 	已经过期Key数量（节点or 分片）	   |  count	   |  jmiss.redis.instance.expires_keys   |  	当前节点上的已经过期Key的数量   |  
| 	碎片率（节点or 分片）    |   %   |  	jmiss.redis.instance.mem_fragmentation_ratio	   |  当前节点的碎片率   |  
| 	使用内存Rss（节点or 分片）    |   Bytes   |  	jmiss.redis.instance.used_memory_rss	   |  当前节点上的使用内存Rss   |  
| 	内存消耗峰值（节点or 分片）   |    Bytes   |  	jmiss.redis.instance.used_memory_peak	   |  当前节点上的内存消耗峰值   |  


###  网络监控
|   监控指标   |  单位   | metric	  |   说明   | 
| :--- | :---  |:---  |:---  |
| 	客户端到代理的TCP连接数 | 	count	| 	jmiss.redis.cluster.connected_clients	| 	单位时间内客户端到Proxy代理的TCP连接数总和| 	
| 	实例连接使用率| 	%	| 	jmiss.redis.cluster.conn_usage| 		实际 TCP 连接数量和最大连接数比| 	
| 	实例内网进流量| 	KBps| 		jmiss.redis.cluster.net_io_in_per_sec	| 	内网进入流量| 	
| 	实例内网出流量| 	KBps| 		jmiss.redis.cluster.net_io_out_per_sec	| 	内网出口流量| 	
| 	实例最大执行时延| 	ms| 		jmiss.redis.cluster.max_delay| 		Proxy 到 Redis Server 的执行时延最大值| 	
| 	代理当前连接数| 	count| 		jmiss.redis.proxy.connected_clients	| 	单位时间内Proxy代理的连接数总和| 	
| 	代理连接使用率| 	%	| 	jmiss.redis.proxy.connection_usage	| 	Proxy上的实际 TCP 连接数量和最大连接数比| 	
| 	代理入口带宽| 	Bps	| 	jmiss.redis.proxy.net_in	| 	Proxy上的入口带宽| 	
| 	代理出口带宽  | 	Bps	| 	jmiss.redis.proxy.net_out	 | 	Proxy上的出口带宽| 	
| 	代理最大时延 | 	ms  | 		jmiss.redis.proxy.max_latency	| 	单位时间内Proxy的执行时延最大值| 	
| 	TCP连接数 （节点）| 	count	| 	jmiss.redis.instance.connected_clients	| 	单位时间内与Redis的连接数| 	
| 	最大执行时延（节点）| 	ms	| 	jmiss.redis.instance.max_latency	Redis | 	节点最大延迟| 	
| 	内网进流量（节点）| 	KBps	| 	jmiss.redis.instance.net_io_in_per_sec	| 	内网进入流量| 	
| 	内网出流量（节点）| 	KBps	| 	jmiss.redis.instance.net_io_out_per_sec	| 	内网出口流量| 	


###  请求监控

|   监控指标   |  单位   | metric	  |   说明   | 
| :--- | :---  |:---  |:---  |
| 	实例OPS  | 	count/s	| 	jmiss.redis.cluster.instantaneous_ops_per_sec	| 	单位时间内实例的OPS 总和| 	
| 	实例协议错误次数   | 	count/s	| 	jmiss.redis.cluster.protocol_errors	| 	单位时间内实例协议的错误次数 | 	
| 	代理OPS   | 	count/s	| 	jmiss.redis.proxy.ops	| 	单位时间内Proxy的OPS 总和 | 	
| 	代理协议错误次数  | 	count/s	| 	jmiss.redis.proxy.protocol_errors	| 	单位时间内Proxy协议的错误次数| 	
| 	OPS （节点）| 	count/s	 | 	jmiss.redis.instance.instantaneous_ops_per_sec	| 	单位时间内某个节点的的OPS 总和| 	


###  响应监控
|   监控指标   |  单位   | metric	  |   说明   | 
| :--- | :---  |:---  |:---  |
| 	实例慢查询次数  | 	count/s| 		jmiss.redis.cluster.slowlog_times	| 	单位时间内实例的慢查询次数| 	
| 	实例命中次数  | 	count  | 		jmiss.redis.cluster.keyspace_hits	| 	每秒key的命中数量| 	
| 	实例未命中次数 | 	count	| 	jmiss.redis.cluster.keyspace_misses	| 	每秒key的未命中数量| 	
| 	实例命中率 | 	%	| 	jmiss.redis.cluster.keyspace_hit_rate	| 	实例命中次数 ÷（实例命中次数+实例未命中次数） | 	
| 	慢查询次数（节点） | 	count/s | 		jmiss.redis.instance.slowlog_times	| 	单位时间内当前节点的慢查询次数| 	
| 	命中次数（节点） | 	count	| 	jmiss.redis.instance.keyspace_hits	| 	每秒key的命中数量| 	
| 	未命中次数（节点）| 	count	| 	jmiss.redis.instance.keyspace_misses	| 	每秒key的未命中数量| 	
| 	命中率（节点）| 	%	| 	jmiss.redis.instance.keyspace_hit_rate	| 	节点命中次数 ÷（节点命中次数+节点未命中次数） | 	


###  命令统计类监控组

请参考 ： [Redis命令统计](https://docs.jdcloud.com/cn/monitoring/redis)




