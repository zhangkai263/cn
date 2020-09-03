# 常见问题

## 购买/费用类

**Q：目缓存Redis兼容哪些版本？**

A：目前兼容 Redis 2.8、Redis 4.0。

**Q：目前缓存Redis支持哪些协议？**

A：京东云缓存Redis完全兼容Redis官方协议，使用方法可参考各语言相关文档。

**Q：云缓存Redis如何计费？**

A：目前提供包年包月和按配置计费，两种模式。

**Q：每个用户支持的缓存Redis的最大限额是多少？**

A：目前每个用户支持的缓存Redis最大限额为5个，如不能满足您的业务需求，请联系客服。



## 连接/登录类

**Q：缓存Redis支持外网访问吗？**

A：为提升数据访问的安全性，缓存Redis目前仅支持内网云主机访问。可以设置公网代理访问，详情见公网连接Redis实例。


**Q：云主机为何访问不了Redis实例？**

A：1.首先确认该云主机和Redis在同一个VPC中；2.如是同一VPC内，请按[连接实例](https://docs.jdcloud.com/cn/jcs-for-redis/connect-instances)文档检查格式和内容是否正确；3.如果前两个步骤都没问题仍连接不了，请联系客服寻求帮助。


## 常见使用类

**Q：Redis版本和支持的命令有哪些？**

A：请参考[命令支持](https://docs.jdcloud.com/cn/jcs-for-redis/command-supported)文档，仍未解决请联系客服。


**Q：如何将Redis数据导入导出？**

A：请参考[数据迁移](https://docs.jdcloud.com/cn/jcs-for-redis/data-migration)文档，仍未解决请联系客服。

**Q：使用jedis，发现存储在redis中的key多出了类似\xac\xed\x00\x05t\x00的字符串？**

A：jedis序列化问题，请修改redisTemplate的序列化方式，仍未解决请联系客服。


**Q：使用Redis SDK，应用初始化后，监控为何没有连接数？**

A：引用Redis SDK使用了连接池，应用启动初始化后，如果没有真正的读写操作，服务端未建立连接，连接数可能为0，属于正常现象。

**Q：使用Keys*命令查询后，产生慢日志？** 

A：线上环境禁止使用KEYS*命令查询，推荐使用scan命令的方式找出大Key并进行优化。KEYS命令只能在VPC网络下使用，属于危险的命令，可能造成性能问题。
 



## 常见报错信息及解决方式


| 报错信息 | 解决方法建议  |  
|:--:|:--:|
| OOMcommand not allowed when used memory maxmemory  redis-7cxm…… |  该错误为无法连接，磁盘跑满不可用。清理该分片的数据后，应可连接恢复。建议配置分片内存使用率监控的报警，或进行扩容。  |
| Redis Client On Error:Error:connct ETIMEDOUT |  该错误为连接超时。建议查看网络信息是否正确配置并重试。  |
