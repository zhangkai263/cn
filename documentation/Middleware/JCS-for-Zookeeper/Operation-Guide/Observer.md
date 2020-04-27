## Observer节点
Zookeeper的节点变更需要过半数投票通过后才能执行，当机器规模增加时，由于网络消耗等原因必然导致投票成本增加，从而导致写性能的下降，而Observer节点不参与投票，只是简单的接收投票结果，不会影响写性能，因此可以通过增加Observer节点，在不影响实例写性能的基础上提供Zookeeper的可扩展性。</br>

分布式协调服务Zookeeper版支持设置Observer节点来在不伤害写性能的情况下扩展Zookeeper，可以在创建集群时通过[创建实例](https://zk-console.jdcloud.com/create?regionId=cn-north-1)页面勾选 Observer节点，也可以在创建集群后通过“操作-变更配置”设置 Observer节点。</br>

