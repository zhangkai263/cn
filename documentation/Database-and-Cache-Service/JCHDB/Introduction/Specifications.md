# JCHDB 支持的实例规格
JCHDB分为计算节点和ZooKeeper节点。 

### 计算节点
计算节点使用3副本的云盘作为存储空间，支持以下规格
|规格代码|VCPU(核)|内存（GB）|支持的存储空间（GB）|步长（GB）|
|-|-|-|-|-|
|clickhouse.s1.xlarge|4|16|200-8000|100|
|clickhouse.s1.2xlarge|8|32|200-8000|100|
|clickhouse.s1.4xlarge|16|64|200-8000|100|
|clickhouse.s1.6xlarge|24|64|200-8000|100|
|clickhouse.s1.8xlarge|32|64|200-8000|100|


### ZooKeeper节点
ZooKeeper节点不存储用户数据，支持以下规格（相同规格的节点，代码与计算节点相同）

|规格代码|VCPU(核)|内存（GB）|
|-|-|-|
|clickhouse.s1.xlarge|4|16|
|clickhouse.s1.2xlarge|8|32|
|clickhouse.s1.4xlarge|16|64|
|clickhouse.s1.6xlarge|24|64|
|clickhouse.s1.8xlarge|32|64|
