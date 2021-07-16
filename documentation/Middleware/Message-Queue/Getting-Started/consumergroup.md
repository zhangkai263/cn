# 消费者与消费组

消息队列JCQ支持消费组ConsumerGroup（与Kafka类似），消费组的作用是将消费者管理起来，同一个消费组的消费者是组内关系，会瓜分消息。不同消费组内的消费者相互独立。

同一个消费组可以消费多个topic，多个消费组也可以消费同一个Topic。这里Topic与ConsumerGroup是多对多的关系。而一个Consumer只能属于一个ConsumerGroup。

## 消费者特性

同一ConsumerGroup下，Consumer数目是否必须小于等于Partition数目吗？

* 是，以Kafka、RocketMQ等为代表：

  利：避免Ack Offset 加锁；避免消息重复，严格保证顺序；
  
  弊：堆积情况下不能通过增加Consumer来加速消息消费慢消息，一条慢消息导致后面的消息都不能被及时处理。
  
* 否，JCQ：

  利： 堆积情况下可以通过增加Consumer加速消费应对慢消息的问题；
  
  弊：不能保证消息严格顺序，可能造成消息重复。
