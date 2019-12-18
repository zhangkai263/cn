## 安装业务应用日志采集插件 

在控制台已创建对应的日志集日志主题和采集配置。选择需要采集业务应用日志的云主机（仅支持Linux类主机），登录该云主机。

整体流程：

- 在控制台中创建日志集，日志主题，并添加采集配置。
- 创建子用户，并完成授权，以便获取AKSK。
- 登录云主机，安装agent。

### 一、授权步骤

1.创建子用户。

2.创建策略

- 进入控制台管理->访问控制页面，选择策略管理。
- 点击“创建策略”，输入策略名及描述，资源类型选择**日志服务**，访问权限默认允许，操作权限选择**describeInstanceCollectConfs**和**describeLogdCA**，资源选择根据自身需求选择全部或者指定部分资源。
- 点击“创建策略”，完成策略创建。

3.授予子用户上述策略。

### 二、Agent安装步骤

1. 配置credential文件     
- 创建 ~/.jdcloud/logs_credentials.yml 文件     
- 编缉并保存logs_credentials.yml文件，文件内容为： 

```
ak: xxxxxxx(填写子用户AccessKeyID)
sk: xxxxxxx(填写子用户AccessKeySecret)   
```
**注：**

- 建议使用子用户AKSK，以便进行权限范围控制。
- AKSK获取方式：在访问控制中点击用户管理，选择子用户，进入用户详情，点击安全凭证，即可看到该子用户的AKSK。（如果暂无AKSK，可点击创建AccessKey）
- ak（键值对之间必须要有空格），否则会读取ak。如: ak:(空格)xxxxxx


2.复制安装命令至云主机。  

`curl -fsSL https://deploy-code-vpc.jdcloud.com/dl-ifrit-agents/install | bash -s jdcloud-logs-agent`

3.敲击回车键，执行安装操作。   
 	
 ![image](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/LogCollection/logs-agent-install-1.png)
  
4.等待1-3分钟，执行以下命令验证agent是否安装成功。

`ps -ef | grep jdcloud-logs-agent`

5.进程存在则说明安装成功。 示例如下： 

 ![image](https://raw.githubusercontent.com/jdcloudcom/cn/zhangwenjie-only/image/LogService/LogCollection/logs-agent-install-2.png)

**注：如果安装失败，1-3分钟后重新执行安装命令。多次失败，请联系客服。**
