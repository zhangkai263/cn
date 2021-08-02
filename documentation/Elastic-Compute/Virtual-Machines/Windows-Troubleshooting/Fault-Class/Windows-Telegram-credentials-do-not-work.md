# Windows远程报凭据无法工作
## **问题现象：**

远程桌面连接Windows云主机出现如下图所示"凭据无法工作"错误。但是使用云主机控制台远程连接vnc功能登录正常。如图：

![](C:\guanfagnwendang\cn\image\Elastic-Compute\Virtual-Machine\Windows\Windows远程报凭据无法工作01.png)



## **问题原因：**

该问题通常是由于系统内部启用了【密码保护共享】特性引起的。



## **解决办法：**

用户依次打开控制面板→所有控制面板项→网络和共享中心→高级共享设置，然后如下图所示，在【密码保护的共享】特性下面选择【关闭密码保护共享】即可：

![](C:\guanfagnwendang\cn\image\Elastic-Compute\Virtual-Machine\Windows\Windows远程报凭据无法工作02.png)



如无法解决您的问题，请向我们提工单。
