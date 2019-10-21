## 日志字段监控配置案例

本节将通过一个实际的案例，完成一个日志监控的配置。旨在通过配置过程让用户更容易地理解该如何创建日志字段监控任务。

### 一、监控配置目标：

1.对用户部署在京东云服务器上的某款游戏支付日志进行字段监控，以便了解用户支付情况。

2.需要对每分钟内所有支付失败的订单进行数量统计，当每分钟内支付失败的订单达到50笔时即支付系统发生异常，需要设置报警通知相关人员Jason。日志中出现paymentStatus=failed即为支付失败。

### 二、监控方案设置：

达成上述监控配置目标的设置方案如下所示：

1.选择该业务应用日志所在的日志集（gameLog）和日志主题(paymentLog),点击paymentLog日志主题后方的监控配置，进入监控配置页面。

![](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/LogMonitor/monitorcase01.jpg)

2.点击新建监控任务开始配置。

![](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/LogMonitor/monitorcase02.jpg)

3.监控任务名称输入：**支付失败次数监控**

![](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/LogMonitor/monitorcase03.jpg)

4.筛选设置中，选择键值筛选，输入键值筛选的条件为**paymentStatus = "failed"**

5.监控指标设置中，统计项选择“**日志原文**”，统计方式选择“计数”，监控指标名称输入为：**failed_count**，单位选择**count**。

![](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/LogMonitor/monitorcase04.jpg)

6.打开日志测试，可以从从当前的日志主题获取最新的日志数据，也可以选择自定义日志数据，手动输入两条日志数据。
```
{"paymentStatus": "failed"}
{"paymentStatus":"succeed"}
{"paymentStatus": "failed"}
{"paymentStatus":"succeed"}
{"paymentStatus": "failed"}
{"paymentStatus":"succeed"}
```
7.点击**测试**，可以看到测试数据结果中显示：从样本日志中的6条数据中得出日志原文的计数为3count。结果列表中显示符合条件的样本中的日志数据。符合预期，点击确定，完成配置。

![](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/LogMonitor/monitorcase05.jpg)

### 三、报警方案设置

上述监控配置中的报警目标为：当每分钟内支付失败的订单达到50笔时即支付系统发生异常，需要设置报警通知相关人员Jason。

1.选择监控任务"**支付失败次数监控**"后方的"**监控图**"，点击监控图进入查看监控图页面。

2.点击右上方的”可前往云监控设置报警规则“中的设置报警规则，跳转至云监控中的自定义监控的页面。

3.对日志集（GameLog）下的日志主题(PaymentLog)中的指标名称为“failed_count”的指标设置告警，当该指标统计周期为1min时的值大于50时，触发报警，报警联系人选择Jason。点击“完成”，完成报警规则的设置。



