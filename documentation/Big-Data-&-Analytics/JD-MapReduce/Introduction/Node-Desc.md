# 节点类型说明

JMR定义了3种节点类型，您可以根据集群类型进行选择：

| 节点类型         | 说明                                                         | HA（高可用）数量 | 非 HA 数量 |
| :--------------- | :----------------------------------------------------------- | :--------------- | :--------- |
| 主节点（Master） | 部署 NameNode、ResourceManager、ZooKeeper、JournalNode、HMaster 等进程。 | 2                | 1          |
| 核心节点（Core） | 部署 DataNode、NodeManager、RegionServer 等进程。            | ≥ 2              | ≥ 2        |
| 计算节点（Task） | 部署 NodeManager等进程。                                     | ≥ 0              | ≥ 0        |

- Master 节点为管理节点，保证集群的调度正常进行。
- Core 节点为计算及存储节点，您在 HDFS 中的数据全部存储于 Core 节点中，因此为了保证数据安全，扩容 Core 节点后不允许缩容。
- Task 节点为纯计算节点，不存储数据，被计算的数据来自 Core 节点及 OSS 中，因此 Task 节点往往被作为弹性节点，可随时扩容和缩容。

