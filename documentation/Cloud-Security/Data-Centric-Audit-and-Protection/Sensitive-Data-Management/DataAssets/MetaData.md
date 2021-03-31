# 元数据管理

## 表、字段管理

元数据管理的路径为： 云安全->数据安全中心->敏感数据资产->数据源ID/名称->元数据管理。

在元数据管理页面可以调整数据源的字段保护策略，如需要加密存储的字段，需要加密索引的字段，同时可以为该字段进行分类分级操作。

![](/image/Data-Centric-Audit-and-Protection/metadata-full.png)


点击`配置`按钮，则弹出对字段保护策略配置的窗口，如图：

![](/image/Data-Centric-Audit-and-Protection/metadata-policy.png)


字段类型 | 字段描述
---------|----------
 密文字段 | 将敏感信息加密后进行存储的字段，可与原始字段同名。
 索引字段 | 当被加密保护的字段需要出现在where语句作为检索条件时，需要增加索引字段。 
 保留明文 | 在测试场景，可以保留明文数据用作业务功能验证。


## 生成DDL语句

数据安全中心提供生成DDL语句的工具，您可以参考生成的语句进行数据库的初始化。

![](/image/Data-Centric-Audit-and-Protection/metadata-ddl.png)