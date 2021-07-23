# JDCloud Redis API


## 简介
京东云缓存Redis相关接口


### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**createBackup**|POST|创建并执行缓存Redis实例的备份任务，只能为手动备份，可设置备份文件名称|
|**createCacheAnalysis**|POST|创建缓存分析任务，一天最多创建12次分析任务|
|**createCacheInstance**|POST|创建一个指定配置的缓存Redis实例：可选择版本、类型、规格（按CPU核数、内存容量、磁盘容量、带宽等划分），自定义分片规格可通过describeSpecConfig接口获取，老规格代码请参考，https://docs.jdcloud.com/cn/jcs-for-redis/specifications<br>|
|**deleteCacheInstance**|DELETE|删除按配置计费、或包年包月已到期的缓存Redis实例，包年包月未到期不可删除。<br>只有处于运行running或者错误error状态才可以删除，其余状态不可以删除。<br>白名单用户不能删除包年包月已到期的缓存Redis实例。<br>|
|**describeAnalysisTime**|GET|获取自动缓存分析时间|
|**describeAvailableRegion**|GET|查询支持的地域列表|
|**describeAvailableResource**|GET|查询支持的规格列表|
|**describeBackupPolicy**|GET|查询缓存Redis实例的自动备份策略|
|**describeBackups**|GET|查询缓存Redis实例的备份任务（文件）列表，可分页、可指定起止时间或备份任务ID|
|**describeCacheAnalysisList**|GET|查询缓存分析任务列表|
|**describeCacheAnalysisResult**|GET|查询缓存分析任务详情，最多查询到30天前的数据|
|**describeCacheInstance**|GET|查询缓存Redis实例的详细信息|
|**describeCacheInstances**|GET|查询缓存Redis实例列表，可分页、可排序、可搜索、可过滤|
|**describeClientIpDetail**|POST|查询指定客户端IP的连接详细信息|
|**describeClientList**|GET|查询当前客户端IP列表|
|**describeClusterInfo**|GET|查询Redis实例的集群内部信息|
|**describeDownloadUrl**|GET|获取缓存Redis实例的备份文件临时下载地址（1个小时有效期）|
|**describeInstanceClass**|GET|查询缓存Redis实例的规格列表|
|**describeInstanceConfig**|GET|查看缓存Redis实例的当前配置参数|
|**describeIpWhiteList**|GET|获取Redis实例的IP白名单（只有白名单内的IP、网络才能访问该实例）|
|**describeSlowLog**|GET|获取缓存Redis实例的慢查询日志，可分页、可搜索|
|**describeSpecConfig**|GET|查询缓存Redis实例的规格配置信息|
|**describeTaskProgressList**|GET|查询正在执行的任务进度列表|
|**describeUserQuota**|GET|查询账户的缓存Redis配额信息|
|**modifyAnalysisTime**|POST|设置自动缓存分析时间|
|**modifyBackupPolicy**|PATCH|开启或更新缓存Redis实例的自动备份策略，可修改备份周期和备份时间|
|**modifyCacheInstanceAttribute**|PATCH|修改缓存Redis实例的资源名称或描述，二者至少选一|
|**modifyCacheInstanceClass**|POST|变更缓存Redis实例规格（变配），实例运行时可以变配，新规格不能与之前的老规格相同，新规格内存大小不能小于实例的已使用内存<br>|
|**modifyInstanceConfig**|POST|修改缓存Redis实例的配置参数，支持部分配置参数修改|
|**modifyIpWhiteList**|PATCH|修改Redis实例的IP白名单|
|**resetCacheInstancePassword**|POST|修改缓存Redis实例的密码，可为空|
|**restoreInstance**|POST|恢复缓存Redis实例的某次备份|
