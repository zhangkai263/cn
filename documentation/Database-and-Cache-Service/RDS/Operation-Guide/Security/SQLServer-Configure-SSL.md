# SQL Server SSL 配置

云数据库 SQL Server 连接支持SSL加密。 SSL是为网络通信提供安全及数据完整性的一种安全协议，使用SSL能提升通信数据的安全性和完整性，但对性能有一定的影响。

## 开启及关闭SSL加密
1. 登录控制台，进入实例详情页面，选择 **安全管理**
2. 点击 **是否开启** 按钮，开启或关闭SSL
3. 在控制台开启、关闭SSL，均需要重启SQL Server实例才能生效

   >注意： 开启SSL后，对数据库性能和CPU负荷有一定影响，建议在测试的基础上使用。

## 客户端配置
在SQL Server的连接中使用SSL，可以参考[SQL Server 官方文档](https://docs.microsoft.com/zh-cn/sql/connect/jdbc/connecting-with-ssl-encryption?view=sql-server-ver15)。


