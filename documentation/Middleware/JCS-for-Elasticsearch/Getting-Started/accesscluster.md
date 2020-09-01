## 访问集群
云搜索Elasticsearch支持通过Kibana、京东云云主机或客户端方式访问集群。

### 通过kibana访问
1. 登录[云搜索Elasticsearch控制台](https://es-console.jdcloud.com/clusters)，[创建云搜索Elasticsearch集群](../Getting-Started/Create-ES.md)。</br>
2. 点击【操作-kibana】进入kibana可视化界面，通过导航栏的【Dev Tools】进入开发者工具，[访问云搜索Elasticsearch集群](../Getting-Started/dataview.md)。</br>

### 通过京东云云主机访问
1. 登录[云搜索Elasticsearch控制台](https://es-console.jdcloud.com/clusters)，[创建云搜索Elasticsearch集群](../Getting-Started/Create-ES.md)，点击集群名称进入详情页面获取**内网访问域名**。</br>
2. 登录[云主机控制台](https://cns-console.jdcloud.com/host/compute/list)，创建和云搜索Elasticsearch集群具有相同私有网络和子网的云主机，并[获取公网IP](https://docs.jdcloud.com/cn/virtual-machines/associate-elastic-ip)。</br>
3. 在本地通过SSH登录云主机，用curl命令访问云搜索Elasticsearch实例的9200端口。指令格式说明如下：</br>
```
ssh 用户名@公网IP

curl -XGET 内网域名/_cat

```
响应如下时表示访问成功：
```
{
  =^.^=
/_cat/allocation
/_cat/shards
/_cat/shards/{index}
/_cat/master
/_cat/nodes
/_cat/tasks
/_cat/indices
/_cat/indices/{index}
/_cat/segments
/_cat/segments/{index}
/_cat/count
/_cat/count/{index}
/_cat/recovery
/_cat/recovery/{index}
}

```

.ruxia 
### 通过客户端访问
ES 官方推荐使用 Java REST 客户端连接集群并进行数据操作。Java REST Client 有 Low Level 和 High Level 两种。如下为7.5.2版本Java High Level REST Client方式访问示例： </br>
1. 登录[云搜索Elasticsearch控制台](https://es-console.jdcloud.com/clusters)，[创建云搜索Elasticsearch集群](../Getting-Started/Create-ES.md)，点击集群名称进入详情页面获取**内网访问域名**。</br>
2. 初始化客户端代码。</br>

   - [5.X版本HTTP客户端初始化](https://www.elastic.co/guide/en/elasticsearch/client/java-rest/5.6/java-rest-high-getting-started-initialization.html)和[5.X版本HTTP客户端library](https://www.elastic.co/guide/en/elasticsearch/client/java-rest/5.6/java-rest-high-getting-started-initialization.html)。代码样例如下：
   
   ```
   RestHighLevelClient client = new RestHighLevelClient(
        RestClient.builder(new HttpHost("es-nlb-es-gukc9h9e0g.jvessel-open-hb.jdcloud.com", 9200, "http")).build());  
   ```
   
   - [6.X版本HTTP客户端初始化]( https://www.elastic.co/guide/en/elasticsearch/client/java-rest/6.5/java-rest-high-getting-started-initialization.html)和[6.X版本HTTP客户端library](https://www.elastic.co/guide/en/elasticsearch/client/java-rest/6.5/java-rest-high-getting-started-maven.html)。代码样例如下：
   
   ```
   RestHighLevelClient client = new RestHighLevelClient(
        RestClient.builder(
                new HttpHost("es-nlb-es-gukc9h9e0g.jvessel-open-hb.jdcloud.com", 9200, "http")));
   ```
   
