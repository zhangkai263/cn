# 集群运维指南

本文主要说明 JMR 集群的一些运维的手段，方便大家在使用的时候可以自主的进行服务的运维。

## 通用环境变量

在集群上，切换到hadoop用户，输入 **env** 命令可以看到类似如下的环境变量配置（以集群上最新的配置为准，此处只做参考）：

```
JAVA_HOME=/opt/jmr/jdk1.8.0_77
HADOOP_HOME=/data0/hadoop-2.8.5
SPARK_HOME=/data0/spark-2.4.7-bin-hadoop2.8
HBASE_HOME=/data0/hbase-2.2.4
HUE_HOME=/data0/hue-4.0.0
HIVE_HOME=/data0/apache-hive-2.3.7-bin
ZOOKEEPER_HOME=/data0/zookeeper-3.4.10
```

## 通过命令行方式启停服务进程

- YARN

  操作用账号：hadoop
  - ResourceManager （Master 节点）
    ```
    // 启动
    /data0/hadoop-home/sbin/yarn-daemon.sh start resourcemanager
    // 停止
    /data0/hadoop-home/sbin/yarn-daemon.sh stop resourcemanager
    ```
  - NodeManager （Core 节点）
    ```
    // 启动
    /data0/hadoop-home/sbin/yarn-daemon.sh start nodemanager
    // 停止
    /data0/hadoop-home/sbin/yarn-daemon.sh stop nodemanager
    ```
  - JobHistoryServer （Master 节点）
    ```
    // 启动
    /data0/hadoop-home/sbin/mr-jobhistory-daemon.sh start historyserver
    // 停止
    /data0/hadoop-home/sbin/mr-jobhistory-daemon.sh stop historyserver
    ```

- HDFS

  操作用账号：hadoop
  - NameNode （Master 节点）
    ```
    // 启动
    /data0/hadoop-home/sbin/hadoop-daemon.sh start namenode
    // 停止
    /data0/hadoop-home/sbin/hadoop-daemon.sh stop namenode
    ```
  - DataNode （Core 节点）
    ```
    // 启动
    /data0/hadoop-home/sbin/hadoop-daemon.sh start datanode
    // 停止
    /data0/hadoop-home/sbin/hadoop-daemon.sh stop datanode
    ```

- Hive

  操作用账号：hadoop
  - MetaStore （Master 节点）

    ```
    // 启动，这里的内存可以根据需要扩大
    HADOOP_HEAPSIZE=512
    /data0/hive-home/bin/hive --service metastore >/data0/var/log/hive/metastore.log 2>&1 &
    ```
  - HiveServer2 （Master 节点）

    ```
    // 启动
    HADOOP_HEAPSIZE=512
    /data0/hive-home/bin/hive --service hiveserver2 >/data0/var/log/hive/hiveserver2.log 2>&1 &
    ```

- HBase

  操作用账号：hadoop
  使用条件：安装完成 HBase 组件
  - HMaster （Master 节点）
    ```
    // 启动
    /data0/hbase-home/bin/hbase-daemon.sh start master
    // 重启
    /data0/hbase-home/bin/hbase-daemon.sh restart master
    // 停止
    /data0/hbase-home/bin/hbase-daemon.sh stop master
    ```
  - HRegionServer （Core 节点）
    ```
    // 启动
    /data0/hbase-home/bin/hbase-daemon.sh start regionserver
    // 重启
    /data0/hbase-home/bin/hbase-daemon.sh restart regionserver
    // 停止
    /data0/hbase-home/bin/hbase-daemon.sh stop regionserver
    ```
  - ThriftServer （Master 节点）
    ```
    // 启动
    /data0/hbase-home/bin/hbase-daemon.sh start thrift -p 9099 >/data0/var/log/hbase/thriftserver.log 2>&1 &
    // 停止
    /data0/hbase-home/bin/hbase-daemon.sh stop thrift
    ```

