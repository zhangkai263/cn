# 管理端口及常用文件路径

本文介绍集群端口的相关配置，以及常用文件的路径。

## 组件端口

| 组件类型         | 服务              | 端口       | 配置                                   |
| ---------------- | :---------------- | :--------- | :------------------------------------- |
| Hadoop HDFS      | NameNode RPC      | 8020       | dfs.namenode.servicerpc-address        |
|                  | NameNode          | 50070      | dfs.namenode.http-address              |
|                  | NameNode          | 50470      | dfs.namenode.https-address             |
|                  | DataNode          | 50010      | dfs.datanode.address                   |
|                  | DataNode          | 50075      | dfs.datanode.http.address              |
|                  | DataNode          | 50475      | dfs.datanode.https.address             |
|                  | Datanode          | 8010       | dfs.datanode.ipc.address               |
| Hadoop YARN      | Resource Manager  | 8088       | yarn.resourcemanager.webapp.port       |
|                  | ResourceManager   | 8090       | yarn.resourcemanager.webapp.https.port |
|                  | JobHistory Server | 10020      | mapreduce.jobhistory.address           |
| Hadoop MapReduce | ShuffleHandler    | 13562      | mapreduce.shuffle.port                 |
|                  | Job History       | 19888      | mapreduce.jobhistory.webapp.port       |
|                  | Job History       | 10020      | mapreduce.jobhistory.address           |
| Hadoop Spark     | thriftserver      | 11111      | hive.server2.thrift.port               |
|                  | SparkHistory      | 18080      | spark.history.ui.port                  |
| Hadoop HBase     | HMaster           | 16000      | hbase.master.port                      |
|                  | HMaster           | 16010      | hbase.master.info.port                 |
|                  | HRegionServer     | 16020      | hbase.regionserver.port                |
|                  | HRegionServer     | 16030      | hbase.regionserver.info.port           |
| Hive             | MetaStore         | 9083       | hive.metastore.port                    |
|                  | HiveServer2       | 10000      | hive.server2.thrift.port               |
| ZooKeeper        | quorumpeermain    | 2888、3888 | Peer                                   |
|                  | ClientPort        | 2181       | clientPort                             |
| Flink            | Flink server      | 8083       | historyserver.web.port                 |
| Zeppelin         | zeppelinserver    | 8888       | zeppelin.server.port                   |

## 组件目录

软件安装目录在/data0下，例如：

- Hadoop：/data0/hadoop-home
- Spark ：/data0/spark-home
- Hive：/data0/hive-home
- Flink：/data0/flink-home
- HBase：/data0/hbase-home

您也可以通过登录Master节点，切换成hadoop用户，执行**env |grep XXX**命令查看软件的安装目录。

例如，执行以下命令，查看Hadoop的安装目录。

```
[hadoop@AtQ0jM6w-Master1 data0]$ env |grep HADOOP
```

返回如下信息，其中`/data0/hadoop-2.8.5`为Hadoop的安装目录。

```
HADOOP_LOG_DIR=/data0/var/log/hadoop
HADOOP_HOME=/data0/hadoop-2.8.5
HADOOP_USER_CLASSPATH_FIRST=true
```

## 日志目录

组件日志目录在/data0/var/log/xxx 下，例如：

- Yarn ResourceManager日志：Master节点/data0/var/log/hadoop-yarn
- Yarn NodeNanager日志：Slave节点/data0/var/log/hadoop-yarn/nodemanager
- HDFS NameNode日志：Master节点/data0/var/log/hadoop
- HDFS DataNode日志：Slave节点/data0/var/log/hadoop
- Hive日志：/data0/var/log/hive
- Flink日志：/data0/var/log/flink

## 配置文件

配置文件目录在 /data0/xxx 各个组件的HOME目录下，例如：

- Hadoop：/data0/hadoop-2.8.5/etc/hadoop/
- Spark：/data0/spark-2.4.7-bin-hadoop2.8/conf/
- Hive：/data0/apache-hive-2.3.7-bin/conf/
- Flink：/data0/flink-1.10.0/conf/
- HBase：/data0/hbase-2.2.4/conf/

