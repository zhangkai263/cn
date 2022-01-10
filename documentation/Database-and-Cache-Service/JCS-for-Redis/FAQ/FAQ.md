# 常见问题

## 购买/费用类

**Q：目缓存Redis兼容哪些版本？**

A：目前兼容 Redis 2.8、Redis 4.0 协议。但是目前部分命令受限制，详情请参考： [命令支持](../Getting-Started/Command-Supported.md) 。


**Q：目前缓存Redis支持哪些协议？**

A：京东云缓存Redis完全兼容Redis官方协议，使用方法可参考各语言相关文档。

**Q：云缓存Redis如何计费？**

A：目前提供包年包月和按配置计费，两种模式。

**Q：每个用户支持的缓存Redis的最大限额是多少？**

A：目前每个用户支持的缓存Redis最大限额为5个，如需创建更多实例数量，请联系客服。



## 连接/登录类

**Q：缓存Redis支持外网访问吗？**

A：为提升数据访问的安全性，缓存Redis目前仅支持内网云主机访问。可以设置公网代理访问，详情见： [公网连接Redis实例](../Operation-Guide/Connect/ConnectInstance.md) 	。
 

**Q：云主机为何访问不了Redis实例？**

A：建议您可进行如下检查：

 -  1.首先确认该云主机和Redis在同一个VPC中。

 -  2.如是同一VPC内，请按  [连接实例](../Getting-Started/Connect-Instances.md)	文档检查格式和内容是否正确。

 -  3.是否开启了Redis白名单功能。

 -  4.如果仍连接不了，请联系客服寻求帮助。

**Q：如果某个Redis分片出现异常，会对客户端有什么影响**

A：Redis分片采用主从高可用架构，在master节点发生故障时，管理节点会自动进行主从切换，保证服务的高可用。同时会新建一个Redis节点，恢复Redis分片的高可用架构。


## 常见使用类

**Q：Redis版本和支持的命令有哪些？**

A：请参考  [命令支持](../Getting-Started/Command-Supported.md)  文档，仍未解决请联系客服。


**Q：如何将Redis数据导入导出？**

A：导出请参考： [备份恢复](../Operation-Guide/Backup-And-Recovery.md)	。数据迁移请参考： [数据迁移](../Operation-Guide/Data-Migration.md)  。仍未解决请联系客服。


**Q：使用jedis，发现存储在redis中的key多出了类似\xac\xed\x00\x05t\x00的字符串？**

A：jedis序列化问题，请修改redisTemplate的序列化方式，仍未解决请联系客服。


**Q：如何进行超时排查？**

A：如果连接redis偶尔超时，可以尝试优化连接池参数，参考文档：[JedisPool 连接池优化](../Best-Practices/JedisPool-Connct.md) ；用户侧可以在本地抓包分析，优先排查本地网络。


**Q：当通过云监控观察到某个代理出现连接倾斜（连接数、ops比其他代理大很多），且该代理的延迟也其他代理大时，如何使连接数、ops尽量均衡？**

A：如果使用了连接池，可以将连接池配置参数 lifo 值改成 false，观察一段时间，确认现象是否消失。

原理：lifo的含义是从连接池借用连接时是否使用LIFO方式，true使用LIFO（后进先出）方式，false使用FIFO（先进先出）方式，默认为true。京东云Redis的标准版、集群版后端有多个代理，用户通过NLB再连接到后端的某个代理上。连接池默认使用后进先出的方式获取连接，如果某个代理响应慢，则会导致他会被优先使用，即响应慢的连接越有可能被优先使用，这样运行一段时间后，该代理的空闲连接释放的就慢或者不释放，最终导致连接数变多，出现连接倾斜。

**Q：redis集群使用lua脚本,是否需要多个key设置的时候设置到同一solt中 ？**

A： 同一个分片即可，如果不确定可以用hash tag。

**Q：数据分布不均匀怎么办？**

A：分布不均匀一般是应用使用了hashtag导致的，使用{}后，redis会仅对{}中的字符串做hash，会导致有hashtag的key都在同一个分片上。


## 常见报错信息及解决方式


| 报错信息 | 解决方法建议  |  
|:--  |:--  |
| OOM command not allowed when used memory maxmemory  redis-7cxm…… |  该错误为无法连接，内存跑满不可用。清理该分片的数据后，应可连接恢复。建议配置分片内存使用率监控的报警，或进行扩容。  |
| Redis Client On Error:Error:connct ETIMEDOUT |  该错误为连接超时。建议查看网络信息是否正确配置并重试。  |
