日志服务使用流程如下：  
- 创建日志配置，包括日志集、日志主题、日志源设置
- 使用日志检索、日志转储、日志监控等功能

**日志集与日志主题设置**

1.	登录京东云控制台。

2.	点击导航栏选择“云服务->监控与运维->日志服务”，进入日志服务概览页面。

![进入日志服务概览](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/GettingStarted/logservice.png)

3.	点击列表上方的“创建日志配置”按钮，进入创建流程页面。

![创建日志配置](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/GettingStarted/crtlogconfig.png)

4.	输入新建的日志集名称，或选择已有的日志集名称。填写日志集描述及保存时间。点击“下一步”设置日志主题。

![日志集设置](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/GettingStarted/logset.png)

5.	若用户是新建日志集，则只能新建日志主题；若用户是选择已有日志集，再按需求新建或选择已有日志主题，填写日志主题描述。点击“下一步”，设置日志源。

![日志主题设置](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/GettingStarted/logtopic.png)

**日志源设置**
1.	选择需要采集的日志来源，云产品或业务应用日志。 

2.	云产品日志需要选择日志所属产品、需采集的日志类型，采集实例。

![云产品日志源设置](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/GettingStarted/logsource.png)

3.	业务应用日志需要选择需采集状态，填写日志文件路径，采集实例信息以及根据需求设置高级配置。

![业务应用日志源设置](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/GettingStarted/logsource-custom.png)

4.	点击“保存”，进入完成页。5秒后自动跳转至日志检索页面。也可以点击“日志转储”或“日志监控”，创建转储任务和监控任务。

![完成页面](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/GettingStarted/completed.png)

**检索日志**
1.	在日志主题列表选中要查看的日志主题，点击“检索”按钮，或者在左侧菜单切换至“日志检索”模块，选中需要查询的日志集和日志主题。

![检索-1](https://raw.githubusercontent.com/luolei-laurel/cn-1/patch-1/image/LogService/js-1.png)
2.	在全文索输入框中输入查询内容，点击检索按钮，即可查询到满足条件的日志信息。 

![检索-2](https://raw.githubusercontent.com/luolei-laurel/cn-1/patch-1/image/LogService/js-2.jpg)
3.	切换至键值索引，设置日志类型Key、检索条件及检索值，点击检索按钮，即可查询到满足条件的日志信息。  

![检索-3](https://raw.githubusercontent.com/luolei-laurel/cn-1/patch-1/image/LogService/js-3.png)

