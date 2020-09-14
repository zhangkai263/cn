## 第三方Elasticsearch数据迁移

用户可以通过快照方式，把在其他云厂商购买的ES集群，迁移至京东智联云ES，该方式适合于：</br>
* 大数据量场景下的数据迁移
* 对迁移速度要求较高的场景

基于快照方式迁移使用的是ES的Snapshot API接口进行迁移，基本原理为：将其他云厂商的ES集群创建索引快照， 通过工具把快照迁移至京东智联云对象存储OSS，然后在京东智联云ES集群中进行恢复。</br>

由于其他云厂商版本比与京东智联云Elasticsearch版本不一致，因此需要选择合适的版本进行迁移，版本选取详情，请参见[官方文档](https://www.elastic.co/guide/en/elasticsearch/reference/current/snapshot-restore.html)。</br>


## 步骤一：源ES集群创建快照仓库

进行数据迁移时，需要通过Kibana先在其他云厂商ES集群上创建OSS仓库，命令如下：</br>

```
POST _snapshot/test_auto_snapshot
{
    "type": "oss",
    "settings": {
        "endpoint": "***.***.com",  //其他云厂商对象存储服务域名
        "bucket": "***-***",  //OSS Bucket 名称
        "access_key_id": "***",  //其他云厂商 API 密钥 AccessKey
        "secret_access_key": "8N7nu9fu274kn3ispVLQE37Hzwumyd",   //其他云厂商 API 密钥 SecretKey
        "base_path": "***_backup" //备份目录
    }
}
```


## 步骤二：源ES集群创建快照

调用Snapshot API 创建相关索引的快照数据，创建快照时，可以指定只对部分索引进行快照，也可以备份所有索引，详见[官方文档](https://www.elastic.co/guide/en/elasticsearch/reference/6.4/modules-snapshots.html)。</br>



通过kibana，将其他云厂商ES集群中的相关索引备份到test_auto_snapshot仓库下，并命名为auto_snapshot_2020081901：</br>

```
PUT /_snapshot/test_auto_snapshot/auto_snapshot_2020081901
{
"indices": ["test_index_01","a", "b"]
}
```
## 步骤三：查看源ES集群快照状态

查看仓库test_auto_snapshot下快照auto_snapshot_2020081901的状态，state字段为SUCCESS则说明快照已经备份成功。</br>

```
GET /_snapshot/test_auto_snapshot/auto_snapshot_2020081901
```





## 步骤四：使用数据迁移工具
阿里云ES的快照数据存储在其他云厂商对象存储上，需要同步至京东云对象存储，京东智联云对象存储官方提供了从其他云对象存储迁移数据至京东云的方法，详见[京东智联云对象存储迁移工具使用文档](https://docs.jdcloud.com/cn/object-storage-service/migration-tool)京东云对象存储迁移工具使用文档。</br>

```
注意事项：
1. 需要先安装jdk 1.8
2. 需要下载得到 transfer-tools-java-1.0.0.jar
3. 需要创建transfer-tools-java-1.0.0.jar的配置文件application.yaml
4. 进入transfer-tools-java-1.0.0.jar所在的本地目录，通过spring.config.location指定application.yml的位置，执行java -jar transfer-tools-java-1.0.0.jar --Dspring.config.location=application.yml命令迁移oss数据
```

## 步骤五：从快照恢复源集群数据
调用Snapshot API 从快照中恢复相关索引，可以指定恢复部分索引，也可以恢复所有索引，详见[官方文档](https://www.elastic.co/guide/en/elasticsearch/reference/6.4/modules-snapshots.html)。</br>

### 创建同名仓库
京东智联云上的快照仓库名称必须和源集群其他云厂商上的快照仓库名称一致。以test_auto_snapshot举例，通过Kibana创建名称为test_auto_snapshot的快照仓库

```
POST _snapshot/test_auto_snapshot
{
    "type": "s3",
    "settings": {
        "endpoint": "***.jcloudcs.com",    //京东智联云对象存储名称
        "access_key": "******",  //京东智联云API秘钥 AccessKey
        "secret_key": "******",   //京东智联云API密钥 SecretKey
        "bucket": "es-auto-backup", //OSS Bucket 名称
        "base_path": "**_backup"  //备份目录
    }
}
```


### 查看快照数据

查看工具同步产生的快照数据，在仓库test_auto_snapshot下的快照auto_snapshot_2020081901。

```
GET /_snapshot/test_auto_snapshot/auto_snapshot_2020081901
```




### 恢复索引
从快照仓库test_auto_snapshot的快照auto_snapshot_2020082001中，通过Kibana恢复索引test_index_01的数据

```
POST /_snapshot/test_auto_snapshot/auto_snapshot_2020082001/_restore
{
  "indices": "test_index_01"
}
```



