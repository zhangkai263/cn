# Nginx服务器安装证书

## **下载证书**

1、进入控制台，从左侧导航栏依次选择 **云安全** -> **SSL数字证书** -> **证书管理**，进入SSL数字证书管理页面

![证书列表页面](/image/SSL-Certification/证书列表页面.png)

2、选择需要下载的证书，点击右侧 **下载**，下载证书。

![下载对应格式的证书](/image/SSL-Certification/下载对应格式的证书.png)

## 创建目录

1、登录您的Nginx服务器，在Nginx安装目录（默认Nginx安装目录为/usr/local/nginx/conf）下创建**cert**目录，并将下载的证书文件和密钥文件拷贝到**cert**目录中。

## **修改nginx.conf文件**

1、修改Nginx安装目录/conf/nginx.conf文件。

找到以下配置信息：

```
# HTTPS server
  server {
  listen 443;
  server_name localhost;
  ssl on;
  ssl_certificate cert.pem;
  ssl_certificate_key cert.key;
  ssl_session_timeout 5m;
  ssl_protocols TLSv1 TLSv1.1 TLSv1.2;
  ssl_ciphers ALL:!ADH:!EXPORT56:RC4+RSA:+HIGH:+MEDIUM:+LOW:+SSLv2:+EXP;
  ssl_prefer_server_ciphers on;
  location / {
                                          
```

按照下文中注释内容修改nginx.conf文件：

```
# 以下属性中以ssl开头的属性代表与证书配置有关，其他属性请根据自己的需要进行配置。
server {
listen 443 ssl;   #SSL协议访问端口号为443。此处如未添加ssl，可能会造成Nginx无法启动。
server_name localhost;  #将localhost修改为您证书绑定的域名，例如：www.example.com。
root html;
index index.html index.htm;
ssl_certificate cert/domain name.pem;   #将domain name.pem替换成您证书的文件名。
ssl_certificate_key cert/domain name.key;   #将domain name.key替换成您证书的密钥文件名。
ssl_session_timeout 5m;
ssl_ciphers ECDHE-RSA-AES128-GCM-SHA256:ECDHE:ECDH:AES:HIGH:!NULL:!aNULL:!MD5:!ADH:!RC4;  #使用此加密套件。
ssl_protocols TLSv1 TLSv1.1 TLSv1.2;   #使用该协议进行配置。
ssl_prefer_server_ciphers on;   
location / {
root html;   #站点目录。
index index.html index.htm;   
}
}                     
```

2、保存nginx.conf文件后退出。

3、执行以下命令重启Nginx服务器。

```
nginx -s stop
nginx -s start
```

## 后续操作

证书安装完成后，可通过登录证书绑定域名的方式验证证书是否安装成功。

```
https://domain name   #domain name替换成证书绑定的域名
```

如果网页地址栏出现小锁标志，表示证书安装成功。