### 应用安全网关日志
#### 应用场景 
通过日志服务收集应用安全网关的日志，对收集到的Web安全日志进行查询分析。
#### 前提说明
- 已开通应用安全网关服务，并创建了实例

#### 配置流程
1.登录控制台，点击“云服务->监控与运维->日志服务”，进入日志服务概览页。点击“创建日志配置”。

![](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/bestpractice/bestcollect01.jpg)

2.根据需求选择已有日志集日志主题，或创建新的日志集日志主题。

3.选择所属产品 “应用安全网关”、日志类型 “安全日志”，采集实例选择需要采集的应用安全网关实例，点击确定按钮即可。

![](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/bestpractice/BPwaf1.png)

#### 检索日志
1.	创建完成后，可点击“立即查询日志”，或切换至“日志检索”页面，选中采集应用安全网关日志的日志集和日志主题，选择需要查询的时间段，如近1小时；

![](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/bestpractice/BPwaf2.png)

2.	切换至“键值索引”，使用检索，选择需要检索的KEY，并输入value，支持多个KEY的组合，多个KEY之间的关系为and。 

3.	点击搜索按钮，即可查出近1小时内所有符合检索条件的日志数据。
