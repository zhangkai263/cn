# JCHDB 支持的实例规格
JCHDB分为计算节点和ZooKeeper节点，相同规格的计算节点和ZooKeeper节点，规格代码相同。
- 计算节点使用3副本的云盘作为存储空间
- ZooKeeper节点不存储用户数据，无存储空间


### 计算节点
|规格代码|VCPU(核)|内存（GB）|支持的存储空间（GB）|步长（GB）|
|-|-|-|-|-|
|clickhouse.s1.xlarge|4|16|200-16000|100|
|clickhouse.s1.2xlarge|8|32|200-16000|100|
|clickhouse.s1.4xlarge|16|64|200-16000|100|
|clickhouse.s1.8xlarge|32|128|200-16000|100|


### ZooKeeper节点
|规格代码|VCPU(核)|内存（GB）|
|-|-|-|
|clickhouse.s1.xlarge|4|16|
|clickhouse.s1.2xlarge|8|32|
|clickhouse.s1.4xlarge|16|64|
|clickhouse.s1.8xlarge|32|128|
