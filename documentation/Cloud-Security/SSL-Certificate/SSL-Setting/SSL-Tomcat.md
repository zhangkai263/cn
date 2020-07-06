# Tomcat服务器安装证书

## **下载证书**

1、进入控制台，从左侧导航栏依次选择 **云安全** -> **SSL数字证书** -> **证书管理**，进入SSL数字证书管理页面

![证书列表页面](/image/SSL-Certification/证书列表页面.png)

2、选择需要下载的证书，点击右侧 **下载**，下载证书。

![下载对应格式的证书](/image/SSL-Certification/下载对应格式的证书.png)

## **创建目录**

1、在**Tomcat**安装目录下新建**cert**目录，将解压的证书和密码文件拷贝到**cert**目录下。

##  **配置server.xml文件**

1、修改配置文件server.xml，并保存。

文件路径：Tomcat安装目录/conf/server.xml

定位到`<Connector port=”8443”`和`<Connector port="443"`标签内容，参照以下两部分内容修改server.xml文件：

```
<!--
  <Connector  port="8443"
protocol="HTTP/1.1"
  port="8443" SSLEnabled="true"
  maxThreads="150" scheme="https" secure="true"
  clientAuth="false" sslProtocol="TLS" />
-->
<Connector port="443"
    protocol="HTTP/1.1"
    SSLEnabled="true"
    scheme="https"
    secure="true"
    keystoreFile="domain name.pfx"
    keystoreType="PKCS12"
    keystorePass="证书密码"   
    clientAuth="false"
    SSLProtocol="TLSv1+TLSv1.1+TLSv1.2"
    ciphers="TLS_RSA_WITH_AES_128_CBC_SHA,TLS_RSA_WITH_AES_256_CBC_SHA,TLS_ECDHE_RSA_WITH_AES_128_CBC_SHA,TLS_ECDHE_RSA_WITH_AES_128_CBC_SHA256,TLS_RSA_WITH_AES_128_CBC_SHA256,TLS_RSA_WITH_AES_256_CBC_SHA256"/>
```

**说明**

其中**port**属性根据实际情况修改（https默认端口为443）。 如果您使用其他端口如：8443，则访问网站时必须输入https://www.domain.com:8443。
其中**keystoreFile**代表证书文件的路径，请用您证书的文件名替换domain name。

其中**keystorePass**代表证书密码，请替换为密码文件pfx-password.txt中的内容。

**可选：** 配置web.xml文件

开启HTTP强制跳转HTTPS。

在文件</welcome-file-list>后添加以下内容：

```
<login-config>  
    <!-- Authorization setting for SSL -->  
    <auth-method>CLIENT-CERT</auth-method>  
    <realm-name>Client Cert Users-only Area</realm-name>  
</login-config>  
<security-constraint>  
    <!-- Authorization setting for SSL -->  
    <web-resource-collection >  
        <web-resource-name >SSL</web-resource-name>  
        <url-pattern>/*</url-pattern>  
    </web-resource-collection>  
    <user-data-constraint>  
        <transport-guarantee>CONFIDENTIAL</transport-guarantee>  
    </user-data-constraint>  
</security-constraint>
```

2、重启Tomcat。

## 后续操作

证书安装完成后，可通过登录证书绑定域名的方式验证证书是否安装成功。

```
https://domain name   #domain name替换成证书绑定的域名
```

如果网页地址栏出现小锁标志，表示证书安装成功。

