# 存储空间（bucket）管理

[Bucket是否支持重命名？](Bucket-Management#user-content-1)

[ 是否支持删除Bucket？](Bucket-Management#user-content-2)

[删除Bucket失败的几种常见原因](Bucket-Management#user-content-3)

[误删除存储空间内的文件，是否可以恢复？](Bucket-Management#user-content-4)

[通过控制台删除Bucket时出现“The bucket you tried to delete has replication configuration configured.”报错](Bucket-Management#user-content-5)

[如何查询Bucket存储量、流量？](Bucket-Management#user-content-6)

------

<div id="user-content-1"></div>

#### Bucket是否支持重命名？

不支持，可以创建新的Bucket后迁移文件。

<div id="user-content-2"></div>

#### 是否支持删除Bucket？

只有Bucket为空时，可以删除。

<div id="user-content-3"></div>

#### 删除Bucket失败的几种常见原因

当无法删除Bucket时，请确认Bucket是否为空，关注以下几点：

- 有分片上传任务，Bucket不能删除；
- Bucket存在增量数据同步规则，不能删除；
- Bucket存在图片样式，不能删除；
- 因文件较多、访问网络超时等原因导致**Object管理**中资源获取失败而显示为空，但因实际资源不为空所以无法删除该Bucket。建议您使用**生命周期管理**进行Object及分片的删除，参见[生命周期管理](https://docs.jdcloud.com/object-storage-service/lifecycle)。

<div id="user-content-4"></div>

#### 误删除存储空间内的文件，是否可以恢复？

暂不支持恢复。

<div id="user-content-5"></div>

#### 通过控制台删除Bucket时出现“The bucket you tried to delete has replication configuration configured.”报错

若存在数据同步规则，源Bucket与目标Bucket均不可删除，必须先关闭增量数据同步。详情参见[数据同步设置](https://docs.jdcloud.com/object-storage-service/set-bucket-cross-region-replication-2)。

<div id="user-content-6"></div>

#### 如何查询Bucket用量数据？

通过API接口：参考文档[根据type获取指定bucket用量数据](https://docs.jdcloud.com/object-storage-service/api/getsinglebucketcapacity?content=API)。
