# 测试命令

## 命令格式

<code>./redis-benchmark -h ${redis_url}  -n 1500000 -r 10000000 -d 50 -t ${cmd} -c ${client} -P 16 --threads 32</code>

格式说明参见https://redis.io/topics/benchmarks

## 测试范围

本次测试样本范围如下：

- 测试命令：get、set、lpush、mset(10 keys)、sadd等
- 数据量大小：50~512
- 客户端数量范围：60~600
