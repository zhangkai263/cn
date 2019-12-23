## MySQL数据同步

### 前提条件

- 已创建和MySQL、ES在相同区域、可用区、VPC、子网下的云主机。
- 已安装并MySql、JDK、Canal-server、Canal-adapter。
- 在ES中创建的索引和mapping与MySQL中创建的表名称和字段一致。

### 操作步骤
1. 连接MySQL数据库测试，命令格式如下：

```
mysql -h<MySQL实例的内网地址> -P<MySQL实例端口,一般为3306> -u<MySQL数据库的账号> -p<登录数据库的密码> -D< MySQL数据库的名称>
```

命令示例：

```
mysql -hmysql-cn-north-1-9dae15cd77e84bb8.rds.jdcloud.com -P3306 -utestml -pmima -Dtestml
```

访问成功时响应如下：

```
mysql: [Warning] Using a password on the command line interface can be insecure.
Welcome to the MySQL monitor. Commands end with ; or \g.
Your MySQL connection id is 1489
Server version: 8.0.13 Source distribution



Copyright (c) 2000, 2019, Oracle and/or its affiliates. All rights reserved.



Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.



Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

```
2. 启动Canal-server。</br>

1） 修改conf/example/instance.properties文件。

```
vi conf/example/instance.properties
```

参数 | 参数说明
-- | --
canal.instance.master.address	| <MySQL数据库的内网地址>:<内网端口>，相关信息可在RDS for MySQL实例的基本信息页面获取。例如mysql-cn-north-1-9dae15cd77e84bb8.rds.jdcloud.com：3306。
canal.instance.dbUsername	| MySQL数据库的账号名称，可在实例的账号管理页面获取。
canal.instance.dbPassword	| MySQL数据库的密码。

2) 启动Canal-server。

```
./bin/startup.sh
```

3. 启动Canal-adapter。</br>

1）修改conf/application.yml文件：
```
vi conf/application.yml
```

参数 | 参数说明
-- | --
canal.conf.canalServerHost	| canalDeployer访问地址。保持默认（127.0.0.1:11111）即可。
canal.conf.srcDataSources.defaultDS.url	| jdbc:mysql://<MySQL内网地址>:<内网端口>/<数据库名称>?useUnicode=true，相关信息可在 MySQL实例的基本信息页面获取。例如jdbc:mysql-cn-north-1-9dae15cd77e84bb8.rds.jdcloud.com：3306/testml?useUnicode=true。
canal.conf.srcDataSources.defaultDS.username	| MySQL数据库的账号名称，可在MySQL实例的账号管理页面获取。
canal.conf.srcDataSources.defaultDS.password	| MySQL数据库的密码。
canal.conf.canalAdapters.groups.outerAdapters.hosts	| 定位到name:es的位置，将hosts替换为<京东云ES实例的内网地址>:<内网端口>，相关信息可在ES实例的基本信息概览页面获取。例如es-nlb-es-5gi2ck2s6w.jvessel-open-hb.jdcloud.com:9200:。
canal.conf.canalAdapters.groups.outerAdapters.mode	| 必须设置为rest。
canal.conf.canalAdapters.groups.outerAdapters.properties.security.auth	| <京东云ES实例的账号>:<密码>。例如elastic:es_password。
canal.conf.canalAdapters.groups.outerAdapters.properties.cluster.name	| 京东云ES实例的ID，可在实例的基本信息概览页面获取。

2）修改conf/es/*.yml文件，定义MySQL数据到ES数据的映射字段

```
vi conf/es/*.yml
```

参数 | 参数说明
-- | --
esMapping._index | 创建表和字段章节中，在ES实例中所创建的索引的名称。本文使用es_test。
esMapping._type	| 创建表和字段章节中，在ES实例中所创建的索引的类型。本文使用_doc。
esMapping._id	| 需要同步到ES实例的文档的id，可自定义。本文使用_id。
esMapping.sql	| SQL语句，用来查询需要同步到ES中的字段。

3） 启动Canal-adapter服务。

```
./bin/startup.sh
```

4. 导出增量数据。</br>

1） 在MySQL数据库中，管理数据库testml中testml表的数据。新增数据示例如下：

```
insert `testml`.`testml`(`count`,`id`,`name`,`operation`) values('5',8,'tom','delete');
```

2） 在Kibana的DevTools页面，查询同步过来的数据。

```
GET /testml/_search
```

