# **业务安全访问控制**

场景：使用私有网络部署简单的WEB服务，如网站、博客等，通过配置安全组和网络ACL等虚拟防火墙，使WEB服务响应客户端请求，但阻止WEB服务访问internet，保证WEB服务的安全。

建议配置：VPC、子网、网络ACL、安全组、负载均衡、云主机、公网IP

![](/image/Networking/Virtual-Private-Cloud/Business-Security-Access-Control.png)

## 相关参考
- [网络ACL](../Features/Network-ACL-Features.md)
- [安全组概述](../Features/Security-Group-Features.md)
- [使用限制](../Restrictions.md)
- [常见问题](../../FAQ/FAQ.md)
- [配置安全组](../../Operation-Guide/Security-Group-Configuration.md)
- [配置ACL](../../Operation-Guide/Network-ACL-Configuration.md)
