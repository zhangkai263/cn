# Redis命令支持

京东云缓存Redis基于2.8和4.0版本，命令的具体详细语法，请参见：[http://redis.io/commands](http://redis.io/commands)

## 支持的命令操作

下表中 ✓ 表示支持 ； x 表示不支持 ； - 表示 无此命令 ； 受限  表示可支持但是受限，。



### Keys（键）
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


### String（字符串）
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


###  Hash（哈希表） 
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


###  List（列表）
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


###  Set（集合）
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


###  Sorted Set（有序集合）
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
|  ZREVRANGEBYLEX   |   --   | --  |  ✓  | ✓   | 
|  ZREVRANGEBYSCORE |   ✓   | ✓  |  ✓  | ✓   | 
|  ZREVRANK      |   ✓   | ✓  |  ✓  | ✓   | 
|  ZSCORE        |   ✓   | ✓  |  ✓  | ✓   | 
|  ZUNIONSTORE   |   ✓   | x  |  受限  | 受限    | 
|  ZINTERSTORE   |   ✓   | x  |  受限  | 受限    | 
|  ZSCAN         |   ✓   | ✓  |  ✓  | ✓   | 
|  ZRANGEBYLEX      |   ✓   | ✓  |  ✓  | ✓   | 
|  ZLEXCOUNT        |   ✓   | ✓  |  ✓  | ✓   | 
|  ZREMRANGEBYLEX   |   ✓   | ✓  |  ✓  | ✓   | 
|  ZPOPMAX   |   --   | --  |  --  | --   | 
|  ZPOPMIN   |   --   | --  |  --  | --   | 
|  BZPOPMIN  |   --   | --  |  --  | --   | 
|  BZPOPMAX  |   --   | --  |  --  | --   | 


###  hyperloglog 
| 命令 | 2.8标准版  |  2.8集群版  |  4.0标准版  |  4.0集群版  | 
|:--:|:--:|:--:|:--:|:--:| 
| PFADD    | ✓ | x  | ✓ |  ✓  | 
| PFCOUNT  | ✓ | x  | ✓ |  ✓  | 
| PFMERGE  | ✓ | x  | ✓ |  ✓  | 


###  Pub/Sub（发布/订阅）
| 命令 | 2.8标准版  |  2.8集群版  |  4.0标准版  |  4.0集群版  | 
|:--:|:--:|:--:|:--:|:--:| 
|  PSUBSCRIBE   |   x   | x  |  ✓  | ✓   | 
|  PUBLISH      |   x   | x  |  ✓  | ✓   | 
|  PUBSUB       |   x   | x  |  ✓  | ✓   | 
|  PUNSUBSCRIBE |   x   | x  |  ✓  | ✓   | 
|  SUBSCRIBE    |   x   | x  |  ✓  | ✓   | 
|  UNSUBSCRIBE  |   x   | x  |  ✓  | ✓   | 


### Transaction（事务）
| 命令 | 2.8标准版  |  2.8集群版  |  4.0标准版  |  4.0集群版  | 
|:--:|:--:|:--:|:--:|:--:| 
|  DISCARD   |   ✓   | x  |  ✓  | ✓   | 
|  EXEC      |   ✓   | x  |  ✓  | ✓   | 
|  MULTI     |   ✓   | x  |  ✓  | ✓   | 
|  UNWATCH   |   ✓   | x  |  ✓  | ✓   | 
|  WATCH     |   ✓   | x  |  ✓  | ✓   | 


### Connection（连接）
| 命令 | 2.8标准版  |  2.8集群版  |  4.0标准版  |  4.0集群版  | 
|:--:|:--:|:--:|:--:|:--:| 
|  AUTH   |   ✓   | ✓  |  ✓  | ✓   | 
|  ECHO   |   ✓   | ✓  |  ✓  | ✓   | 
|  PING   |   ✓   | ✓  |  ✓  | ✓   | 
|  QUIT   |   ✓   | ✓  |  ✓  | ✓   | 
|  SELECT |   ✓   | ✓  |  ✓  | ✓   | 
|  SWAPDB |   x   | x   |  x  | x   | 


### Server（服务器）
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
|  MEMORY           |   --  | -- |  ✓  | ✓   | 
|  LATENCY          |   x   |  x  |  ✓  | ✓   | 


### Scripting（脚本）
| 命令 | 2.8标准版  |  2.8集群版  |  4.0标准版  |  4.0集群版  | 
|:--:|:--:|:--:|:--:|:--:| 
|  EVAL      |   ✓   | ✓  |  ✓  | ✓   | 
|  EVALSHA   |   ✓   | x  |  ✓  | ✓   | 
|  SCRIPT EXISTS   |   ✓   | x  |  ✓  | ✓   | 
|  SCRIPT FLUSH    |   ✓   | x  |  ✓  | ✓   | 
|  SCRIPT KILL     |   ✓   | x  |  ✓  | ✓   | 
|  SCRIPT LOAD     |   ✓   | x  |  ✓  | ✓   | 
|  SCRIPT DEBUG    |   ✓   | x  |  ✓  | ✓   | 


### Geo（地理位置）
| 命令 | 2.8标准版  |  2.8集群版  |  4.0标准版  |  4.0集群版  | 
|:--:|:--:|:--:|:--:|:--:| 
|  GEOADD   |   x   |  x  |  ✓  | ✓   | 
|  GEOHASH  |   x   |  x  |  ✓  | ✓   | 
|  GEOPOS   |   x   |  x  |  ✓  | ✓   | 
|  GEODIST  |   x   |  x  |  ✓  | ✓   | 
|  GEORADIUS   |   x   |  x  |  ✓  | ✓   | 
|  GEORADIUSBYMEMBER   |   x   |  x  |  ✓  | ✓   | 
