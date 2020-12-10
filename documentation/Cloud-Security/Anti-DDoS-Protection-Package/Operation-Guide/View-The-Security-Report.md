# 查看安全报表
DDoS防护包提供丰富的安全报表，帮助您了解购买以后的防护效果。

## 操作步骤
### 方法1
登录DDoS防护包 [监控报表](https://antiddos-console.jdcloud.com/gz/ddos/protection-monitor-list) 页面。菜单栏位置如下：

![防护包-监控报表菜单](https://github.com/jdcloudcom/cn/blob/Anti-DDoS/image/Anti-DDoS-Protection-Package/防护包-监控报表菜单.png)

默认将显示第一个防护包的相关报表。

### 方法2
1、登录DDoS防护包控制台，选择待查看的防护包，在操作栏中单击**防护对象设置**

![防护包列表-防护对象设置](https://github.com/jdcloudcom/cn/blob/Anti-DDoS/image/Anti-DDoS-Protection-Package/防护包列表-防护对象设置.jpg)

2、进入防护对象设置页面，在右上方，点击**查看报表**，即可查看该防护包的报表。

![查看报表](https://github.com/jdcloudcom/cn/blob/Anti-DDoS/image/Anti-DDoS-Protection-Package/查看报表1.png)

## 报表说明
防护包的监控报表如下：

![监控报表](https://github.com/jdcloudcom/cn/blob/Anti-DDoS/image/Anti-DDoS-Protection-Package/监控报表1.png)

分为三个部分：

第一部分显示的是所选时间的攻击统计情况，包括黑洞次数，攻击次数，攻击峰值；

第二部分显示的是网络流量监控以及攻击类型的统计情况；

第三部分显示的是防护明细。


- 默认展示当天的报表，可选择7天、30天。最大可查看90天内的报表情况，报表粒度最小为5分钟。
- 选中某个防护包后，默认显示全部防护IP。如果有多个共享的防护IP，支持多选。若选择多个IP，则报表中图、表的数据都将累加显示。

防护明细的操作栏中，单击**攻击来源**，可查看攻击者IP的情况，最大显示1000条。

产生攻击时，系统会自动对攻击自动抓包，方便事后分析取证。

单击**抓包下载**即可下载数据包到本地，进行详细分析。从系统发现攻击时，即启动抓包，抓包数量不超过1000个，最长为10秒。


