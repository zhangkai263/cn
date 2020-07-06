# 限制说明
- TiDB 100% 兼容 MySQL5.7 协议、MySQL5.7 常用的功能及语法，MySQL5.7 生态中系统的工具（PHPMyAdmin, Navicat, MySQL Workbench、mysqldump、Mydumper/myloader）、客户端等均用于 TiDB。
- TiDB 是一款分布式数据库， MySQL5.7 中的部分特性由于工程实现难较大，投入产出比较低等多种原因在 TiDB 未能实现或者仅兼容语法但功能并没有实现，因此使用过程中请特别注意。例如：CREATE TABLE 语句中 ENGINE，仅兼容语法功能并没有实现，因此 TiDB 中没有 ENGINE 这类的概念。

详细的兼容性说明可参考TiDB官方文档：https://docs.pingcap.com/zh/tidb/v4.0/mysql-compatibility

## 不支持的特性
- 存储过程与函数
- 触发器
- 事件
- 自定义函数
- 外键约束
- 全文/空间函数与索引
- 非 ascii/latin1/binary/utf8/utf8mb4 的字符集
- SYS schema
- MySQL 追踪优化器
- XML 函数
- X Protocol
- Savepoints
- 列级权限
- XA 语法（TiDB 内部使用两阶段提交，但并没有通过 SQL 接口公开）
- CREATE TABLE tblName AS SELECT stmt 语法
- CREATE TEMPORARY TABLE 语法
- CHECK TABLE 语法
- CHECKSUM TABLE 语法
- SELECT INTO FILE 语法

## 与 MySQL 有差异的特性
#### 自增 ID
TiDB 的自增 ID (Auto Increment ID) 只保证自增且唯一，并不保证连续分配。TiDB 目前采用批量分配的方式，所以如果在多台 TiDB 上同时插入数据，分配的自增 ID 会不连续。

#### Performance schema
TiDB 主要使用 Prometheus 和 Grafana 来存储及查询相关的性能监控指标，故 Performance schema 部分表是空表。

#### 查询计划
EXPLAIN/EXPLAIN FOR 输出格式、内容、权限设置与 MySQL 有比较大的差别，参见理解 TiDB 执行计划。

#### 内建函数
TiDB 支持常用的 MySQL 内建函数，但是不是所有的函数都已经支持，具体请参考[官方语法文档](https://pingcap.github.io/sqlgram/#FunctionCallKeyword)。

#### 视图
不支持 UPDATE、INSERT、DELETE 等写入操作。

#### 存储引擎
仅在语法上兼容创建表时指定存储引擎，实际上 TiDB 会将元信息统一描述为 InnoDB 存储引擎。TiDB 支持类似 MySQL 的存储引擎抽象，但需要在系统启动时通过--store 配置项来指定存储引擎。


#### DDL 的限制
- Add Index
   - 同一条 SQL 语句不支持创建多个索引。
   - 仅在语法在支持创建不同类型的索引 (HASH/BTREE/RTREE），功能未实现。

- Add Column
   - 不支持设置PRIMARY KEY 及 UNIQUE KEY，不支持设置 AUTO_INCREMENT 属性。可能输出的错误信息：unsupported add column '%s' constraint PRIMARY/UNIQUE/AUTO_INCREMENT KEY

- Drop Column
   - 不支持删除主键列及索引列，可能输出的错误信息：Unsupported drop integer primary key/column a with index covered。
- Drop Primary Key
   - 仅支持删除建表时启用了 alter-primary-key 配置项的表的主键,可能输出的错误信息: Unsupported drop primary key when alter-primary-key is false。

- Order By 忽略所有列排序相关的选项。
- Change/Modify Column
   - 不支持有损变更，比如从 BIGINT 变为 INTEGER，或者从 VARCHAR(255) 变为 VARCHAR(10)，可能输出的错误信息：length %d is less than origin %d
   - 不支持修改 DECIMAL 类型的精度，可能输出的错误信息：can't change decimal column precision。
   - 不支持更改 UNSIGNED 属性，可能输出的错误信息：can't change unsigned integer to signed or vice versa。
   - 只支持将 CHARACTER SET 属性从 utf8 更改为 utf8mb4

- LOCK [=] {DEFAULT|NONE|SHARED|EXCLUSIVE}
   - 仅在语法上支持，功能未实现，故所有的 DDL 都不会锁表。

- ALGORITHM [=] {DEFAULT|INSTANT|INPLACE|COPY}
   - 支持 ALGORITHM=INSTANT 和 ALGORITHM=INPLACE 语法，但行为与 MySQL 有所不同，MySQL 中的一些 INPLACE 操作在 TiDB 中的 是INSTANT 操作。
仅在语法上支持 ALGORITHM=COPY，功能未实现，会返回警告信息。
   - 单条 ALTER TABLE 语句中无法完成多个操作。例如：不能用一条语句来添加多个列或多个索引。可能输出的错误信息：Unsupported multi schema change。

- Table Option 仅支持AUTO_INCREMENT、CHARACTER SET、COLLATE、COMMENT，不支持以下语法:
   - WITH/WITHOUT VALIDATION
   - SECONDARY_LOAD/SECONDARY_UNLOAD
   - CHECK/DROP CHECK
   - STATS_AUTO_RECALC/STATS_SAMPLE_PAGES
   - SECONDARY_ENGINE
   - ENCRYPTION

- Table Partition 分区类型支持 Hash、Range；支持 Add/Drop/Truncate/Coalese；忽略其他分区操作，可能错误信息：Warning: Unsupported partition type, treat as normal table，不支持以下语法:
   - PARTITION BY LIST
   - PARTITION BY KEY
   - SUBPARTITION
   - {CHECK|EXCHANGE|TRUNCATE|OPTIMIZE|REPAIR|IMPORT|DISCARD|REBUILD|REORGANIZE} PARTITION

- ANALYZE TABLE
   - ANALYZE TABLE 语句会完全重构表的统计数据，语句执行过程较长，但在 MySQL/InnoDB 中，它是一个轻量级语句，执行过程较短。
视图


#### SQL 模式
- 不支持兼容模式，例如： ORACLE 和 POSTGRESQL，MySQL 5.7 已弃用兼容模式，MySQL 8.0 已移除兼容模式。
- ONLY_FULL_GROUP_BY 与 MySQL 5.7 相比有细微的语义差别。
- NO_DIR_IN_CREATE 和 NO_ENGINE_SUBSTITUTION MySQL 用于解决兼容问题，并不适用于 TiDB。


#### 时区
- TiDB 采用系统当前安装的所有时区规则进行计算（一般为 tzdata 包）, 不需要导入时区表数据就能使用所有时区名称，无法通过导入时区表数据的形式修改计算规则。
- MySQL 默认使用本地时区，依赖于系统内置的当前的时区规则（例如什么时候开始夏令时等）进行计算；且在未导入时区表数据的情况下不能通过时区名称来指定时区。

#### 零月和零日
- 与 MySQL 一样，TiDB 默认启用了 NO_ZERO_DATE 和 NO_ZERO_IN_DATE 模式，但是 TiDB 与 MySQL 在处理这两个 SQL 模式有以下不同：
   - TiDB 在非严格模式下启用以上两个 SQL 模式，插入零月/零日/零日期不会给出警告，MySQL 则会给出对应的警告。
   - TiDB 在严格模式下，启用了 NO_ZERO_DATE ，仍然能够插入零日期；如果启用了 NO_ZERO_IN_DATE 则无法插入零月/零日日期。MySQL 在严格模式下则都无法插入两种类型的日期。

#### 类型系统
- 不支持 FLOAT4/FLOAT8。
- 不支持 FIXED (alias for DECIMAL)。
- 不支持 SERIAL (alias for BIGINT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE)。
- 不支持 SQLTSI* （包括 SQL_TSI_YEAR、SQL_TSI_MONTH、SQL_TSI_WEEK、SQL_TSI_DAY、SQL_TSI_HOUR、SQL_TSI_MINUTE 和 SQL_TSI_SECOND）。
