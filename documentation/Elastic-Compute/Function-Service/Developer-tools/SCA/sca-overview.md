# SCA (Serverless Cloud Application)

## 简介

[SCA CLI](https://github.com/jdcloud-serverless/sca)是京东云无服务器云应用（Serverless Cloud Application，SCA）命令行工具。对京东云serverless应用服务提供更加便捷的本地管理功能，包括本地函数管理：本地测试、打包、部署、云端测试等。          
sca cli 通过一个函数模板配置文件template.yaml，完成函数资源的描述，并基于配置文件实现本地代码及配置部署到云端的过程。

## 运行环境

sca cli支持Linux、Mac运行；    
sca cli基于go开发完成，您只需下载安装包，即可安装使用。    

## 开始使用

### 安装 sca CLI（Linux/Mac）

1.在git上下载安装包至本地；  
2.执行以下命令，验证sca版本。  
` sca version `      
`JD Serverless Cloud Application Version: 0.0.1`

### 配置账号信息  
sca安装完成后，进行初始化配置，将JDCloud的账号信息同步至sca中。       
`$ sca config `        
配置信息如下：  
地域：产品地域信息，目前只支持华北地域；  
账户ID：用户的账户ID可在用户管理--基本资料中获取；  
SecretID 及 SecretKey：用户的AK、SK信息可在用户管理--Access Key管理中获取。  
详情参考：[sca config](https://github.com/jdcloud-serverless/sca/blob/master/doc/usage/config.md)


### 安装Docker

SCF CLI 支持使用 Docker 容器管理工具启动和使用容器，作为在本地运行函数代码的环境。SCF CLI 的 local 命令将会使用 Docker 的管理接口实现相关交互。     
如果您需要使用本地调试、运行能力，请确保 Docker 已正确安装。
如果您当前不需要使用 Docker 或者计划稍后再安装 Docker 时，可跳过此步骤。

#### 在 Mac 上安装 Docker
##### 针对 Apple Mac OS Sierra 10.12 及以上版本
1.在 [docker-ce-desktop 的 Mac 版本下载地址](https://hub.docker.com/editions/community/docker-ce-desktop-mac)，下载 docker.dmg 安装包，双击安装文件，启动安装。  
2.安装完成后，顶部状态栏上将出现 Docker 的小鲸鱼标识，即表示 Docker 已经完成启动。  

##### 针对 Apple Mac OS Sierra 10.12 以下版本
针对 Apple Mac OS Sierra 10.12 以下版本，需要使用 Docker Toolbox 实现 Docker 的安装。  
1.在[Docker Toolbox 概览页面](https://docs.docker.com/toolbox/overview/)，获取 Mac 版本的 Toolbox 下载地址。  
2.根据 Toolbox 提供的[ macOS 安装指导](https://docs.docker.com/toolbox/toolbox_install_mac/)，双击 Toolbox 安装工具，安装 Toolbox。  
3.完成安装后，双击 Launchpad 中新增的 Docker Quickstart Terminal 图标，启动 Docker  。
当 Docker 启动完成后，会出现终端窗口等待输入。此时，您可以通过输入 docker version 命令确定 Docker 是否安装成功、启动成功。  

#### 在 Linux 上安装 Docker
在Linux 中安装Docker，可以通过不同发行版中带有的包管理工具完成安装，也可以通过二进制包完成安装。不同发行版本的 Linux 安装方法如下：

##### CentOS 操作系统
获取 [CentOS版本](https://docs.docker.com/install/linux/docker-ce/centos/)的 Docker 安装包。  
执行 sudo yum install docker-ce docker-ce-cli containerd.io 命令，安装 Docker。
##### Debian 操作系统
获取 [Debian版本](https://docs.docker.com/install/linux/docker-ce/debian/)的 Docker 安装包。  
执行 sudo apt-get install docker-ce docker-ce-cli containerd.io 命令，安装 Docker。
##### Fedora 操作系统
获取 [Fedora版本](https://docs.docker.com/install/linux/docker-ce/fedora/)的 Docker 安装包。  
执行 sudo dnf install docker-ce docker-ce-cli containerd.io 命令，安装 Docker。
##### Ubuntu 操作系统 
获取 [Ubuntu版本](https://docs.docker.com/install/linux/docker-ce/ubuntu/) 的 Docker 安装包。  
执行 sudo apt-get install docker-ce docker-ce-cli containerd.io 命令，安装 Docker。
##### 二进制包
获取 [二进制包](https://docs.docker.com/install/linux/docker-ce/binaries/) 。  
解压并运行二进制包，即可完成 Docker 的下载安装和启动。


### 初始化项目       
通过 [初始化项目](https://github.com/jdcloud-serverless/sca/blob/master/doc/usage/init.md) ，用户可快速创建一个简单的模板，包括代码文件、配置文件，基于模板可进一步进行配置及开发后，可直接打包部署云端。
`sca init`    

### 配置文件template.yaml
sca cli 通过一个函数模板配置文件template.yaml，完成函数资源的描述，并基于配置文件实现本地代码及配置部署到云端。格式如下：
```
ROSTemplateFormatVersion: "2019-12-24"
Transform: JDCloud::Serverless-2019-11-10
Resources:
  function-sca1224:
    Type: JDCloud::Serverless::Function
    Properties:
      Handler: index.handler
      Timeout: 280
      MemorySize: 128
      Runtime: python3.6
      Description: This is a template of function which name is "test-function"
      CodeUri: ./
      Env: {}
      Role: ""
      Policies: ""
      VPCConfig:
        Vpc: ""
        Subnet: ""
      LogConfig:
        LogSet: ""
        LogTopic: ""
      Events: []
```

### 验证配置文件
 [验证template.yaml文件](https://github.com/jdcloud-serverless/sca/blob/master/doc/usage/validate.md)                
` sca validate `        

### 本地测试
通过 [本地调试函数](https://github.com/jdcloud-serverless/sca/blob/master/doc/usage/local.md) ，在部署前，用户可在本地的模拟环境中运行代码，发送模拟测试事件，验证函数执行，获取运行信息及日志。在运行本地调试前，需确保本地环境中已经安装并启动 Docker。      
` sca local `  

### 打包部署
根据指定的函数模板配置文件，将配置文件中的指定代码包、函数配置等信息， [打包部署到云端](https://github.com/jdcloud-serverless/sca/blob/master/doc/usage/deploy.md) 。      
` sca deploy ` 

### 函数管理
通过函数管理，您可以[查看云端函数列表](https://github.com/jdcloud-serverless/sca/blob/master/doc/usage/function_list.md)、[查询函数配置](https://github.com/jdcloud-serverless/sca/blob/master/doc/usage/function_info.md)，并可以[删除函数](https://github.com/jdcloud-serverless/sca/blob/master/doc/usage/function_delete.md)。
`sca function list`  查看云端已存在函数资源的列表。                
`sca function info`  查看已部署云端函数配置。             
`sca function del`   删除已部署云端函数。          

### 云端调用函数
通过invoke命令用户可于本地[调用云端函数](https://github.com/jdcloud-serverless/sca/blob/master/doc/usage/invoke.md)，进行测试验证。       
` sca invoke `


### 云端日志
通过[查询云端日志命令](https://github.com/jdcloud-serverless/sca/blob/master/doc/usage/logs.md)，您可以查看云端函数执行日志。
`sca log`  查询指定云端函数某时段内的执行日志。              

