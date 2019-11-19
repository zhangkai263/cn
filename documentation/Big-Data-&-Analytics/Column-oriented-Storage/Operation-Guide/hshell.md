## 使用HBase Shell访问

#### 操作步骤
1. 准备云主机
建议在相同VPC网络内准备一台云主机。

2. 安装jdk
```
rpm -ivh jdk-8u171-linux-x64.rpm
```

3. 安装hbase客户端
获取安装包 
```
hbase-1.3.1-bin.tar.gz
```
解压缩：
```
tar zxvf hbase-1.3.1-bin.tar.gz
```

4. 配置ZK地址
修改conf/hbase-site.xml文件，添加集群的ZK地址
```
<configuration>
     <property>
         <name>hbase.zookeeper.quorum</name>
         <value>$ZK_IP1,$ZK_IP2,$ZK_IP3</value>
     </property>
</configuration>
```
其中$ZK_IP1，$ZK_IP2，$ZK_IP3，可查看列式存储详情中的地址。

5. 配置JAVA_HOME 
修改conf/hbase-env.sh
```
export JAVA_HOME=/usr/java/jdk1.8.0_171-amd64
```

6. 配置hosts
登录集群主机，获取集群hosts信息，并添加到本地hosts。

7.访问集群
通过如下命令访问集群
```
bin/hbase shell
```
