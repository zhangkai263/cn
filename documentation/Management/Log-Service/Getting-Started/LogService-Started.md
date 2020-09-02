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

![业务应用日志源设置](https://github.com/jdcloudcom/cn/blob/zhangwenjie-only/image/LogService/GettingStarted/logsourcefromcustom.png)

4.	点击“保存”，进入完成页。5秒后自动跳转至日志检索页面。也可以点击“日志转储”或“日志监控”，创建转储任务和监控任务。

![完成页面](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/GettingStarted/completed.png)

**日志检索**
1.	在日志主题列表选中要查看的日志主题，点击子菜单中的“日志检索”。

2.	在全文检索输入框中输入检索的关键词，点击检索按钮，即可查询到满足条件的日志信息。 

![全文检索](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/LogSearch/logsearch01.jpg)

3.	切换至键值检索，设置日志类型Key、检索条件及检索值，点击检索按钮，即可查询到满足条件的日志信息。  

![键值检索](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/LogSearch/logsearch02.jpg)

**日志转储**
1. 在日志主题列表选中要转储的日志主题，点击子菜单中的“日志转储”，点击“添加”或者在“转储任务列表”页面内点击“新建转储任务”。

![日志转储](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/LogTransfer/createLogTransfer01.jpg)

2. 根据业务需求填写转储任务的配置项即可。

![创建转储任务](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/LogTransfer/createLogTransfer02.jpg)

**日志监控**
1. 在日志主题列表选中要设置监控的日志主题，点击子菜单中的“日志监控”，点击“添加”或者在“监控任务列表”页面内点击“新建监控任务”。

![日志监控](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/LogMonitor/logmonitor-1.jpg)

2. 根据业务需求填写监控配置项即可。

![创建监控任务](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/LogMonitor/logmonitor-2.jpg)




