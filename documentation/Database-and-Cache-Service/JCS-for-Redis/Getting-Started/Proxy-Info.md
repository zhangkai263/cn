#  Redis Proxy特性说明


京东云缓存Redis 2.8和4.0版本都使用了代理（Proxy）,其主要承担着路由转发、流量限制、命令限制等功能。通过这边文章，可以更清楚的了解我们的系统，有助于您排查问题。

##  Proxy介绍

代理（Proxy）是Redis实例中的一个组件，每个实例独享数个Proxy。标准版有两个Proxy，集群版Proxy的数量和分片数量一致。每个proxy最大内网带宽48MB/s，可以和客户端建立的最大连接数为10000。

![](../../../../image/Redis/Proxy-Info-1.png)

| Proxy能力 |  说明  | 
|   :--- | :---  | 
|  路由转发	|  Proxy将客户端的请求转发给Redis，并将Redis的响应转发给客户端。	| 
|  流量限制	|  每个proxy最大内网带宽48MB/s，和客户端建立的最大连接数为10000。	| 
|  命令限制	|  Redis原生支持，但是由于某些原因，云缓存Redis无法支持的命令，会在Proxy被拦截。命令支持情况详见：  [Redis命令支持](../Getting-Started/Command-Supported.md) 	| 


##  Proxy的路由转发规则

-  单Key命令，Proxy会根据Hash算法计算Key所属的Slot，然后将请求发送给负责Slot的对应Redis分片
  
-  多Key命令，如果这些Key属于不同的Redis分片，Proxy会将这个命令拆分为多个命令，并发送给对应的Redis分片

-  事务类命令，Proxy会判断事务中命令涉及到的Key是否在同一个分片上，如果不在同一个分片上会报错：ERR CROSSSLOT Keys in request don't hash to the same slot


##  Proxy与Redis的连接

大部分情况，Proxy与Redis分片之间是通过建立的共享连接来处理请求的。但是在处理以下特殊命令时，Proxy会单独和Redis分片新建长连接，来处理命令。

-  阻塞类命令：BLPOP、BRPOP、BRPOPLPUSH

-  持续响应类命令：MONITOR、SUBSCRIBE、PSUBSCRIBE

-  事务类命令：MULTI、EXEC、WATCH


##  常见问题

**Q：如果某个Redis分片出现异常，会对客户端有什么影响**

A：Redis分片采用主从高可用架构，在master节点发生故障时，管理节点会自动进行主从切换，保证服务的高可用。同时会新建一个Redis节点，恢复Redis分片的高可用架构。

**Q：当通过云监控观察到某个代理出现连接倾斜（连接数、ops比其他代理大很多），且该代理的延迟也其他代理大时，如何使连接数、ops尽量均衡？**

A：如果使用了连接池，可以将连接池配置参数 lifo 值改成 false，观察一段时间，确认现象是否消失。

原理：lifo的含义是从连接池借用连接时是否使用LIFO方式，true使用LIFO（后进先出）方式，false使用FIFO（先进先出）方式，默认为true。京东云Redis的标准版、集群版后端有多个代理，用户通过NLB再连接到后端的某个代理上。连接池默认使用后进先出的方式获取连接，如果某个代理响应慢，则会导致他会被优先使用，即响应慢的连接越有可能被优先使用，这样运行一段时间后，该代理的空闲连接释放的就慢或者不释放，最终导致连接数变多，出现连接倾斜。





