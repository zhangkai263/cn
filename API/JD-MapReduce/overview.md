# JMR API


## 简介
提供大数据基础服务中JMR操作的相关接口


### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**clusterExpansion**|POST|扩容集群|
|**clusterReduction**|POST|缩容集群|
|**createCluster**|POST|创建集群|
|**describeCluster**|GET|查询指定集群的详细信息<br>|
|**describeClusters**|GET|查询用户集群的列表<br>|
|**getJmrVersionList**|GET|查询JMR的版本信息|
|**getSoftwareInfo**|GET|获取对应版本的软件清单信息|
|**idataCluster**|GET|查询用户的集群列表及相关服务的一些信息|
|**monitorLabelList**|POST|查询JMR的监控模板信息|
|**releaseCluster**|POST|释放集群<br>|
