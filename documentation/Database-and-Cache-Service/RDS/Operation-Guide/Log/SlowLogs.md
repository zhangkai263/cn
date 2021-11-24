# 慢日志 
京东云云数据库 MySQL/Percona/MariaDB/PostgreSQL 提供了慢日志统计，慢日志明细（PostgreSQL暂不支持），您可以根据统计信息进行应用程序的优化。

## 操作步骤


### 查看慢日志
1. 登录 [云数据库 RDS 管理控制台](https://rds-console.jdcloud.com/database)。
2. 选择目标实例，点击目标实例，进入实例详情页 。  
3. 点击 **性能优化** Tab 页， 选择时间范围，查询 **慢日志统计** 或 **慢日志明细**。

|查询项|内容|
|---|---|
|慢日志统计|对 7 天内云数据库 MySQL/Percona/MariaDB/PostgreSQL 中执行时间超过 1 秒的 SQL 语句进行统计汇总，给出慢查询日志的分析报告；|
|慢日志明细|记录 7 天内云数据库 MySQL/Percona/MariaDB 中执行时间超过 1秒的 SQL 语句；|

### 下载慢日志
1. 登录 [云数据库 RDS 管理控制台](https://rds-console.jdcloud.com/database)。
2. 选择目标实例，点击目标实例，进入实例详情页。  
3. 点击 **性能优化** Tab 页， 选择时间范围，查询 **慢日志统计** 或 **慢日志明细**。
4. 点击列表页的右上角的 **下载** 图标，可以将当前页面的查询结果以 **excel** 的格式下载到本地。


