# 数据导入

本文档描述如何将数据从文件导入到 JCHDB 实例中 。

## 前提条件
1. 由于JCHDB 实例所在的主机不允许登录，因此需要一台云主机用于存储数据文件。 该云主机需要和JCHDB实例在同一VPC中, 并且开通了公网IP。

## 操作步骤
1. 登录到云主机中，安装下载客户端。 
- Ubuntu 或 Debian
```
sudo apt-get install apt-transport-https ca-certificates dirmngr
sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv E0C56BD4

echo "deb https://repo.clickhouse.tech/deb/stable/ main/" | sudo tee \
    /etc/apt/sources.list.d/clickhouse.list
sudo apt-get update

sudo apt-get install -y clickhouse-client
```

- Centos 或 Redhat
```
sudo yum install yum-utils
sudo rpm --import https://repo.clickhouse.tech/CLICKHOUSE-KEY.GPG
sudo yum-config-manager --add-repo https://repo.clickhouse.tech/rpm/clickhouse.repo
sudo yum install  clickhouse-client
```
2. 将数据文件通过FTP等方式上传到云主机中。
3. 使用下列命令进行数据导入
```
cat <data_file> | ./clickhouse-client --host=<host> --port=<port> --user=<username> --password=<password> --query="INSERT INTO <table_name> FORMAT <format>";
```
** 参数说明：**
- host: 实例的域名
- port：实例的TCP端口
- username：用户名，可在控制台中创建
- password：密码
- table_name：要导入的表名
- format：数据文件的格式，具体可参考ClickHouse [官方文档](https://clickhouse.tech/docs/zh/interfaces/formats/)
