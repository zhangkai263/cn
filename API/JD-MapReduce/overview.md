# JMR API


## 简介
提供大数据基础服务中JMR操作的相关接口


### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**createClusterInNewNetwork**|POST|创建新集群|
|**showClusterDetails**|GET|根据clusterId查询对应集群详情|
|**getJmrVersionList**|GET|返回目前的JMR版本列表|
| **getSoftwareInfo**           | POST     | 获取对应版本的软件清单信息                              |
| **idataCluster**              | GET      | 查询用户指定clusterId对应的集群列表及相关服务的一些信息 |
| **clusterExpansion**          | POST     | 对指定集群扩容指定数量的实例                            |
| **releaseCluster**            | POST     | 释放指定clusterId对应集群                               |
| **deleteCluster**             | POST     | 对指定集群执行逻辑删除                                  |
