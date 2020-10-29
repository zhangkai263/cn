# 配置 SSL 证书 
云数据库 PostgreSQL 连接方式支持明文的，也支持加密的，如果要支持加密的连接方式，需要在连接参数中配置 SSL 证书。
采用加密的连接方式，即使你通过公网访问云数据库 PostgreSQL ，即使数据传输内容被截获，传输内容也是被加密的，无法被识别。

## 注意事项
* 新购实例 SSL 功能是默认关闭的，如果要启用，需要手动开启

## 操作步骤
1. 点击下载 [SSL 证书](https://jddb-common-public.s3.cn-north-1.jdcloud-oss.com/jdcloud-rds-ca.pem)
2. 下载完 SSL 证书之后，就可以使用加密的连接方式访问云数据库 PostgreSQL 

> 下面以 PostgreSQL  11.6 为例，通过命令行的方式连接数据库

```
# SSL 证书为上一步下载的证书文件所在路径

psql -host [域名] -port [端口] -user [用户名] -dbname [数据库] -password [密码] -sslrootcert [SSL 证书路径]-sslmode=verify-ca
```

当成功连接上云数据库 PostgreSQL 之后，就表示加密的连接已经成功建立
