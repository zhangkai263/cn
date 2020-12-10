# 设置智能语义防护引擎

传统的规则引擎只懂文本而不懂程序本身，就存在着误报、需要频繁更新规则、难以检测未知威胁等问题。而智能语义分析则能理解程序语言，实现基于上下文逻辑的攻击检测，用算法的迭代改变规则防护现状，在降低误报率的同时，检测找到可疑流量。本页主要介绍如何设置智能语义防护引擎。


## 前提条件

- 已开通Web应用防火墙实例。更多信息，请参见[开通Web应用防火墙](https://docs.jdcloud.com/cn/web-application-firewall/purchase-process)。
- 已完成网站接入。更多信息，请参见[添加网站](https://docs.jdcloud.com/cn/web-application-firewall/step-1)。

## 操作步骤

1、登录[Web应用防火墙控制台](https://cloudwaf-console.jdcloud.com/overview/business)。

2、在左侧导航栏，单击**网站配置**。

3、在**网站配置**页面定位到要设置的域名，在操作栏单击**防护配置**。

4、在防护配置页面，打开**Web防护**页签，确保**总体防护开关**是开启状态。如果是关闭状态，WAF将不再防护，仅保留转发流量功能。如图

![image](../../../../../image/WAF/protect-configure/4.whole-protect-switch.png)



5、在**Web防护**页签定位到**智能语义防护引擎**模块，开启状态开关。

![image](../../../../../image/WAF/protect-configure/76.Intelligent-Protection-Semantics-Engine.png)

6、选择**检测模式**，支持攻击检测，日志记录观察。暂不支持**拦截模式**。