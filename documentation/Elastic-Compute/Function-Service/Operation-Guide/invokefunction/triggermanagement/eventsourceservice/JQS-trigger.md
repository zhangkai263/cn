# 队列服务JQS触发器

 [队列服务（Queue Service）](../../../../../../Middleware/Queue-Service/Introduction/Product-Overview.md)是基于serverless架构的全托管消息队列服务。用户使用队列服务，无需为了满足数据的高可靠、服务的高可用进行复杂的基础设施配置，也不用因为性能瓶颈而频繁扩容，只需专注业务实现，通过简单的控制台操作或SDK调用，即可构建高可靠、高可用、可无限扩展的消息队列。并且服务按量付费，无初始费用。

您可以通过编写Function函数来消费队列服务消息队列中的消息，Function轮询该队列，并通过一个包含队列消息的事件来异步调用您的函数。Function读取批次中的消息，并将其消息从队列中删除。

## 函数服务角色权限

在创建队列服务JQS触发器前，请确认待绑定的Function函数配置中的“权限配置”/“Role”已添加服务角色，且服务角色策略包含Function轮询队列服消息队列获取消息事件的以下必备的接口权限：  
ReceiveMessage  
DeleteMessage  
DeleteMessageBatch

添加服务角色，您需要提前在“访问控制”--“角色管理”中创建一个“服务角色”，信任“函数服务"代表您访问京东云资源，为此角色添加轮询队列服务JQS的权限（可直接添加JQS在IAM策略中预置的JDCloudQueueServiceTriggerFunction队列服务触发函数权限的系统策略至此角色）。若Function权限配置中未添加带有轮询队列服务JQS接口权限，则创建触发器失败。详情可参考[创建服务角色](../../../use-cases/role.md) 。


 ![JQS10](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/JQS10.PNG)
 





## 触发器配置

队列服务JQS触发器触发器配置参数说明见表1，* 为必填项。
 
表1 队列服务JQS触发器信息表

| 字段        | 说明                                     |
| ----------- | ---------------------------------------- |
| * 触发器类型 | 在下拉列表中选择“队列服务JQS触发器“           |
| * 消息队列    | 选择已创建的消息队列  |
| * 批处理大小  | 从队列中一次读取的最大消息数。 范围[ 1-10 ]    |


### 绑定规则限制说明

* 队列与Function函数在同一region；
* 不支持FIFO队列触发函数；
* 一个队列可以触发一个或者多个函数（版本/别名，默认Latest），同一个函数和队列不可多次绑定。

 
