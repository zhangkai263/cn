# 云事件触发器示例

[云事件服务](https://docs.jdcloud.com/cn/cloudevents/product-overview) ，是京东云提供云上事件产品，用户可以查看事件发生的监控统计，并且可以对某些特定的事件设置事件订阅，当事件发生时，触发特定的行为。

目前，云事件服务支持的事件类型为：系统事件、自定义事件、定时事件。

本示例介绍如何借助云事件服务的定时事件功能，实现定时触发函数执行。

## 创建函数

登陆函数服务控制台，进入“概览”页面或”函数列表“页面，单击”创建函数“。

**step1函数代码**

- 函数运行时： python 3.6
- 函数模板：自定义模板                     
- 函数名称：timing-function（您可以设置自己的函数名）                           
- 函数入口：index.handler  (Handler格式为：[文件名][函数名])              
- 函数代码：默认自定义模板hello word函数

![timing1](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/timing1.PNG) 

**step2函数配置**

- 函数执行内存：128MB                 
- 超时时间：100秒                                               
- 描述、环境变量、权限配置：此处默认不配置
- 高级配置：                                       
         日志集：func_log                  
         日志主题：log-function                            
         说明：日志集、日志主题需提前在日志服务创建                                      
![timing1](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/timing1-2.PNG) 

**step3触发方式**

- 触发器：不配置触发器        
![timing1](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/timing3.PNG) 

单击”完成“，完成函数创建。

## 测试函数

在创建触发器之前，可以先通过控制台配置测试事件模拟函数执行。

云事件事件源会以 event 的形式作为输入参数传递给函数，您可以通过控制台测试事件将 event 传给函数，测试编码是否正确。

**创建测试事件**                                     
进入”函数列表“页面，单击”timing-function“函数，进入函数详情页面，选择”配置测试事件”，

- 配置测试事件：创建新的测试事件                       
- 事件模板：空白模板                      
- 事件名称：test                         
- 单击“保存”，完成测试事件创建。                                     


**测试函数**                                
在“请选择测试事件”下拉列表中选择已保存的测试事件“test” ，单击“测试”。

执行成功后，可在控制台查看实时函数执行日志。

![timing5](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/timing5.PNG) 


## 创建触发器    
创建云事件触发器，您可以提前在云事件服务控制台创建订阅规则，指定该函数为目的地；或在函数服务控制台添加已有订阅规则或创建新的订阅规则。下面说明如何在函数服务控制台创建新的云事件触发器。

在“timing-function”函数详情页面，选择”触发器”tab,单击“创建触发器”，创建一个1分钟定时触发器。

- 触发器类型：云事件触发器                                 
- 事件订阅：创建新的订阅规则                                  
- 规则名称：1min-timing                                                               
- 事件来源类型：定时事件                                          
- 定时模式：固定频率 1分钟 或  定时表达式( [查看规则](https://docs.jdcloud.com/cn/cloudevents/crongrammar) ) */1 * * * * 

以上，完成定时规则触发器创建。

![timing6](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/timing6.PNG) 


## 查看函数执行日志

在日志服务控制台，选择“日志检索”，选择“JQS-func”函数配置的日志集、日志主题，可查询该函数日志，每1分钟执行一次：

![JQS13](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/JQS13.PNG) 

![JQS14](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/JQS14.png) 










