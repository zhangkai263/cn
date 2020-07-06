# 测试命令

./redis-benchmark -h ${redis_url}  -n 1500000 -r 10000000 -d 50 -t ${cmd} -c ${client} -P 16 --threads 32
