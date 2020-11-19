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


### 通过客户端访问
ES 官方推荐使用 Java REST 客户端连接集群并进行数据操作。Java REST Client这个库底层用的是httpclient的组件，只不过es官网做了封装，支持多机器ip，以及对请求方法做了简化，因此想要减少项目的依赖，又对支持功能要求比较健壮的场景下，我们就可以使用这个库来开发我们的业务。Java REST Client 有 Low Level 和 High Level 两种：</br>
- Java Low Level REST Client：通过 Http协议 与Elasticsearch服务进行通信，请求编码和响应解码保留给用户实现，与所有Elasticsearch 版本兼容。</br>
- Java High Level REST Client：基于低级客户端，使用更方便快捷，提供特定的方法的API，并处理请求编码和响应解码，如果当前版本的 Java High Level REST Client 提供的 API 不满足需求，可以通过升级 ES 集群版本和 Client 版本解决。</br>

```
说明：
使用TCP协议连接ES集群的Transport Client官方已经不再维护，建议使用HTTP协议连接集群的Java High Level REST Client或者Java Low Level REST Client。

```


如下为7.5.2版本Java High Level REST Client方式访问示例，其他版本的使用方法请参考 [Java High Level REST Client](https://www.elastic.co/guide/en/elasticsearch/client/java-rest/7.5/java-rest-high.html)。 </br>
1. 登录[云搜索Elasticsearch控制台](https://es-console.jdcloud.com/clusters)，[创建云搜索Elasticsearch集群](../Getting-Started/Create-ES.md)，点击集群名称进入详情页面获取**内网访问域名**。</br>
2. 创建Java Maven工程，并将如下的pom依赖添加到Java工程的pom.xml文件中。</br>

```
请注意：
- Java JDK版本需要为1.8及以上。
- 此处的 Demo 适用于ES 7.5.2版本，Client 版本需要与 ES 集群版本保持一致，否则可能会出现兼容性问题。
- 检查vpc、subnet等配置配确保网络互通。
```
以下代码使用Index API创建索引，使用Get API读取索引以及使用Delete API删除该索引，示例代码中带{}的参数需要替换为您具体业务的参数。
```
import org.apache.http.HttpHost;
import org.apache.http.client.CredentialsProvider;
import org.apache.http.impl.client.BasicCredentialsProvider;
import org.apache.http.auth.AuthScope;
import org.apache.http.auth.UsernamePasswordCredentials;
import org.apache.http.impl.nio.client.HttpAsyncClientBuilder;

import org.elasticsearch.ElasticsearchException;
import org.elasticsearch.action.delete.DeleteRequest;
import org.elasticsearch.action.delete.DeleteResponse;
import org.elasticsearch.action.get.GetRequest;
import org.elasticsearch.action.get.GetResponse;
import org.elasticsearch.action.index.IndexRequest;
import org.elasticsearch.action.index.IndexResponse;
import org.elasticsearch.client.*;
import org.elasticsearch.rest.RestStatus;

import java.util.HashMap;
import java.util.Map;

public class RestClientDemo 
{
    private static final RequestOptions COMMON_OPTIONS;
    static {
        RequestOptions.Builder builder = RequestOptions.DEFAULT.toBuilder();
        COMMON_OPTIONS = builder.build();
    }
    public static void main( String[] args )
    {
        final CredentialsProvider credentialsProvider = new BasicCredentialsProvider();
        credentialsProvider.setCredentials(AuthScope.ANY,
                new UsernamePasswordCredentials("{username}", "{password}"));//未开启密码访问可以去掉这部分
        RestClientBuilder builder = RestClient.builder(new HttpHost({domain}, 9200))
                .setHttpClientConfigCallback(new RestClientBuilder.HttpClientConfigCallback() {
                    @Override
                    public HttpAsyncClientBuilder customizeHttpClient(HttpAsyncClientBuilder httpClientBuilder) {
                        return httpClientBuilder.setDefaultCredentialsProvider(credentialsProvider);
                    }
                });
        RestHighLevelClient highClient = new RestHighLevelClient(builder);
        //创建、更新
        try {
            Map<String, Object> jsonMap = new HashMap<>();
            jsonMap.put({key}, {value});
            IndexRequest indexRequest = new IndexRequest({index_name}, "_doc", {doc_id}).source(jsonMap);
            IndexResponse indexResponse = highClient.index(indexRequest,COMMON_OPTIONS);
            long version = indexResponse.getVersion();
            System.out.println("Index successfully, version: " + version);
        } catch (Exception e) {
            System.out.println("Index exception: "+e.toString());
        }
        // 查询
        GetRequest getRequest = new GetRequest({index_name}, "_doc", {doc_id});
        try {
            GetResponse getResponse = highClient.get(getRequest,COMMON_OPTIONS);
            String index = getResponse.getIndex();
            String type = getResponse.getType();
            String id = getResponse.getId();
            if (getResponse.isExists()) {
                long version = getResponse.getVersion();
                String sourceAsString = getResponse.getSourceAsString();
                System.out.println("Got doc, index: "+ index +", type:"+ type +",id:"+ id+",version:"+version +", source:"+ sourceAsString);
            }
        }catch (ElasticsearchException e) {
            if (e.status() == RestStatus.NOT_FOUND) {
                System.out.println("Not found: "+e);
            }
        }
        catch(Exception e){
            System.out.println("Get exception: "+ e.toString());
        }
        //删除
        try{
            DeleteRequest request = new DeleteRequest({index_name}, "_doc", {doc_id});
            DeleteResponse deleteResponse = highClient.delete(request, COMMON_OPTIONS);
            System.out.println("Delete successfully， response: " + deleteResponse.toString() + ", status: " + deleteResponse.status());
        }catch (Exception e){
            System.out.println("Delete exception: "+ e.toString());
        }
        //关闭连接
        try {
            highClient.close();
        }catch (Exception e){
            System.out.println("Close exception:"+ e.toString());
        }
    }
}
```
   
   
