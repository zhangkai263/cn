# Linux系统升级时不升内核操作




RedHat/CentOS使用 yum update 更新时，默认会升级内核。但有些服务器硬件在升级内核后，新的内核可能会认不出某些硬件，要重新安装驱动，很麻烦。所以在生产环境中不要轻易的升级内核，除非您确定升级内核后不会出现麻烦的问题。

如果使用yum update更新时不升级内核，有两种方法：

## 方法一

​	直接在yum的命令后面加参数，这个命令只生效一次：

```shell
	yum update --exclude=kernel*
```

## 方法二

​	修改yum命令的配置文件，永久生效。

​	这里以 CentOS 6.6 为例来进行说明：

​	1、首先检查内核版本以及系统版本。

```shell
[root@localhost ~]# uname -r
2.6.32-504.el6.x86_64
[root@localhost ~]# cat /etc/issue
CentOS release 6.6 (Final)
Kernel \r on an \m
```

​	2、将配置文件保存备份。

```shell
[root@localhost ~]# cp /etc/yum.conf /etc/yum.conf.bak
```

​	3、编辑/etc/yum.conf文件。

```shell
[root@localhost ~]# vi /etc/yum.conf
```

![](C:\guanfagnwendang\cn\image\Elastic-Compute\Virtual-Machine\Linux\Linux系统升级时不升内核操作01.png)

​	4、在[main]的后面加入如下内容：

```shell
exclude=kernel*
```

![](C:\guanfagnwendang\cn\image\Elastic-Compute\Virtual-Machine\Linux\Linux系统升级时不升内核操作02.png)

​	5、按下Esc，输入下面命令进行保存：wq。

​	6、使用 yum update更新。	

```shell
[root@localhost yum.repos.d]# yum update
```

​	7、等到yum update更新完成之后重启电脑，再来检查内核版本。

```
[root@localhost ~]# uname -r
2.6.32-504.el6.x86_64

[root@localhost ~]# cat /etc/issue
CentOS release 6.8 (Final)
Kernel \r on an \m
```

![](C:\guanfagnwendang\cn\image\Elastic-Compute\Virtual-Machine\Linux\Linux系统升级时不升内核操作03.png)

可以看到yum update后系统版本升级了，内核版本没有升级。如果同时要禁止升级系统，则在其 [main] 部分末尾增加 “exclude=kernel centos-release”。



如无法解决您的问题，请向我们提工单。
