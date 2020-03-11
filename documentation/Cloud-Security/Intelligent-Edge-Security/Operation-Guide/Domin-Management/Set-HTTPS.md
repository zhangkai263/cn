# 设置HTTPS

点击域名进入配置页面，“资源信息”设置“通信协议”

## SSL数字证书

首先到SSL数字证书服务平台上传管理证书，在智能边缘安全控制台可根据证书名称选择域名对应的证书。

![SSL证书](/image/Intelligent-Edge-Security/SSL证书.png)

## 自定义证书

未在ssl数字证书服务平台上管理证书的，可在智能边缘安全控制台添加证书内容和秘钥，同时也可以同步到SSL数字证书服务管理平台，同步时必须对该证书设置名称。

![自定义证书](/image/Intelligent-Edge-Security/自定义证书.png)

## 跳转类型

1、默认表示：客户端协议是HTTP，则客户端到智能边缘安全节点的请求协议为HTTP，HTTPS同理；

2、HTTPS-->HTTP表示：客户端到智能边缘安全节点的原请求方式为HTTPS，强制重定向为HTTP；

3、HTTP-->HTTPS表示：客户端到智能边缘安全节点的原请求方式为HTTP强制重定向为HTTPS。

