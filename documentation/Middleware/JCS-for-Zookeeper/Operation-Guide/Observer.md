## Observer节点
Zookeeper的节点变更需要过半数投票通过后才能执行，当机器规模增加时，由于网络消耗等原因必然导致投票成本增加，从而导致写性能的下降，而Observer节点不参与投票，只是简单的接收投票结果，不会影响写性能，因此可以通过增加Observer节点，在不影响实例写性能的基础上提供Zookeeper的可扩展性。</br>

### 操作步骤
您可以在创建集群时通过[创建实例](https://zk-console.jdcloud.com/create?regionId=cn-north-1)页面勾选 Observer节点，或者，在创建集群后通过“操作-变更配置”勾选 Observer节点。</br>
* Observer节点规格：与数据节点规格一致，无需选择。</br>
* Observer节点数量：支持工单方式提升节点配额。</br>
* Observer节点存储：与数据节点存储一致，无需选择。</br>

![查询1](https://github.com/jdcloudcom/cn/blob/zookeeperv2/image/Internet-Middleware/JCS-for-ZK/observer.png)
