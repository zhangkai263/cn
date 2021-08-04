#  云原生工具redis-cli连接Redis


##  操作步骤

####   Step1   在京东云主机上安装 Redis-cli工具

Centos系统安装redis-cli工具
```csharp

yum install redis -y
```

其他Linux系统安装redis-cli工具
```shell
1. 下载Redis源代码 
     wget https://download.redis.io/releases/redis-6.0.9.tar.gz
2. 解压源代码文件
     tar xzf redis-6.0.9.tar.gz
3. 进入解压文件夹并且编译安装redis 
     cd redis-6.0.9&&make
```

####   Step2   使用Redis-cli连接云缓存Redis。
```csharp

//  说明：redis-cli -h 访问域名 -p 默认端口 -a 连接密码
redis-cli -h [host] -p [port] -a [password]
```

示例：

```csharp

redis-cli -h jredis-cn-north-1-prod-redis-××××××××××.jdcloud.com -p 6379 -a password
```

参考链接：https://redis.io/topics/rediscli

