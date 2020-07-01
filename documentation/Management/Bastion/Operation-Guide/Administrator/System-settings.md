# 系统设置

## 安全设置

**操作步骤**

进入系统配置 > 安全配置页

![](/image/Bastion/security.png) 

   Access Key ID：提供用户的Access Key ID 和 Access Key Secret,否则“会话审计”和“操作审计”功能将无法正常使用。Access Key ID和Access Key Secret是您访问京东云API的密钥，可操作您名下的所有资源，为了您的财产和服务安全，请妥善保存和定期更换密钥。详细信息请参见[Accesskey管理](../../../../User-Service/Account-Management/AccessKey-Management.md)。
   
   登录超时：编辑登录超时时间，完成后单击确定完成更改。
   
   密码尝试次数：编辑尝试密码次数，完成后单击确定完成更改。
   
   锁定时长：当用户登录失败次数达到限制后，那么在此时间间隔内禁止登录再次操作需要重新登录。
   
   密码使用期限：如果用户在此期间没有更新密码，用户密码将过期失效。
   
   SSH最大空闲时间：超过最大空闲时间没有任何操作，将自动断开连接。



## 存储管理

**存储配置**

通过存储管理可以查看堡垒机磁盘数据状态。

![](/image/Bastion/security.png) 


**自动删除**

在自动删除下，设置自动删除多少天之前的数据

![](/image/Bastion/security.png) 

## 日志备份

可以通过日志备份功能，方便下载任意时间段的审计日志。

**操作步骤**

1、 进入系统 > 日志备份 标签页

2、 点击 创建备份，可以生成备份文件

![](/image/Bastion/backup.png) 

   选择时间范围，并选择需要导出的内容（操作日志、会话日志），即可生成备份文件。
 
3、 备份的日志文件，支持下载，编辑备注信息。

![](/image/Bastion/backup2.png) 

