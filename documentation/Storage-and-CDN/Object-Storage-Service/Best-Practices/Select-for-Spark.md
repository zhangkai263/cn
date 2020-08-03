本文介绍了在Spark里使用[OSS select](../Object-Storage-Service/Operation-Guide/Manage-Object/Select-Object.md)来优化数据查询的方法。

# 1.配置Spark

## spark-env.sh配置

将conf文件夹下的spark-env.sh.template重命名为spark-env.sh，并添加以下内容：

```
export JAVA_HOME=/usr/lib/jvm/java-1.8.0-openjdk-1.8.0.242.b08-1.el7.x86_64/
export HADOOP_HOME=/home/hadoop/www/runtime/hadoop/hadoop-3.2.1/
export HADOOP_CONF_DIR=/home/hadoop/www/runtime/hadoop/hadoop-3.2.1/etc/hadoop/
export SPARK_MASTER_IP=master
export SPARK_MASTER_PORT=7078
export SPARK_LOCAL_IP=           #配置spark本机ip
export SPARK_WORKER_MEMORY=6g    #
export SPARK_WORKER_CORES=2      #
```

## slaves配置

```
master
slave1
slave2
```

同步配置到从节点


# 2.引入s3select依赖包

进入jars目录，下载oss-select.jar依赖包

下载地址：

[cala 11版本对应jar包](https://cn-north-1-chenxue198.s3.cn-north-1.jdcloud-oss.com/spark-select_2.11-2.1.jar)

[cala 12版本对应jar包](https://cn-north-1-chenxue198.s3.cn-north-1.jdcloud-oss.com/spark-select_2.12-2.1.jar)

项目源码可参考开源项目[minio-SparkSelect](https://github.com/minio/spark-select)

# 3.启动验证

进入sbin目录，使用命令./start-all.sh启动集群。使用examples验证：

```
./bin/spark-submit   --class org.apache.spark.examples.SparkPi --master yarn examples/jars/spark-examples_2.12-3.0.0.jar
```

需使用s3a客户端，使用方法可参考：[hadoop-s3a]()

## 示例

```
spark.sparkContext.hadoopConfiguration.set("fs.s3a.access.key", "")
spark.sparkContext.hadoopConfiguration.set("fs.s3a.secret.key", "")
spark.sparkContext.hadoopConfiguration.set("fs.s3a.endpoint", "")
spark.sparkContext.hadoopConfiguration.set("fs.s3a.impl", "org.apache.hadoop.fs.s3a.S3AFileSystem")
val schema = StructType(
 List(StructField("name", StringType, false),
 StructField("age", IntegerType, false)))

val df = spark.read.format("minioSelectCSV")//minioSelectJSON
  .schema(schema)
  .options(Map("quote" -> "\'", "header" -> "true", "delimiter" -> ","))
  .load("s3://bukcet/object")
df.select("*").show()
sql:

spark.sql("CREATE TEMPORARY VIEW MyView (age INT, name STRING) USING minioSelectCSV OPTIONS (path \"s3://bucket/object\")")
spark.sql("select * from MyView where age > 10").show()
```
