# 订阅topic
## 前提条件
- 已经创建好topic

## 注意事项
- 对于某个topic的订阅Consumer Group数量没有限制。
- 可以选择已有的Consumer Group，也可选择新建Consumer Group。


## 操作步骤
### 1. 在topic列表，选择想要订阅topic所在行的“订阅”按钮

![订阅步骤1](../../../../../image/Internet-Middleware/Message-Queue/订阅-01.png)

### 2.填写完订阅者信息，点击“订阅”按钮

![订阅步骤2](../../../../../image/Internet-Middleware/Message-Queue/订阅-02.png)  
I. Consumer Group ID为Topic下唯一，如果有相同名称的Consumer Group ID被创建，则无法创建成功。并且Consumer Group ID只能包含字母、数字、连字符(-)和下划线(_)，长度7-64字符。  
II. Consumer Group ID 和topic的关系是多对多关系（N：M），同一个Consumer Group ID可以订阅多个topic，同一个topic可以对应多个Consumer Group ID。   
III. 取出消息隐藏时长为接收的消息对于其他消费者不可见的时间长度，范围：30秒-600秒 。  
VI. 死信队列设置参数决定是否开启topic的死信队列。  
V. 最大接收次数是将消息发送到死信队列之前允许接收该消息的最大次数，范围：0-16次。 

### 3.可在topic详情-订阅管理，查询订阅信息

![订阅步骤3](../../../../../image/Internet-Middleware/Message-Queue/订阅-03.png)
- 可以点击“修改配置”，对已经创建订阅的修改  
- 可以点击“取消订阅”，完成取消订阅的操作
