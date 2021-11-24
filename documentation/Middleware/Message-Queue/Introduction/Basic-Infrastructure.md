# 基础架构
消息队列 JCQ采用共享集群结构，同步写入三副本备份，保证服务的高可靠性和高可用性，自主研发的计算存储分离框架在有效控制计算节点升级影响范围基础上，保证服务的高性能，满足不同业务的需求。

基础架构如下图：

 ![架构](https://github.com/jdcloudcom/cn/blob/jcq0323/image/Internet-Middleware/Message-Queue/jcq-framework-1.PNG)
 
消息队列JCQ核心组件如下：
| 概念 | 解释 |
| :- | :- |
| Broker Cluster | 负责订阅管理、消费管理和数据统计等功能 |	
| Store Cluster | 负责消息存储 |	
| Meta Manager Cluster | 负责消息路由、broker管理等功能 |
|Http Proxy | 负责请求的签名认证、链接管理 |



## 相关参考

- [产品优势](../Introduction/Benefits.md)
- [产品功能](../Introduction/Features.md)
- [价格总览](../Pricing/Price-Overview.md)
- [计费规则](../Pricing/Billing-Rules.md)


