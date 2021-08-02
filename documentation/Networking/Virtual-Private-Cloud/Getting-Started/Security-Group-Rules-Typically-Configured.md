# 安全组规则典型配置

本文将详细介绍安全组的典型应用配置，覆盖的典型应用如下：

- [允许SSH远程连接Linux云主机](security-group-rules-typically-configured#user-content-1)
- [允许RDP远程连接Windows云主机](security-group-rules-typically-configured#user-content-2)
- [允许公网／内网PING云主机](security-group-rules-typically-configured#user-content-3)
- [允许云主机提供Web服务](security-group-rules-typically-configured#user-content-4)
- [允许云主机提供DNS服务](security-group-rules-typically-configured#user-content-5)
- [允许云主机提供FTP服务](security-group-rules-typically-configured#user-content-6)
- [允许云主机访问MySQL/Redis/SQL Server数据库](security-group-rules-typically-configured#user-content-7)
- [允许作为SQL Server服务器的云主机提供数据库服务](security-group-rules-typically-configured#user-content-8)


## **允许SSH远程连接Linux云主机**

<div id="user-content-1"> </div>

如果您希望创建的Linux云主机允许使用者通过SSH协议远程登录，在不更改SSH协议默认端口的前提下，可以通过配置以下入站规则实现此类访问：

| 规则方向 | 类型 | 协议 | 目标端口 | 源IP      | 策略 |
| -------- | ---- | ---- | -------- | --------- | ---- |
| 入站     | SSH  | TCP  | 22       | 0.0.0.0/0 | 接受 |



### **允许RDP远程连接Windows云主机** 

<div id="user-content-2"> </div>

如果您希望创建的Windows云主机允许使用者通过RDP协议远程登录，在不更改RDP协议默认端口的前提下，可以通过配置以下入站规则实现此类访问

| 规则方向 | 类型      | 协议 | 目标端口 | 源IP      | 策略 |
| -------- | --------- | ---- | -------- | --------- | ---- |
| 入站     | 自定义TCP | TCP  | 3389     | 0.0.0.0/0 | 接受 |



### 允许公网／内网PING云主机

<div id="user-content-3"> </div>

如果您希望通过PING命令来检查云主机公网／内网网络是否连通，进而排查网络故障，可以通过配置以下入站规则实现此类应用

| 规则方向 | 类型 | 协议 | 目标端口 | 源IP      | 策略 |
| -------- | ---- | ---- | -------- | --------- | ---- |
| 入站     | PING | ICMP | -        | 0.0.0.0/0 | 接受 |



### 允许云主机提供Web服务


<div id="user-content-4"> </div>

如果您希望创建的云主机对外提供Web服务，可根据服务类型为HTTP或HTTPS配置以下入站规则实现基本Web服务

| 规则方向 | 类型  | 协议 | 目标端口 | 源IP      | 策略 |
| -------- | ----- | ---- | -------- | --------- | ---- |
| 入站     | HTTP  | TCP  | 80       | 0.0.0.0/0 | 接受 |
| 入站     | HTTPS | TCP  | 443      | 0.0.0.0/0 | 接受 |

### **允许云主机提供DNS服务** 

<div id="user-content-5"> </div>

如果您希望创建的云主机提供DNS服务，可以通过配置以下入站规则实现此类服务 

| 规则方向 | 类型       | 协议 | 目标端口 | 源IP      | 策略 |
| -------- | ---------- | ---- | -------- | --------- | ---- |
| 入站     | DNS（TCP） | TCP  | 53       | 0.0.0.0/0 | 接受 |

### **允许云主机提供FTP服务**

<div id="user-content-6"> </div>

如果您希望使用 FTP 软件向云主机上传或下载文件，在云主机上安装FTP服务器程序后，可以通过配置以下入站规则实现FTP服务的认证及数据传输 

| 规则方向 | 类型      | 协议 | 目标端口 | 源IP      | 策略 |
| -------- | --------- | ---- | -------- | --------- | ---- |
| 入站     | 自定义TCP | TCP  | 20-21    | 0.0.0.0/0 | 接受 |

### 允许云主机访问MySQL/Redis/SQL Server数据库

<div id="user-content-7"> </div>

如果您希望创建的云主机可以访问京东智联云数据库服务，可以通过配置以下出站规则实现此类访问需求 

| 规则方向 | 类型      | 协议 | 目标端口 | 源IP      | 策略 |
| -------- | --------- | ---- | -------- | --------- | ---- |
| 出站     | 自定义TCP | TCP  | 1-65535  | 0.0.0.0/0 | 接受 |

### **允许作为SQL Server服务器的云主机提供数据库服务**

<div id="user-content-8"> </div>

如果您创建了带SQL Server数据库的Windows云主机，可以通过配置以下入站规则来允许其他服务器访问数据库

| 规则方向 | 类型      | 协议 | 目标端口 | 源IP      | 策略 |
| -------- | --------- | ---- | -------- | --------- | ---- |
| 入站     | 自定义TCP | TCP  | 1433     | 0.0.0.0/0 | 接受 |

```
注：如果希望限制访问服务的IP地址，可以在源IP处填写明确的IP地址或网段，如有多个IP地址可通过添加多条规则来实现
```
## 相关参考

- [安全组配置](../Operation-Guide/Security-Group-Configuration.md)
- [安全组概述](../Introduction/Features/Security-Group-Features.md)
- [使用限制](../Introduction/Restrictions.md)

