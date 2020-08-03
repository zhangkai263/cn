本文介绍了如何配置Spark客户端读写对象存储中的数据。

# 依赖资源

(hadoop-aws-3.2.1.jar)[]

(aws-java-sdk-bundle-1.11.375.jar)[]

# 配置方法

1. 用户可以在spark-shell中配置S3认证信息。使用sc配置S3认证信息示例如下:

```
sc.hadoopConfiguration.set("fs.s3a.access.key","access_key")
sc.hadoopConfiguration.set("fs.s3a.secret.key","secret_key")
sc.hadoopConfiguration.set("fs.s3a.endpoint","endpoint")
sc.hadoopConfiguration.set("fs.s3a.impl","org.apache.hadoop.fs.s3a.S3AFileSystem")
```

* 备注:代码中**sc**代表SparkContext对象

2. 用户可以在Spark默认配置文件中配置S3认证信息。以Spark3为例，在 {SPARK_HOME}/conf/spark-defaults.conf 配置S3认证信息示例如下:

* Spark s3a
```
spark.hadoop.fs.s3a.impl         org.apache.hadoop.fs.s3a.S3AFileSystem
spark.hadoop.fs.s3a.access.key     yourAccessKeyID
spark.hadoop.fs.s3a.secret.key      yourAccessKeySecret
spark.hadoop.fs.s3a.endpoint       s3.cn-north-1.jdcloud-oss.com.jdcloud-oss.com    //以华北为例
```

