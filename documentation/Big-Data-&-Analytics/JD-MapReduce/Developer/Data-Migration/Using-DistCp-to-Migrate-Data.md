# 通过DistCp 迁移数据

DistCp（distributed copy）是用于大型集群间/集群内复制的工具。它使用 MapReduce 来实现其分发、错误处理和恢复以及报告生成。它将文件和目录的列表扩展为映射任务的输入，每个任务将复制源列表中指定的文件分区。DistCp 是 Hadoop 自带的文件迁移工具，更多用法请参考 [DistCp Guide](http://hadoop.apache.org/docs/stable1/distcp.html)。

## 网络连通

#### 本地自建 HDFS 文件迁移到 JMR

需要有专线打通网络，可以联系开发人员协助解决。

#### 云上自建 HDFS 文件迁移到 JMR

- 所属网络在同一VPC下，可自由传送文件；
- 所属网络不在同一VPC下，需要使用对等连接将网络打通，可参见 [VPC对等连接](https://docs.jdcloud.com/cn/virtual-private-cloud/vpc-peering-configuration)。

## 执行拷贝/迁移

网络互通的两个Hadoop集群中，使用Distcp工具执行如下命令将源集群的HDFS、HBase、Hive数据文件以及Hive元数据备份文件拷贝至目的集群：

```
$HADOOP_HOME/bin/hadoop distcp <src> <dist> -p
```

其中，各参数的含义如下：

- *$HADOOP_HOME*：目的集群Hadoop客户端安装目录
- *src*：源集群HDFS目录
- *dist*：目的集群HDFS目录

例如，将nn1节点所在集群A上目录a.dir拷贝到nn2节点所在集群B目的b.dir上：

```
# 集群间的拷贝，将一个文件夹拷贝到另一个集群
hadoop distcp -i hdfs://nn1:8020/a.dir hdfs://nn2:8020/b.dir

# 指定文件拷贝
hadoop distcp hdfs://nn1:8020/foo/a hdfs://nn1:8020/foo/b hdfs://nn2:8020/bar/foo

# 如果指定的文件太多，可使用 -f 参数。
```

## 注意事项

1. 对于上述命令，必须要求源和目的版本相同。
2. 当另一个客户端仍然在向源文件写入时，该拷贝可能会失败；当一个文件正在被拷贝到目的端，试图重写该文件的操作会失败；如果源文件在拷贝之前被移动或删除了，那么拷贝将失败，同时输出一样 FileNotFoundException。