# 产品概述
分布式数据库 TiDB 是京东云联合 PingCAP 基于国内开源 NewSQL 数据库 TiDB 打造的一款同时支持 OLTP 和 OLAP 两种场景的分布式云数据库产品，实现了自动的水平伸缩，强一致性的分布式事务，部署简单，在线异步表结构变更不影响业务，同时兼容 MySQL 协议，使迁移使用成本降到极低。

## 分布式数据库 TiDB 主要特点 
1. 真正的**多活架构**，不必区分主和只读，**所有节点均可读写**，并且随着数据增长而无缝地水平扩展节点数目，近似线性的提高整个集群的计算能力和存储能力。
2. 使用多副本进行数据存储，主副本故障时自动切换，无需人工介入，自动保障业务的连续性。
3. 一致的分布式事务，ACID 事务可以在多节点间进行，**整个集群数据强一致**，所有节点读取的数据均为最新。
4. 与 MySQL 高度兼容，使用 TiDB 像使用单机MySQL一样简单，可以从 MySQL 无缝切换到 TiDB，几乎无需修改代码。
5. 可直接在同一份数据上进行高效的数据查询、分析，简化了架构，提升了数据分析的实时性，同时降低了成本。

## 支持地域版本
目前华北-北京地域支持TiDB 4.0 版本


## 常用操作
- [创建实例](../Operation-Guide/Instance/Create-Instance.md)
- [创建账号](../Operation-Guide/Account/Create-Account.md)
- [连接实例](../Operation-Guide/Instance/Connect-Instance.md)
- [创建备份](../Operation-Guide/Backup/Create-Backup.md)
- [变更配置](../Operation-Guide/Instance/Modify-Instance-Spec.md)
 
