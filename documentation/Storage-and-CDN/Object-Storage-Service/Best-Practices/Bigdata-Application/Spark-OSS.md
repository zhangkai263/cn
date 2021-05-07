# Spark读写对象存储数据

本文介绍了如何配置Spark客户端读写对象存储中的数据。

## 依赖资源

### Maven

```
<dependencies>
  <dependency>
      <groupId>org.apache.hadoop</groupId>
      <artifactId>hadoop-aws</artifactId>
      <version>3.2.1</version>
  </dependency>
  <dependency>
      <groupId>com.amazonaws</groupId>
      <artifactId>aws-java-sdk-bundle</artifactId>
      <version>1.11.375</version>
  </dependency>
</dependencies>

```

## 配置方法

1.用户可以在spark-shell中配置S3认证信息。使用sc配置S3认证信息示例如下:

```
sc.hadoopConfiguration.set("fs.s3a.access.key","access_key")
sc.hadoopConfiguration.set("fs.s3a.secret.key","secret_key")
sc.hadoopConfiguration.set("fs.s3a.endpoint","endpoint")
sc.hadoopConfiguration.set("fs.s3a.impl","org.apache.hadoop.fs.s3a.S3AFileSystem")
```

* 备注:代码中**sc**代表SparkContext对象

2.用户可以在Spark默认配置文件中配置S3认证信息。以Spark3为例，在 {SPARK_HOME}/conf/spark-defaults.conf 配置S3认证信息示例如下:

Spark s3a
```
spark.hadoop.fs.s3a.impl         org.apache.hadoop.fs.s3a.S3AFileSystem
spark.hadoop.fs.s3a.access.key     yourAccessKeyID
spark.hadoop.fs.s3a.secret.key      yourAccessKeySecret
spark.hadoop.fs.s3a.endpoint       s3.cn-north-1.jdcloud-oss.com.jdcloud-oss.com    
```
* 示例中endpoint为华北空间的endpoint，如使用其他区域空间，可以参考[OSS访问域名和地域](https://docs.jdcloud.com/cn/object-storage-service/oss-endpont-list)进行更换。

Spark
```
spark.eventLog.enabled       true
spark.eventLog.dir          s3a://YourBucketName/spark/
```

3.用户可以在spark-shell命令行配置S3认证信息。使用spark-shell配置S3认证信息示例如下:
```
spark-shell \
--conf spark.hadoop.fs.s3a.endpoint=http://s3.cn-north-1.jdcloud-oss.com \
--conf spark.hadoop.fs.s3a.access.key=yourAccessKeyID \
--conf spark.hadoop.fs.s3a.secret.key=yourAccessKeySecret \
--conf spark.hadoop.fs.s3a.path.style.access=true \
--conf spark.hadoop.fs.s3a.impl=org.apache.hadoop.fs.s3a.S3AFileSystem
```

## 操作示例
### 读取数据
```
val rdd = sc.textFile("s3a://YourBucketName/spark-read/test-read")
rdd.collect().foreach(println)
```

### 写入数据
```
val rdd = sc.textFile("s3a://YourBucketName/spark-read/")
rdd.count
val wcData = rdd.flatMap(l => l.split(" ")).map(word => (word, 1)).reduceByKey(_ + _)
wcData.saveAsTextFile("s3a://YourBucketName/spark-write1/")
```
