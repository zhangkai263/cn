# Windows系统SQL镜像登陆方法

京东智联云部分Windows镜像系统自带微软SQL Server数据库，客户在第一次登陆SQL Server时可能会遇到无法登陆的情况；

![](../../../../../image/Elastic-Compute/Virtual-Machine/Windows/Windows%E7%B3%BB%E7%BB%9FSQL%E9%95%9C%E5%83%8F%E7%99%BB%E9%99%86%E6%96%B9%E6%B3%9501.png)

![](../../../../../image/Elastic-Compute/Virtual-Machine/Windows/Windows%E7%B3%BB%E7%BB%9FSQL%E9%95%9C%E5%83%8F%E7%99%BB%E9%99%86%E6%96%B9%E6%B3%9502.png)

遇到这个问题需要您修改服务器名称需填“.”或当前实例名称。

![](../../../../../image/Elastic-Compute/Virtual-Machine/Windows/Windows%E7%B3%BB%E7%BB%9FSQL%E9%95%9C%E5%83%8F%E7%99%BB%E9%99%86%E6%96%B9%E6%B3%9503.png)

![](../../../../../image/Elastic-Compute/Virtual-Machine/Windows/Windows%E7%B3%BB%E7%BB%9FSQL%E9%95%9C%E5%83%8F%E7%99%BB%E9%99%86%E6%96%B9%E6%B3%9504.png)

默认情况下，SQL Server数据库的sa账号是禁用的，如果客户需要sa登陆管理；请在安全性--登录名中找到sa，右键选择属性后，在弹出界面选择已启用，并且设置相应账号和密码，下次登陆就可以使用sa了。

![](../../../../../image/Elastic-Compute/Virtual-Machine/Windows/Windows%E7%B3%BB%E7%BB%9FSQL%E9%95%9C%E5%83%8F%E7%99%BB%E9%99%86%E6%96%B9%E6%B3%9505.png)

