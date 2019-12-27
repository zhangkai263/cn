## 安装业务应用日志采集插件 

在控制台已创建对应的日志集日志主题和采集配置。选择需要采集业务应用日志的云主机（仅支持Linux类主机），登录该云主机。

整体流程：

- 在控制台中创建日志集，日志主题，并添加采集配置。
- 登录云主机，安装agent。

### Agent安装步骤

1. 复制安装命令至云主机。  

`curl -fsSL https://deploy-code-vpc.jdcloud.com/dl-ifrit-agents/install | bash -s jdcloud-logs-agent`

3.敲击回车键，执行安装操作。   
 	
 ![image](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/LogCollection/logs-agent-install-1.png)
  
4.等待1-3分钟，执行以下命令验证agent是否安装成功。

`ps -ef | grep jdcloud-logs-agent`

5.进程存在则说明安装成功。 示例如下： 

 ![image](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/LogCollection/logs-agent-install-2.png)

**注：如果安装失败，1-3分钟后重新执行安装命令。多次失败，请联系客服。**
