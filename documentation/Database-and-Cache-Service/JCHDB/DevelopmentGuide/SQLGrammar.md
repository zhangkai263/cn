# SQL语法
*Create Database*

介绍创建数据库的基本语法。

CREATE DATABASE基本语法如下：

在MySQL中创建表：
 ```SQL
CREATE DATABASE [IF NOT EXISTS] db_name [ON CLUSTER cluster];
```
如果CREATE 语句中存在IF NOT EXISTS 关键字，则当数据库已经存在时，该语句不会创建数据库，且不会返回任何错误。
ON CLUSTER 关键字用于指定集群名称。
示例：
 ```SQL
CREATE DATABASE db_1 ON CLUSTER default;
```

*Create Table*

介绍如何建表和视图。

**创建本地表**

建表语句基本语法如下：

 ```SQL
CREATE TABLE [IF NOT EXISTS] [db.]table_name ON CLUSTER cluster
(
    name1 [type1] [DEFAULT|MATERIALIZED|ALIAS expr1],
    name2 [type2] [DEFAULT|MATERIALIZED|ALIAS expr2],
    ...
    INDEX index_name1 expr1 TYPE type1(...) GRANULARITY value1,
    INDEX index_name2 expr2 TYPE type2(...) GRANULARITY value2
) ENGINE = engine_name()
[PARTITION BY expr]
[ORDER BY expr]
[PRIMARY KEY expr]
[SAMPLE BY expr]
[SETTINGS name=value, ...];
```
参数说明：
 - db：指定数据库名称，如果当前语句没有包含‘db’，则默认使用当前选择的数据库为‘db’。
 - cluster：指定集群名称，目前固定为default。ON CLUSTER 将在每一个节点上都创建一个本地表。
 - type：该列数据类型，例如 UInt32。
 - DEFAULT：该列缺省值。如果INSERT中不包含指定的列，那么将通过表达式计算它的默认值并填充它。
 - MATERIALIZED：物化列表达式，表示该列不能被INSERT，是被计算出来的； 在INSERT语句中，不需要写入该列；在SELECT *查询语句结果集不包含该列。
 - ALIAS ：别名列。这样的列不会存储在表中。 它的值不能够通过INSERT写入，同时使用SELECT查询星号时，这些列也不会被用来替换星号。 但是它们可以用于SELECT中，在这种情况下，在查询分析中别名将被替换。
 - 物化列与别名列的区别： 物化列是会保存数据，查询的时候不需要计算，而别名列不会保存数据，查询的时候需要计算，查询时候返回表达式的计算结果

以下选项与表引擎相关，只有MergeTree系列表引擎支持：

 - PARTITION BY：指定分区键。通常按照日期分区，也可以用其他字段或字段表达式。
 - ORDER BY：指定 排序键。可以是一组列的元组或任意的表达式。
 - PRIMARY KEY： 指定主键，默认情况下主键跟排序键相同。因此，大部分情况下不需要再专门指定一个 PRIMARY KEY 子句。
 - SAMPLE BY ：抽样表达式，如果要用抽样表达式，主键中必须包含这个表达式。
 - SETTINGS：影响 性能的额外参数。
 - GRANULARITY ：索引粒度参数。

示例，创建一个本地表：
 ```SQL
CREATE TABLE ontime_local ON CLUSTER default
(
    Year UInt16,
    Quarter UInt8,
    Month UInt8,
    DayofMonth UInt8,
    DayOfWeek UInt8,
    FlightDate Date,
    FlightNum String,
    Div5WheelsOff String,
    Div5TailNum String
)ENGINE = ReplicatedMergeTree('/clickhouse/tables/{shard}/ontime_local','{replica}')
 PARTITION BY toYYYYMM(FlightDate)
 PRIMARY KEY (intHash32(FlightDate))
 ORDER BY (intHash32(FlightDate),FlightNum)
 SAMPLE BY intHash32(FlightDate)
SETTINGS index_granularity= 8192 ;
```

说明 ：
高可用集群（多副本），要用ReplicatedMergeTree等Replicated系列引擎，否则副本之间不进行数据复制，导致数据查询结果不一致。
{shard},{replica} 参数不需要赋值。


**创建分布式表**
基于本地表创建一个分布式表。

创建分布式表基本语法：

 ```SQL
CREATE TABLE  [db.]table_name  ON CLUSTER default
 AS db.local_table_name   ENGINE = Distributed(<cluster>, <database>, <shard table>, [sharding_key])
```
参数说明：
 - db：数据库名。
 - local_table_name：对应的已经创建的本地表表名。
 - shard table：同上，对应的已经创建的本地表表名。
 - sharding_key：分片表达式。可以是一个字段，例如user_id（integer类型），通过对余数值进行取余分片；也可以是一个表达式，例如rand()，通过rand()函数返回值/shards总权重分片；为了分片更均匀，可以加上hash函数，如intHash64(user_id)。

示例：创建一个分布式表
--建立分布式表
 ```SQL
CREATE TABLE ontime_distributed ON CLUSTER default
 AS db_name.ontime_local 
ENGINE = Distributed(default, db_name, ontime_local, rand());
```

说明 : db_name 是数据库的名字，需要填写。


**复制另一个表结构**

创建与另一个表相同结构的表，语法如下：
 ```SQL
CREATE TABLE [IF NOT EXISTS] [db.]table_name ON CLUSTER default AS [db.]name2 [ENGINE = engine];
```
表引擎可以通过ENGINE=engine字句指定，默认与被复制的表“name2”相同。

示例：
 ```SQL
 create table t2 ON CLUSTER default as db1.t1;
 ```

 **通过SELECT语句创建**

 使用指定的引擎创建一个与SELECT子句的结果具有相同结构的表，并使用SELECT子句的结果填充它。语法如下：
 ```SQL
 CREATE TABLE [IF NOT EXISTS] [db.]table_name ON CLUSTER default ENGINE = engine AS SELECT ...
 ```
 其中ENGINE是需要明确指定的。
 示例：
 ```SQL
 create table t2 ON CLUSTER default ENGINE =MergeTree() as select * from db1.t1 where id<100;
 ```

 **创建临时表**

创建临时语法如下：
```SQL
CREATE TEMPORARY TABLE [IF NOT EXISTS] table_name ON CLUSTER default 
(
    name1 [type1] [DEFAULT|MATERIALIZED|ALIAS expr1],
    name2 [type2] [DEFAULT|MATERIALIZED|ALIAS expr2],
    ...
)
```
通过TEMPORARY 关键字表示临时表。大多数情况下，临时表不是手动创建的，只有在分布式查询处理中使用(GLOBAL) IN时为外部数据创建。

**创建视图**

创建视图语法如下：
```SQL
CREATE [MATERIALIZED] VIEW [IF NOT EXISTS] [db.]table_name [TO[db.]name] ON CLUSTER default [ENGINE = engine] [POPULATE] AS SELECT ...
```
有MATERIALIZED关键字表示是物化视图，否则为普通视图。
假如用以下语句创建了一个视图。
```SQL
CREATE VIEW view_1 ON CLUSTER default AS SELECT a,b,c,d FROM db1.t1;
```
那么下列两个语句完全等价。

```SQL
SELECT a, b, c FROM view_1 ;
SELECT a, b, c FROM (SELECT a,b,c FROM db1.t1);
```

物化视图存储的数据是由相应的SELECT查询转换得来的。
在创建物化视图时，您还必须指定表的引擎 - 将会使用这个表引擎存储数据。
目前物化视图的工作原理：当将数据写入到物化视图中SELECT子句所指定的表时，插入的数据会通过SELECT子句查询进行转换并将最终结果插入到视图中。
如果创建物化视图时指定了POPULATE子句，则在创建时将该表的数据插入到物化视图中。就像使用CREATE TABLE ... AS SELECT ...一样。否则，物化视图只会包含在物化视图创建后的新写入的数据。
我们不推荐使用POPULATE，因为在视图创建期间写入的数据将不会写入其中。当一个SELECT子句包含DISTINCT, GROUP BY, ORDER BY, LIMIT时，请注意，这些仅会在插入数据时在每个单独的数据块上执行。例如，如果你在其中包含了GROUP BY，则只会在查询期间进行聚合，但聚合范围仅限于单个批的写入数据。数据不会进一步被聚合。但是当你使用一些其他数据聚合引擎时这是例外的，如：SummingMergeTree。
目前对物化视图执行ALTER是不支持的，因此这可能是不方便的。如果物化视图是使用的TO [db.]name的方式进行构建的，你可以使用DETACH语句现将视图剥离，然后使用ALTER运行在目标表上，然后使用ATTACH将之前剥离的表重新加载进来。视图看起来和普通的表相同。例如，你可以通过SHOW TABLES查看到它们。
没有单独的删除视图的语法。如果要删除视图，请使用DROP TABLE。

*INSERT INTO*

介绍如何用INSERT INTO 语句往表中插入数据。

**基本语法**

INSERT INTO 语句基本格式如下：
```SQL
INSERT INTO [db.]table [(c1, c2, c3)] VALUES (v11, v12, v13), (v21, v22, v23), ...
```
对于存在于表结构中但不存在于插入列表中的列，它们将会按照如下方式填充数据：
 - 如果存在DEFAULT表达式，根据DEFAULT表达式计算被填充的值。
 - 如果没有定义DEFAULT表达式，则填充零或空字符串。

**使用SELECT的结果写入**

语法结构如下：
```SQL
INSERT INTO [db.]table [(c1, c2, c3)] SELECT ...
```

写入的列与SELECT的列的对应关系是使用位置来进行对应的，它们在SELECT表达式与INSERT中的名称可以是不同的。需要对它们进行对应的类型转换。

除了VALUES格式之外，其他格式中的数据都不允许出现诸如now()，1 + 2等表达式。VALUES格式允许您有限度的使用这些表达式，但是不建议您这么做，因为执行这些表达式很低效。

**影响性能的注意事项**
在执行INSERT时将会对写入的数据进行一些处理，比如按照主键排序、按照月份对数据进行分区等。如果在您的写入数据中包含多个月份的混合数据时，将会显著地降低INSERT的性能。为了避免这种情况，通常采用以下方式：

 - 数据总是以尽量大的batch进行写入，如每次写入100,000行。
 - 数据在写入ClickHouse前预先对数据进行分组。

在以下的情况下，性能不会下降：
 - 数据总是被实时地写入。
 - 写入的数据已经按照时间排序。

**基本语法**

SELECT语句基本格式如下：
```SQL
SELECT [DISTINCT] expr_list
    [FROM [db.]table | (subquery) | table_function] [FINAL]
    [SAMPLE sample_coeff]
    [ARRAY JOIN ...]
    [GLOBAL] ANY|ALL INNER|LEFT JOIN (subquery)|table USING columns_list
    [PREWHERE expr]
    [WHERE expr]
    [GROUP BY expr_list] [WITH TOTALS]
    [HAVING expr]
    [ORDER BY expr_list]
    [LIMIT [n, ]m]
    [UNION ALL ...]
    [INTO OUTFILE filename]
    [FORMAT format]
    [LIMIT n BY columns]
```

所有的子句都是可选的，除了SELECT之后的表达式列表（expr_list）。 下面将选择部分子句进行说明。ClickHouse官网中文文档有更详细说明，请参考查询语法。

简单查询语句示例：
```SQL
SELECT
    OriginCityName,
    DestCityName,
    count(*) AS flights,
    bar(flights, 0, 2000, 50)
FROM ontime_distributed 
WHERE Year = 1998
GROUP BY OriginCityName, DestCityName 
ORDER BY flights DESC 
LIMIT 10;
```
**SAMPLE 子句**
通过SAMPLE子句用户可以进行近似查询处理，近似查询处理仅能工作在MergeTree*类型的表中，并且在创建表时需要您指定采样表达式。
SAMPLE子句可以使用SAMPLE k来表示，其中k可以是0到1的小数值，或者是一个足够大的正整数值。
当k为0到1的小数时，查询将使用'k'作为百分比选取数据。例如，SAMPLE 0.1查询只会检索数据总量的10%。当k为一个足够大的正整数时，查询将使用'k'作为最大样本数。例如，SAMPLE 10000000查询只会检索最多10,000,000行数据。
示例：
```SQL
SELECT
    Title,
    count() * 5 AS PageViews
FROM hits_distributed
SAMPLE 0.1
WHERE
    CounterID = 35
    AND toDate(EventDate) >= toDate('2013-02-29')
    AND toDate(EventDate) <= toDate('2013-03-03')
    AND NOT DontCountHits
    AND NOT Refresh
    AND Title != ''
GROUP BY Title
ORDER BY PageViews DESC LIMIT 100;
```

在这个例子中，查询将检索数据总量的0.1（10%）的数据。值得注意的是，查询不会自动校正聚合函数最终的结果，所以为了得到更加精确的结果，需要将count()的结果手动乘以10。

当使用像SAMPLE 10000000这样的方式进行近似查询时，由于没有了任何关于将会处理了哪些数据或聚合函数应该被乘以几的信息，所以这种方式不适合在这种场景下使用。

使用相同的采样率得到的结果总是一致的：如果我们能够看到所有可能存在在表中的数据，那么相同的采样率总是能够得到相同的结果（在建表时使用相同的采样表达式），换句话说，系统在不同的时间，不同的服务器，不同表上总以相同的方式对数据进行采样。

例如，我们可以使用采样的方式获取到与不进行采样相同的用户ID的列表。这将表明，您可以在IN子查询中使用采样，或者使用采样的结果与其他查询进行关联。

**ARRAY JOIN 子句**
ARRAY JOIN子句可以帮助查询进行与数组和nested数据类型的连接。它有点类似arrayJoin函数，但它的功能更广泛。

ARRAY JOIN本质上等同于INNERT JOIN数组。例如：
```SQL
CREATE TABLE arrays_test (s String, arr Array(UInt8)) ENGINE = Memory

CREATE TABLE arrays_test
(
    s String,
    arr Array(UInt8)
) ENGINE = Memory

Ok.

0 rows in set. Elapsed: 0.001 sec.

:) INSERT INTO arrays_test VALUES ('Hello', [1,2]), ('World', [3,4,5]), ('Goodbye', [])

INSERT INTO arrays_test VALUES

Ok.

3 rows in set. Elapsed: 0.001 sec.

:) SELECT * FROM arrays_test

SELECT *
FROM arrays_test

┌─s───────┬─arr─────┐
│ Hello   │ [1,2]   │
│ World   │ [3,4,5] │
│ Goodbye │ []      │
└─────────┴─────────┘

3 rows in set. Elapsed: 0.001 sec.

:) SELECT s, arr FROM arrays_test ARRAY JOIN arr

SELECT s, arr
FROM arrays_test
ARRAY JOIN arr

┌─s─────┬─arr─┐
│ Hello │   1 │
│ Hello │   2 │
│ World │   3 │
│ World │   4 │
│ World │   5 │
└───────┴─────┘

5 rows in set. Elapsed: 0.001 sec.

```

**Join 语句Null的处理**

JOIN语句中的Null处理，请参考join_use_nulls、Nullable、NULL。

**WHERE 子句**

如果存在WHERE子句，则在该子句中必须包含一个UInt8类型的表达式。这个表达式通常是一个带有比较和逻辑的表达式。这个表达式将会在所有数据转换前用来过滤数据。

如果在支持索引的数据库表引擎中，这个表达式将被评估是否使用索引。

**PREWHERE子句**

这个子句与WHERE子句的意思相同。主要的不同之处在于表数据的读取。当使用PREWHERE时，首先只读取PREWHERE表达式中需要的列。然后在根据PREWHERE执行的结果读取其他需要的列。

如果在过滤条件中有少量不适合索引过滤的列，但是它们又可以提供很强的过滤能力。这时使用PREWHERE是有意义的，因为它将帮助减少数据的读取。

例如：在一个需要提取大量列的查询中为少部分列编写PREWHERE是很有作用的。
说明 PREWHERE仅支持*MergeTree系列引擎。在一个查询中可以同时指定PREWHERE和WHERE，在这种情况下，PREWHERE优先于WHERE执行。PREWHERE不适合用于已经存在于索引中的列，因为当列已经存在于索引中的情况下，只有满足索引的数据块才会被读取。如果将'optimize_move_to_prewhere'设置为1，并且在查询中不包含PREWHERE，则系统将自动的把适合PREWHERE表达式的部分从WHERE中抽离到PREWHERE中。


**WITH TOTALS 修饰符**

如果您指定了WITH TOTALS修饰符，将会在结果中得到一个被额外计算出的行。在这一行中将包含所有key的默认值（零或者空值），以及所有聚合函数对所有被选择数据行的聚合结果。
该行仅在JSON*, TabSeparated*, Pretty*输出格式中与其他行分开输出。
