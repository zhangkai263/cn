# Linux ssh登陆慢的两种原因分析

## 适用场景：

1.场景一：

​		远程ssh连接Linux云主机，在等待几十秒之后才会出现账号密码输入登录框。这是由于设置了Linux系统中/etc/ssh/sshd_config配置文件中的UseDNS参数为yes导致的，在ssh配置文件中该配置主要用于安全加固，服务器会先根据客户端的IP地址进行DNS PTR反向查询出客户端的主机名，然后根据查询出的客户端主机名进行DNS正向A记录查询，并验证是否与原始IP地址一致，通过此种措施来防止客户端欺骗，中间的查询过程导致了ssh连接慢。

2.场景二：

​		在修改了场景一中/etc/ssh/sshd_config配置文件中的UseDNS参数为no之后，远程连接ssh登录还是比较慢，是应为在此配置文件中，还有一个参数配置GSSAPIAuthentication也会导致登录慢。该配置项的含义是允许GSSAPI认证，属于ssh协议的一种认证方式。ssh协议有多种认证方式，平时常用的有密码认证、公钥认证等；一次ssh登陆到底用哪种认证方式是怎么决定的，这个取决于ssh的客户端和服务端的协商的结果，ssh服务端决定了支持哪些登陆方式。在登陆过程中经常协商之后有个认证的顺序，然后依次选择认证方式，直到认证成功，认证过程也会导致ssh连接慢。

## 解决方案：

1.编辑修改配置文件/etc/ssh/sshd_config，找到UseDNS选项，在注释掉的#UseDNS  yes下添加一行为#UseDNS  no 。	

```shell
vi /etc/ssh/sshd_config
#PermitUserEnvironment no
#Compression delayed
#ClientAliveInterval 0
#ClientAliveCountMax 3
#ShowPatchLevel no
#UseDNS yes
UseDNS no
#PidFile /var/run/sshd.pid
#MaxStartups 10:30:100
#PermitTunnel no
#ChrootDirectory none
```

2、找到 GSSAPIAuthentication选项，如果没有注释，将其#GSSAPIAuthentication yes 添加为GSSAPIAuthentication no ，并按：输入wq保存文件并退出。

```shell
# GSSAPI options
GSSAPIAuthentication no
GSSAPICleanupCredentials no
#GSSAPIStrictAcceptorCheck yes
#GSSAPIKeyExchange no
#GSSAPIEnablek5users no
```

3、重启SSH服务 */etc/init.d/sshd restart* 

注：如果客户端为Linux系统，需确保客户端做同样修改并重启生效。
