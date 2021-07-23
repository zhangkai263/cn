# 使用s3_fdw插件将数据流转到OSS
## 使用说明
京东云RDS-PostgreSQL支持通过s3_fdw插件将OSS中的数据加载到PostgreSQL数据库中，也支持将PostgreSQL数据库中的数据写入OSS中。

目前s3_fdw支持读取和写入的文件格式为 csv。
## 前提条件
京东云PostgreSQL实例版本支持 9.6、 10.6、 11.6、12.6、13.2。
## s3_fdw参数说明
s3_fdw和其他fdw接口一样，对外部数据OSS中的数据进行封装，用户可以像使用数据表一样通过s3_fdw读取OSS中存放的数据。s3_fdw提供独有的参数用于连接和解析OSS上的文件数据。

## CREATE SERVER 参数
|参数名|是否必选|说明|
|---|---|---|
|host|是|内网访问OSS的地址|
|bucket|是|OSS Bucket，需要先在OSS中创建对应的bucket，再设置该参数|
### 示例
```SQL
CREATE USER MAPPING FOR CURRENT_USER SERVER s3_fdw_server OPTIONS (access_key_id 'xxxxx', secret_access_key 'xxxxx')
```

## CREATE FOREIGN TABLE 参数
|参数名|是否必选|说明|
|---|---|---|
|filename|filename和dir必须存在一个，但是不能两个都存在，且向OSS导出数据的模式只支持dir，不支持filename|单个文件，匹配OSS上单个文件名|
|dir|filename和dir必须存在一个，但是不能两个都存在，且向OSS导出数据的模式只支持dir，不支持filename|匹配OSS上虚拟文件夹里的所有文件，每个table与OSS上的虚拟文件夹必须一一对应应|
|format|否|文件格式，指定为csv格式即可|
|delimiter|否|只定列的分隔符|
|quote|否|指定文件的引用字符|
|escape|否|指定文件的逃逸字符|
|null|否|指定匹配对应字符串的列为null，例如null ‘test’，即列值为’test’的字符串为null|
|force_not_null|否|指定某些列的值不为null。例如，force_not_null ‘id’表示：如果id列的值为空，则该值为空字符串，而不是null|
|force_null|否|指定某些列的值为null。例如，force_null ‘id’表示：如果id列的值等于空字符串，则该值为null，而不是空字符串|
### 示例
```SQL
CREATE FOREIGN TABLE oss(id integer,name character varying,password character varying) SERVER s3_fdw_server OPTIONS(dir 's3_fdw_dir/', format 'csv')
```

## 辅助函数
|参数名|用途|
|---|---|
|s3_fdw_list_file(relname text, schema text DEFAULT ‘public’)|用于获得某个外部表所匹配的OSS上的文件名和文件的大小|
### 示例


```SQL
select * from s3_fdw_list_file('oss');

name | size

------------------------------------+------

s3_fdw_dir/s3_put_xxxxx_18547 | 20
s3_fdw_dir/s3_put_xxxxx_18579 | 10
s3_fdw_dir/s3_put_xxxxx_18618 | 10
s3_fdw_dir/s3_put_xxxxx_18680 | 24
s3_fdw_dir/s3_put_xxxxx_18736 | 23
s3_fdw_dir/s3_put_xxxxx_18796 | 20

(6 rows)
```

## 辅助参数
|参数名|默认值|说明|
|---|---|---|
|s3_fdw.read_files|空字符串|在读模式下，指定某个外表匹配的文件。设置后，该外部表在查询时只匹配这个被设置的文件，可用逗号分隔，设置多个文件|
|s3_fdw.put_buffer_size|20MB|写入时buffer的大小，可选范围20MB到200MB|
|s3_fdw.put_file_size|1GB|写入OSS的最大文件大小，超出之后会切换到另一个文件续写，可选范围200MB到2048MB|

### s3_fdw使用示例

创建插件
```SQL
pgbench=> create extension s3_fdw;
```
创建SERVER 
```SQL
pgbench=> CREATE SERVER s3_fdw_server FOREIGN DATA WRAPPER s3_fdw options(host 's3-internal.cn-north-1.jdcloud-oss.com', bucket 'postgresql');
```

创建USER MAPPING
```SQL
pgbench=> CREATE USER MAPPING FOR CURRENT_USER SERVER s3_fdw_server OPTIONS (access_key_id 'xxxxxx', secret_access_key 'xxxxxx');
```

创建OSS外部表
```SQL
pgbench=> CREATE FOREIGN TABLE oss(id integer, name character varying, password character varying) SERVER s3_fdw_server OPTIONS(dir 's3_fdw_dir/', format 'csv');
```

创建本地表
```SQL
pgbench=> CREATE TABLE local(id integer, name character varying, password character varying);
```

往本地表先插入200条数据
```SQL
pgbench=> insert into local select generate_series(1,200), md5(random()::text), md5(random()::text);
INSERT 0 200
```

测试将本地表数据导出到OSS外部表
```SQL
pgbench=> insert into oss select * from local;
INSERT 0 200
```

查询外部表
```SQL
pgbench=> select * from oss;

 id  |               name               |             password             
-----+----------------------------------+----------------------------------
   1 | 7263461406680f166631e2ef19ed9c52 | 9c42a9ba08e87144d62082cea78e9cb8
   2 | b2207a08ae9ead98988c90ac1fcf1efa | b7bb25d85cb609c84fedd57caee3dee4
   3 | 259c54a61310d60410bf4399512ffb8e | 754f7ad4a6cb766c127fe0db6d9de69b
   4 | c8a42b1446e5a23b8a9ed05fc6617538 | e7041f530ad0ff6ee329f85c6d867b8b
   5 | a2a1ca6fb3b6a1d817033f66e396c061 | 617d8948261de8169ebca29a96cbe897
   6 | 93b4ee53b71f330d99758847ef16342e | eecc16fa3dfd2106dcac3f38dc78fb56
   7 | e3e0dc0cef94eaeafc78a91b8a3c3d91 | 6e67262d815254f630c58c981b92731b
   8 | d895f484a84f84167443ea9c4d59eccf | 1b775141459747503078e727052e7080
   9 | 3ae3813417250cbad1bc694797d9e16c | 4fb07b82d97d9d8764a1f8b03d750314
  10 | 8b0f0c7ccc5765a09b49a9243da870f9 | 953a2a8f88532458c4be413126064b86
  11 | fcf6fe783fe97e22e0ce0c6f9ecb28e9 | f6128067bd5f07e68540693a4c4d623b
  12 | 2ecaac61d7e048f719336f599096c2e9 | 6464ee0c80a39910cbd2e18aa0a85f9a
  13 | e021b894702e764f554bbf5492468cd4 | 010e3c1913c1b8dbadf2960761ca63af
  14 | d492456d322c8324f7db4add9d4f6954 | 2ee0faabf54d07a549cc1234f634ca9b
  15 | 4656b9285baea13e5a0f8a43d2825c52 | 8967f3a69285fb1435e161af4dd1391d
  16 | 005648a30057f3d38df6047bf23babb7 | c24f7aba341b5937ce3505dbfa38d574
  17 | f850bac9431de26dbaa5985c5d35112a | 794e17b17a3a9917473385495a280f01
  18 | 4b05b06c9c50c5d8de2f0c4f77af43c9 | 99d9c479114c09eedb5a55a3b536d9ea

pgbench=> explain select * from oss;
                                   QUERY PLAN                                   
--------------------------------------------------------------------------------
 Foreign Scan on oss  (cost=0.00..16.50 rows=145 width=68)
   OSS File Path: s3_fdw_dir/s3_put_88d55295-1e5d-42e9-aeba-e560fe8be435_21557 
(2 rows)
```

删除本地表数据
```SQL
pgbench=> truncate table local;
TRUNCATE TABLE
pgbench=> select * from local;
 id | name | password 
----+------+----------
(0 rows)
```

测试将OSS上的数据导入本地表
```SQL
pgbench=> insert into local select * from oss;
INSERT 0 200
pgbench=> select * from local;
 id  |               name               |             password             
-----+----------------------------------+----------------------------------
   1 | 7263461406680f166631e2ef19ed9c52 | 9c42a9ba08e87144d62082cea78e9cb8
   2 | b2207a08ae9ead98988c90ac1fcf1efa | b7bb25d85cb609c84fedd57caee3dee4
   3 | 259c54a61310d60410bf4399512ffb8e | 754f7ad4a6cb766c127fe0db6d9de69b
   4 | c8a42b1446e5a23b8a9ed05fc6617538 | e7041f530ad0ff6ee329f85c6d867b8b
   5 | a2a1ca6fb3b6a1d817033f66e396c061 | 617d8948261de8169ebca29a96cbe897
   6 | 93b4ee53b71f330d99758847ef16342e | eecc16fa3dfd2106dcac3f38dc78fb56
   7 | e3e0dc0cef94eaeafc78a91b8a3c3d91 | 6e67262d815254f630c58c981b92731b
   8 | d895f484a84f84167443ea9c4d59eccf | 1b775141459747503078e727052e7080
   9 | 3ae3813417250cbad1bc694797d9e16c | 4fb07b82d97d9d8764a1f8b03d750314
  10 | 8b0f0c7ccc5765a09b49a9243da870f9 | 953a2a8f88532458c4be413126064b86
  11 | fcf6fe783fe97e22e0ce0c6f9ecb28e9 | f6128067bd5f07e68540693a4c4d623b
  12 | 2ecaac61d7e048f719336f599096c2e9 | 6464ee0c80a39910cbd2e18aa0a85f9a
  13 | e021b894702e764f554bbf5492468cd4 | 010e3c1913c1b8dbadf2960761ca63af
  14 | d492456d322c8324f7db4add9d4f6954 | 2ee0faabf54d07a549cc1234f634ca9b
  15 | 4656b9285baea13e5a0f8a43d2825c52 | 8967f3a69285fb1435e161af4dd1391d
  16 | 005648a30057f3d38df6047bf23babb7 | c24f7aba341b5937ce3505dbfa38d574
  17 | f850bac9431de26dbaa5985c5d35112a | 794e17b17a3a9917473385495a280f01
  18 | 4b05b06c9c50c5d8de2f0c4f77af43c9 | 99d9c479114c09eedb5a55a3b536d9ea

pgbench=> explain insert into local select * from oss;
                                      QUERY PLAN                                      
--------------------------------------------------------------------------------------
 Insert on local  (cost=0.00..16.50 rows=145 width=68)
   ->  Foreign Scan on oss  (cost=0.00..16.50 rows=145 width=68)
         OSS File Path: s3_fdw_dir/s3_put_88d55295-1e5d-42e9-aeba-e560fe8be435_21557 
(3 rows)

pgbench=> analyze oss;
ANALYZE
pgbench=> explain insert into local select * from oss;
                                      QUERY PLAN                                      
--------------------------------------------------------------------------------------
 Insert on local  (cost=0.00..22.00 rows=200 width=70)
   ->  Foreign Scan on oss  (cost=0.00..22.00 rows=200 width=70)
         OSS File Path: s3_fdw_dir/s3_put_88d55295-1e5d-42e9-aeba-e560fe8be435_21557 
(3 rows)
``` 

## s3_fdw 注意事项

1.s3_fdw是在PostgreSQL FOREIGN TABLE框架下开发的外部表插件

2.数据导入的性能和PostgreSQL集群的资源（CPU IO MEM NET）相关，也和OSS相关









