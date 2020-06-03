# PostgeSQL 插件 
由于 PostgreSQL 提供了丰富的内核编程接口，从而允许开发者可以开发 PostgreSQL 的扩展程序, 以插件的方式实现动态加载，从而丰富了 PostgreSQL 的功能。

## 如何使用 PostgreSQL 插件 
默认情况下，云数据库 PostgreSQL 并未安装任何插件，如果您需要使用 PostgreSQL 的某个插件，请手动执行 `CREATE EXTENSION` 命令进行安装操作。
如果添加扩展是postgis,fuzzystrmatch,postgis_tiger_geocoder, postgis_topology, postgis_sfcgal,postgres_fdw，请直接手动执行 `CREATE EXTENSION` 命令进行安装操作；如果添加其他扩展，安装需要创建白名单权限，请提交工单。

目前云数据库 PostgreSQL 支持的插件在下面会列举出来，不在列表中的插件表示目前暂不支持，后续我们会陆续增加更多的插件。

## 插件列表
|插件|10.6|11.2|12.2|描述|
|---|---|---|---|---|
|[PostGIS](http://www.postgis.net/)|√|√|√|PostGIS 空间地理信息相关扩展|
|[postgres_fdw](https://www.postgresql.org/docs/9.6/static/postgres-fdw.html)|√|√|√|查询远程数据库外部数据包装器|
|postgis_topology|√|√|√|PostGIS 空间地理信息相关扩展|
|postgis_tiger_geocoder|√|√|√|PostGIS 空间地理信息相关扩展|
|postgis_sfcgal|√|√|√|PostGIS 空间地理信息相关扩展|
|plpgsql|√|√|√|支持PL/pgSQL过程语言|
|pgstattuple|√|√|√|提供各种函数来获取元组级统计信息|
|pgrowlocks|√|√|√|提供了显示指定表的行锁定信息的功能|
|pgrouting|√|√|√|提供路径最优规划|
|pgcrypto|√|√|√|为PostgreSQL提供加密功能|
|pgaudit|√|√|√|提供审计功能|
|pg_visibility|√|√|√|提供了一种检查表的可见性映射（VM）和页面级可见性信息的方法|
|pg_trgm|√|√|√|提供函数和运算符，用于基于trigram匹配确定字母数字文本的相似性，以及支持快速搜索类似字符串的索引运算符|
|pg_stat_statements|√|√|√|支持追踪sql的执行信息|
|pg_repack|√|√|√|支持处理表和索引空间膨胀|
|pg_prewarm|√|√|√|支持数据预热加载|
|pg_hint_plan|√|√|√|支持定制查询计划|
|pg_freespacemap|√|√|√|检查空闲空间映射(FSM）|
|pg_buffercache|√|√|√|实时检测共享缓冲区|
|pageinspect|√|√|√|提供的功能允许以较低级别检查数据库页面的内容|
|ogr_fdw|√|√|√| GIS数据格式外部数据包装器|
|moddatetime|√|√|√| 提供追踪表内行最近更新时间的方法|
|ltree|√|√|√|支持树形结构数据类型|
|ltree_plpythonu|√|√|√| 可用于PL/Python语言的ltree类型实现变换|
|ltree_plpython2u|√|√|√|可用于PL/Python语言的ltree类型实现变换|
|lo|√|√|√|支持PG Large Object维护|
|jsonb_plpythonu|√|√|√|可用于为PL/Perl和PL/Python语言的jsonb类型实现变换|
|jsonb_plpython2u|√|√|√|可用于为PL/Perl和PL/Python语言的jsonb类型实现变换|
|jsonb_plperlu|√|√|√|可用于为PL/Perl和PL/Python语言的jsonb类型实现变换|
|jsonb_plperl|√|√|√|可用于为PL/Perl和PL/Python语言的jsonb类型实现变换|
|isn|√|√|√|提供isn数据类型，提供EAN13, UPC, ISBN (books), ISMN (music), and ISSN (serials)数字标准|
|intarray|√|√|√|提供了许多有用的函数和操作符，用于操作无null的整数数组。还支持使用某些运算符进行索引搜索|
|intagg|√|√|√|支持整数聚合函数|
|insert_username|√|√|√|支持追踪修改表操作的方法|
|hstore|√|√|√|支持hstore数据类型用于在单值中存储键值对|
|hstore_plpythonu|√|√|√|可用于为PL/Perl和PL/Python语言的hstore类型实现变换|
|hstore_plpython2u|√|√|√|可用于为PL/Perl和PL/Python语言的hstore类型实现变换|
|hstore_plperlu|√|√|√|可用于为PL/Perl和PL/Python语言的hstore类型实现变换|
|hstore_plperl|√|√|√|可用于为PL/Perl和PL/Python语言的hstore类型实现变换|
|fuzzystrmatch|√|√|√| 提供了函数来确定字符串之间的相似性和距离|
|file_fdw|√|√|√|文件外部数据包装器|
|earthdistance|√|√|√|提供了两种不同的方法来计算地球表面的大圆距离|
|dict_xsyn|√|√|√|是用于全文搜索的附加词典模板的示例。此字典类型用其同义词的组替换单词，因此可以使用其任何同义词搜索单词|
|dict_int|√|√|√|用于全文搜索的附加字典模板的示例，此示例字典主要是控制整数的索引|
|dblink|√|√|√|支持跨库查询|
|cube|√|√|√|支持多维数据类型cube|
|citext|√|√|√|支持不区分字符串大小写的数据类型citext|
|btree_gist|√|√|√|支持gist索引|
|btree_gin|√|√|√|支持gin索引|
|bloom|√|√|√|支持bloom索引|
|autoinc|√|√|√| functions for autoincrementing fields|
|amcheck|√|√|√|提供了验证索引结构的逻辑一致性的功能|
|adminpack|√|√|√|提供了一些支持函数，pgAdmin和其他管理工具会用这些函数来提供额外的功能，例如服务器日志文件的远程管理|
|address_standardizer_data_us|√|√|√|支持地址信息|
|address_standardizer|√|√|√|支持地址信息|
|xml2|√|√|√|提供XPath查询和XSLT功能|
|uuid-ossp|√|√|√|UUID唯一主键|
|unaccent|√|√|√|是一个文本搜索词典，用于从词法中删除重音符号（变音符号）|
|tsm_system_time|√|√|√|提供了表抽样方法SYSTEM_TIME|
|tsm_system_rows|√|√|√|提供表抽样方法SYSTEM_ROWS|
|timetravel|√|√|√|提供函数查询指定时间段的元祖数据|
|tcn|√|√|√|提供触发器功能|
|tablefunc|√|√|√|包括返回表的各种函数|
|sslinfo|√|√|√|提供有关当前客户端在连接到PostgreSQL时提供的SSL证书的信息|
|seg|√|√|√|用于表示线段或浮点间隔的数据类型|
|refint|√|√|√|提供管理外键约束的方法|
|timescaleDB|√|√|√|支持时序数据库|



