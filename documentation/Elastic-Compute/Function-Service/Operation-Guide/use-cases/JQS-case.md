# 队列服务JQS触发器示例

使用函数服务，函数服务可轮询指定队列服务消息队列，并通过一个包含队列消息的事件来异步调用您的函数。Function读取批次中的消息，并将其消息从队列中删除。

本示例介绍如何配置队列服务JQS触发器，实现拉取消息队列中待消费消息，打印消息内容。


## 创建函数

登陆函数服务控制台，进入“概览”页面或”函数列表“页面，单击”创建函数“。

step1函数代码:

- 函数运行时： python 3.6                
- 函数模板：队列服务JQS触发器使用指导                                  
- 函数名称：JQS-func（您可以设置自己的函数名）                                      
- 函数入口：index.handler  (Handler格式为：[文件名][函数名])                         
- 函数代码：默认队列服务JQS示例代码（函数从队列服务JQS的消息队列中轮询消息，打印消息内容及属性）           

![jqs1](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/JQS1.PNG) 

step2函数配置：

- 函数执行内存：128MB                 
- 超时时间：100秒                                               
- 描述、环境变量：此处默认不配置     
- 权限配置： JQS-func（在访问控制中提前[创建服务角色](role.md) 授权函数服务轮询JQS消息队列）               
- 高级配置：                   
         日志集：func_log                           
         日志主题：log-function                                    
         说明：日志集、日志主题需提前在日志服务创建                                              
![jqs2](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/JQS2.PNG) 

step3触发方式：

- 触发器：不配置触发器        

单击”完成“，完成函数创建。

## 测试函数

在创建触发器之前，可以先通过控制台配置测试事件模拟一函数执行。

function会轮询指定消息队列，并将消息内容以 event 的形式作为输入参数传递给函数，您可以通过控制台测试事件将 event 传给函数，测试编码是否正确。

创建测试事件
进入”函数列表“页面，单击”JQS-func“函数，进入函数详情页面，选择”配置测试事件”，

- 配置测试事件：创建新的测试事件                       
- 事件模板：JQS-event-template                      
- 事件名称：test                         
单击“保存”，完成测试事件创建。                                     

测试函数--在“请选择测试事件”下拉列表中选择已保存的测试事件“test” ，单击“测试”。

执行成功后，可在控制台查看实时函数执行日志。成功print测试事件中以下内容。

- jqs_message：test(队列服务JQS消息事件的内容)                 
- receive_count：1 (消息已被消费的次数)        
- message_attributes：None（用户自定义消息属性)                

![jqs7](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/JQS7.PNG) 

## 创建队列服务JQS触发器

在“JQS-func”函数详情页面，选择”触发器”tab,单击“创建触发器”--"队列服务JQS触发器"。您可以选择已创建的消息队列或单击“新建队列”至队列服务控制台[创建消息队列](https://docs.jdcloud.com/cn/queue-service/create-queue) 。             
说明：函数服务只支持类型为：标准队列的消息队列触发函数执行。  

- 触发器类型：队列服务JQS触发器                                 
- 消息队列：选择已创建的消息队列                                
- 批处理大小：1                                         

以上，完成队列服务JQS触发器创建。

![jqs8](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/JQS8.PNG) 


## 查看函数执行日志
在队列服务JQS控制台，选择绑定“JQS-func”函数的消息队列，选择“发送消息”，连续发送4条消息，消息内容为“test1”、“test2”、“test3”、“test4”。

在日志服务控制台，选择“日志检索”，选择“JQS-func”函数配置的日志集、日志主题，可查询该条函数日志，4条消息已成功触发函数执行如下：

![jqs13](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/JQS13.PNG) 

![jqs12](https://github.com/jdcloudcom/cn/blob/function0116/image/Elastic-Compute/functionservice/JQS12.PNG) 


