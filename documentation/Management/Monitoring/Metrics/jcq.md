## 消息队列JCQ

获取该产品监控数据的servicecode为jcq，提供Topic 和 ConsumerGroup 两个维度的指标数据。

### Topic

metric | 中文名称  | 英文名称 |单位 | 说明
---|--- |--- |--- |---
mq.topic.messages.tps | 生产的tps  | Produced TPS  |条/秒 | 
mq.topic.messages.numbers | 已发布消息的数量 | Published Messages |条 | 
mq.topic.messages.request | 已发布消息的请求量 | Published Message Requests |次|
mq.topic.messages.size | 已发布消息的大小 | Published Message Size  | Bytes | 


### ConsumerGroup 
获取某个ConsumerGroup的指标数据时，tags中cid 需指定具体的消费组ID。

metric | 中文名称  | 英文名称 |单位 | 说明
---|--- |--- |--- |---
mq.cid.messages.tps | 消费的tps | Consumed TPS |  条/秒 |
mq.cid.messages.numbers.heap | 堆积消息数量 | Buildup Messages | 条 | 
mq.cid.messages.numbers.success|接收消息数量-成功|Succed Received Messages|条 | 
mq.cid.messages.numbers.total|接收消息数量-总计|Received Messages | 条 | 
mq.cid.messages.request | 接收消息请求量 |Received Message Requests|次| 
mq.cid.messages.size | 接收消息大小 |Received Message Size | Bytes | 
