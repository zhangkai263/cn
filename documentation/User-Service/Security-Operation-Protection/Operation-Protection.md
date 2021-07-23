# 设置操作保护

本文介绍如果为主账号和子用户设置操作保护

## 为主账号设置操作保护

在[安全设置](https://uc.jdcloud.com/account/security-settings)页面，可以设置操作保护。

![主账号操作保护设置](../../../image/IAM/Virtual-MFA-Device/主账号操作保护设置.png)

要启用基于 MFA 的操作保护，请先启用虚拟 MFA 认证。详见：[虚拟 MFA 认证](../../../documentation/User-Service/Account-Management/Setting-up-MFA.md)

## 为子用户设置操作保护

在访问控制的[用户管理](https://iam-console.jdcloud.com/subUser/list)页面，进入用户详情 > 安全凭证，可以设置子用户的操作保护。详见：[设置子用户的安全凭证](../../../documentation/Management/IAM/Operation-manual/User-management/setting-user-credentials.md)

![子用户操作保护设置](../../../image/IAM/Virtual-MFA-Device/子用户操作保护设置.jpg)

## 身份验证

在执行[敏感操作](../../../documentation/User-Service/Security-Operation-Protection/Introduction/Support-Services.md)时，控制台会按照操作保护的设置进行拦截验证。

MFA验证页面：

![MFA验证页面](../../../image/IAM/Virtual-MFA-Device/MFA动态验证码.png)

MFA扫码验证页面：

![MFA扫码验证页面](../../../image/IAM/Virtual-MFA-Device/MFA扫码验证.png)

短信验证页面：

![短信验证页面](../../../image/IAM/Virtual-MFA-Device/短信验证.png)

邮箱验证页面：

![邮箱验证页面](../../../image/IAM/Virtual-MFA-Device/邮箱验证.png)
