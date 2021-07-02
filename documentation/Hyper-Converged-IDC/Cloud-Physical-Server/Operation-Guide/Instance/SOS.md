## SOS带外控制台

### 背景

由于网络中断，安装错误，配置错误，内核升级，防火墙规则错误等原因，服务器无法通过SSH进行访问；用户新创建服务器未绑定EIP时也无法访问到服务器；服务器重启时无法看到kernel的输出信息；解决上述问题需要为用户提供一种类似传统tty的终端控制台，而这就是SOS（Serial Over SSH），即基于SSH协议的安全串口控制台。<br/>

使用SOS带外控制台前提条件：实例需要有有效的SSH登录密钥。<br/>
1、若实例（创建时）仅开启**密钥登录**，则登录SOS前需要用户登录手动设置密码；<br/>
2、若实例（创建时）关闭了**关联SSH密钥**功能，则不能直接进行**SOS**操作，需要**修复SOS**带外控制台；<br/>
3、修复SOS带外控制台的方式有两种：①、任意状态实例选择**修复SOS**操作，绑定有效SSH登录密钥；②、**重装系统**，开启并设置有效SSH登录密钥。<br/>
4、SOS带外控制台当前仅支持Linux操作系统，Windows操作系统服务器暂不支持。<br/>

### SOS

访问[实例控制台](https://cps-console.jdcloud.com/instance/basic/list)，或访问[京东云控制台](https://console.jdcloud.com/overview)点击左侧导航“智能IDC-云物理服务器”，进入基础网络实例列表或私有网络实例列表，选择已开启SSH密钥登录的目标实例，点击操作 - **SOS**。<br/>

#### 操作步骤

通过该操作获取SOS带外控制台，在终端中使用以下命令访问该服务器的带外控制台：<br/>
命令格式：ssh {instanceId}@sos.cpsoob-{az}.jdcloud.com，其中：<br/>
instanceId：创建实例分配的实例Id;<br/>
az：实例所在可用区;<br/>
获取命令后运行，打开一个终端窗口并输入SSH命令，待密钥认证通过后，可进入带外控制台，进入linux系统需要输入root账号及密码。<br/>

说明：<br/>
1、通过SOS登录linux控制台，需要root账号及密码。<br/>
①如果已经登录过系统并创建过其他账户，也可以使用其他账户名及密码;<br/>
②如果选择仅**密钥登录**，则需要用户手动修改密码才可访问SOS带外控制台;<br/>
2、SOS带外控制台只允许一个单独会话访问，不支持同时多个会话共享访问;<br/>
3、SOS带外控制台需要通过SSH密钥对用户身份认证，请确认创建实例时已经指定ssh密钥（若创建时未指定，可通过“SOS修复”操作指定SSH密钥），并在SSH客户端侧已设置好私钥。<br/>

#### 修复SOS 

访问[实例控制台](https://cps-console.jdcloud.com/instance/basic/list)，或访问[京东云控制台](https://console.jdcloud.com/overview)点击左侧导航“智能IDC-云物理服务器”，进入基础网络实例列表或私有网络实例列表，选择未开启“关联SSH密钥”的目标实例，点击操作 - **修复SOS**。<br/>

#### 操作步骤

通过该操作为实例关联SSH密钥，待修复完成后，该实例绑定SOS密钥，即可访问**SOS**获取带外控制台；<br/>

#### 手动修复SOS

若2021年7月1号之前创建的实例，需要手动修复SOS或者重装系统才能使用SOS带外控制台功能。<br/>

#### 操作步骤

手动修复SOS步骤如下：<br/>
编辑/etc/default/grub，为GRUB_CMDLINE_LINUX 选项添加 console=ttyS0,115200n8 <br/>
GRUB_CMDLINE_LINUX="console=tty0 console=ttyS0,115200n8 crashkernel=auto biosdevname=0 net.ifnames=0" <br/>
生成grub.cfg文件 <br/>
grub2-mkconfig -o /boot/grub2/grub.cfg <br/>
操作完以上步骤，需要重启实例后以上配置生效。<br/>

注意：若实例创建时仅支持密钥登录，用户需先将实例设置密码后，再进行手动修复SOS操作。<br/>



