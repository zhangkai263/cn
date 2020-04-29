## 功能问题

1.消息队列 RabbitMQ 版支持外网访问吗？</br>

为提升数据访问的安全性，消息队列 RabbitMQ 版目前仅支持用户VPC内访问。可以通过创建和 RabbitMQ实例处于同一VPC内的云主机实现外网访问。</br>

2.可以访问部署消息队列 RabbitMQ 版的机器吗？</br>

不可以，消息队列 RabbitMQ 版作为全托管服务，用户无需维护所有基础设施，包括操作系统更新和其他日常维护。</br>

3.消息队列 RabbitMQ 版客户端应该如何选择？</br>

推荐生产消费端选取对应版本的 客户端SDK，详情[请参考](https://www.rabbitmq.com/devtools.html)。</br>

