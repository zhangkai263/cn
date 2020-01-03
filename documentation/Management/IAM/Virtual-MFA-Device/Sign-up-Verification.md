# 登录验证

登录保护是指当您绑定了虚拟MFA设备，在您进行登录操作的时候，除了输入用户名和密码，还需要输入虚拟MFA设备产生的动态验证码进行二次验证。这样即使用户名和密码丢失，他人也无法登录您的账，能够最大限度地保证您的账号安全。

## 账号登录二次验证

登录问题请查看链接：[MFA登录验证常见问题](https://docs.jdcloud.com/cn/iam/mfa-faqs)

京东云在账号登录时提供两种验证方式。

第一种是扫码验证，您可以打开京东云APP使用“扫一扫”或者“我的-MFA认证-立即扫码”进行扫码验证。

![MFA扫码验证页](https://github.com/jdcloudcom/cn/blob/1231_ycx/image/IAM/Virtual-MFA-Device/MFA扫码认证.png)


第二种是手动输入验证码的方式，您可以打开京东云APP并且依次点击“我的-MFA认证”，查看对应账号的MFA验证码，手动输入6位数字安全码。

![MFA验证码页面](https://github.com/jdcloudcom/cn/blob/1231_ycx/image/IAM/Virtual-MFA-Device/MFA验证码认证.png)

## 7天内MFA免验
为了在保障账号安全的同时改进登录体验，京东云为您在MFA认证这一步提供了“信任当前设备，7天内登录无需MFA认证”这项功能，您可以在MFA认证页面自行决定是否开启这项功能。

若您选择开启且此次MFA认证通过，则自开启后的7天时间内，您在当前设备上进行账号登录时都无需进行MFA认证。


