## 连接实例
Zookeeper支持通过京东智联云云主机或客户端方式连接实例。

### 通过京东云云主机访问
1.	登录Zookeeper控制台，创建Zookeeper实例 。</br>
2.	登录[云主机控制台](https://cns-console.jdcloud.com/host/compute/list)，创建和Zookeeper具有相同私有网络和子网的云主机，并[获取公网IP](https://docs.jdcloud.com/cn/virtual-machines/associate-elastic-ip)。</br>
3.	在本地通过SSH登录云主机，用curl命令访问。指令格式说明如下：</br>

```
ssh 用户名@公网IP
curl -XGET 内网域名/_cat
```

### 通过客户端访问
Zookeeper完全兼容开源版本，支持所有原生API，详细使用方式请参考[官方指南](http://zookeeper.apache.org/)。
