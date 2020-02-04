# 产品功能


## 函数运行时

您可以使用函数服务支持的开发语言（见表1）编写函数代码。

| 运行时类型 | 运行时版本 | 文档链接 |
| ---------- | -------- | -------- |
| Python 2.7  | Python 2.7 版本 | [python runtime](../Operation-Guide/buildfunction/runtime/python.md) |  
| Python 3.6   | Python 3.6 版本 | [python runtime](../Operation-Guide/buildfunction/runtime/python.md) | 
| Python 3.7   | Python 3.7 版本 | [python runtime](../Operation-Guide/buildfunction/runtime/python.md) | 
| NodeJS 6    | NodeJS 6.17 版本 | [nodejs runtime](../Operation-Guide/buildfunction/runtime/nodejs.md) | 
| NodeJS 8    | NodeJS 8.16 版本 | [nodejs runtime](../Operation-Guide/buildfunction/runtime/nodejs.md) | 
| Java 8    | Java 8 版本 | [java runtime](../Operation-Guide/buildfunction/runtime/java.md) | 


## 函数支持多种代码上传方式

函数代码管理方式支持在线编辑和本地.zip/.jar 包上传。

## 函数支持多种触发器类型

公测期间，函数服务支持的触发器类型及调用方式见表2：

表2：Function支持触发器信息

| 事件源触发器     | 函数调用方式 | 参考       |
| ---------- | ------------ | ---------- |
| 对象存储OSS | 异步调用     | [对象存储OSS触发器](../Operation-Guide/invokefunction/triggermanagement/eventsourceservice/oss-tirgger.md)|
| API网关 | 同步调用     | [API网关触发器](../Operation-Guide/invokefunction/triggermanagement/eventsourceservice/apig-tigger.md)|
| 队列服务JQS | 异步调用     | [队列服务JQS触发器](../Operation-Guide/invokefunction/triggermanagement/eventsourceservice/JQS-trigger.md)|
| 云事件服务 | 异步调用     | [云事件触发器](../Operation-Guide/invokefunction/triggermanagement/eventsourceservice/cloudevent.md)|

## 函数管理方式

您可以通过以下方式管理函数：
- 控制台
- API、SDK
- SCA CLI本地开发工具
