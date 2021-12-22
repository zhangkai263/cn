# 防止连接MySQL超时，JDBC探活配置

以下参数 preferredTestQuery，idleConnectionTestPeriod

Mysql有两个关于连接超时的参数，默认为8小时：

```sehll
MySQL > show global variables like '%timeout%';
```

|wait_timeout = 28800 |非交互连接等待时间|
|---|---|
|interactive_timeout = 28800|交互连接等待时间|

```shell
MySQL > show processlist;
```

当connection空闲（Sleep）超过8小时，Mysql将自动断开该connection，而JDBC连接池并不知道该connection已经失效，如果这时有Client请求connection，JDBC将该失效的Connection提供给Client，将会造成异常。

一般会有5种处理方式：

1. MySQL调大数据库超时参数：如果太大，可能导致连接数较多，引起性能下降（JED无法使用）

```
set global wait_timeout = 2073600;
set global interactive_timeout = 2073600;
```

2. JDBC配置MySQL连接URL重连机制（JED可以使用）

`jdbc:mysql://localhost:3306/test?user=root&password=&autoReconnect=true`

3. JDBC减少连接池内连接生存周期：使之小于所设置的wait_timeout 的值 （弹性数据库可以使用）

`<property name="maxIdleTime" value="1800" />`

4. JDBC探活：每隔一段时间唤醒连接（弹性数据库可以使用）

<property name="preferredTestQuery" value="SELECT 1"/> 

<property name="idleConnectionTestPeriod" value="55"/>

5. JDBC升级驱动版本

由于老版本有些功能不兼容，导致连接报错，可以升级到最新版本后再观察

下载地址：https://dev.mysql.com/downloads/connector/j/

JDBC主要参数说明：

```shell
<!--IP端口库用户密码等-->  

<property name="jdbcUrl">

<property name="user">

<property name="password">

<!--连接池中保留的最小连接数。-->   

<property name="minPoolSize" value="5" />   

<!--连接池中保留的最大连接数。Default: 15 -->   

<property name="maxPoolSize" value="20" />   

<!--最大空闲时间,1800秒内未使用则连接被丢弃。若为0则永不丢弃。Default: 0 -->   

<property name="maxIdleTime" value="1800" />   

<!--当连接池中的连接耗尽的时候，一次同时获取的连接数。Default: 3 -->   

<property name="acquireIncrement" value="2" />   

<property name="maxStatements" value="1000" />   

<property name="initialPoolSize" value="10" />   

<!--定义在从数据库获取新连接失败后重复尝试的次数。Default: 30 -->   

<property name="acquireRetryAttempts" value="30" />   

<property name="breakAfterAcquireFailure" value="true" />   

<!--定义所有连接测试都执行的测试语句。在使用连接测试的情况下select 1显著提高测试速度，比默认语句SHOW FULL TABLES FROM `dbname` LIKE 'PROBABLYNOT'效率高很多 -->

<property name="preferredTestQuery" value="SELECT 1"/> 

<!--每55秒检查所有连接池中的空闲连接。Default: 0 -->      

<property name="idleConnectionTestPeriod" value="55"/> 

<!--每次把连接checkin到pool时，测试其有效性 --> 

<property name="testConnectionOnCheckin" value="false"/>  

<!--每次把连接从pool内checkout时，测试其有效性 --> 

<property name="testConnectionOnCheckout" value="false"/>

<!--上面两个参数如果为true那么每个connection提交时都会校验其有效性，会造成至少多一倍的数据库调用，性能消耗较大，慎重使用，建议使用 idleConnectionTestPeriod或automaticTestTable等方法来提升连接测试的性能 --> 

```

其他参数：

|参数名称|参数说明|缺省值|最低版本要求|
|---|---|---|---|
|user|数据库用户名（用于连接数据库）| |所有版本|
|password|用户密码（用于连接数据库）| |所有版本|
|useUnicode|是否使用Unicode字符集，如果参数characterEncoding设置为gb2312或gbk，本参数值必须设置为true|false|1.1g|
|characterEncoding|当useUnicode设置为true时，指定字符编码。比如可设置为gb2312或gbk|false|1.1g|
|autoReconnect|当数据库连接异常中断时，是否自动重新连接？|false|1.1|
|autoReconnectForPools|是否使用针对数据库连接池的重连策略|false|3.1.3|
|failOverReadOnly|自动重连成功后，连接是否设置为只读？|true|3.0.12|
|maxReconnects|autoReconnect设置为true时，重试连接的次数|3|1.1|
|initialTimeout|autoReconnect设置为true时，两次重连之间的时间间隔，单位：秒|2|1.1|
|connectTimeout|和数据库服务器建立socket连接时的超时，单位：毫秒。 0表示永不超时，适用于JDK 1.4及更高版本|0|3.0.1|
|socketTimeout|socket操作（读写）超时，单位：毫秒。 0表示永不超时|0|3.0.1|

更多参数解读请参考：
https://dev.mysql.com/doc/connector-j/5.1/en/connector-j-reference-configuration-properties.html