快速开始
--------

### 安装 RT-Thread Studio

#### 下载 RT-Thread Studio 安装包

访问官网 [RT-Thread Studio
下载地址](https://www.rt-thread.org/page/studio.html)，在官网下载最新的
RT-Thread Studio 软件安装包。

#### 安装 RT-Thread Studio

双击安装包的 `.exe` 文件进行安装，安装界面如下图所示：

![install-studio](../../../../image/IoT/RT-Thread-for-JD/23d48a8a1c9e54aafd6e448c690df1ca.png)

install-studio

安装前需要接受许可协议，如下图所示：

![license](../../../../image/IoT/RT-Thread-for-JD/8559d2befecbf8deea9720ec596e6999.png)

license

指定安装路径时不要带有空格和中文字符，如下图所示：

![path-install](../../../../image/IoT/RT-Thread-for-JD/4b4384a4c23c4e34b6a3c5b22cc01423.png)

path-install

指定开始菜单文件夹名，如下图所示：

![start-name](../../../../image/IoT/RT-Thread-for-JD/340f1de9ae5e611c78676b388ca1546b.png)

start-name

开始安装

![start-install](../../../../image/IoT/RT-Thread-for-JD/db347cfa20c65c8c2a31aa96c4efaee3.png)

start-install

一直点击`下一步`直到最后点击`安装`按钮可开始进行安装，待安装完成后可直接点击`确定`即可启动
RT-Thread Studio，如下图所示：

![start-studio](../../../../image/IoT/RT-Thread-for-JD/5fc98c8262b6aaa0e705028bb0dc2b8f.png)

start-studio

或者取消`运行RT-Thread Studio`勾选，点击完成后，从桌面快捷方式启动 RT-Thread
Studio。桌面快捷方式如下图所示：

![studio-pic](../../../../image/IoT/RT-Thread-for-JD/1ec47e9c8c9a924adef4a1da275f3680.png)

studio-pic

第一次启动 RT-Thread Studio
需要进行账户登录，登录一次后会自动记住账号，后续不需要再登录，登录支持第三方账号登陆，登录界面如下：

![sign-in](../../../../image/IoT/RT-Thread-for-JD/c3e33967ecb26d11c6c1310838de58d3.png)

sign-in

### 新建项目

在`项目资源管理器`窗口内点击右键，选择`新建`子菜单`项目`，如下图所示：

![new-pro](../../../../image/IoT/RT-Thread-for-JD/7ebdd1989d96849ab32d90f9cd7bc6c3.png)

new-pro

在弹出的新建项目向导对话框中选择`RT-Thread项目`类型，然后点击`下一步`如下图所示：

![rtthread-pro](../../../../image/IoT/RT-Thread-for-JD/05fc48b2dd9856d5959b293699ecc111.png)

rtthread-pro

填写工程名，选择 RT-Thread 源码版本，选择对应的
BSP，然后点击`完成`按钮，如下图所示：

![done-pro](../../../../image/IoT/RT-Thread-for-JD/1f50e52a38285de5db2b7eac7618eebd.png)

done-pro

点击`完成`后，等待工程创建过程如下图所示：

![waitting](../../../../image/IoT/RT-Thread-for-JD/8c48c19b13a29998c4955df5f2a270aa.png)

waitting

工程创建成功后`项目资源管理器`窗口会出现刚创建的工程`test`，如下图所示：

![test-pro](../../../../image/IoT/RT-Thread-for-JD/cd97512a8632e359658d4de110ffe268.png)

test-pro

### 配置项目

双击`RT-Thread Settings`文件，打开 RT-Thread
项目配置界面，配置界面默认显示软件包以及组件和服务层的架构配置图界面，如下图所示：

![setting](../../../../image/IoT/RT-Thread-for-JD/de537e7639ca9e98dadabf5f15eba812.png)

setting

点击架构图配置界面右侧侧栏按钮，即可打开配置树配置界面，如下图所示：

![tree-set](../../../../image/IoT/RT-Thread-for-JD/a856c17d66ae5ba89896e3276b51fb54.png)

tree-set

配置完成后，保存配置退出配置界面后，RT-Thread Studio
会自动将配置应用到项目中，比如会自动下载相关资源文件到项目中并设置好项目配置，确保项目配置后能够构建成功，如下图所示：

![set-ok](../../../../image/IoT/RT-Thread-for-JD/a891e89df3fc2e262ffb8425a1d373d0.png)

set-ok

### 构建项目

点击工具栏上的`构建`按钮对项目进行构建。如下图所示：

![build-pro](../../../../image/IoT/RT-Thread-for-JD/6e6d6f40e1e624d4bed423fe1ee6c4d3.png)

build-pro

构建的过程日志在控制台进行打印，如下图所示：

![build-info](../../../../image/IoT/RT-Thread-for-JD/be2a1e4aa07c8614b543acb9d78d197b.png)

build-info

### 下载程序

当项目构建成功后，点击工具栏`下载程序`按钮旁的三角下拉框选择相应的烧写器，以`J-Link`烧写器为例，如下图所示：

![download-pro](../../../../image/IoT/RT-Thread-for-JD/0ff0ea67ebd5e28deb3f2890d56e488f.png)

download-pro

选择完烧写器后可直接点击`下载程序`按钮进行程序下载，下载日志会在控制台窗口打印，如下图所示：

![download-info](../../../../image/IoT/RT-Thread-for-JD/41946bd2909b7bf9660e1afaf7924f0d.png)

download-info

### 启动调试

选中`test`工程,然后点击工具栏`调试`按钮，如下图所示：

![debug-pro](../../../../image/IoT/RT-Thread-for-JD/dfa2d897e95b092f55af1bc9c604ee90.png)

debug-pro

当成功启动调试后，RT-Thread Studio
会自动跳转到调试透视图，在调试透视图可以进行各种调试功能操作。当停止调试后会自动跳转会
C 透视图，如下图所示：

![debug-see](../../../../image/IoT/RT-Thread-for-JD/52d8fa4596c3023578c2457b926182b1.png)

debug-see

### 视频教程

访问官网 [RT-Thread Studio
视频教程](https://www.rt-thread.org/page/video.html)，在官网观看视频教程。
