# Windows防火墙允许禁止ping

注意：本文相关 Windows 配置及说明已在 Windows2012 64位操作系统中进行过测试。其它类型及版本操作系统配置可能有所差异，具体情况请参阅相应操作系统官方文档。

## 1.左下角点击开始，打开控制面板。

![](../../../../../image/Elastic-Compute/Virtual-Machine/Windows/Windows防火墙允许禁止端口访问01.png)

## 2.选择Windows防火墙，高级设置。 
![](../../../../../image/Elastic-Compute/Virtual-Machine/Windows/Windows防火墙允许禁止端口访问02.png)
![](../../../../../image/Elastic-Compute/Virtual-Machine/Windows/Windows防火墙允许禁止端口访问03.png)

## 3.左侧栏选择入站规则，中间栏双击选择文件和打印机共享（回显请求 - ICMPv4-In）。 
![](../../../../../image/Elastic-Compute/Virtual-Machine/Windows/Windows防火墙允许禁止端口访问04.png)

## 4.常规，操作，选择允许/阻止连接，来设置允许/禁止ping，确定即可生效。 
![](../../../../../image/Elastic-Compute/Virtual-Machine/Windows/Windows防火墙允许禁止端口访问05.png)

