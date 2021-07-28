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
| 	实例驱逐Key数量   |  count	jmiss.redis.cluster.evicted_keys	   |  单位时间内实例驱逐了的Key数量   |  
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



