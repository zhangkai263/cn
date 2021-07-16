# Spark使用OSS select优化数据查询（公测）

本文介绍了在Spark里使用[OSS select](../../Operation-Guide/Manage-Object/Select-Object.md)来优化数据查询的方法。目前OSS select处于公测中。

## 引入s3select依赖包

进入jars目录，下载oss-select.jar依赖包

下载地址：

[scala 11版本对应jar包](https://cn-north-1-chenxue198.s3.cn-north-1.jdcloud-oss.com/spark-select_2.11-2.1.jar)

[scala 12版本对应jar包](https://cn-north-1-chenxue198.s3.cn-north-1.jdcloud-oss.com/spark-select_2.12-2.1.jar)

项目源码可参考开源项目[minio-SparkSelect](https://github.com/minio/spark-select)

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
