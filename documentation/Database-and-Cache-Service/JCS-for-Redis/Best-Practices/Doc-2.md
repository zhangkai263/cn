# 跨越异构鸿沟，Redis 迁移同步过程中的挑战与解决方案

随着云计算十余年的高速发展，作为目前可见的最新阶段，多云正在快步大踏步前进。而多云趋势所带来得数据云间迁移，也逐步常态化。因此，缓存 Redis 已成为高并发场景下提升数据访问速度的标配。

不仅是数据云间迁移，目前大型系统对于缓存强依赖，致使大多数企业都会面临大量并发读写数据时访问速度慢、数据库压力大，以及缓存数据不⾜带来的缓存击穿及雪崩⻛险。其中，Redis 就起到了降低数据库压力，提升数据访问速度的作用。

下图是某网站业务的解决访问速度慢的问题，引入缓存Redis提升访问速度的流程：

![](../../../../image/Redis/doc-1-1.png)


但在 Redis 迁移同步过程中，势必会面临着许多挑战：

      - rdb版本不⼀致导致源 redis dump⽂件在⽬标redis中不能加载

      - 数据节点不⼀致带来的 redis 主从复制⽅案失效

      - 应⽤快速割接的⽤⼾需求

      - ⾮幂等命令的幂等要求

正因如此，RedisSyncer 应运而生。RedisSyncer 是京东云用于在 redis 之间数据同步的产品，支持跨版本、异构集群间的数据同步。它模拟了redis的replication协议，在rdb版本不⼀致时进⾏命令转换，以实现跨rdb版本迁移，并通过缓存value的⽅式完成INCR、INCRBY、DECR、DECRBY等⾮命令的幂等转换。最终适应云上与云下、原生与托管等多种场景，能够快速灵活地满足用户的同步、迁移、扩容的需求。


## 案例解析

![](../../../../image/Redis/doc-2-1.png)


###  项目背景

某金融机构为保障金融数据安全、符合金融数据规范，需要将原⽣redis集群迁移⾄该金融机构⾃研的upredis集群，并保证业务系统平滑过渡。

###  项⽬挑战

- 版本差异

- 降版本迁移

- 集群节点数不⼀致

- 极速回退需求

###  最终客⼾收益

- 实现15分钟完成 256GB+数据迁移

- 20分钟完成系统割接

- 迁移过程“丝般柔顺”

###  RedisSyncer 操作步骤

####  必要环境

- docker

- docker-compose

####  使⽤docker-compose 部署服务

    git clone https://github.com/TraceNature/redissyncer.git
    cd redissyncer
    docker-compose up -d

####  下载并配置cli客⼾端

    wget https://github.com/TraceNature/redissyncercli/releases/download/v0.1.0/redissyncer-cli-0.1.0-linux-amd64.tar.gz

####  .config.yaml

    syncserver: http://10.0.1.20:8080
    token: 379F5E2BD55A4608B6A7557F0583CFC5
    
####  ⽣成数据   
    
    ./rsst -c ../config.yml generatedata -i 1 -a 10.0.1.101:6479 -p    redistest0102

    
####  编写要执⾏的任务json redissyncer-cli需要增加taskexamples    
    
      {
        "sourcePassword": "redistest0102",
        "sourceRedisAddress": "10.0.1.101:6379",
        "targetRedisAddress": "10.0.1.102:6379",
        "targetPassword": "redistest0102",
        "taskName": "testtask",
        "targetRedisVersion": 4.0,
        "autostart": true,
        "afresh": true,
        "batchSize": 100
      }    
    
    
####  启动任务  

    redissyncer-cli -i
    redissyncer-cli > task create source ./task.json



####  数据校验


    wget   https://github.com/TraceNature/rediscompare/releases/download/v1.0.0/rediscompare-1.0.0-linux-amd64.tar.gz
    rediscompare compare single2single --saddr "10.0.1.101:6479" --spassword "redistest0102" --taddr "10.0.1.102:6479" --tpassword  "redistest0102" --comparetimes 3



**Github 地址：** https://github.com/TraceNature/redissyncer-server







