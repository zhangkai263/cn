# 函数权限配置示例

[访问控制（Identity and Access Management， IAM）](https://docs.jdcloud.com/cn/iam/product-overview)是京东云提供的一项用户身份管理与资源访问控制服务。                   
函数服务使用IAM基于服务角色的权限管理机制。策略（policy）表示访问某个服务的能力，为服务角色（role）绑定指定策略，则服务角色就具有了访问该服务的能力。                 

在对京东云产品进行访问时， 需要拥有对该产品的访问权限。函数服务目前涉及的权限为：函数服务访问事件源服务，需要授予函数服务访问事件源服务的权限。涉及到的事件源服务为：队列服务JQS。



下面介绍如何为函数创建权限配置以访问队列服务JQS轮询指定队列。

## 创建服务角色

登陆访问控制控制台，进入“角色管理”--“创建角色”--选择创建 “服务角色--信任云服务可以通过扮演该角色来访问您的资源。”

- 角色名： JQS-func            
- 信任关系：函数服务                                
允许函数服务代表您访问京东云资源

![JQS3](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/JQS3.PNG) 

## 策略说明
JQS-func服务角色策略至少包含Function轮询队列服消息队列获取消息事件的以下必备的接口权限：        
ReceiveMessage     
DeleteMessage           
DeleteMessageBatch            

## 授权策略       
为已创建的JQS-func角色授权策略，在角色列表页，“JQS-func”角色操作中选择"授权"。
说明：队列服务已在访问控制中预置触发函数系统策略JDCloudQueueServiceTriggerFunction，此系统策略已预置必备接口，可直接选择授权至服务角色。 此外，您也可以创建新的自定义策略，策略需包含必备接口。  

![JQS5](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/JQS5.PNG) 

在授权资源列表中搜索队列服务，查找预置系统策略JDCloudQueueServiceTriggerFunction队列服务触发函数权限，选择添加。

![JQS4](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/JQS4.PNG) 

以上，完成JQS-func服务角色的创建及策略授权。      
![JQS6](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/JQS6.PNG) 



## 添加权限配置至指定函数

在创建队列服务JQS触发器前，您可在创建函数step2:函数配置--“权限配置”中，添加已创建好的JQS-func服务角色；或为已创建函数，在函数详情中添加已创建好的JQS-func服务角色。
注意：未正确配置函数权限的function无法创建队列服务JQS触发器。

![JQS9](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/JQS9.png) 

![JQS10](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/JQS10.PNG) 

以上，完成函数权限配置。

