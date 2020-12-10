# 线上发布

支持京东云主机、物理机及其他厂商主机的部署功能。

点击菜单栏中的“持续交付”，进入“线上发布”。

1.基本设置

设置执行账户（在主机内执行部署任务的账户），端口等，选择所属模块

【所属模块】关联编译构建中编译的模块。此处可选模块为 用户在该应用下编译构建过的模块，选择所属模块后，在上线过程中才可选择对应的包版本进行上线

![Alt text](https://github.com/jdcloudcom/cn/blob/DevOps/image/DevOps/Operation19.png)

2.分组配置

列出应用中的所有分组，新增/编辑 分组 信息，见 服务树-编辑分组。

![Alt text](https://github.com/jdcloudcom/cn/blob/DevOps/image/DevOps/Operation20.png)

支持对分组进行配置操作，包括环境变量、配置文件

![Alt text](https://github.com/jdcloudcom/cn/blob/DevOps/image/DevOps/Operation21.png)

对于支持伸缩的分组，还支持对分组进行配置 负载均衡、伸缩策略 操作

a.负载均衡

![Alt text](https://github.com/jdcloudcom/cn/blob/DevOps/image/DevOps/Operation22.png)

- 负载均衡：勾选接入负载均衡器之后，选择控制台中已经添加的负载均衡实例。所选负载均衡实例的私有网络和可用区需要跟部署实例在同一个私有网络和可用区内。
- 目标组：负载均衡实例下已经创建的虚拟服务器组
- 端口：部署实例的端口


b.伸缩策略

![Alt text](https://github.com/jdcloudcom/cn/blob/DevOps/image/DevOps/Operation23.png)

若开启自动迁移，将根据迁移策略，在保证内网ip不变的情况下，回收旧资源，重新创建云主机，并部署当前版本的程序。

3.上线

选择要上线的分组，设置上线并发度，并对上线并发度、超时时间进行设置，选择需要上线的包版本进行上线。在“上线动态”页可查看上线详情及进行回滚操作。

![Alt text](https://github.com/jdcloudcom/cn/blob/DevOps/image/DevOps/Operation24.png)

4.扩容

选择分组，进行扩容

![Alt text](https://github.com/jdcloudcom/cn/blob/DevOps/image/DevOps/Operation25.png)

5.实例管理

可对实例维度，支持重启、启动、停止、开启或关闭流量、缩容(弹性部署)批量操作。即执行代码包的control文件，control文件的书写规范请见“编译构建”

![Alt text](https://github.com/jdcloudcom/cn/blob/DevOps/image/DevOps/Operation26.png)

6.上线动态

展现上线历史，并可支持查看部署日志、回滚操作

![Alt text](https://github.com/jdcloudcom/cn/blob/DevOps/image/DevOps/Operation27.png)

7.日志服务

现场日志查询，日志订阅，查看和下载已订阅日志的历史日志。日志查看支持关键字高亮、反向查询、整词匹配等，点击某行日志，还可查看上下文日志。

- 现场日志：主机上目前存在的日志文件，可查询指定实例的指定日志文件
- 历史日志：对于已订阅的日志，可从历史日志页查看订阅的分组及实例的日志
- 日志下载：对于已订阅的日志，可以将日志下载到本地
- 日志订阅：选择要订阅日志的分组，并提供日志路径，即可创建订阅日志，订阅的日志将全部存储于专门存放日志的ES


