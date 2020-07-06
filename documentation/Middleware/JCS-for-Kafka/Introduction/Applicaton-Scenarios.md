## 应用场景

### 日志处理
消息队列Kafka版的高吞吐和持久化特性决定它非常适合作为日志收集中心。消息队列Kafka版能够忽略掉文件的细节，将各种应用的日志更清晰地抽象成一个个日志或事件的消息流，批量异步发送到消息队列Kafka实例供下游业务系统消费，生产者几乎感受不到性能的开支。

![查询1](https://github.com/jdcloudcom/cn/blob/Kafka/image/Internet-Middleware/JCS-for-Kafka/日志聚合场景.png)

### 网站活动跟踪
用户浏览网页、评论等行为产生的网站活动数据，都可以通过消息队列Kafka版实时收集，然后以发布-订阅的模式实时记录到对应的Topic里，消费者通过订阅这些Topic来做实时的监控或者加载到Hadoop等离线仓库进行离线统计分析等。

![查询1](https://github.com/jdcloudcom/cn/blob/Kafka/image/Internet-Middleware/JCS-for-Kafka/网站活动场景.png)

### 流处理
商品秒杀促销、气象数据测控等数据产生快、实时性强且量大，难以统一采集并入库存储后再做处理，消息队列Kafka版能实现在数据流动的过程中对数据进行实时地捕捉和处理，并根据业务需求进行计算分析，最终把结果交由下游应用处理。

![查询1](https://github.com/jdcloudcom/cn/blob/Kafka/image/Internet-Middleware/JCS-for-Kafka/流处理场景.png)
