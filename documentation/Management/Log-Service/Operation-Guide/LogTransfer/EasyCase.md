## 日志转储配置案例

本节将通过一个实际的案例，完成一个日志转储的配置。旨在通过描述整个配置过程让用户更容易地理解该如何创建日志转储配置。

### 一、转储配置目标：

1.

### 二、转储方案设置：

达成上述监控配置目标的设置方案如下所示：

1.选择该业务应用日志所在的日志集（myAppVersion1）和日志主题(alblog),点击alblog日志主题后方的转储配置，进入转储配置页面。

![](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/LogTransfer/case01.jpg)

2.点击**新建转储任务**开始配置。

![](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/LogTransfer/case02.jpg)

3.转储任务名称输入：**ALB访问日志转储**。

4.转储对象，即转储至对象存储OSS中，选择我账户下的转储桶**logshipper-test-10**，ALB产生的访问日志将会转储至该转储桶内，我可以在对象存储页面中选择该转储桶，并将转储的日志数据下载至本地。对象存储会根据转储的数据量及存储时间进行收费。

5.目录前缀输入：**myappversion1/**。在转储时，会将ALB的访问日志转储至该目录下。

6.分区格式输入：**%Y/%m/%d**。转储时会根据strptime时间格式化自动生成目录，年/月/日的格式目录，如：2019/08/08。

7.转储文件大小：根据自己的需求，选择了**500MB**。单个日志文件达到500MB时会进行切分，每个日志文件不大于500MB。

8.转储时间间隔：根据自己的需求，选择了**30min**。每30分钟会对把时间段内产生的日志文件转储至选择的转储对象中。

9.为了便于查看访问日志中每个字段代表的含义，转储格式选择了**JSON**。

10.为了节省对象存储的存储费用，选择了对日志文件进行压缩，压缩的格式选择了**gzip**。

![](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/LogTransfer/case03.jpg)

### 二、查看转储任务历史：

转储任务创建完成后，可以查看转储任务的执行历史，以及转储任务的状态，对于失败的转储任务，1小时内支持重试：

1.点击日志服务左侧菜单栏中的“转储任务历史”，进入转储任务历史页面，选择日志集（myAppVersion1），日志主题(alblog)，转储任务（myappversion1）。或者是转储配置页面的**myappversion1**任务后方点击转储**转储历史**。即可查看**myappversion1**的转储历史。

2.根据需求选择了近一小时的查询范围，发现有一个任务转储失败了，因为在一小时内，所以可以重试。点击了**重试**，重新进行了转储。

















