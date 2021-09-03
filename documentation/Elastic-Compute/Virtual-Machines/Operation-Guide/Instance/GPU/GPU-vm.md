# 直通型GPU实例


## 下载并安装GPU驱动

### Windows系统


> 请注意，以下操作步骤仅为示例，请根据您使用的操作系统版本及需求选择安装。

以Windows 2008 R2 数据中心版为例，安装GPU驱动步骤如下：

1. 获取GPU驱动安装包：
	* 进入[NVIDIA官网](https://www.nvidia.cn/Download/index.aspx?lang=cn)；
	* 手动查找适用于实例的驱动程序，并单击**搜索**。筛选信息说明如下图所示。<br>![](https://img1.jcloudcs.com/cn/image/vm/GPUdriver1.png)
	* 确认无误后，单击**下载**按钮，下图是Windows Server 2008 R2的驱动截图。<br>![](https://img1.jcloudcs.com/cn/image/vm/GPUdriver2.png)
2. 安装GPU驱动：
	* Windows系统直接双击安装GPU驱动。
3. GPU驱动验证
	* 安装GPU驱动之前，设备管理器中的显卡信息是“3D 视频控制器”，如下图所示<br>![](https://img1.jcloudcs.com/cn/image/vm/GPUdriver3.png)
	* GPU显卡驱动成功安装后，显卡将在“显示适配器”折叠项中显示，如下图所示<br>![](https://img1.jcloudcs.com/cn/image/vm/GPUdriver4.png)

### Linux系统

> 请注意，以下操作步骤仅为示例，请根据您使用GPU类型、操作系统版本及具体需求选择安装。
		
以CentOS 7.6为例，安装GPU驱动步骤如下：

1. 获取GPU驱动安装包：
	* 进入[NVIDIA官网](https://www.nvidia.cn/Download/index.aspx?lang=cn)；
	* 手动查找适用于实例的驱动程序，并单击【搜索】。筛选信息说明如下图所示。<br>![](https://img1.jcloudcs.com/cn/image/vm/GPUdriver5new.png)
	* 确认无误后，两次单击【下载】按钮，下图是CentOS7.6的驱动截图。<br>![](https://img1.jcloudcs.com/cn/image/vm/GPUdriver6new.png)<br>![](https://img1.jcloudcs.com/cn/image/vm/GPUdriver6nnew.png)
	* 在CentOS 7.6中也可以通过以下命令直接下载上述驱动，其中下载链接可在上图中右键点击下载按钮获取：<br>
		```
		wget http://cn.download.nvidia.com/tesla/440.33.01/nvidia-driver-local-repo-rhel7-440.33.01-1.0-1.x86_64.rpm
		```
	
2. 安装GPU驱动依赖
	* 下载并安装kernel对应版本的kernel-devel和kernel-header包:
		* 通过 `uname -r` 命令查看CentOS 7.6中的kernel版本为：3.10.0-693.17.1.el7.x86_64
		* 下载并安装kernel版本对应的Kernel-devel包及对应的kernel-header包
		
		> 需要特别注意下载的kernel-devel，kernel-header版本要与当前运行的kernel版本完全一致，否则gpu驱动无法正常安装使用。
		
	* 安装完成后，运行`rpm -qa | grep $(uname -r)`命令，出现如下类似信息则说明安装成功 ：
		
		```
		# rpm -qa | grep $(uname -r)
		kernel-3.10.0-957.el7.x86_64
		kernel-headers-3.10.0-957.el7.x86_64
		kernel-devel-3.10.0-957.el7.x86_64
		```
		
3. 安装下载的gpu驱动
	* 请按照Nvidia驱动下载页中**其他信息**指导步骤安装，下图为CentOS 7.6提示的操作信息，请以页面实际显示操作。<br>![](https://img1.jcloudcs.com/cn/image/vm/GPUdriver11.png)

4. GPU驱动验证
	* 安装完成后，执行以下命令`nvidia-smi`
	* 若出现下图类似信息则说明安装成功。<br><div align="center"><img src="https://img1.jcloudcs.com/cn/image/vm/GPUdriver10new.png" width="700"></div>

	
