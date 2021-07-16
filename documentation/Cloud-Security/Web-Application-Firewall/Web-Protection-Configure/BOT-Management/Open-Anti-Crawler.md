# 开启防爬虫

Web应用防火墙支持开启防爬虫模块。防爬虫模块可以对所有请求按照单IP一段时间访问URL（去重后）达到一定阈值，则认为是爬虫行为，并进行挑战。挑战过程是从人机交互挑战开始，逐步升级为拦截。

## 前提条件

- 已开通Web应用防火墙实例，企业版及以上的套餐版本，更多信息，请参见[开通Web应用防火墙](https://docs.jdcloud.com/cn/web-application-firewall/purchase-process)。
- 已完成网站接入。更多信息，请参见[添加域名](https://docs.jdcloud.com/cn/web-application-firewall/step-1)。

## 操作步骤

1. 登录[Web应用防火墙控制台](https://cloudwaf-console.jdcloud.com/overview/business)。
2. 在左侧导航栏，单击**网站配置**。
3. 在**网站配置**页面定位到要防护的域名，在操作栏单击**防护配置**。
4. 在防护配置页面，单击**BOT管理**页签，定位到**防爬虫**模块，开启**状态**开关。

![image](../../../../../image/WAF/protect-configure/41.Bot-Anti.png)