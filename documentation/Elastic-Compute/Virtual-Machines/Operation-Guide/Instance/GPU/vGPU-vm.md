# vGPU实例

## vGPU驱动安装

### Linux系统

> C模式和Q模式的vGPU规格均支持Linux操作系统。
    
1. 确认系统已安装以下软件
  * gcc 
  * kernel-devel (请确保kernel-devel与kernel版本一致，如CentOS7.6对应kernel-devel-3.10.0-957.el7.x86_64)
2. 禁用nouveau
	如果系统中安装了nouveau(使用```lsmod | grep nouveau```查看)执行如下步骤，如未装直接转到第3步安装驱动。<br>
	* 打开 /etc/modprobe.d/blacklist.conf， 在文件内添加 `blacklist nouveau` <br>
	* 依次执行下述指令
		```Shell
		mv /boot/initramfs-$(uname r).img /boot/initramfs-$(uname -r)-nouveau.img
		dracut /boot/initramfs-$(uname -r).img $(uname -r)
		reboot
		```

3.  安装驱动
	* 下载Linux系统驱动，请登录实例后在系统内通过内网下载，地址：<br> https://vgpu-driver.s3-internal.cn-north-1.jdcloud-oss.com/NVIDIA-Linux-x86_64-430.46-grid.run
		
	* 在下载目录执行如下命令：
		```Shell
		sh ./NVIDIA-Linux-x86_64-430.46-grid.run
		reboot
		```

### Windows系统

> 仅Q模式的vGPU规格支持Windows操作系统，C模式不支持Windows操作系统。
驱动下载及安装:
* 请跟据Windows系统的版本下载对应的驱动程序：<br>
	* 适用于Win10、WindowsServer 2016、WindowsServer 2019的驱动版本 (内网下载)：https://vgpu-driver.s3-internal.cn-north-1.jdcloud-oss.com/431.79_grid_win10_server2016_server2019_64bit_international.exe <br>
	* 适用于Win7、Win8、WindowsServer 2008、WindowsServer 2012的驱动版本(内网下载)：https://vgpu-driver.s3-internal.cn-north-1.jdcloud-oss.com/431.79_grid_win7_win8_server2008R2_server2012R2_64bit_international.exe <br> 
* 下载完成后双击安装包，根据提示完成安装，安装完成后请重启Windows云主机。



## vGPU的License认证

vGPU的计算和图显功能均依赖GRID驱动和相应的License，每台vGPU主机运行均会向Server申请一个license，当停止主机后，license会释放回server。<br>
云上vGPU实例均未进行License激活，您需自行[向Nvidia购买License](https://www.nvidia.cn/data-center/buy-grid/)。同时，Nvidia 为企业客户免费提供长达90天的测试License，企业注册及免费试用申请请[前往NVIDIA官网](https://enterpriseproductregistration.nvidia.com/?LicType=EVAL&ProductFamily=vGPU)。<br>
* C模式为计算模式，适用于AI、深度学习、科学计算等场景，所需License类型为vCS<br>
* Q模式为图显模式，适用于专业级图像处理、游戏渲染等场景，所需License类型为vDWS<br>

### 搭建license server服务器  

License Server必须确保vGPU虚机能够通过内网或者外网访问，建议搭建在您VPC内的云主机上。一台License Server可以提供最多15万的license请求(此数量请求下配置至少满足4C16G，可根据处理请求数调整服务器的配置), 下文以部署在京东云上的Linux云主机为例，使用一台8G16G的CentOS 7.6 云主机搭建License Server。

1. 为云主机安装图形界面
	License Server可以通过远程web管理也可以在本地进行管理。如想要在本地管理（在安装License Server的云主机上访问管理），需要为云主机安装图形界面（如仅需远程web管理，可跳过此步骤），指令如下：            
	```Shell
	yum groupinstall "GNOME Desktop" "Graphical Administration Tools" -y
	ln -sf /lib/systemd/system/runlevel5.target /etc/systemd/system/default.target                
	reboot
	```

2. 下载License Server安装文件

	```Shell
	wget https://vgpu-driver.s3-internal.cn-north-1.jdcloud-oss.com/setup.bin
	```
3. 安装License Server软件
	* 安装Java和tomcat
		* Linux默认已安装java，无须单独安装。
		* 依次执行如下指令安装tomcat：  
			```Shell
			yum install tomcat tomcat-webapps
			systemctl enable tomcat.service
			systemctl start tomcat.service
			```

	* 安装License Server
		运行 ` sh setup.bin -i console `
		参照下图进行安装：<br>![](https://img1.jcloudcs.com/cn/image/vm/vgpu-licenseserver1.png)

	* 安装完成后，执行以下指令：

		```Shell
		wget https://vgpu-driver.s3-internal.cn-north-1.jdcloud-oss.com/producer-settings.xml
		cp producer-settings.xml /opt/flexnetls/nvidia/producer-settings.xml
		systemctl stop flexnetls-nvidia.service
		systemctl start flexnetls-nvidia.service
		```
	* 配置License Server
		* 在安装License Server的云主机上打开配置页面（内网/外网远程访问请将localhost替换成/公网IP地址） http://localhost:8080/licserver, 记录下图所示的MAC地址。<br>![](https://img1.jcloudcs.com/cn/image/vm/vgpu-licenseserver2.png)
		* 登录NVIDIA官网”NVIDIA SOFTWARE LICENSING CENTER”页面，进入Register License Server页面,将获取到的MAC地址，输入“MAC address”中，并点击“Create”。
		* 创建完成后，进入分配license页面，在View Server页面单击“Map Add-Ons”，会显示您当前账号可以分配的License数量。
		* 在Qty to Add框中填入数量，然后点击Map Add-Ons即可完成对Server的License分配。
		* 完成后，点击“Download License File ”获得许可证文件（.bin格式）
		* 打开license server配置页面 http://localhost:8080/licserver, 依次点击：LicenseServer -> License Management，将上一步得到的许可证文件导入，即可完成特定数量的License配置。

### vGPU云主机认证
#### Linux系统

* 在/etc/nvidia目录下，执行` cp gridd.conf.template gridd.conf `，在gridd.conf文件中的如下位置填写license server的IP和端口：

	```Shell
	ServerAddress=主机IP
	# Description: Set License Server port number
	# Data type: integer
	# Format: <port>, default is 7070
	ServerPort=7070
	# Description: Set Backup License Server Address
	# Data type: string
	# Format: "<address>"
	BackupServerAddress=备机IP
	# Description: Set Backup License Server port number
	# Data type: integer
	# Format: <port>, default is 7070
	BackupServerPort=7070
	```
* 重启服务<br>
` systemctl restart nvidia-gridd.service `

* 确认license是否认证成功<br>
`grep gridd /var/log/messages`

* 如下图显示即表示vGPU云主机已认证成功 <br>
![](https://img1.jcloudcs.com/cn/image/vm/vgpu-licenseserver3.png)

#### Windows系统
* 桌面下点击右键，选择“NVIDIA控制面板”。<br>
* 在弹出页面的左侧菜单中选择“管理许可证”，填写License Server的IP地址（填写同VPC内，License Server主机的内网IP地址）和端口号7070。<br>
![](https://img1.jcloudcs.com/cn/image/vm/vgpu-licenseserver4.png)
