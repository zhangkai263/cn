## Kafka Manager
kafka Manager是由Yahoo开源的一个Kafka管理工具，提供的主要功能如下：</br>
1. 方便的集群状态监控 (包括Topics, Consumers, Offsets, Brokers, Replica Distribution, Partition Distribution)</br>
2. 方便选择您想要的分区副本</br>
3. 配置分区任务，包括选择使用哪些Brokers</br>
4. 可以对分区任务重分配</br>
5. 提供不同的选项来创建Topic (不同版本配置上有所不同)</br>
6. 删除Topic(仅仅支持 0.8.2以上版本并且注意在Broker Config中设置delete.topic.enable=true in broker config)</br>
7. Topic list会指明哪些topic被删除 </br>
8. 批量产生分区任务并且和多个Topic和Brokers关联</br>
9. 批量运行多个主题对应的多个分区</br>
10. 向已经存在的主题中添加分区</br>
11. 对已经存在的Topic修改配置</br>

### 前提条件
- 已成功创建消息队列Kafka版实例。</br>

### 操作说明
1. 在实例列表页面，点击操作列的“Kafka Manager”可跳转至当前实例的Kafka Manager页面。</br>

![查询1](https://github.com/jdcloudcom/cn/blob/Kafka/image/Internet-Middleware/JCS-for-Kafka/Kafka-Manager.png)

2. 点击实例名称进入详情页面，可查看“Topic”和“Brokers”。</br>

![查询1](https://github.com/jdcloudcom/cn/blob/Kafka/image/Internet-Middleware/JCS-for-Kafka/image1.png)

![查询1](https://github.com/jdcloudcom/cn/blob/Kafka/image/Internet-Middleware/JCS-for-Kafka/image2.png)

3. Topic管理</br>

1). 新建Topic</br>

![查询1](https://github.com/jdcloudcom/cn/blob/Kafka/image/Internet-Middleware/JCS-for-Kafka/image3.png)

点击上方Topic下拉菜单，点击Create填写相应参数创建topic，主要参数说明如下：</br>

| 参数| 说明  |
| :--| :---|
| Topic | Topic名称，用户自定义即可 |
| Patitions | Topic的分区数，≥1，适当的分区数可以提高吞吐量 |
| Replication Factor | 副本数，用于保障kafka的高可用</br>**风险提示：当选择单一副本数时，存在丢失数据的风险，为了保证数据可靠性建议选择至少3副本** |

2). 查看Topic</br>

点击Topic后的数字，可进行topic列表的查看。</br>

![查询1](https://github.com/jdcloudcom/cn/blob/Kafka/image/Internet-Middleware/JCS-for-Kafka/image4.png)

在Topic列表页，可查看Topic名称、分区数、Broker数、副本数等相关信息。</br>

![查询1](https://github.com/jdcloudcom/cn/blob/Kafka/image/Internet-Middleware/JCS-for-Kafka/image5.png)

点击Topic名称，可进一步查看具体信息。</br>

![查询1](https://github.com/jdcloudcom/cn/blob/Kafka/image/Internet-Middleware/JCS-for-Kafka/image6.png)


3). 重新分区</br>

在Topic具体信息页面，点击“Generate Partition Assignments”可完成相应Topic和Broker的重新分区。</br>

![查询1](https://github.com/jdcloudcom/cn/blob/Kafka/image/Internet-Middleware/JCS-for-Kafka/image7.png)

4). 增加分区</br>

![查询1](https://github.com/jdcloudcom/cn/blob/Kafka/image/Internet-Middleware/JCS-for-Kafka/image8.png)

在Topic具体信息页面，点击“Add Partitions”可增加分区。</br>

|参数|说明 
:--|:---
|Delete Topic|删除Topic
|Reassign Partitions |平衡集群负载，可为assigned replica中选举一个新的leader，还可改变partition中的assigned replica
|Add Partitions |增加分区
|Update Config |Topic配置信息更新
|Manual Partition Assignments |手动为每个分区下的副本分配broker，如下如，完成后点击Save Partition Assigment即可
|Create Partition Assignments |系统自动为每个分区下的副本分配broker

```
请注意：Partitions中数目为分区后的总数，其应大于现有分区数。
```

4. Broker管理</br>

点击Broker后的数字，可查看集群id、Host、端口等列表信息。</br>

![查询1](https://github.com/jdcloudcom/cn/blob/Kafka/image/Internet-Middleware/JCS-for-Kafka/image9.png)

在列表信息页面，点击相应id号，可查看其详细信息及其对应的Topic等信息。</br>

![查询1](https://github.com/jdcloudcom/cn/blob/Kafka/image/Internet-Middleware/JCS-for-Kafka/image10.png)

![查询1](https://github.com/jdcloudcom/cn/blob/Kafka/image/Internet-Middleware/JCS-for-Kafka/image11.png)

5. Consumer管理</br>

1). Consumer Group查看</br>

集群列表页面点击顶部“Consumers”可查看Consumer Group相关信息。点击Consumer Group列表的某个组，会显示这个Consumer Group中在消耗的Topic列表，包括分区覆盖率，和总延迟量。



![查询1](https://github.com/jdcloudcom/cn/blob/Kafka/image/Internet-Middleware/JCS-for-Kafka/image12.png)

2). Consumer查看

进入Consumer Group列表页，点击某个Topic名称可以详细查看此Topic的具体Consumer，包括数据总量、消费进度、延迟量等。

![查询1](https://github.com/jdcloudcom/cn/blob/Kafka/image/Internet-Middleware/JCS-for-Kafka/image12.png)

Kafka-manager的更多用法和指引请参考 [官方文档](https://github.com/yahoo/kafka-manager)。</br>
