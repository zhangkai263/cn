# DRDS DDL SQL 语法

## 创建拆分表
DRDS的自动分库分表是采用拆分表来实现的，即将原先的一个大表拆分为分布在多个数据库中的分表，每个分表只存储一部分数据，从而提高了对表增删改查的性能。 

虽然DRDS将一个大表拆分成了多个小表，但这对用户是透明的，用户还是可以使用原先的表名访问所有分表中的数据，
DRDS会根据SQL语句中拆分字段的值来判断将SQL语句发往哪个分表中执行。

因此，在DRDS中定义一个拆分表跟传统的非拆分表相比，主要有两个关键的地方需要定义：
- 拆分字段：使用哪个字段对表中的数据进行拆分。
- 拆分函数：使用什么算法对表中的数据进行拆分。

### 语法
```SQL
CREATE TABLE table_name
(create_definition,...)
[DRDS partition options]
```

**[DRDS Partition Optiosn] 语法**
```SQL
 dbpartition by
     INT_MOD ([column_name])     |
     STRING_HASH ([column_name]) |
     YYYYMM ([column_name]) START ([start_date]) PERIOD [num]|
     YYYY ([column_name]) START ([start_date]) PERIOD [num]  
```

**注意事项**
1. [DRDS Partition Optiosn] 部分的语法必须在放在最后
2. 表的主键必须是拆分字段
3. 对于按时间和日期拆分的表，每个分表只存储一个时间段的数据，不会循环使用。当分表用尽后，用户需要手动对分表进行扩展。
例如，用户的某个DRDS数据库有16个分库，其中表tab1按年月拆分，每个月一个分表，因此总共可以存储16个月的数据。如果用户需要存储更多时间段的数据，需要手动增加分库数目，并对表进行扩展。

### 拆分函数
目前DRDS支持以下的拆分函数，函数名不区分大小写
- INT_MOD(): 对整型字段进行拆分，支持 int，smallint，bigint，tinyint，mediumint
- STRING_HASH()：对字符字段进行拆分，支持 char， varchar
- YYYYMM()：对时间，日期字段进行拆分，按月拆分，支持 timestamp，date，datetime
- YYYY()：时间，日期字段进行拆分，按年拆分，支持 timestamp，date，datetime
 
 **关键字：**（不区分大小写）
 - START ： 按时间拆分时，数据的起始时间，格式为 ‘YYYY’ 或者 ‘YYYY-MM’，其他格式将不被接受，例如start('2018')或start('2018-05')
 - PERIOD：按时间拆分时，每多少时间周期的数据放入到一个分表中，例如每3个月，或每2年的数据放入一个分表中
  
 ### 示例
 1. 按整型字段拆分
  ```SQL
create table ddl_demo1(
id int,
name varchar(10) default ‘’,
dept varchar(10) not null,
primary key(id))
ENGINE=InnoDB DEFAULT CHARSET=utf8
dbpartition by int_mod(id);
```
 
2. 按字符字段拆分
  ```SQL
create table ddl_demo2(
id int,
name varchar(10) default ‘’
dept varchar(10) not null,
primary key(name))
ENGINE=InnoDB DEFAULT CHARSET=utf8
dbpartition by string_hash(name);
```
 
 3. 使用YYYYMM函数，数据的起始时间为2019年5月，每3个月的数据放入一个分表中
 ```SQL
 create table ddl_demo3(
 order_id int,
 order_date datetime)
 ENGINE=InnoDB DEFAULT CHARSET=utf8
 dbpartition by YYYYMM(order_date) start('2019-05') period 3;
 ```
 4. 使用YYYY函数，数据的起始时间为2000年，每2年的数据放入一个分表中
  ```SQL
 create table ddl_demo4(
 order_id int,
 order_date datetime)
 ENGINE=InnoDB DEFAULT CHARSET=utf8
 dbpartition by YYYY(order_date) start('2000') period 2;
 ```

## 创建广播表
广播表是指将这个表复制到DRDS的每个分库上。 创建了广播表后，每个RDS节点的分库中都有该表的全量数据。用户对这个表进行增删改时，DRDS后端对每个分库上的表也进行同样的操作，以实现数据一致。这样做的好处是可以将 JOIN 操作下推到底层的 RDS（MySQL)，来避免跨库 JOIN。 

广播表主要用于提升跨库join的性能，常用于一些相对静态的配置表、字典表等数据量较小的表。

广播表可支持自增长类型，即MySQL自己的自增长类型

### 语法
在创建表的SQL语句最后增加"BROADCAST"关键字，不区分大小写。

```SQL
CREATE TABLE table_name
(create_definition,...) BROADCAST
```
**注意事项**
1. 广播表和拆分表互斥，即：一个表不能同时为广播表和拆分表。
2. 由于暂不支持分布式事务，如果某个分库的操作失败，可能会造成数据的不一致，需要应用自行处理。


### 示例
```SQL
CREATE TABLE tbc1 (
id int(11) DEFAULT '0',
value varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 broadcast;
```

## 删除拆分表
删除表的语法为标准SQL
```SQL
drop table table_name1,table_name2,table_name3, ......
```
例如：
```SQL
drop table ddl_demo1,ddl_demo2,ddl_demo3, ddl_demo4;
```

## 扩展拆分表
>备注： 只支持按时间或日期进行拆分的表

对于按日期时间进行拆分的表，每个分表只存储一个时间段的数据，不会循环使用。当分表用尽后，用户需要手动对分表进行扩展。扩展分表有两个步骤：

1. 通过控制台添加分库
2. 连接到DRDS 数据库中，执行SQL，扩展相应的表

例如，用户的某个DRDS数据库有24个分库，其中表tab1按年月拆分，每个月一个分表，因此总共可以存储24个月的数据。如果用户需要存储更多时间段的数据，需在控制台上，添加新的分库，并通过SQL 扩展分表。

### 1. 在所有新增的分库中扩展分表
在所有新增的分库中扩展分表，推荐使用这种方式
```SQL
alter table <table name> add partitions on all dbpartitions;
```

例如
```SQL
alter table demo_timetb add partitions on all dbpartitions;
```

### 2. 在指定的分库中扩展分表
如果只想在特定的分库上扩展分表，可以使用下面的SQL：
```SQL
alter table <table name> add partitions on <sub db name1>,<sub db name1>,<sub db name1>,.......
```
sub db name：是 DRDS 在RDS MySQL上的分库名，可以在控制台实例详情中【库管理】页面中查看当前数据库的所有分库名

例如在分库 db1_drds_593c_17,db1_drds_593c_18,db1_drds_593c_19,db1_drds_593c_20 中扩展分库
```SQL
alter table demo_timetb add partitions on db1_drds_593c_17,db1_drds_593c_18,db1_drds_593c_19,db1_drds_593c_20;
```

## 删除拆分表的分区
>备注： 只支持按时间或日期进行拆分的表

对于按时间或日期进行拆分的表，可以通过直接删除某个分库上的分表进行历史数据的高效批量清理，预发如下：
```SQL
alter table <table name> drop dbpartition <sub db name>;
```
sub db name：是 DRDS 在RDS MySQL上的分库名，可以在控制台实例详情中【库管理】页面中查看当前数据库的所有分库名

例如 表timetb在分库db1_drds_593c_17的存储的历史数据是24个月以前的，不再需要，可以通过下面的SQL直接清除。
```SQL
alter table timetb drop dbpartition db1_drds_593c_17;
```


