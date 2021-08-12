# Redis命令支持

京东云缓存Redis基于2.8和4.0版本，命令的具体详细语法，请参见：[http://redis.io/commands](http://redis.io/commands)

## 支持的命令操作

操作命令表中的标识说明如下 ：

| 标识 | 说明  |  
|:--:|:--:|
| ✓ |  表示支持  |
| x |  表示不支持  |
| - |  表示 无此命令   |
| 受限 |  表示可支持但是受限 |



#### Keys（键）
| 命令 | 2.8标准版  |  2.8集群版  |  4.0标准版  |  4.0集群版  | 
|:--:|:--:|:--:|:--:|:--:| 
|  DEL      |  ✓   | ✓  |  ✓  | ✓   | 
|  DUMP     |   ✓   | ✓  |  ✓  | ✓   | 
|  EXISTS   |  ✓   | ✓  |  ✓  | ✓   | 
|  EXPIRE   |   ✓   | ✓  |  ✓  | ✓   | 
|  EXPIREAT |   ✓   | ✓  |  ✓  | ✓   | 
|  MOVE     |   ✓   | ✓  |  ✓  | ✓   | 
|  PERSIST  |   ✓   | ✓  |  ✓  | ✓   | 
|  PEXPIRE  |   ✓   | ✓  |  ✓  | ✓   | 
|  PEXPIREAT|   ✓   | ✓  |  ✓  | ✓   | 
|  PTTL     |   ✓   | ✓  |  ✓  | ✓   | 
|  RANDOMKEY  |   ✓   |  x  |  ✓  | ✓   | 
|  RENAME   |   ✓   | x  |  ✓  | ✓   | 
|  RENAMENX |   ✓   | x  |   受限   |  受限   | 
|  RESTORE  |   ✓   | ✓  |  受限  | 受限   | 
|  SORT     |   ✓   | ✓  |  ✓  | ✓   | 
|  TTL      |   ✓   | ✓  |  ✓  | ✓   | 
|  TYPE     |   ✓   | ✓  |  ✓  | ✓   | 
|  SCAN     |   ✓   | ✓  |  ✓  | ✓   | 
|  OBJECT   |   x   | x  |  ✓  | ✓   | 
|  UNLINK   |   -   | -  |  ✓  | ✓   | 
|  KEYS     |   ✓   | ✓  |  ✓  | ✓   | 
|  WAIT     |   x   | x  |  x  | x   | 
|  TOUCH    |   -   | -  |  ✓  | ✓   | 
|  MIGRATE  |   x   | x  |  x  | x   | 

**说明：**

* KEYS命令：不推荐使用KEYS* 命令查询，可用scan命令进行查询。KEYS命令只能在VPC网络下使用，属于危险的命令，可能造成性能问题。如需使用，请确保在key很少的情况下使用。

* SORT命令使用方法：SORT key [BY pattern] [LIMIT offset count] [GET pattern [GET pattern ...]] [ASC|DESC] [ALPHA] [STORE destination]

	* 1.由于SORT命令支持 [BY pattern]根据外部key进行排序，因此要确保key和pattern匹配上的key在同一个槽中，否则会出现与预期不符的结果。

	* 2.SORT命令支持将结果写入destination中，因此，要确保destination和key 在同一个槽中，否则会(error) ERR CROSSSLOT Keys in request don't hash to the same slot错误。




#### String（字符串）
| 命令 | 2.8标准版  |  2.8集群版  |  4.0标准版  |  4.0集群版  | 
|:--:|:--:|:--:|:--:|:--:| 
|  APPEND    |   ✓   | ✓  |  ✓  | ✓   | 
|  BITCOUNT  |   ✓   | ✓  |  ✓  | ✓   | 
|  BITOP     |   ✓   | x  |  ✓  | ✓   | 
|  BITPOS    |   ✓   | ✓  |  ✓  | ✓   | 
|  DECR      |   ✓   | ✓  |  ✓  | ✓   | 
|  DECRBY    |   ✓   | ✓  |  ✓  | ✓   | 
|  GET       |   ✓   | ✓  |  ✓  | ✓   | 
|  GETBIT    |   ✓   | ✓  |  ✓  | ✓   | 
|  GETRANGE  |   ✓   | ✓  |  ✓  | ✓   | 
|  GETSET    |   ✓   | ✓  |  ✓  | ✓   | 
|  INCR      |   ✓   | ✓  |  ✓  | ✓   | 
|  INCRBY    |   ✓   | ✓  |  ✓  | ✓   | 
|  INCRBYFLOAT   |   ✓   | ✓  |  ✓  | ✓   | 
|  MGET      |   ✓   | ✓  |  ✓  | ✓   | 
|  MSET      |   ✓   | ✓  |  ✓  | ✓   | 
|  MSETNX   |   x   |  x  |  受限  | 受限   | 
|  PSETEX   |   ✓   | ✓  |  ✓  | ✓   | 
|  SET      |   ✓   | ✓  |  ✓  | ✓   | 
|  SETBIT   |   ✓   | ✓  |  ✓  | ✓   | 
|  SETEX    |   ✓   | ✓  |  ✓  | ✓   | 
|  SETNX    |   ✓   | ✓  |  ✓  | ✓   | 
|  SETRANGE |   ✓   | ✓  |  ✓  | ✓   | 
|  STRLEN   |   ✓   | ✓  |  ✓  | ✓   | 
|  BITFIELD |   -   |  -  |  ✓  | ✓   | 


####  Hash（哈希表） 
| 命令 | 2.8标准版  |  2.8集群版  |  4.0标准版  |  4.0集群版  | 
|:--:|:--:|:--:|:--:|:--:| 
|  HDEL      |   ✓   | ✓  |  ✓  | ✓   | 
|  HEXISTS   |   ✓   | ✓  |  ✓  | ✓   | 
|  HGET      |   ✓   | ✓  |  ✓  | ✓   | 
|  HGETALL   |   ✓   | ✓  |  ✓  | ✓   | 
|  HINCRBY   |   ✓   | ✓  |  ✓  | ✓   | 
|  HINCRBYFLOAT   |   ✓   | ✓  |  ✓  |  ✓   | 
|  HKEYS     |   ✓   | ✓  |  ✓  | ✓   | 
|  HLEN      |   ✓   | ✓  |  ✓  | ✓   | 
|  HMGET     |   ✓   | ✓  |  ✓  | ✓   | 
|  HMSET     |   ✓   | ✓  |  ✓  | ✓   | 
|  HSET      |   ✓   | ✓  |  ✓  | ✓   | 
|  HSETNX    |   ✓   | ✓  |  ✓  | ✓   | 
|  HVALS     |   ✓   | ✓  |  ✓  | ✓   | 
|  HSCAN     |   ✓   | ✓  |  ✓  | ✓   | 
|  HSTRLEN   |   -   | -  |  ✓  | ✓   | 


####  List（列表）
| 命令 | 2.8标准版  |  2.8集群版  |  4.0标准版  |  4.0集群版  | 
|:--:|:--:|:--:|:--:|:--:| 
|  BLPOP   |   -   | -  |  受限  | 受限   | 
|  BRPOP   |   -   | -  |  受限  | 受限   | 
|  BRPOPLPUSH |  -   |  -  |  受限  | 受限   | 
|  LINDEX   |   ✓   | ✓  |  ✓  | ✓   | 
|  LINSERT  |   ✓   | ✓  |  ✓  | ✓   | 
|  LLEN     |   ✓   | ✓  |  ✓  | ✓   | 
|  LPOP     |   ✓   | ✓  |  ✓  | ✓   | 
|  LPUSH    |   ✓   | ✓  |  ✓  | ✓   | 
|  LPUSHX   |   ✓   | ✓  |  ✓  | ✓   | 
|  LRANGE   |   ✓   | ✓  |  ✓  | ✓   | 
|  LREM     |   ✓   | ✓  |  ✓  | ✓   | 
|  LSET     |   ✓   | ✓  |  ✓  | ✓   | 
|  LTRIM    |   ✓   | ✓  |  ✓  | ✓   | 
|  RPOP     |   ✓   | ✓  |  ✓  | ✓   | 
|  RPOPLPUSH |   ✓   |  x  |  受限  | 受限   | 
|  RPUSH    |   ✓   | ✓  |  ✓  | ✓   | 
|  RPUSHX   |   ✓   | ✓  |  ✓  | ✓   | 


####  Set（集合）
| 命令 | 2.8标准版  |  2.8集群版  |  4.0标准版  |  4.0集群版  | 
|:--:|:--:|:--:|:--:|:--:| 
|  SADD    |   ✓   | ✓  |  ✓  | ✓   | 
|  SCARD   |   ✓   | ✓  |  ✓  | ✓   | 
|  SDIFF   |   ✓   |  x  |  受限  | 受限    | 
|  SDIFFSTORE   |   ✓   | x  |  受限  | 受限      | 
|  SINTER  |   ✓   | x  |  受限  | 受限    | 
|  SINTERSTORE    |   ✓   | x  |  受限  | 受限    | 
|  SISMEMBER      |   ✓   | ✓  |  ✓  | ✓   | 
|  SMEMBERS   |   ✓   | ✓  |  ✓  | ✓   | 
|  SMOVE      |   ✓   | x  |  受限  | 受限    | 
|  SPOP       |   ✓   | ✓  |  ✓  | ✓   | 
|  SRANDMEMBER    |   ✓   | ✓  |  ✓  | ✓   | 
|  SREM       |   ✓   | ✓  |  ✓  | ✓   | 
|  SUNION     |   ✓   | x  |  受限  | 受限    | 
|  SUNIONSTORE   |   ✓   | x  |  受限  | 受限    | 
|  SSCAN      |   ✓   | ✓  |  ✓  | ✓   | 


####  Sorted Set（有序集合）
| 命令 | 2.8标准版  |  2.8集群版  |  4.0标准版  |  4.0集群版  | 
|:--:|:--:|:--:|:--:|:--:| 
|  ZADD     |   ✓   | ✓  |  ✓  | ✓   | 
|  ZCARD    |   ✓   | ✓  |  ✓  | ✓   | 
|  ZCOUNT   |   ✓   | ✓  |  ✓  | ✓   | 
|  ZINCRBY  |   ✓   | ✓  |  ✓  | ✓   | 
|  ZRANGE   |   ✓   | ✓  |  ✓  | ✓   | 
|  ZRANGEBYSCORE   |   ✓   | ✓  |  ✓  | ✓   | 
|  ZRANK    |   ✓   | ✓  |  ✓  | ✓   | 
|  ZREM     |   ✓   | ✓  |  ✓  | ✓   | 
|  ZREMRANGEBYRANK  |   ✓   | ✓  |  ✓  | ✓   | 
|  ZREMRANGEBYSCORE |   ✓   | ✓  |  ✓  | ✓   | 
|  ZREVRANGE        |   ✓   | ✓  |  ✓  | ✓   | 
|  ZREVRANGEBYLEX   |   -   | -  |  ✓  | ✓   | 
|  ZREVRANGEBYSCORE |   ✓   | ✓  |  ✓  | ✓   | 
|  ZREVRANK      |   ✓   | ✓  |  ✓  | ✓   | 
|  ZSCORE        |   ✓   | ✓  |  ✓  | ✓   | 
|  ZUNIONSTORE   |   ✓   | x  |  受限  | 受限    | 
|  ZINTERSTORE   |   ✓   | x  |  受限  | 受限    | 
|  ZSCAN         |   ✓   | ✓  |  ✓  | ✓   | 
|  ZRANGEBYLEX      |   ✓   | ✓  |  ✓  | ✓   | 
|  ZLEXCOUNT        |   ✓   | ✓  |  ✓  | ✓   | 
|  ZREMRANGEBYLEX   |   ✓   | ✓  |  ✓  | ✓   | 
|  ZPOPMAX   |   -   | -  |  -  | -   | 
|  ZPOPMIN   |   -   | -  |  -  | -   | 
|  BZPOPMIN  |   -   | -  |  -  | -   | 
|  BZPOPMAX  |   -   | -  |  -  | -   | 


####  hyperloglog 
| 命令 | 2.8标准版  |  2.8集群版  |  4.0标准版  |  4.0集群版  | 
|:--:|:--:|:--:|:--:|:--:| 
| PFADD    | ✓ | x  | ✓ |  ✓  | 
| PFCOUNT  | ✓ | x  | ✓ |  ✓  | 
| PFMERGE  | ✓ | x  | ✓ |  ✓  | 


####  Pub/Sub（发布/订阅）
| 命令 | 2.8标准版  |  2.8集群版  |  4.0标准版  |  4.0集群版  | 
|:--:|:--:|:--:|:--:|:--:| 
|  PSUBSCRIBE   |   x   | x  |  ✓  | ✓   | 
|  PUBLISH      |   x   | x  |  ✓  | ✓   | 
|  PUBSUB       |   x   | x  |  ✓  | ✓   | 
|  PUNSUBSCRIBE |   x   | x  |  ✓  | ✓   | 
|  SUBSCRIBE    |   x   | x  |  ✓  | ✓   | 
|  UNSUBSCRIBE  |   x   | x  |  ✓  | ✓   | 


#### Transaction（事务）
| 命令 | 2.8标准版  |  2.8集群版  |  4.0标准版  |  4.0集群版  | 
|:--:|:--:|:--:|:--:|:--:| 
|  DISCARD   |   ✓   | x  |  ✓  | ✓   | 
|  EXEC      |   ✓   | x  |  ✓  | ✓   | 
|  MULTI     |   ✓   | x  |  ✓  | ✓   | 
|  UNWATCH   |   ✓   | x  |  ✓  | ✓   | 
|  WATCH     |   ✓   | x  |  ✓  | ✓   | 


#### Connection（连接）
| 命令 | 2.8标准版  |  2.8集群版  |  4.0标准版  |  4.0集群版  | 
|:--:|:--:|:--:|:--:|:--:| 
|  AUTH   |   ✓   | ✓  |  ✓  | ✓   | 
|  ECHO   |   ✓   | ✓  |  ✓  | ✓   | 
|  PING   |   ✓   | ✓  |  ✓  | ✓   | 
|  QUIT   |   ✓   | ✓  |  ✓  | ✓   | 
|  SELECT |   ✓   | ✓  |  ✓  | ✓   | 
|  SWAPDB |   x   | x   |  x  | x   | 


#### Server（服务器）
| 命令 | 2.8标准版  |  2.8集群版  |  4.0标准版  |  4.0集群版  | 
|:--:|:--:|:--:|:--:|:--:| 
|  FLUSHALL  |   ✓   | ✓  |  ✓  | ✓   | 
|  FLUSHDB   |   ✓   | ✓  |  ✓  | ✓   | 
|  DBSIZE    |   x   |  x  |  ✓  | ✓   | 
|  TIME      |   x   |  x  |  x  | x   | 
|  INFO      |   ✓   | ✓  |  ✓  | ✓   | 
|  KEYS      |   ✓   | ✓  |  ✓  | ✓   | 
|  CLIENT KILL   |   x   | x  |  x     | x     | 
|  CLIENT LIST   |   x   | x  |  受限  | 受限  | 
|  CLIENT GETNAME   |   x   | x  |  ✓  | ✓   | 
|  CLIENT SETNAME   |   x   | x  |  ✓  | ✓   | 
|  CONFIG GET       |   x   | x  |  ✓  | ✓   | 
|  MEMORY           |   -  | - |  ✓  | ✓   | 
|  LATENCY          |   x   |  x  |  ✓  | ✓   | 

**说明：**

* INFO 命令支持：server，clients，memory，persistence，stats，replication，cpu，commandstats，cluster，keyspace

	* 1.如果是集群版，replication，server展示的是某一分片的信息，其余子命令则是统计之后的信息。

	* 2.特别说明，cluster子命令，显示db_count表示数据库的数量，shard_count表示当前redis版本的分片个数。

* CONFIG 命令，只支持CONFIG GET [parameter]子命令，并且如果是集群版Redis，返回的是某一个分片的信息。

* LATENCY: 集群版的模式下，可以指定shardId。用来获取指定分片的数据，默认返回分片0的数据。

	* 1.LATENCY支持的子命令有：[LATEST] [DOCTOR] [ HISTORY event-name] [RESET [event-name … event-name]] [GRAPH event-name]

	* 2.在集群版模式下，例如：LATENCY latest 1，来查看1号分片的最近一次的延迟时间信息。不指定shardId则默认为0号分片

* MEMORY命令，支持help，doctor，stats，purge，malloc-stats这几个子命令，支持指定shardId

	* MEMORY stats 1，表示查看1号分片的内存统计信息，不指定则默认0号分片



#### Scripting（脚本）
| 命令 | 2.8标准版  |  2.8集群版  |  4.0标准版  |  4.0集群版  | 
|:--:|:--:|:--:|:--:|:--:| 
|  EVAL      |   ✓   | ✓  |  ✓  | ✓   | 
|  EVALSHA   |   ✓   | x  |  ✓  | ✓   | 
|  SCRIPT EXISTS   |   ✓   | x  |  ✓  | ✓   | 
|  SCRIPT FLUSH    |   ✓   | x  |  ✓  | ✓   | 
|  SCRIPT KILL     |   ✓   | x  |  ✓  | ✓   | 
|  SCRIPT LOAD     |   ✓   | x  |  ✓  | ✓   | 
|  SCRIPT DEBUG    |   ✓   | x  |  ✓  | ✓   | 


#### Geo（地理位置）
| 命令 | 2.8标准版  |  2.8集群版  |  4.0标准版  |  4.0集群版  | 
|:--:|:--:|:--:|:--:|:--:| 
|  GEOADD   |   x   |  x  |  ✓  | ✓   | 
|  GEOHASH  |   x   |  x  |  ✓  | ✓   | 
|  GEOPOS   |   x   |  x  |  ✓  | ✓   | 
|  GEODIST  |   x   |  x  |  ✓  | ✓   | 
|  GEORADIUS   |   x   |  x  |  ✓  | ✓   | 
|  GEORADIUSBYMEMBER   |   x   |  x  |  ✓  | ✓   | 




###  其它说明 

* 如需在集群实例中执行受限制的命令，需要使用hash tag确保命令所要操作的key都要分布在一个hash slot中。

* lua脚本中不支持的命令说明：

	* 1. redis2.8 lua脚本中不支持的命令有：bgsave，bgrewriteaof，shutdown，config

	* 2. redis4.0 lua脚本中不支持的命令有：swapdb，rename，renamenx， bgsave，bgrewriteaof，shutdown，config，cluster，post，host

* 事务中不支持的命令: SCRIPT *、INFO、SLOWLOG、LATENCY、EVAL、FLUSHALL、SCAN、AUTH、EVALSHA、DBSIZE、CONFIG、FLUSHDB、RANDOMKEY、PING

* ZUNIONSTORE/ZINTERSTORE命令，参数为destination numkeys key [key ...] [WEIGHTS weight] [SUM|MIN|MAX]

	* 指定的所有key和destination 必须要同属于一个槽，否则会(error) ERR CROSSSLOT Keys in request don't hash to the same slot错误

