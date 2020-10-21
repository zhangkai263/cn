# 京东云数据库MongoDB接口


## 简介
数据库MongoDB相关接口


### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**backupDownloadURL**|GET|获取备份下载链接|
|**createBackup**|POST|创建备份|
|**createBackupSynchronicity**|POST|创建跨区域备份同步服务|
|**createInstance**|POST|创建实例|
|**createShardingInstance**|POST|创建分片集群|
|**deleteBackup**|DELETE|删除备份|
|**deleteBackupSynchronicities**|DELETE|删除跨地域备份同步服务|
|**deleteInstance**|DELETE|删除实例|
|**describeAvailableZones**|GET|获取可用区|
|**describeBackupPolicy**|GET|获取备份策略|
|**describeBackupSynchronicities**|GET|查询跨区域备份同步服务|
|**describeBackups**|GET|查看备份|
|**describeFlavors**|GET|获取规格|
|**describeInstances**|GET|查询实例信息|
|**describeSecurityIps**|GET|查询实例访问白名单|
|**modifyBackupPolicy**|POST|修改备份策略|
|**modifyInstanceName**|POST|修改实例名称|
|**modifyInstanceSpec**|POST|变更实例规格|
|**modifyNodeSpec**|POST|变更分片集群的节点规格，支持Mognos、Shard节点。|
|**modifySecurityIps**|POST|修改实例访问白名单|
|**resetPassword**|POST|重置密码|
|**restartInstance**|POST|重启实例|
|**restartNode**|POST|重启MongoDB分片集群节点，支持重启Mongos、Shard。|
|**restoreInstance**|POST|数据恢复|
