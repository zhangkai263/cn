# 配置SSL

分布式关系型数据库 DRDS 连接支持SSL加密。 SSL是为网络通信提供安全及数据完整性的一种安全协议，使用SSL能提升通信数据的安全性和完整性，但对性能有一定的影响。

DRDS SSL 有以下注意事项
- DRDS的SSL功能默认是不开启的，用户需要在控制台中手动开启。
- DRDS和客户端之间的连接支持SSL；DRDS与后端的RDS MySQL之间的连接不支持SSL。
- DRDS的SSL协议目前支持版本较低，建议优先使用mysql5.6.46之前客户端。

# 开启/关闭SSL
1. 登录控制台，进入实例详情页面，选择“安全管理”
2. 点击“是否开启”按钮，开启或关闭SSL
3. 在控制台开启、关闭SSL，均需要重启SQL Server实例才能生效
注意： 开启SSL后，对数据库性能和CPU负荷有一定影响，建议在测试的基础上使用。

## 客户端配置
DRDS 兼容MySQL协议，因此DRDS 客户端的配置可以参考 RDS MySQL的配置文档：
https://docs.jdcloud.com/cn/rds/configure-ssl
