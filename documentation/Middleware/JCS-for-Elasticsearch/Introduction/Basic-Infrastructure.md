## 基础架构
京东云Elasticsearch提供Elasticsearch + Kibana的托管服务，支持用户方便地扩容Elasticsearch集群、集群的监控报警。
![查询1](https://github.com/jdcloudcom/cn/blob/Elasticsearch/image/Internet-Middleware/JCS%20for%20Elasticsearch/基础架构1210.png)

| 概念 | 解释 |
| :- | :- |
| ES节点 | 一个运行中的 Elasticsearch 实例称为一个节点，集群内的节点共同承担数据的存储和查询请求。 |	
| 负载均衡 | 提供集群访问的负载均衡功能，在VPC内向用户提供唯一的访问入口，对用户屏蔽掉集群节点。这样做的目的，一方面是为了适配集群的弹性伸缩并保证其高可用性，当 ES 集群的节点发生变化时，会自动更新节点信息；另一方面，简化了用户的操作，用户不用再关注集群节点IP、端口等信息的变更。 |
| Kibana | 结合Elasticsearch的数据可视化平台，用于搜索、查看存放在Elasticsearch索引里的数据，提供数据的多维度展示。 |
