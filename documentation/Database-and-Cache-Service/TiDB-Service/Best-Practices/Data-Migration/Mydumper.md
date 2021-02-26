## 使用 Mydumper 全量备份数据

`mydumper` 是一个强大的数据备份工具，具体可以参考 [`maxbube/mydumper`](https://github.com/maxbube/mydumper)


可使用 [Mydumper](https://docs.pingcap.com/zh/tidb/stable/mydumper-overview) 从 TiDB 导出数据进行备份，然后用 [TiDB Lightning](https://docs.pingcap.com/zh/tidb/stable/tidb-lightning-overview) 将其导入到 TiDB 里面进行恢复。

> **注意：**
>
> PingCAP 研发团队对 `mydumper` 进行了针对 TiDB 的适配性改造，建议使用 PingCAP 官方提供的 [Mydumper](https://docs.pingcap.com/zh/tidb/stable/mydumper-overview)。由于使用 `mysqldump` 进行数据备份和恢复都要耗费许多时间，这里也并不推荐。

### Mydumper/TiDB Lightning 全量备份恢复最佳实践

为了快速地备份恢复数据 (特别是数据量巨大的库)，可以参考以下建议：

- 导出来的数据文件应当尽可能的小，可以通过设置参数 `-F` 来控制导出来的文件大小。如果后续使用 TiDB Lightning 对备份文件进行恢复，建议把 `mydumper` -F 参数的值设置为 `256`（单位 MB）；如果使用 `loader` 恢复，则建议设置为 `64`（单位 MB）。

## 从 TiDB 备份数据

我们使用 `mydumper` 从 TiDB 备份数据，如下:

Copied!

```bash
./bin/mydumper -h 127.0.0.1 -P 4000 -u root -t 32 -F 256 -B test -T t1,t2 --skip-tz-utc -o ./var/test
```

上面，我们使用 `-B test` 表明是对 `test` 这个 database 操作，然后用 `-T t1,t2` 表明只导出 `t1`，`t2` 两张表。

`-t 32` 表明使用 32 个线程去导出数据。`-F 256` 是将实际的表切分成一定大小的 chunk，这里的 chunk 大小为 256MB。

添加 `--skip-tz-utc` 参数后，会忽略掉 TiDB 与导数据的机器之间时区设置不一致的情况，禁止自动转换。

如果 `mydumper` 出现以下报错：

```text
** (mydumper:27528): CRITICAL **: 13:25:09.081: Could not read data from testSchema.testTable: GC life time is shorter than transaction duration, transaction starts at 2019-08-05 21:10:01.451 +0800 CST, GC safe point is 2019-08-05 21:14:53.801 +0800 CST
```

就再执行两步命令：

1. 执行 `mydumper` 命令前，查询 TiDB 集群的 [GC](https://docs.pingcap.com/zh/tidb/stable/garbage-collection-overview) 值并使用 MySQL 客户端将其调整为合适的值：

   ```sql
   SELECT * FROM mysql.tidb WHERE VARIABLE_NAME = 'tikv_gc_life_time';
   ```

   ```text
   +-----------------------+------------------------------------------------------------------------------------------------+
   | VARIABLE_NAME         | VARIABLE_VALUE                                                                                 |
   +-----------------------+------------------------------------------------------------------------------------------------+
   | tikv_gc_life_time     | 10m0s                                                                                          |
   +-----------------------+------------------------------------------------------------------------------------------------+
   1 rows in set (0.02 sec)
   ```

   ```sql
   UPDATE mysql.tidb SET VARIABLE_VALUE = '720h' WHERE VARIABLE_NAME = 'tikv_gc_life_time';
   ```

2. 执行 `mydumper` 命令后，将 TiDB 集群的 GC 值恢复到第 1 步中的初始值：

   ```sql
   UPDATE mysql.tidb SET VARIABLE_VALUE = '10m' WHERE VARIABLE_NAME = 'tikv_gc_life_time';

### mydumper使用简介

```shell
mydumper语法
mydumper -u [USER] -p [PASSWORD] -h [HOST] -P [PORT] -t [THREADS] -b -c -B [DB] -o [directory]

注意：命令行之间要有空格 -u 用户名  -p 密码 之间必须有空格 
常用参数说明
  -B, --database              需要备份的库
  -T, --tables-list           需要备份的表，多表，用逗号分隔
  -o, --outputdir             输出文件的目录
  -c, --compress              压缩输出文件
  -i, --ignore-engines        忽略的存储引擎，用逗号分隔
  -h, --host                  The host to connect to
  -u, --user                  Username with privileges to run the dump
  -p, --password              User password
  -P, --port                  TCP/IP port to connect to
  -S, --socket                UNIX domain socket file to use for connection
  -t, --threads               使用的线程数，默认4
  -C, --compress-protocol     在mysql连接上使用压缩协议
  -V, --version               Show the program version and exit
  -v, --verbose               更多输出, 0 = silent, 1 = errors, 2 = warnings, 3 = info, default 2
```

备份实例

```shell
1 备份单个库  
# mydumper -u 用户名 -p 密码 -B 需要备份的库名 -o /tmp/bak
2 备份所有数据库：全库备份期间除了information_schema与performance_schema之外的库都会被备份
# mydumper -u 用户名 -p 密码 -o /tmp/bak

3 备份单表
# mydumper -u 用户名 -p 密码 -B 库名 -T 表名 -o /tmp/bak

4 备份多表
# mydumper -u 用户名 -p 密码 -B 库名 -T 表1,表2 -o /tmp/bak
   ```