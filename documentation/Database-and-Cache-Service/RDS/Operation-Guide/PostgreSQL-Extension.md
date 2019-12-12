# PostgeSQL 插件 
由于 PostgreSQL 提供了丰富的内核编程接口，从而允许开发者可以开发 PostgreSQL 的扩展程序, 以插件的方式实现动态加载，从而丰富了 PostgreSQL 的功能。

## 如何使用 PostgreSQL 插件 
默认情况下，云数据库 PostgreSQL 并未安装任何插件，如果您需要使用 PostgreSQL 的某个插件，请手动执行 `CREATE EXTENSION` 命令进行安装操作。
如果添加扩展是postgis,fuzzystrmatch,postgis_tiger_geocoder, postgis_topology, postgis_sfcgal,postgres_fdw，请直接手动执行 `CREATE EXTENSION` 命令进行安装操作；如果添加其他扩展，安装需要创建白名单权限，请提交工单。

目前云数据库 PostgreSQL 支持的插件在下面会列举出来，不在列表中的插件表示目前暂不支持，后续我们会陆续增加更多的插件。

## 插件列表
|插件|10.6|11.2|
|---|---|---|
|[PostGIS](http://www.postgis.net/)|√|√|
|[postgres_fdw](https://www.postgresql.org/docs/9.6/static/postgres-fdw.html)|√|√|
|postgis_topology|√|√|
|postgis_tiger_geocoder|√|√|
|postgis_sfcgal|√|√|
|plpgsql|√|√|
|pgstattuple|√|√|
|pgrowlocks|√|√|
|pgrouting|√|√|
|pgcrypto|√|√|
|pgaudit|√|√|
|pg_visibility|√|√|
|pg_trgm|√|√|
|pg_stat_statements|√|√|
|pg_repack|√|√|
|pg_prewarm|√|√|
|pg_hint_plan|√|√|
|pg_freespacemap|√|√|
|pg_buffercache|√|√|
|pageinspect|√|√|
|ogr_fdw|√|√|
|moddatetime|√|√|
|ltree|√|√|
|ltree_plpythonu|√|√|
|ltree_plpython2u|√|√|
|lo|√|√|
|jsonb_plpythonu|√|√|
|jsonb_plpython2u|√|√|
|jsonb_plperlu|√|√|
|jsonb_plperl|√|√|
|isn|√|√|
|intarray|√|√|
|intagg|√|√|
|insert_username|√|√|
|hstore|√|√|
|hstore_plpythonu|√|√|
|hstore_plpython2u|√|√|
|hstore_plperlu|√|√|
|hstore_plperl|√|√|
|fuzzystrmatch|√|√|
|file_fdw|√|√|
|earthdistance|√|√|
|dict_xsyn|√|√|
|dict_int|√|√|
|dblink|√|√|
|cube|√|√|
|citext|√|√|
|btree_gist|√|√|
|btree_gin|√|√|
|bloom|√|√|
|autoinc|√|√|
|amcheck|√|√|
|adminpack|√|√|
|address_standardizer_data_us|√|√|
|address_standardizer|√|√|
|xml2|√|√|
|uuid-ossp|√|√|
|unaccent|√|√|
|tsm_system_time|√|√|
|tsm_system_rows|√|√|
|timetravel|√|√|
|tcn|√|√|
|tablefunc|√|√|
|sslinfo|√|√|
|seg|√|√|
|refint|√|√|




