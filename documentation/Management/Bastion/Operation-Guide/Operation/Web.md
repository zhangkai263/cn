# web浏览器运维


## 主机运维

**操作步骤**

1、 用户在浏览器中输入堡垒机域名，输入用户名和密码，点击“登录”，登录运维堡垒机；

![](/image/Bastion/login-ins.png) 

2、 如果用户开启了MFA认证，需要输入MFA安全码，点击“提交”

![](/image/Bastion/mfa.png) 

3、 登录之后，在左侧导航栏选择 主机运维 

![](/image/Bastion/operate1.png) 

4、 选择要运维的主机，点击Linux/Windows账户的下拉按钮，选择账户，点击“登录”

![](/image/Bastion/operate2.png) 

如果选择的账户是自动登录的，直接登录到主机进行运维操作；

![](/image/Bastion/operate3.png) 

如果选择的账户是手动登录的，页面会提示输入密码，输入密码后按Enter键即可登录到主机进行运维操作。

![](/image/Bastion/operate4.png) 

## 文件传输


Web terminal方式登录目标资源之后，默认左侧展示可操作的文件树，对Linux目录/Windows临时网盘中的文件或文件夹进行管理

  ![](/image/Bastion/operate5.png) 
  
**操作说明** 

1、  Windows服务器临时存储盘名称：Bastion 上的 TempDisk，默认目录是Download.当前会话结束时会同步清空临时存储盘。
     Linux服务器文件存放的默认路径在根目录。
      
    
2、 单击上传图标，上传文件。
  
  ![](/image/Bastion/operate6.png) 
 
```
 Windows服务器上传下载文件，需打开服务器的磁盘目录，对Bastion 上的 TempDisk 盘上文件复制/粘贴，实现对文件的上传/下载。
 当前会话结束时将同步清空临时存储盘，请及时操作临时盘中的文件
```
  
   ![](/image/Bastion/operate8.png) 
   
  
3、选择文件，单击下载图标，进行文件的下载。
  
  ![](/image/Bastion/operate7.png) 

## 修改用户密码

**操作步骤**

1、 点击右上角用户菜单，选择 个人信息

2、 在 个人信息页面的 安全信息 下可修改用户登录堡垒机的密码
 
 
 
 
 
 
