# 内网NTP服务
京东智联云为云主机提供内网NTP服务器，您只需进行相应配置即可与该NTP服务器同步。配置方法参考如下：

## 对于CentOS系统：

```shell
yum install ntpdate
ntpdate ntp.jcloudcs.com
```

## 对于Ubuntu系统：

```shell
sudo apt-get install ntpdate
sudo ntpdate ntp.jcloudcs.com
```

