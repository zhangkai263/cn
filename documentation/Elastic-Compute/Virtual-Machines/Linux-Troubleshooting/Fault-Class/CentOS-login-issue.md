# CentOS正确输入用户名仍无法登录
1.有时在登录CentOS云主机时会遇到正确输入用户名和密码之后，无法登录系统，自动跳转回输入用户名和密码	界面，再次输入后仍不能登录，如此反复循环。如图一和图二所示：
![](https://github.com/jdcloudcom/cn/blob/cn-VirtualMachine-Linux/image/Elastic-Comput/Virtual-Machine/Linux/CentOS%E6%AD%A3%E7%A1%AE%E8%BE%93%E5%85%A5%E7%94%A8%E6%88%B7%E5%90%8D%E4%BB%8D%E6%97%A0%E6%B3%95%E7%99%BB%E5%BD%9501.png)
![](https://github.com/jdcloudcom/cn/blob/cn-VirtualMachine-Linux/image/Elastic-Compute/Virtual-Machine/Linux/CentOS%E6%AD%A3%E7%A1%AE%E8%BE%93%E5%85%A5%E7%94%A8%E6%88%B7%E5%90%8D%E4%BB%8D%E6%97%A0%E6%B3%95%E7%99%BB%E5%BD%9502.png)

2.这种情况一般是/etc/pam.d/login文件中缺少session required /lib64/security/pam_limits.so内容或者该内容	存在但pam_limits.so文件的路径不正确导致（有问题的路径为/lib/security/pam_limits.so或pam_limits.so，	如图三和图四所示）需要进入单用户模式进行修改。
![](https://github.com/jdcloudcom/cn/blob/cn-VirtualMachine-Linux/image/Elastic-Compute/Virtual-Machine/Linux/CentOS%E6%AD%A3%E7%A1%AE%E8%BE%93%E5%85%A5%E7%94%A8%E6%88%B7%E5%90%8D%E4%BB%8D%E6%97%A0%E6%B3%95%E7%99%BB%E5%BD%9503.png)
![](https://github.com/jdcloudcom/cn/blob/cn-VirtualMachine-Linux/image/Elastic-Compute/Virtual-Machine/Linux/CentOS%E6%AD%A3%E7%A1%AE%E8%BE%93%E5%85%A5%E7%94%A8%E6%88%B7%E5%90%8D%E4%BB%8D%E6%97%A0%E6%B3%95%E7%99%BB%E5%BD%9504.png)

3.在远程连接【VNC】页面点击右上角【Send CtrlAltDel】重启云主机，按照文档（https://opms.jcloud.com/archives/22	0）给出的方法进入单用户模式。
执行命令 *vi /etc/pam.d/login*编辑login文件。
查找文件最后一行是否有session    required    /lib64/security/pam_limits.so内容且未被注释（行首没有#则未被注释），如果没有该行，则按i进入insert模式添加该内容。
如果有session    required    /lib/security/pam_limits.so或session    required    pam_limits.so内容，则将其修改为session    required    /lib64/security/pam_limits.so。
修改完毕后`wq`保存文件并退出`vi`，如图五所示：
![](https://github.com/jdcloudcom/cn/blob/cn-VirtualMachine-Linux/image/Elastic-Compute/Virtual-Machine/Linux/CentOS%E6%AD%A3%E7%A1%AE%E8%BE%93%E5%85%A5%E7%94%A8%E6%88%B7%E5%90%8D%E4%BB%8D%E6%97%A0%E6%B3%95%E7%99%BB%E5%BD%9505.png)
在单用户模式输入`reboot`重启云主机，如图六所示：
![](https://github.com/jdcloudcom/cn/blob/cn-VirtualMachine-Linux/image/Elastic-Compute/Virtual-Machine/Linux/CentOS%E6%AD%A3%E7%A1%AE%E8%BE%93%E5%85%A5%E7%94%A8%E6%88%B7%E5%90%8D%E4%BB%8D%E6%97%A0%E6%B3%95%E7%99%BB%E5%BD%9506.png)
重新启动后，正确输入用户名密码可以登录系统。

