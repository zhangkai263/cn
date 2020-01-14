#  在K8S中部署应用

Kubernetes集群采用管理节点全托管的方式，为用户提供简单易用、高可靠、功能强大的容器管理服务。而在微服务平台上，用户可以便捷地通过K8S部署方式实现K8S容器应用部署。以下将介绍内容包括通过 JDSF 控制台实现对K8S容器应用部署、删除、应用扩缩容、配置负载均衡等。

 

## 操作场景

当京东云用户，已经在京东云上创建了Kubernetes集群，那么接下来将需要在集群中部署应用。此时用户可以通过微服务平台控制台，通过界面操作来完成应用部署。

## 环境准备

1、已经购买开通了京东云Kubernetes集群。

2、已经开通所需资源如：微服务平台等。

3、已经将需要部署的信息上传到镜像中。

4、**注意：** 

-  使用K8S部署需要在拉取镜像过程中获取授权，因此请提前在K8S中开通授权。授权详情请参考：[集成容器镜像仓库](../../../../Elastic-Compute/JCS-for-Kubernetes/Best-Practices/Deploy-Container-Registry.md) 。

-  使用 K8S 将会产生负载均衡费用。



## 操作步骤

### 部署应用

#### 第1步：在JDSF中新建命名空间、新建K8S集群资源池

1、在JDSF中新建命名空间，过程参考： [命名空间](../Namespace.md) 。

本步骤为可选项，也可不用JDSF命名空间而直接使用K8S命名空间。

若选择部署到JDSF的命名空间中，则既可使用JDSF的注册中心，也可使用 K8S 进行服务注册发现，方便用户在控制台上进行操作和管理；若不选择JDSF命名空间，则只能通过K8S进行服务注册发现。

2、在JDSF中新建K8S集群资源池，过程参考： [新建资源池](../Resource-Manage/Resource-List.md) 。

#### 第2步：创建应用

在新建应用页面中，选择创建K8S应用。 

![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/yybs-cjyy-k8s.png)

#### 第3步：对应用发起部署

在应用管理列表中，选择要部署的K8S应用，点击操作中的“发起部署”，进入配置部署信息页。其中基本信息、容器及镜像信息，为必填部分内容；高级设置部分可以选填。

![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/k8s-pzbs-jbxx.png)


1、基本信息、容器及镜像信息项说明。

| 字段 | 说明 |
| :- | :- |
|  资源池 |  用户在Kubernetes集群中创建的集群，并且当前将往该集群中部署应用。 |
|  JDSF命名空间 |  当前部署操作的目标 JDSF 的命名空间。若选择部署到JDSF的命名空间中，则既可使用JDSF的注册中心，也可使用 K8S 进行服务注册发现，方便用户在控制台上进行操作和管理；若不选择JDSF命名空间，则只能通过K8S进行服务注册发现。   |
|  K8S命名空间 |  当前部署操作的目标 K8S 的命名空间。 |
|  镜像 |  镜像仓库和镜像标签信息等。 |

2、新建K8S命名空间。

在微服务平台，点击操作“创建K8S命名空间”，可以直接在K8S下创建命名空间。

![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/k8s-create-np.png)


#### 第4步：执行部署

部署后，还可进行回滚、重新部署操作。

![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/k8s-bsxq.png)


###  删除应用

1、登录微服务平台控制台。 在左侧导航栏点击应用管理，进入应用列表页。

2、对于需要删除的应用，点击操作列的删除。

3、用户需在删除数据前，自行做好数据备份工作。


###  扩缩容

针对K8S资源池的扩容，可以在微服务平台中进行配置。

1、登录微服务平台控制台。 在左侧导航栏点击应用管理，进入应用列表页。

2、选择需要配置扩缩容的应用，点击应用名称，进入应用详情页。

![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/k8s-zyc-yyxq.png)

点击操作栏中的详情，可在应用设置中对运行Pod总数、规格进行调整。
![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/k8s-zyc-yyxq-step1.png)

3、配置扩缩条件。目前支持自动扩缩和手动扩缩两种方式。

1）自动扩缩

![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/k8s-zyc-yyxq-step2-zdks-2.png)

例如：当配置自动扩缩如上图所示的时候，表示如果当前如果 cpu 负载超过应用部署配置的资源上限的50% 的时候 Kubernetes 会自动创建一个 Pod 扩充应用实例，如果扩容完成后所有的 Pod 资源都超过了每个 Pod资源上限的50%，Kubernetes 还会继续的扩缩，直到达到 5 个 Pod 的为止，当 应用 负载回落后，Kubernetes 将自动的进行缩容，移除部分 Pod 回收资源。需要注意的是只有在使用京东云Kubernetes 1.12.3-jcs.4 以上的版本才支持自动扩缩容（HPA）。


2）手动扩缩

![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/k8s-zyc-yyxq-step2-sdks.png)

例如：当配置如上图所示的时候，会修改应用的实例数量到设置的数量，如果当前设置值小于当前部署的实例数量 会进行缩容操作；如果当前设置值大于当前部署的实例数量 会进行扩容操作。


4、配置扩缩规格。

![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/k8s-zyc-yyxq-step3.png)




###  配置负载均衡

1、登录微服务平台控制台。 在左侧导航栏点击应用管理，进入应用列表页。

2、选择需要配置扩缩容的应用，点击应用名称，进入应用详情页。

![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/k8s-zyc-yyxq.png)

3、点击操作栏中的详情，可在应用设置中进行负载均衡配置。

![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/k8s-zyc-yyxq-fzjh.png)

可参考： [Nginx-ingress controller部署](../../../../Elastic-Compute/JCS-for-Kubernetes/Best-Practices/Ingress/Deploy-Ingress-NGINX-Controller.md)
