## 云数据库 InfluxDB
该产品监控数据的servicecode为tsds，提供的指标信息如下：

metric | 中文名称  | 英文名称 |单位 | 说明
---|--- |--- |--- |--- 
tsds.cpu.util|CPU使用率|CPU utilization|%|
tsds.memory.usage|内存使用率|Memory utilization|%|
tsds.disk.bytes.read|磁盘每秒读字节数|Disk read Bps|Bps|
tsds.disk.bytes.write|磁盘每秒写字节数|Disk write Bps|Bps|
tsds.network.bytes.incoming|网络每秒入流量|Network incoming Bps|Bps|
tsds.network.bytes.outgoing|网络每秒出流量|Network outgoing Bps|Bps|
tsds.disk.iops.read|磁盘读IOPS|Disk read iops|次/秒|
tsds.disk.iops.write|磁盘写IOPS|Disk write iops|次/秒|
tsds.disk.all|磁盘总量|Disk All|MB|
tsds.disk.free|磁盘剩余量|Disk Free|MB|
tsds.disk.used|磁盘使用量|Disk Used|MB|
tsds.disk.free.percent|磁盘剩余百分比|Disk free percent|%|
tsds.disk.used.percent|磁盘使用百分比|Disk used percent|%|
tsds.database.series|数据库Series数量|Database series|个|
tsds.database.measurements|数据库measurement数量|Database measurements|个|
tsds.write.points|数据库写入点数|Database write points|个|
tsds.write.errors|数据库写错误数|Database write errors|次|
tsds.write.requests|数据库写入请求数|Database write requests|次|
tsds.query.requests|数据库查询请求数|Database query requests|次|
tsds.query.executor.duration.ms|数据库查询耗时|Database query duration|ms|
tsds.client.errors|数据库连接错误数|Database client errors|次|
tsds.client.auth_fail|数据库验证失败数|Database client authfail|次|

