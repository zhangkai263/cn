# 负载均衡


## 简介
负载均衡相关API


### 版本
v1


## API
|接口名称|请求方式|功能描述|
|---|---|---|
|**addListenerCertificates**|POST|listener批量添加扩展证书|
|**addRules**|POST|往转发规则组加入转发规则|
|**associateElasticIp**|POST|负载均衡绑定弹性公网IP|
|**associateSecurityGroup**|POST|负载均衡绑定安全组|
|**createBackend**|POST|创建一个后端服务|
|**createListener**|POST|创建一个监听器|
|**createLoadBalancer**|POST|创建负载均衡|
|**createTargetGroup**|POST|创建一个虚拟服务器组|
|**createUrlMap**|POST|创建转发规则组,仅alb支持|
|**deRegisterTargets**|POST|从TargetGroup中移除一个或多个Target，失败则全部回滚。 成功移除的target将不会再接收来自loadbalancer新建连接的流量|
|**deleteBackend**|DELETE|删除一个后端服务|
|**deleteListener**|DELETE|删除一个监听器|
|**deleteListenerCertificates**|POST|listener批量删除扩展证书|
|**deleteLoadBalancer**|DELETE|删除负载均衡，负载均衡下的监听器，转发规则组(仅alb支持)，后端服务，服务器组会一起删除|
|**deleteRules**|POST|删除转发规则|
|**deleteTargetGroup**|DELETE|删除一个虚拟服务器组|
|**deleteUrlMap**|DELETE|删除转发规则组|
|**describeBackend**|GET|查询后端服务详情|
|**describeBackends**|GET|查询后端服务列表|
|**describeListener**|GET|查询监听器详情|
|**describeListeners**|GET|查询监听器列表|
|**describeLoadBalancer**|GET|查询负载均衡详情|
|**describeLoadBalancers**|GET|查询负载均衡列表详情|
|**describeTargetGroup**|GET|查询TargetGroup详情，返回target详情功能3个月后将会下线，建议用户直接使用describeTargets接口查询target详情|
|**describeTargetGroups**|GET|查询虚拟服务器组列表详情，返回target详情功能3个月后将会下线，建议用户直接使用describeTargets接口查询target详情|
|**describeTargetHealth**|GET|查询后端服务下的target的健康状态|
|**describeTargets**|GET|查询Target列表详情|
|**describeUrlMap**|GET|查询转发规则组详情|
|**describeUrlMaps**|GET|查询转发规则组列表详情|
|**disassociateElasticIp**|POST|负载均衡解绑弹性公网IP|
|**disassociateSecurityGroup**|POST|负载均衡解绑安全组|
|**registerTargets**|POST|往TargetGroup中加入Target|
|**updateBackend**|PATCH|修改一个后端服务的信息|
|**updateListener**|PATCH|修改一个监听器的信息|
|**updateListenerCertificates**|POST|listener批量修改扩展证书|
|**updateLoadBalancer**|PATCH|更新负载均衡信息|
|**updateRules**|PATCH|修改转发规则|
|**updateTargetGroup**|PATCH|修改一个虚拟服务器组的信息|
|**updateTargets**|POST|修改target信息|
|**updateUrlMap**|PATCH|修改转发规则组|
