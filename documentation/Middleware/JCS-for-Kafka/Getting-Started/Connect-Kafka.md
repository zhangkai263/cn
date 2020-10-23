## 连接实例
消息队列Kafka版支持通过Kafka Manager、京东云云主机或客户端方式连接实例。</br>

### 通过Kafka Manager连接实例
1.	登录消息队列Kafka版控制台，创建消息队列Kafka版实例 。</br>
2.	点击操作列的“Kafka Manager”进入可视化界面，访问消息队列Kafka版实例。</br>

### 通过京东云云主机访问
1.	登录消息队列Kafka版控制台，创建消息队列Kafka版实例 。</br>
2.	登录[云主机控制台](https://cns-console.jdcloud.com/host/compute/list)，创建和消息队列 Kafka 版具有相同私有网络和子网的云主机，并[获取公网IP](https://docs.jdcloud.com/cn/virtual-machines/associate-elastic-ip)。</br>
3.	在本地通过SSH登录云主机，用curl命令访问。指令格式说明如下：</br>

```
ssh 用户名@公网IP
curl -XGET 内网域名/_cat
```

### 通过客户端访问
消息队列Kafka版完全兼容原生Kafka，支持所有原生API，详细使用方式请参考[官方指南](https://kafka.apache.org/documentation/#api)。

