# Linux系统配置SNAT

该方法介绍通过为VPC中Linux系统的云主机配置SNAT，实现无公网云主机通过有公网的云主机代理访问公网。

注：SNAT的云主机单独一个子网

使用SSH的方法登录一个已经绑定了公网IP的云主机。

![](../../../../../image/Elastic-Compute/Virtual-Machine/Linux/Linux%E7%B3%BB%E7%BB%9F%E9%85%8D%E7%BD%AESNAT01.png)

执行以下命令，开启IP转发功能。
```shell
sed -i 's/net.ipv4.ip_forward = 0/net.ipv4.ip_forward = 1/g' /etc/sysctl.conf
```
注意：如果表链的默认规则改成了drop，还需要执行以下命令。默认accept的情况，不需要执行此命令。
```shell
iptables -A FORWARD -d 10.242.1.0/24 -j ACCEPT
```
```shell
sysctl –p   #执行此命令使IP转发生效。
```
![](../../../../../image/Elastic-Compute/Virtual-Machine/Linux/Linux%E7%B3%BB%E7%BB%9F%E9%85%8D%E7%BD%AESNAT02.png)

执行以下命令，为iptables添加SNAT转换
```shell
iptables -t nat -I POSTROUTING -s 10.242.0.0/16 -j SNAT --to-source 10.242.1.3
```
其中10.242.0.0/16是虚拟网络的网段，10.242.1.3是SNAT主机的内网IP



为内网主机单独创建一个路由表，路由策略如图

![](../../../../../image/Elastic-Compute/Virtual-Machine/Linux/Linux%E7%B3%BB%E7%BB%9F%E9%85%8D%E7%BD%AESNAT03.png)

控制台vnc登陆一台只有内网的云主机10.242.0.3，实际测试已经可以访问公网了。

![](../../../../../image/Elastic-Compute/Virtual-Machine/Linux/Linux%E7%B3%BB%E7%BB%9F%E9%85%8D%E7%BD%AESNAT04.png)
