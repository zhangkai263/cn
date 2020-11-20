# Apache服务器安装证书

## **下载证书**

1、进入控制台，从左侧导航栏依次选择 **云安全** -> **SSL数字证书** -> **证书管理**，进入SSL数字证书管理页面

![证书列表页面](/image/SSL-Certification/证书列表页面.png)

2、选择需要下载的证书，点击右侧 **下载**，下载证书。

![下载对应格式的证书](/image/SSL-Certification/下载对应格式的证书.png)

## 创建目录

1、在**Apache**安装目录中新建cert目录，并将解压的Apache证书、 证书链文件和密钥文件拷贝到cert目录中。如果需要安装多个证书，需在**Apache**目录中新建对应数量的**cert**目录，用于存放不同的证书。

##  配置httpd.conf文件

1、修改httpd.conf配置文件。

1)在Apache安装目录下，打开Apache/conf/httpd.conf文件，并找到以下参数，按照下文中注释内容进行配置。

```
#LoadModule ssl_module modules/mod_ssl.so  #删除行首的配置语句注释符号“#”加载mod_ssl.so模块启用SSL服务，Apache默认是不启用该模块的。如果找不到该配置，请重新编译mod_ssl模块。
#Include conf/extra/httpd-ssl.conf  #删除行首的配置语句注释符号“#”。                 
```

2)保存httpd.conf文件并退出。

2、修改httpd-ssl.conf配置文件。

1)开Apache/conf/extra/httpd-ssl.conf文件并找到以下参数，按照下文中注释内容进行配置。 证书路径建议使用绝对路径。

**说明** 根据操作系统的不同，http-ssl.conf文件也可能存放在conf.d/ssl.conf目录中。

```
<VirtualHost *:443>     
    ServerName   #修改为申请证书时绑定的域名www.YourDomainName1.com。                    
    DocumentRoot  /data/www/hbappserver/public          
    SSLEngine on   
    SSLProtocol all -SSLv2 -SSLv3 # 添加SSL协议支持协议，去掉不安全的协议。
    SSLCipherSuite HIGH:!RC4:!MD5:!aNULL:!eNULL:!NULL:!DH:!EDH:!EXP:+MEDIUM   # 修改加密套件。
    SSLHonorCipherOrder on
    SSLCertificateFile cert/domain name1_public.crt   # 将domain name1_public.crt替换成您证书文件名。
    SSLCertificateKeyFile cert/domain name1.key   # 将domain name1.key替换成您证书的密钥文件名。
    SSLCertificateChainFile cert/domain name1_chain.crt  # 将domain name1_chain.crt替换成您证书的密钥文件名；证书链开头如果有#字符，请删除。
</VirtualHost>
 
#如果证书包含多个域名，复制以上参数，并将ServerName替换成第二个域名。 
<VirtualHost *:443>     
    ServerName   #修改为申请证书时绑定的第二个域名www.YourDomainName2.com。                    
    DocumentRoot  /data/www/hbappserver/public          
    SSLEngine on   
    SSLProtocol all -SSLv2 -SSLv3 # 添加SSL协议支持协议，去掉不安全的协议。
    SSLCipherSuite HIGH:!RC4:!MD5:!aNULL:!eNULL:!NULL:!DH:!EDH:!EXP:+MEDIUM   # 修改加密套件。
    SSLHonorCipherOrder on
    SSLCertificateFile cert/domain name2_public.crt   # 将domain name2替换成您申请证书时的第二个域名。
    SSLCertificateKeyFile cert/domain name2.key   # 将domain name2替换成您申请证书时的第二个域名。
    SSLCertificateChainFile cert/domain name2_chain.crt  # 将domain name2替换成您申请证书时的第二个域名；证书链开头如果有#字符，请删除。
</VirtualHost>
```

**说明：**需注意您的浏览器版本是否支持SNI功能，如果不支持，多域名证书配置将无法生效。

2)保存httpd-ssl.conf文件并退出。

3、重启Apache服务器使SSL配置生效。

在Apache的bin目录下执行以下命令：

1)停止Apache服务。

```
apachectl -k stop
```

2)开启Apache服务。

```
apachectl -k start
```

4、**可选：** 修改httpd.conf文件，设置HTTP请求自动跳转HTTPS。

在httpd.conf文件中的`<VirtualHost *:80> </VirtualHost>`中间，添加以下重定向代码。

```
RewriteEngine on
RewriteCond %{SERVER_PORT} !^443$
RewriteRule ^(.*)$ https://%{SERVER_NAME}$1 [L,R]
```

## 后续操作

证书安装完成后，可通过登录证书绑定域名的方式验证证书是否安装成功。

```
https://domain name   #domain name替换成证书绑定的域名
```

如果网页地址栏出现小锁标志，表示证书安装成功。