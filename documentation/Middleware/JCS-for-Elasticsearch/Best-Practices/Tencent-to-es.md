## 阿里云Elasticsearch数据迁移至京东智联云

用户可以通过快照方式，把在其他云厂商购买的ES集群，迁移至京东智联云ES，该方式适合于：</br>
* 大数据量场景下的数据迁移
* 对迁移速度要求较高的场景

基于快照方式迁移使用的是ES的Snapshot API接口进行迁移，基本原理为：将阿里云的ES集群创建索引快照， 通过工具把快照迁移至京东智联云对象存储OSS，然后在京东智联云ES集群中进行恢复。</br>


## 创建快照仓库

oss快照进行数据迁移时，需要通过Kibana先在阿里云ES集群上创建OSS仓库，命令如下：</br>

```
POST _snapshot/test_auto_snapshot
{
    "type": "oss",
    "settings": {
        "endpoint": "***.aliyuncs.com",  //阿里云对象存储服务域名
        "bucket": "***-aliyun-aliyuncs",  //OSS Bucket 名称
        "access_key_id": "***",  //阿里云 API 密钥 AccessKey
        "secret_access_key": "8N7nu9fu274kn3ispVLQE37Hzwumyd",   //阿里云 API 密钥 SecretKey
        "base_path": "***_backup" //备份目录
    }
}
```


##创建快照

调用snapshot api 创建相关索引的快照数据，创建快照时，可以指定只对部分索引进行快照，也可以备份所有索引，详见官方文档



将源 ES 集群中的相关索引备份到test_auto_snapshot仓库下，并命名为auto_snapshot_2020081901：

通过kibana执行下边的操作
 
PUT /_snapshot/test_auto_snapshot/auto_snapshot_2020081901
{
"indices": ["test_index_01","a", "b"]
}


查看仓库test_auto_snapshot下快照auto_snapshot_2020081901的状态
通过kibana执行下边的操作
 
GET /_snapshot/test_auto_snapshot/auto_snapshot_2020081901



ali oss => jd oss
阿里云ES的快照数据存储在阿里云对象存储上，需要同步至京东云对象存储，京东云对象存储官方提供了从其他云对象存储迁移数据至京东云的方法：京东云对象存储迁移工具使用文档

准备数据迁移工具
迁移数据命令
1. 需要先安装jdk 1.8
2. 需要下载得到 transfer-tools-java-1.0.0.jar
3. 需要创建transfer-tools-java-1.0.0.jar的配置文件application.yaml
4. 进入transfer-tools-java-1.0.0.jar所在的本地目录，通过spring.config.location指定application.yml的位置，执行下述命令迁移oss数据
执行命令 java -jar transfer-tools-java-1.0.0.jar --Dspring.config.location=application.yml

具体说明application.yml的配置，

这部分的操作需要在本地通过shell执行
 
 
jobType: transfer
sourceType: aliyunfile
src.access.id: LTAI4GCKtgBtRtrDRAZARoS6
src.secret.key: 8N7nu9fu274kn3ispVLQE37Hzwumyd
src.endpoint: https://oss-cn-beijing.aliyuncs.com
src.bucket: automation-resource-aliyun-aliyuncs
src.prefix:
des.access.id: 0BDEDA85904418B15D2E08BA8919328B
des.secret.key: 3A831FE62DD146EEED78CD64C4C2C9B1
des.endpoint: https://s3.cn-north-1.jdcloud-oss.com
des.bucket: es-auto-backup
des.prefix:
 
注意，如果需要二次迁移oss的数据，记得把log文件夹先清理一下，因为oss做断点续传，会根据审计日志，来判断哪些文件不需要再次传输


jobType:源oss所属账户的ak
sourceType:源文件的类型
src.access.id:源oss所属账户的ak
src.secret.key:源oss所属账户的sk
src.endpoint:源oss服务的域名
src.bucket:源快照所在的oss的bucket
src.prefix:源快照所在的oss的目录
desc.access.id:目的oss所属账户的ak
desc.secret.key:目的oss所属账户的sk
desc.endpoint:目的oss服务的域名
desc.bucket:目的快照所在的oss的bucket
desc.prefix:目的快照所在的oss的目录


从快照恢复数据(目的集群上执行)
调用snapshot api 从快照中恢复相关索引，可以指定恢复部分索引，也可以恢复所有索引，api说明文档：官方文档

创建同名仓库
注意这个快照仓库必须和源快照仓库名称一样

以test_auto_snapshot举例，在jd云子账户jcloudiaas2下，使用oss服务，创建名称为test_auto_snapshot的快照仓库

通过kibana执行下边的操作
 
 
POST _snapshot/test_auto_snapshot
{
    "type": "s3",
    "settings": {
        "endpoint": "s3.cn-north-1.jcloudcs.com",
        "access_key": "0BDEDA85904418B15D2E08BA8919328B",
        "secret_key": "3A831FE62DD146EEED78CD64C4C2C9B1",
        "bucket": "es-auto-backup",
        "base_path": "taoluo_backup"
    }
}
type:快照类型
endpoint：阿里云对象存储服务域名。
access_key: 阿里云 API 密钥 AccessKey。
access_key：阿里云 API 密钥 SecretKey。
bucket：OSS Bucket 名字。
base_path：备份目录。


查看工具同步产生的快照数据，在仓库test_auto_snapshot下的快照auto_snapshot_2020081901
GET /_snapshot/test_auto_snapshot/auto_snapshot_2020081901




恢复索引
从快照仓库test_auto_snapshot的快照auto_snapshot_2020082001中，恢复索引test_index_01的数据

通过kibana执行下边的操作
 
POST /_snapshot/test_auto_snapshot/auto_snapshot_2020082001/_restore
{
  "indices": "test_index_01"
}




