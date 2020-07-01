# 注册中心

注册中心，实现服务的注册与发现，是微服务的管理中心。用户在创建命名空间同时创建了注册中心；当删除命名空间时，也将同步删除注册中心信息。

注册中心提供的服务包括查看注册中心中的基本信息、服务信息、监控信息等。

 
## 操作步骤

### 注册中心
1、登录微服务平台控制台。在左侧导航栏的资源管理下，点击注册中心并进入列表页。
![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/zczx-list.png)
 
2、点击注册中心的名字，可查看到当前注册的基本信息。用户可在基本信息中查询到节点名称、节点版本、节点所在可用区、节点地址、运行状态等信息。
![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/zczx-jbxx.png)

**说明**

注册中心禁止 ICMP请求，如需测试可使用 telnet 请求 8500 端口。检测注册中心是否可用的方法可尝试如下操作：

    # curl 'http://{域名+端口}/v1/agent/members'
    


   




### 服务管理
用户可查看每个注册中心里的服务情况。

入口：

  -  资源管理>注册中心>服务管理。
  -  进入注册中心的基本信息页后，直接通过tab签切换即可查看。

1、所有服务的列表。
![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/zczx-fwgl.png)

2、查询每个服务的实例情况和每个实例的详情。

服务列表
![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/zczx-fwgl-sllb.png)

实例详情
![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/zczx-fwgl-sllb-slxq.png)




### 监控

可对当前注册中心的状态、服务实例情况、发布情况等信息进行监控，并配置报警规则。入口：资源管理>注册中心>监控。
![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/zczx-list-jk.png)


