# 常见问题
**Q：消息队列 JCQ 支持外网访问吗？**

A：华北-北京地域支持HTTPS的方式公网访问。

**Q：目前消息队列 JCQ 支持哪些协议？**

A：京东云消息队列 JCQ支持HTTP、HTTPS、TCP协议。

**Q：JCQ 消息能服务器保存多长时间？**

A：存储的消息最多保存 3 天，超过 3 天未消费的消息会被删除。

**Q：每个用户Topic支持的最大TPS限额是多少？**

A：目前每个Topic支持的TPS最大限额为5000，如不能满足您的业务需求，请联系客服。

**Q：用户拉取不到消息怎么办？**

A：拉取不到消息的情况大概包括两种：一种是订阅时带的Tag信息被误过滤掉了，此时需要不带Tag信息重新订阅。另一种情况是由于用户以重启进程方式拉取时，若是partition无消息则会一直拉不到消息，此时需要设置多个partition后重新拉取。

**Q：用户订阅不上消息怎么办？**

A： 用户未授予合适的权限导致，需要参考[主主授权](https://docs.jdcloud.com/cn/message-queue/main-main-authorization)对被授权用户进行授权。

**Q：拉消息，返回{"code":500,"message":"FAILED","status":"FAILED"}怎么办？**

A：原因是拉请求并发到达，只有一个拉取成功，另外一个由于没有待拉取的消息返回的错误，可以通过修改Broker的返回值解决。

**Q：报错Topic不存在，是什么原因？**

A:1.确认AK/SK填写正确。AK/SK 请从控制台”账户管理“--”AccessKey管理“获取；

  2.确认代码中填写的是Topic名称，而不是Topic id。Topic名称请从控制台”消息队列JCQ“--对应Topic名称--“Topic”详情--“基本信息”获取；
  
  3.确认代码中填写的接入点（访问信息）正确，接入点请从控制台”消息队列JCQ“--对应Topic名称--“Topic”详情--“访问信息”获取。
  
**Q：消费日志中报错 subscription not exist ，订阅不存在，是什么原因？**

A：1.Topic下没有此订阅；

   2.订阅的创建者是子账号A，但是代码中使用的AK/SK，不是该子账号的AK/SK；   建议消费请使用使用与创建订阅相同账号的AK/SK。

**Q：SDK报错``` 
exception:[com.jcloud.jcq.communication.exception.CommunicationException: ChannelFuture has been completed, but the channel localAddress: , remoteAddress: is still not active!]```**


A：该报错是因为网络不通，通常有如下几种原因:

1. 没有在和topic同地域的云VPC环境下连接jcq；

2. 在同地域云VPC环境下，但是云主机的安全组、子网关联的ACL没有放行相应网段。

**Q：SDK报错```
The heart beat service for the channel localAddress: 10.0.0.3:44452, remoteAddress: 100.72.13.171:2888 has already been shutdown```**

A：该报错是客户端重新拉取路由，属于正常情况。
