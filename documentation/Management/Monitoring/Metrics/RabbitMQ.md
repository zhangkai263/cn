## 消息队列 RabbitMQ版
获取该产品监控数据的servicecode为rabbitmq，提供实例、节点和队列维度的指标数据。具体如下：

### 实例
metric | 中文名称  | 英文名称 |单位 | 说明
---|--- |--- |--- |--- 
abbitmq.instance.connections.number|实例连接数|Instance Connections|个|
rabbitmq.instance.channels.number|实例通道数|Instance Channels|个|
rabbitmq.instance.queues.number|实例队列数|Instance Queues|个|
rabbitmq.instance.consumers.number|实例消费者数|InstanceConsumers|个| 
rabbitmq.instance.messages.ready|实例可消费消息数|Instance Messages Ready|条|
rabbitmq.instance.messages.unacknowledged|实例未确认消息数|Instance Messages Unacknowledged|条|
rabbitmq.instance.message.production.rate|实例消息生产速率|Instance Message Production Rate|条|
rabbitmq.instance.messages.ack.rate | 实例消息确认速率|Instance Message Ack Rate|条|


### 节点
获取监控数据时，tags中key需指定为brokerId，tags的value值需指定具体的节点ID。 其提供的监控指标如下：

metric | 中文名称  | 英文名称 |单位 | 说明
---|--- |--- |--- |--- 
rabbitmq.node.free.disk|节点可用存储空间|Node Free Disk|GB|
rabbitmq.node.file.descriptors.number|节点使用文件句柄数|Node  File Descriptors|个|
rabbitmq.node.memory.used|节点内存占用|Node Memory Used|MB|
rabbitmq.node.erlang.processes.number|节点Erlang进程数|Node Erlang Processes|个|
rabbitmq.node.socket.descriptors.number|节点使用Socket连接数|Node Socket Descriptors|个|


### 队列
获取监控数据时，tags中key需指定为queueName，tags的value值需指定具体的队列名称，其提供的指标项如下：

metric | 中文名称  | 英文名称 |单位 | 说明
---|--- |--- |--- |--- 
rabbitmq.queue.messages.unacknowledged|队列未确认消息数|Queue Messages Unacknowledged|条|
rabbitmq.queue.messages.ready|队列可消费消息数|Queue Messages Ready|条|
