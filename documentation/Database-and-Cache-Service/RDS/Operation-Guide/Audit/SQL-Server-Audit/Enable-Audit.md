# 开启审计
SQL Server的审计分为实例级的审计和数据库级的审计。
- 实例级的审计：可以通过控制台上进行审计的开启、关闭及编辑操作。
- 数据库级的审计：由于涉及到具体的对象及SQL语句，不能在控制台进行操作，需要先开启实例级审计，然后再连接到具体的数据库中执行SQL进行审计的开启、关闭及编辑。

## 开启实例级审计
1. 登录 [云数据库 RDS 控制台](https://rds-console.jdcloud.com/database)。
2. 选择需要进行下载审计文件的实例，点击实例名称，进入实例控制台。
3. 点击 **审计** ，切换至审计弹窗。
4. 审计设置中点击右边的开关按钮，开启审计。

![开启审计1](../../../../../../image/RDS/Enable-Audit-1.png)

5. 进入到审计策略编辑页面
- 开启审计时，将直接进入到审计策略编辑界面中。
- 缺省使用推荐的审计策略，也可以根据需要进行选择
- 选择要开启的审计策略点击 **确定** 后完成审计策略设置。
![开启审计2](../../../../../../image/RDS/Enable-Audit-2.png)

## 开启数据库级审计
> **注意： 审计会消耗数据库资源。如果对频繁的数据库操作进行了审计，可能会对数据库性能造成一定的影响，建议仅对重要的表及操作开启，或者仅在特定的时间段开启。**

1. 开启数据库级的审计，需要首先开启实例级的审计，并且至少选择一项审计策略。
2. 使用具有rw（读写）权限的用户账号，连接到将开启审计的数据库中。
3. 执行相应的SQL语句，即可开启数据库的审计。
   样例展示：对表 tb1 开启 USER1 的 select，insert 和 delete 审计，对 tab2 开启 USER2 的审计
```SQL
CREATE DATABASE AUDIT SPECIFICATION [Audit Name] -- 自己随意定义审计规则别名
FOR SERVER AUDIT [RDSAudit]                      -- 固定名称: RDSAudit,不能修改
ADD (SELECT ON OBJECT::[DBO].[tb1] BY [USER1]),
ADD (INSERT ON OBJECT::[DBO].[tb1] BY [USER1]),
ADD (DELETE ON OBJECT::[DBO].[tb1] BY [USER1]),
ADD (SELECT ON OBJECT::[DBO].[tb2] BY [USER2]),
ADD (INSERT ON OBJECT::[DBO].[tb2] BY [USER2]),
ADD (DELETE ON OBJECT::[DBO].[tb2] BY [USER2])
WITH (STATE=ON)
```

详细的SQL语法可参考微软文档 [CREATE DATABASE AUDIT](https://docs.microsoft.com/zh-cn/sql/t-sql/statements/create-database-audit-specification-transact-sql?view=sql-server-2017)。
