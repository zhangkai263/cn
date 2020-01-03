# 不同账号开启 MFA 认证的入口

## 1. 主账号开启 MFA 认证

账户管理 > 虚拟MFA设备 > 启用，身份验证后，进入 MFA 开启页面。

![为主账号绑定虚拟MFA设备]( ../../../../image/IAM/Virtual-MFA-Device/为主账号绑定虚拟MFA设备.jpg)


## 2. 主账号为子用户开启 MFA 认证

主账号为 IAM 子用户开启 MFA 认证的入口为控制台 > 访问控制 > 用户管理 > 用户详情 > 安全凭证 > 启用 MFA；

![主账号为子用户绑定虚拟MFA设备](../../../../image/IAM/Virtual-MFA-Device/主账号为子用户绑定虚拟MFA设备.jpg)

此外，主账号还可以通过点击“必须开启 MFA 认证”来要求子用户自行开启 MFA 认证；主账号设置后，子用户在下次登录时，将会自动跳转到 MFA 开启页面，成功开启后才能进行其他的操作。

![主账号要求子用户绑定虚拟MFA设备](../../../../image/IAM/Virtual-MFA-Device/主账号要求子用户绑定虚拟MFA设备.jpg)

## 3. 子用户自行开启 MFA 认证

子账号自行开启 MFA 有两个入口，如下：

* 子账号登录后进入概览页，点击 虚拟 MFA 认证
* 子账号登录后点击右上角菜单 - MFA 认证

![子用户自行绑定虚拟MFA设备](../../../../image/IAM/Virtual-MFA-Device/子账号自行绑定虚拟MFA设备.png)

# MFA 认证开启流程：

Step 1：获取并输入MFA验证码

（1）获取MFA验证码

请使用京东云 APP 控制台“扫一扫”或“我的-MFA认证-立即扫码”扫描页面二维码。（如果您的手机未安装京东云APP，可以点击“[京东云APP](https://console.jdcloud.com/download)”蓝色字样获取下载链接）

（2）输入MFA验证码

绑定成功后，京东云APP会每隔30秒刷新一组动态验证码，请在MFA验证码有效期内输入一组六位验证码，点击确认开启，完成虚拟MFA设备的绑定。

![MFA开启1](https://github.com/jdcloudcom/cn/blob/1231-ycx/image/IAM/Virtual-MFA-Device/MFA开启1.1.png)

Step 2: 设置成功

完成绑定，一组动态验证码绑定成功，您在下次登录控制台时需要校验该账户已绑定的MFA设备的动态码。 同时我们建议您通过开启敏感操作验证，继续提升账号的安全性。

![MFA开启2](https://github.com/jdcloudcom/cn/blob/1231-ycx/image/IAM/Virtual-MFA-Device/MFA开启2.png)

# 禁用虚拟MFA设备
当您不再使用MFA验证保护时，可以选择禁用。在通过安全操作验证后，直接在开启的入口处，点击禁用，即可生效。 需要注意的是，禁用MFA会导致绑定该账号的设备动态验证码不可用，若您重新开启，请绑定新的设备并告知共享账号的人员。 如果您需要更换MFA令牌，在解绑老的MFA后，绑定新的MFA即可。

![禁用虚拟MFA设备](../../../../image/IAM/Virtual-MFA-Device/禁用虚拟MFA设备.jpg)
