# 安全组规则
安全组规则可控制允许到达与安全组相关联的实例的入站流量以及允许离开实例的出站流量。
## 安全组规则内容
* 类型：常用应用类型，例如SSH、PING 或HTTP 等，也可选择自定义TCP或UDP。
* 协议：根据应用类型选择，显示所属协议类型。
* 目标端口：

    - 若配置入站规则，目标端口指安全组内实例端口；若配置出站规则，目标端口指远端端口。
    - 端口取值1-65535，可填写单一端口如“22”或端口范围如“20-22”。
    - 如您在规则类型中选择常用应用，目标端口会直接显示为对应默认端口，不需要设置；如您选择自定义TCP/自定义UDP，可自定义端口范围。
    
* 源/目的IP：允许访问/被访问的IP地址或地址段（CIDR），IPv4地址，如填写0.0.0.0/0表示允许所有IP地址访问；Ipv6地址，如填写::/0表示允许所有IP地址访问。
* 策略：允许（默认且不允许修改）。
* 备注：标识规则用途，最多可输入256字符。

## 安全组规则限制
* 用户自行创建的安全组默认具备以下规则
   * 入方向：拒绝所有流量
   * 出方向：由于内部服务需要，开放TCP 80端口及UDP 67、68、161端口，其余流量均拒绝
* 安全组规则策略始终是“允许”；您无法创建“拒绝”访问的规则。
* 安全组是有状态的：如果您配置出站规则允许实例向外部发送一个请求，则无论入站安全组规则如何，都将允许该请求的响应流量流入，反之亦然。
* 您可以随时添加和删除规则。新的安全组策略会自动应用于与安全组相关联的实例。
## 常用端口
|端口|服务|说明
|:---|:---|:---|
|21|FTP|FTP服务所开放的端口，用于上传、下载文件。
|22|SSH|SSH端口，用于通过命令行模式或远程连接软件（例如PuTTY、Xshell、SecureCRT等）连接Linux实例。详情请参见使用用户名密码验证[连接Linux实例](http://docs.jdcloud.com/cn/virtual-machines/connect-to-linux-instance)。
|23|Telnet|Telnet端口，用于Telnet实例
|25|SMTP|SMTP服务所开放的端口，用于发送邮件。目前若要开放该端口需要提交工单申请。
|80|HTTP|用于网站服务例如 IIS、Apache、Nginx 等提供对外访问。
|110|POP3|POP3（邮件协议 3）服务开放的端口。
|137、138、139|NETBIOS 协议|其中137、138是 UDP 端口，当通过网上邻居传输文件时用这个端口。通过139端口进入的连接试图获得 NetBIOS/SMB 服务。这个协议被用于 Windows 文件和打印机共享和 SAMBA。
|143|IMAP|用于IMAP（Internet Message Access Protocol）协议，也是电子邮件的接收的协议。
|443|HTTPS|用于HTTPS服务提供访问功能。HTTPS是一种能提供加密和通过安全端口传输的一种协议。
|1433|SQL Server|SQL Server	SQL Server的TCP端口，用于供SQL Server对外提供服务。
|1434|SQL Server|SQL Server	SQL Server的UDP端口，用于向请求者返回SQL Server使用了哪个TCP/IP端口。
|3306|MySQL|MySQL 数据库的默认端口，用于 MySQL 对外提供服务。
|3389|Windows Server Remote Desktop Services|Windows Server Remote Desktop Services（远程桌面服务）端口，可以通过这个端口使用软件连接Windows实例。详情请参见[连接Windows实例](http://docs.jdcloud.com/cn/virtual-machines/connect-to-windows-instance)。
|8080|代理端口|8080端口同80端口，是被用于 WWW 代理服务的，可以实现网页浏览，经常在访问某个网站或使用代理服务器的时候，需要在IP地址后加上“:8080”端口号。另外安装 Apache Tomcat web server 服务后，默认的服务端口即8080。

## 安全组优先级
安全组无优先级，当一个实例关联多个安全组联时，将对每个安全组的规则进行聚合生效，根据聚合后的规则确定是否允许访问。

## 相关参考

[连接Linux实例](http://docs.jdcloud.com/cn/virtual-machines/connect-to-linux-instance)

[连接Windows实例](http://docs.jdcloud.com/cn/virtual-machines/connect-to-windows-instance)
