# 修改权限

## 操作步骤
1. 进入实例列表页，点击实例名，进入实例页面，选择 **账号管理** 页面，点击 **修改权限**

  ![修改权限1](../../../../../image/RDS/Modify-Privilege-1.png)

2. 在弹出的 **修改权限** 对话框中，修改指定用户的权限

 * 选中需要修改权限授权权限的库，可以选择对全局授权、针对库授权、针对表授权的不同粒度
 * 转移到右侧进行授权，点击**全部**则勾选了可授予的全部权限。
        
   ![授权数据库](../../../../../image/RDS/MySQL-Create-Account-2.png)

实例支持的库表权限信息如下：

   |类型|权限|
   |-|-|
   |全局|PROCESS、REPLICATION SLAVE、REPLICATION CLIENT|
   |  库  |ALL、EVENT、EXECUTE、GRANT OPTION、LOCK TABLES、REFERENCES、ALTER、CREATE VIEW、CREATE、DELETE、DROP、INDEX、INSERT、SELECT、SHOW VIEW、TRIGGER、PDATE、ALTER ROUTINE、CREATE TEMPORARY TABLES、CREATE ROUTINE、PROCESS、SHOW DATABASES、REPLICATION SLAVE、REPLICATION CLIENT|
   |  表  |ALL、ALTER、CREATE VIEW、CREATE、DELETE、DROP、INDEX、INSERT、REFERENCES、SELECT、SHOW VIEW、TRIGGER、UPDATE|
   



