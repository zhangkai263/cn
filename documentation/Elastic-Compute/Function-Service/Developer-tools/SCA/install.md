# 安装与配置

## 安装Docker

SCF CLI 支持使用 Docker 容器管理工具启动和使用容器，作为在本地运行函数代码的环境。SCF CLI 的 local invoke 命令将会使用 Docker 的管理接口实现相关交互。

如果您需要使用本地调试、运行能力，请确保 Docker 已正确安装。
如果您当前不需要使用 Docker 或者计划稍后再安装 Docker 时，可跳过此步骤。

### 在 Mac 上安装 Docker
#### 针对 Apple Mac OS Sierra 10.12 及以上版本
访问 docker-ce-desktop 的 Mac 版本下载地址。
下载 docker.dmg 安装包。
双击安装文件，启动安装。
安装完成后，顶部状态栏上将出现 Docker 的小鲸鱼标识，即表示 Docker 已经完成启动。

#### 针对 Apple Mac OS Sierra 10.12 以下版本
针对 Apple Mac OS Sierra 10.12 以下版本，需要使用 Docker Toolbox 实现 Docker 的安装。
访问 Docker Toolbox 概览页面，获取 Mac 版本的 Toolbox 下载地址。
根据 Toolbox 提供的 macOS 安装指导，双击 Toolbox 安装工具，安装 Toolbox。
完成安装后，双击 Launchpad 中新增的 Docker Quickstart Terminal 图标，启动 Docker。
当 Docker 启动完成后，会出现终端窗口等待输入。此时，您可以通过输入 docker version 命令确定 Docker 是否安装成功、启动成功。

### 在 Linux 上安装 Docker
Linux 中的 Docker，可以通过各个发行版中带有的包管理工具完成安装，也可以通过二进制包完成安装。各不同发行版本的 Linux 安装方法可见如下链接：

#### CentOS 操作系统
获取 [CentOS版本](https://docs.docker.com/install/linux/docker-ce/centos/)的 Docker 安装包。
执行 sudo yum install docker-ce docker-ce-cli containerd.io 命令，安装 Docker。
#### Debian 操作系统
获取 [Debian版本](https://docs.docker.com/install/linux/docker-ce/debian/)的 Docker 安装包。
执行 sudo apt-get install docker-ce docker-ce-cli containerd.io 命令，安装 Docker。
#### Fedora 操作系统
获取 [Fedora版本](https://docs.docker.com/install/linux/docker-ce/fedora/)的 Docker 安装包。
执行 sudo dnf install docker-ce docker-ce-cli containerd.io 命令，安装 Docker。
#### Ubuntu 操作系统
获取 [Ubuntu版本](https://docs.docker.com/install/linux/docker-ce/ubuntu/) 的 Docker 安装包。
执行 sudo apt-get install docker-ce docker-ce-cli containerd.io 命令，安装 Docker。
#### 二进制包
获取 [二进制包](https://docs.docker.com/install/linux/docker-ce/binaries/) 。
解压并运行二进制包，即可完成 Docker 的下载安装和启动。
