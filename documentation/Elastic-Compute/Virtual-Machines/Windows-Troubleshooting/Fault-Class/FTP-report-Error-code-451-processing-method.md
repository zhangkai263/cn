# FTP报Error code 451处理方法
## 现象描述

使用Windows Server IIS搭建的FTP服务器在上传文件夹或者文件的时候，如果文件夹或者文件名称中英文混和，则会出现以下错误提示框：

![](../../../../../image\Elastic-Compute\Virtual-Machine\Windows\FTP报Error code 451处理方法01.png)

## 处理步骤

1.点击任务栏左下角红框处启动“服务器管理器”，点击右上角红框处工具按钮，选择IIS管理器。

![](../../../../../image\Elastic-Compute\Virtual-Machine\Windows\FTP报Error code 451处理方法02.png)

2.在IIS管理器左侧网站页面逐级选择FTP站点，点击右侧红框处高级设置。

![](../../../../../image\Elastic-Compute\Virtual-Machine\Windows\FTP报Error code 451处理方法03.png)

3.将“允许UTF8”从 “True” 改为 “False”，点击确定。

![](../../../../../image\Elastic-Compute\Virtual-Machine\Windows\FTP报Error code 451处理方法04.png)

4.点击右侧红框处**重新启动**按钮即可重启服务器， 问题可以得到解决。

![](../../../../../image\Elastic-Compute\Virtual-Machine\Windows\FTP报Error code 451处理方法05.png)

