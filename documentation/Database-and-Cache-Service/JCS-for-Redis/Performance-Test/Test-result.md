# 测试结果


测试规格  |规格代码|分片数|QPS参考值
:---|:--|:---|:---
1G标准版 |redis.m1.micro.basic| 1|9~11w
4G标准版 |redis.m1.small.basic| 1|9~11w
8G标准版| redis.m1.large.basic | 1|9~11w
16G集群版| redis.c1.small.basic|  8|28~52w
32G集群版| redis.c1.small.basic|  8|28~54w
64G集群版|  redis.c1.large.basic | 8|28~54w
128G集群版|  redis.c1.xlarge.basic | 16|32~78w
512G集群版|  redis.c1.4xlarge.basic   |32|28~82w

