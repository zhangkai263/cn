# 配置 SSL 证书 
云数据库 MySQL, MariaDB, Percona 连接方式支持明文的，也支持加密的，如果要支持加密的连接方式，需要在连接参数中配置 SSL 证书。
采用加密的连接方式，即使你通过公网访问云数据库 MySQL, MariaDB, Percona，即使数据传输内容被截获，传输内容也是被加密的，无法被识别。

## 注意事项
* 新购实例 SSL 功能是默认关闭的，如果要启用，需要手动开启

## 操作步骤
1. 登录[数据库控制台](https://rds-console.jdcloud.com/rds)
2. 点击需要设置SSL证书的实例名称进入实例详情，点击开启SSl开关进行SSL证书开启。
3. 点击下载 [SSL 证书](https://jddb-common-public.s3.cn-north-1.jdcloud-oss.com/jdcloud-rds-ca.pem)
4. 下载完 SSL 证书之后，就可以使用加密的连接方式访问云数据库 MySQL

> 下面以 MySQL 5.7 为例，通过命令行的方式连接数据库

```SQL
# SSL 证书为上一步下载的证书文件所在路径

mysql -h [域名] -P [端口] -u [用户名] -p [密码] --ssl-ca [SSL 证书]
```

当成功连接上云数据库 MySQL 之后，就表示加密的连接已经成功建立

