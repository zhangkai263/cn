## 核心概念
以下为消息队列Kafka中使用到的概念及其解释，可供您参考。

### 消息（Message）
传递的数据对象，主要由四部分构成：offset(偏移量)、key、value、timestamp(插入时间)， 其中offset和timestamp在kafka实例中产生，key/value在producer发送数据的时候产生。

### 代理者（Broker） 
Kafka实例中的一个节点对应一个Broker，是一个物理概念。

### 主题（Topic） 
Kafka上的消息类型被称为Topic，消息根据Topic进行归类。一个 Topic 由一个或多个 Partition 组成，存储于一个或多个 Broker 上。

### 分区（Partition）
Kafka上的消息数据的最小单位，一个Topic可以包含多个分区。在数据的产生和消费过程中，不需要关注数据具体存储的Partition在那个Broker上，只需要指定Topic即可，由Kafka负责将数据和对应的Partition进行关联。

### 生产者（Producer）
负责将数据发送到Kafka对应Topic的进程。

### 消费者（Consumer）
负责从对应Topic获取数据的进程

### 消费者组（Consumer Group）
每个consumer都属于一个特定的group组，一个group组可以包含多个Consumer。
