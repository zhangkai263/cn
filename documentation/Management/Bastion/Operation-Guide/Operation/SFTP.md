# SFTP客户端运维

运维人员需要在本地安装支持 SFTP 协议的工具，如 Xftp、WinSCP、FlashFXP、FileZilla 等。以FileZilla为例，介绍SFTP协议的运维登录流程。

## 操作步骤

1、 打开 FileZilla 工具，点击站点管理器页面，添加新站点，协议选择 SFTP，录入堡垒机IP/域名、端口
![](/image/Bastion/ssh1.png) 

2、 在用户身份验证中输入运维堡垒机的用户名和密码

![](/image/Bastion/ssh2.png) 

3、 点击“连接”，连接运维堡垒机

4、 成功登录运维堡垒机后，进入资产管理界面，界面展示了可运维的主机和主机组（红色为主机组，绿色为主机）

![](/image/Bastion/ssh3.png) 

5、 选择要运维的主机或主机组，输入前面的数字，按Enter键即可显示可以登录主机的账户

![](/image/Bastion/ssh4.png) 

![](/image/Bastion/ssh5.png) 

6、 选择一个账户，输入前面的数字，即可用该账户登录到目标主机进行运维操作

![](/image/Bastion/ssh6.png) 

![](/image/Bastion/ssh7.png) 
