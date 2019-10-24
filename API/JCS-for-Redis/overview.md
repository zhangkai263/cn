# JDCloud Redis API


## 简介
京东云缓存Redis相关接口


### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**createBackup**|POST|创建并执行缓存Redis实例的备份任务，只能为手动备份，可设置备份文件名称|
|**createCacheInstance**|POST|创建一个指定配置的缓存Redis实例：可选择主从版或集群版，每种类型又分为多种规格（按CPU核数、内存容量、磁盘容量、带宽等划分），具体可参考产品规格代码，https://docs.jdcloud.com/cn/jcs-for-redis/specifications<br>|
|**deleteCacheInstance**|DELETE|删除按配置计费、或包年包月已到期的缓存Redis实例，包年包月未到期不可删除。<br>只有处于运行running或者错误error状态才可以删除，其余状态不可以删除。<br>白名单用户不能删除包年包月已到期的缓存Redis实例。<br>|
|**describeBackupPolicy**|GET|查询缓存Redis实例的自动备份策略|
|**describeBackups**|GET|查询缓存Redis实例的备份结果（备份文件列表），可分页、可指定起止时间或备份任务ID|
|**describeCacheInstance**|GET|查询缓存Redis实例的详细信息|
|**describeCacheInstances**|GET|查询缓存Redis实例列表，可分页、可排序、可搜索、可过滤|
|**describeClusterInfo**|GET|查询Redis实例的集群内部信息|
|**describeDownloadUrl**|GET|获取缓存Redis实例的备份文件临时下载地址|
|**describeInstanceClass**|GET|查询某区域下的缓存Redis实例规格列表|
|**describeInstanceConfig**|GET|查看缓存Redis实例的当前配置参数|
|**describeSlowLog**|GET|获取缓存Redis实例的慢查询日志|
|**describeUserQuota**|GET|查询账户的缓存Redis配额信息|
|**modifyBackupPolicy**|PATCH|修改缓存Redis实例的自动备份策略，可修改备份周期和备份时间|
|**modifyCacheInstanceAttribute**|PATCH|修改缓存Redis实例的资源名称或描述，二者至少选一|
|**modifyCacheInstanceClass**|POST|变更缓存Redis实例规格（变配），只能变更运行状态的实例规格，变更的规格不能与之前的相同。<br>预付费用户，从集群版变配到主从版，新规格的内存大小要大于老规格的内存大小，从主从版到集群版，新规格的内存大小要不小于老规格的内存大小。<br>|
|**modifyInstanceConfig**|POST|修改缓存Redis实例的配置参数，支持部分参数修改|
|**resetCacheInstancePassword**|POST|重置缓存Redis实例的密码，可为空|
|**restoreInstance**|POST|恢复缓存Redis实例的某次备份|
