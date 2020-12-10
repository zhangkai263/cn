## 云缓存Redis日志
### 简介
目前接入日志服务的云缓存Redis日志类型为慢日志。

### 字段说明
#### 慢日志
| 序号 | 字段名称 | 字段描述 | 字段类型 |
| --- | --- | --- | --- | 
| 1 | time | 日志记录时间，示例：1324097834 | int64 | 
| 2 | space_id | 资源ID，示例：“redis-95jbpnhpvk” | string |
| 3 | version | 版本，示例：“redis-2.8” | string |
| 4 | shard_name     | 分片名称, 示例: “redis-95jbpnhpvk-shard-0” | string |
| 5 | command | 执行命令, 示例：“CONFIG GET slowlog-log-slower-than” | string |
| 6 | execution_time | 执行时长，示例：“12 ms” | string |
| 7 | region_id | 区域ID，示例：“cn-north-1” | string |
| 8 | pin | 用户pin，示例：“jcloudiaas2” | string |
