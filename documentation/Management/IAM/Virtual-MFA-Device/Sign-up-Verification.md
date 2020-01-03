# 多因子认证

开启 MFA 认证后，登录时除输入用户名和密码外，还需要输入虚拟 MFA 设备产生的动态安全码进行二次认证。这样即使用户名和密码丢失，他人也无法登录您的账号，可以最大程度保障您的账号安全。

## 登录认证

登录问题请查看链接：[MFA登录验证常见问题](https://docs.jdcloud.com/cn/iam/mfa-faqs)

京东云在账号登录时提供两种 MFA 认证方式。

1. 扫码认证，您可以打开京东云APP使用“扫一扫”或者“我的-MFA认证-立即扫码”进行扫码验证。

![MFA扫码验证页](https://github.com/jdcloudcom/cn/blob/1231-ycx/image/IAM/Virtual-MFA-Device/MFA认证扫码.png)


2. 手动输入验证码，您可以打开京东云APP并且依次点击“我的-MFA认证”，查看对应账号的MFA验证码，手动输入6位数字安全码。

![MFA验证码页面](https://github.com/jdcloudcom/cn/blob/1231-ycx/image/IAM/Virtual-MFA-Device/MFA认证安全码.png)

## 7天内MFA免验
为了在保障账号安全的同时改进登录体验，京东云为您在MFA认证这一步提供了“信任当前设备，7天内登录无需MFA认证”这项功能，您可以在MFA认证页面自行决定是否开启这项功能。

若您选择开启且此次MFA认证通过，则自开启后的7天时间内，您在当前设备上进行账号登录时都无需进行MFA认证。


