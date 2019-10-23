#  应用部署

在微服务平台上，应用可以通过部署组来实现部署，目前已提供支持在云主机执行部署。

## 操作场景

当新建完应用，需要通过部署程序包来实施应用在实例上的注册和发现。

## 操作步骤

1、登录微服务平台控制台。	在左侧导航栏点击应用管理，进入应用列表页，选择要进行部署的应用。

若尚未创建应用，则需先新建。新建过程参考： [应用管理](APPList.md)  

2、点击应用名称，进入部署组列表页，配置好将执行的部署组信息。

若尚未创建部署组，则需先新建。新建过程参考： [部署组](Deploy-Group.md)   

3、配置关于发起部署的相关信息。

目前支持两种部署来源：程序包、云编译。下面将分别介绍。

#####  程序包部署

![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/app-fqbs.png)


- 为提升用户体验，**系统将在云主机中使用Supervisor来管理用户服务。**

- 选择要部署的程序包。如无则需先上传。

- 配置启动参数。


#####  云编译部署

如果您已经使用云编译进行了构建，可直接通过云编译部署。

![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/app-fqbs-yby.png)

注意：

- 请使用已执行成功且构建类型为应用包的构建序号。

- “应用版本号”将注册于注册中心 tag 中的 appVersion 里。您可在注册中心的服务实例详细信息中查看到该参数。服务实例详细信息位置：注册中心>服务管理>实例详情>实例详细信息 。

![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/app-fqbs-yby-slxq.png)

- 路径，指运行jar/war包的相对路径，是相对于云编译 out_dir文件夹的路径。


4、实施部署。

![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/bsz-xq.png)

**说明：**

- 部署完成后，可进行回滚、重新部署等操作。

- 用户还可查看每个实例的部署信息。

- 删除应用时，用户可以选择，是否同时删除程序包。默认勾选同时删除。


5、验证应用是否已正常启动，可采用如下方式：

##### 方法1：如果有外网且开放了相应端口，可以直接访问。

```yaml

{ip}:{端口}/api/v1/test

```  
若响应码为200且返回 "status": "OK" 等信息，表示调用成功。

![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/bsz-qr1.png)



##### 方法2：登陆部署该应用的机器查看。

执行以下代码：

```yaml

   curl -v http://127.0.0.1:{端口}/api/v1/test 

```  
若响应码为200且返回 "status": "OK" 等信息，表示调用成功。

![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/bsz-qr2.png)


##### 方法3：判断服务间的调用。

若 Consumer与Producer 应用均已部署， 且在同一命名空间下，可在请求Consumer以下的地址，发起对Producer的调用。 

![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/bsz-qr3.png)

若返回 "status": "OK" 等字样信息 ,表示服务间调用正常。


##### 方法4：通过 curl方式。

若已开启服务治理鉴权功能，可通过以下代码查看状态码，或直接在POSTMAN中使用外网IP请求查看状态码，判断请求是否已被拦截。

```yaml

    curl -v 

```  

以下截图内容为启用鉴权后，请求被拦截的状态：

![](../../../../../image/Internet-Middleware/JD-Distributed-Service-Framework/bsz-qr4.png)

