# Redis命令支持

京东云缓存Redis基于2.8和4.0版本，命令的具体详细语法，请参见：[http://redis.io/commands](http://redis.io/commands)

## 支持的命令操作

下表中 ✓ 表示支持，x 表示不支持，- 表示不支持跨slot访问。


###  hyperloglog 
| 命令 | 2.8标准版  |  2.8集群版  |  4.0标准版  |  4.0集群版  | 
|:--:|:--:|:--:|:--:|:--:| 
| PFADD | ✓ | x  | ✓ |  ✓  | 
| PFCOUNT  | ✓ | x  | ✓ |  ✓  | 
| PFMERGE  | ✓ | x  | ✓ |  ✓  | 

