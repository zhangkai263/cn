# 云事件触发器示例

[云事件服务](https://docs.jdcloud.com/cn/cloudevents/product-overview) ，是京东云提供云上事件产品，用户可以查看事件发生的监控统计，并且可以对某些特定的事件设置事件订阅，当事件发生时，触发特定的行为。

目前，云事件服务支持的事件类型为：系统事件、自定义事件、定时事件。

本示例介绍如何借助云事件服务的定时事件功能，实现定时触发函数执行。

## 创建函数

登陆函数服务控制台，进入“概览”页面或”函数列表“页面，单击”创建函数“。

step1函数代码:

- 函数运行时： python 3.6
- 函数模板：自定义模板                     
- 函数名称：timing-function（您可以设置自己的函数名）                           
- 函数入口：根据提示填写，默认index.handler                
- 函数代码：默认自定义模板 

![timing1](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/timing1.PNG) 

step2函数配置：

- 函数执行内存：128MB                 
- 超时时间：100秒                                               
- 描述、环境变量、权限配置、高级配置：此处默认不配置（您可根据需要配置环境变量、函数网络及日志输出）  
![timing1](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/timing2.PNG) 

step3触发方式：

- 触发器：不配置触发器        
![timing1](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/timing3.PNG) 

单击”完成“，完成函数创建。
