# IIS7.5开启500真实报错
Windows 云主机使用 IIS 作为 Web 服务的网站，访问时出现“500 - 内部服务器错误”如下图所示。此报错并没有输出具体的错误项，给排查问题带来一些困难，可以通过以下方法显示程序的真实报错，以便针对性分析网站错误。

![](C:\guanfagnwendang\cn\image\Elastic-Compute\Virtual-Machine\Windows\iis7.5开启500真实报错01.png)

## 具体步骤如下：

1.远程连接云主机，在菜单栏，选择 开始 > 管理工具 > Internet Information Service(IIS)管理器。

2.在左侧导航窗格单击 网站，找到报错站点，找到并打开 错误页 文件，如下图所示。

![](C:\guanfagnwendang\cn\image\Elastic-Compute\Virtual-Machine\Windows\iis7.5开启500真实报错02.png)

3.在右侧的 操作 栏里，单击 编辑功能设置。

![](C:\guanfagnwendang\cn\image\Elastic-Compute\Virtual-Machine\Windows\iis7.5开启500真实报错03.png)

4.在弹出的 编辑错误页设置 窗口中，选择 详细错误 后，单击 确定。

![](C:\guanfagnwendang\cn\image\Elastic-Compute\Virtual-Machine\Windows\iis7.5开启500真实报错04.png)

如无法解决您的问题，请向我们提工单。

