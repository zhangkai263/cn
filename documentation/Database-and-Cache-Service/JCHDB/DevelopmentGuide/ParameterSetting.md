# 集群参数设置

Clickhouse集群参数默认值通常配置在config.xml和user.xml文件中，您可以通过修改全局参数帮助进行实例优化。
京东云分析型数据库JCHDB控制台支持参数修改功能，支持config.xml和user.xml两种配置文件的参数修改。
需要注意的是：
users.xml配置文件参数您可以在JCHDB实例详情-参数修改页面，修改参数无需重启实例；
config.xml配置文件您可以在JCHDB实例详情-参数修改页面，修改参数后需要重启实例使修改后的参数生效。

**可以通过控制台修改的参数和对应的配置文件如下**
|参数名|参数含义|配置文件|参数默认值|是否需要重启生效|
|-|-|-|-|-|
|keep_alive_timeout|在关闭连接之前等待传入请求的秒数|config.xml|3|是|
|max_connections|最大连接数|config.xml|4096|是|
|max_partition_size_to_drop|drop part的大小限制|config.xml|0|是|
|max_table_size_to_drop|drop表的大小限制|config.xml|0|是|
|max_concurrent_queries|最大并发查询数|config.xml|100|是|
|uncompressed_cache_size|使用的未压缩数据的缓存大小|config.xml|8589934592|是|
|mark_cache_size|标记缓存的大小|config.xml|5368709120|是|
|use_uncompressed_cache|是否使用未压缩块的缓存|users.xml|1|否|
|max_memory_usage|运行一次查询限制使用的最大内存用量|users.xml|33285996544|否|
|distributed_ddl_task_timeout|ddl执行超时时间设置|users.xml|180|否|
|background_pool_size|后台线程数|users.xml|16|否|
|max_memory_usage_for_all_queries|所有查询最大使用内存|users.xml|33285996544|否|
|max_query_size|可以带到RAM以便与SQL解析器一起解析的查询的最大部分|users.xml|262144|否|
|max_partitions_per_insert_block|在单次INSERT写入的时候，限制创建的最大分区个数|users.xml|100|否|
