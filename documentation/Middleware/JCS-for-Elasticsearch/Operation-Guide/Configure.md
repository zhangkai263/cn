##  高级配置
用户可通过集群管理页面修改elasticsearch.yml文件的某些配置，可用于用户进行集群调优，修改配置完成后需要重启集群才能使这些配置生效。当前支持的可配置项如下：</br>

|参数| 参数说明| 取值限制说明
:--|:---|:---
|action.destructive_requires_name | 删除指定名称的索引 | true 或者 false，默认值为 false。如果配置为false支持通配符删除索引，则可以使用通配符进行批量删除索引。 
|indices.fielddata.cache.size| 分配到字段数据的 Java 堆空间的百分比 |百分数，格式：1% - 100%，默认无限制，即为100%。建议将此值配置为JVM堆的40%来开始基准测试。
|indices.memory.index_buffer_size |索引缓冲大小 |百分数，格式：1% - 100%，默认值为10%。增加index buffer，可加快写入速度。
|indices.query.bool.max_clause_count | 指定 Lucene 布尔查询中允许的子句的最大数量 | 正整数，默认值为1024。如果查询到的子句数超过了允许的子句数，则会导致 TooManyClauses 错误。 
|thread_pool.search.queue_size| 线程池seach队列大小 |正整数，默认值为1000。
|thread_pool.write.queue_size |线程池写入队列大小 |正整数，默认值为200。


```
请注意：
如果集群健康状态为 YELLOW 或 RED，或集群存在无副本索引时，更新高级配置会导致服务不稳定或数据丢失，建议集群状态为绿色，且所有索引都存在副本时，再进行修改配置操作
```
