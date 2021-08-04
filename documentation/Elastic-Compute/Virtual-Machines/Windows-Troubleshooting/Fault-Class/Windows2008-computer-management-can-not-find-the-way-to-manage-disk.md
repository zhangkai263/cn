# Windows2008计算机管理找不到磁盘管理的处理方法
## **问题现象：**

Windows 2008服务器在计算机管理的存储里面，查看不到磁盘管理，无法对磁盘做管理。

![](C:\guanfagnwendang\cn\image\Elastic-Compute\Virtual-Machine\Windows\Windows2008计算机管理找不到磁盘管理的处理方法01.png)

## **问题原因：**

一般都是系统组策略中的磁盘管理服务被禁用导致的

## **解决办法：**

1.点击开始-运行-输入*gpedit.msc*，打开组策略。

![](C:\guanfagnwendang\cn\image\Elastic-Compute\Virtual-Machine\Windows\Windows2008计算机管理找不到磁盘管理的处理方法02.png)

2.依次点击【本地计算机策略】→【用户配置】→【管理模板】→【Windows组件】→【Microsoft 管理控制台】→【受限的/许可的管理单元】→双击【磁盘管理】。

![](C:\guanfagnwendang\cn\image\Elastic-Compute\Virtual-Machine\Windows\Windows2008计算机管理找不到磁盘管理的处理方法03.png)

3.点击【未配置】→【确定】。

![](C:\guanfagnwendang\cn\image\Elastic-Compute\Virtual-Machine\Windows\Windows2008计算机管理找不到磁盘管理的处理方法04.png)

4.打开命令提示符，执行*gpupdate*更新组策略。

![](C:\guanfagnwendang\cn\image\Elastic-Compute\Virtual-Machine\Windows\Windows2008计算机管理找不到磁盘管理的处理方法05.png)

如无法解决您的问题，请向我们提工单。

