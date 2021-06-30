# 使用SDK访问

### 1.	客户端使用文档
用户可以使用两种方式连接HBase集群,使用Policyserver配置中心和ZK的方式。

Policyserver 配置中心的方式支持客户端的无感知平滑主备切换。

ZK连接的方式不支持客户端平滑主备切换

京东hbase-client 版本 | 社区hbase-client版本 | 描述
---|---|---
jdnosql-client 3.1.5-SNAPSHOT 	| hbase-client 1.1.6 | 京东SDK版本 添加了用户名和密码，主备切换，读写功能和社区保持一致，可以参考[HBase API 手册](https://hbase.apache.org/1.1/apidocs/index.html)


京东内部私服maven Pom.xml 引入依赖：
```
<dependency>
  <groupId>com.jd.bdp.hbase</groupId>
  <artifactId>jdnosql-client</artifactId>
  <version>3.1.5-SNAPSHOT</version>
</dependency>
```
公网用户 maven pom.xml 引入依赖

```
<dependencies>
    <dependency>
      <groupId>com.jd.bdp.hbase</groupId>
      <artifactId>jdnosql-client</artifactId>
      <version>3.1.5-SNAPSHOT</version>
      <scope>system</scope>
      <!-- 引入本地依赖包 -->
      <systemPath>${project.basedir}/lib/jdnosql-client-3.1.5-SNAPSHOT.jar</systemPath>
    </dependency>
    <dependency>
      <groupId>org.apache.httpcomponents</groupId>
      <artifactId>httpclient</artifactId>
      <version>4.2.5</version>
    </dependency>
    <dependency>
      <groupId>com.google.guava</groupId>
      <artifactId>guava</artifactId>
      <version>19.0</version>
    </dependency>
    <dependency>
      <groupId>org.apache.hbase</groupId>
      <artifactId>hbase-common</artifactId>
      <version>1.1.6</version>
    </dependency>
    <dependency>
      <groupId>com.yammer.metrics</groupId>
      <artifactId>metrics-core</artifactId>
      <version>2.2.0</version>
    </dependency>
    <dependency>
      <groupId>io.netty</groupId>
      <artifactId>netty-all</artifactId>
      <version>4.0.23.Final</version>
    </dependency>
```

#### 1.1.	使用Policyserver配置中心的方式连接hbase：
1. 第一步配置连接串 用户名和密码
2. 第二步配置Policyserver配置中心地址，域名或是服务端列表，二选一

详细连接配置如下jdnosql-client-demo/src/main/resources/hbase-site.xml：
```
<!--使用policyServer配置中心 用户名和密码方式连接 默认使用配置配置中心连接hbase-->
  <!--1. 第一步配置连接串 用户名和密码-->
  <!--鉴权需要的用户名-->
  <property>
    <name>hbase.client.username</name>
    <value>鉴权需要的用户名</value>
  </property>
  <!--鉴权需要的密码-->
  <property>
    <name>hbase.client.password</name>
    <value>鉴权需要的密码</value>
  </property>
  <!--第二步配置Policyserver配置中心地址，域名或是服务端列表，二选一。-->
  <!--配置中心域名，需要根据配置中心真实域名配置-->
  <!--<property>
      <name>hbase.policyserver.domain</name>
      <value>ps.hbase.jd.com</value>
  </property>-->
  <!-- 使用ip列表连接Policyserver配置中心-->
  <property>
    <name>hbase.policy.http.is.use.domain</name>
    <value>false</value>
  </property>
  <!--Policyserver配置中心服务地址列表-->
  <property>
    <name>hbase.policy.http.server.address</name>
    <value>PS1IP:16100,PS2IP:16100,PS2IP:16100</value>
  </property>
```



#### 1.2.	使用zk方式连接hbase：

1. 第一步配置连接串 用户名和密码
2. 第二步配置zk 连接地址

详细连接配置如下jdnosql-client-demo/src/main/resources/hbase-site.xml：
```
  <!--使用zk 用户名和密码方式连接hbase-->
  <!--1. 第一步配置连接串 用户名和密码-->
  <!--选择zk 方式连接hbase-->
  <property>
    <name>hbase.client.connection.impl</name>
    <value>org.apache.hadoop.hbase.client.DefaultClusterConnection</value>
  </property>
  <property>
    <name>hbase.client.username</name>
    <value>鉴权需要的用户名</value>
  </property>

  <property>
    <name>hbase.client.password</name>
    <value>鉴权需要的密码</value>
  </property>
  <!--2. 第二步配置zk 连接地址-->
  <!--zk 服务列表-->
  <property>
    <name>hbase.zookeeper.quorum</name>
    <value>zk1ip,zk2ip,zk3ip:2181</value>
  </property>
  <!--zk node 信息-->
  <property>
    <name>zookeeper.znode.parent</name>
    <value>/zknode</value>
  </property>
```


### 2.	配置项介绍

配置key | 默认值 | 描述
---|---|---
hbase.client.username	| 无 | 鉴权需要的用户名
hbase.client.password | 无 | 鉴权需要的密码
hbase.policyserver.domain| 无 | 配置中心域名，需要根据配置中心真实域名配置。
hbase.policy.http.is.use.domain| true | 默认使用域名连接，设置成false使用ip列表连接Policyserver配置中心
hbase.policy.http.server.address| 无 | Policyserver配置中心服务地址列表

## HBase Java API 使用
### 简单的Java 示例，更多内容可以参考Apache [HBase API 手册](https://hbase.apache.org/1.1/apidocs/index.html)

#### 创建连接

// 创建 HBase连接，在程序生命周期内只需创建一次，该连接线程安全，可以共享给所有线程使用。

// 在程序结束后，需要将Connection对象关闭，否则会造成连接泄露。

//创建HBase连接对象请务必保持单例模式，HBase连接对象自带连接池，单例模式创建连接参考HBaseUtil。
```
//创建一个Connection
//第一种方式：通过配置文件 把hbase-site.xml 放到项目的resources里
Configuration configuration = HBaseConfiguration.create();
//第二种方式：代码中指定
//Configuration configuration = new Configuration();
//configuration.set("hbase.client.username", "鉴权需要的用户名");
//configuration.set("hbase.client.password", "鉴权需要的密码");
Connection connection = ConnectionFactory.createConnection(configuration);
```


### 使用API
建立完连接后，即可使用Java API访问HBase, 简单的Java 示例。

#### 1. DDL操作

DDL 操作统一走HBase 管理平台。

#### 2. DML操作

```
//Table 为非线程安全对象，每个线程在对Table操作时，都必须从Connection中获取相应的Table对象
try (Table table = connection.getTable(TableName.valueOf("tablename"))) {
    // 插入数据 分为同步和异步详细看官网文档
    Put put = new Put(Bytes.toBytes("row"));
    put.addColumn(Bytes.toBytes("family"), Bytes.toBytes("qualifier"), Bytes.toBytes("value"));
    table.put(put);
    // 单行读取
    Get get = new Get(Bytes.toBytes("row"));
    Result res = table.get(get);
    // 删除一行数据
    Delete delete = new Delete(Bytes.toBytes("row"));
    table.delete(delete);
    // scan 范围数据 
    Scan scan = new Scan(Bytes.toBytes("startRow"), Bytes.toBytes("endRow"));
    ResultScanner scanner = table.getScanner(scan);
    for (Result result : scanner) {
        // 处理查询结果result
        // ...
    }
    scanner.close();
}
```

- 详细使用见[demo](jdcloud-client-demo-master.zip)

#### maven 打包 可执行jar

mvn clean package assembly:single
