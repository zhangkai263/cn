## 公网访问
京东云云搜索Elasticsearch尚未支持公网访问ES实例的功能，如果您需要对外提供服务，提供对外直接访问的接口，可以采用主机+反向代理+安全组设置白名单的方式对外提供服务。

### 操作说明
1. 登录京东云[云主机控制台](https://cns-console.jdcloud.com/host/compute/list)创建一台和云搜索Elasticsearch集群实例处于同一个VPC的云主机，并[绑定公网IP](https://docs.jdcloud.com/cn/virtual-machines/associate-elastic-ip)。</br>
2. 在云主机上安装反向代理nginx，并配置转发到es实例的地址。下面以CentOS7的系统的云主机为例来说明如何安装nginx和配置反向代理，详细配置参数请参考[nginx文档](http://nginx.org/en/docs/configure.html)。</br>

```
# yum update      //更新库和必要的支持

# wget http://nginx.org/download/nginx-1.13.6.tar.gz    //下载nginx

# tar -zvxf nginx-1.13.6.tar.gz     //解压缩

# cd nginx-1.13.6   

# ./configure

# make && make install    //可执行文件会安装在/usr/sbin/nginx (默认配置)

# cd /usr/local/nginx/sbin/

# ./nginx                     //启动nginx,配置文件位置/usr/local/nginx/conf/nginx.conf
```


3. 前往[云主机安全组](https://cns-console.jdcloud.com/host/netSecurity/list)


创建安全组并绑定云主机[绑定云主机](https://docs.jdcloud.com/cn/virtual-machines/associate-security-group)

由于云主机的安全组默认是全部禁止，因此在安全组详情页设置[进入流量规则](https://docs.jdcloud.com/cn/virtual-machines/configurate-inbound-rules)和[出流量规则](https://docs.jdcloud.com/cn/virtual-machines/configurate-outbound-rules)  白名单，完成后即可通过该主机作为代理访问云搜索Elasticsearch集群实例。

![查询1](https://github.com/jdcloudcom/cn/blob/Elasticsearch/image/Internet-Middleware/JCS%20for%20Elasticsearch/public1.png)

![查询1](https://github.com/jdcloudcom/cn/blob/Elasticsearch/image/Internet-Middleware/JCS%20for%20Elasticsearch/public2.png)
