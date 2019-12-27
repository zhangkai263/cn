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
更多详细功能请参考 [官方文档](https://github.com/yahoo/kafka-manager)。</br>

### 前提条件
- 已成功创建消息队列Kafka版实例。</br>

### 操作说明
1. 在实例列表页面，点击操作列的“Kafka Manager”可跳转至当前实例的Kafka Manager页面。</br>
2. 点击实例名称进入详情页面，可查看“Topic”和“Brokers”。</br>
3. Topic管理</br>

1). 新建Topic</br>

点击上方Topic下拉菜单，点击Create填写相应参数创建topic，主要参数说明如下：</br>

|参数|说明 
:--|:---
|Topic |Topic名称，用户自定义即可
|Patitions |Topic的分区数，≥1，适当的分区数可以提高吞吐量
|Replication Factor |副本数，用于保障kafka的高可用

2). 查看Topic</br>

点击Topic后的数字，可进行topic列表的查看。</br>
在Topic列表页，可查看Topic名称、分区数、Broker数、副本数等相关信息。</br>
点击Topic名称，可进一步查看具体信息。</br>

3). 重新分区

在Topic具体信息页面，点击“Generate Partition Assignments”可完成相应Topic和Broker的重新分区。

4). 增加分区

在Topic具体信息页面，点击“Add Partitions”可增加分区。

|参数|说明 
:--|:---
|Topic |Topic名称，用户自定义即可
|Patitions |Topic的分区数，≥1，适当的分区数可以提高吞吐量
|Replication Factor |副本数，用于保障kafka的高可用

