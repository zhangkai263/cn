# 创建临时令牌

 **两种方式**

**一、通过控制台获取**

1. 打开[弹性计算-容器镜像仓库-注册表](https://cns-console.jdcloud.com/host/containerregistry/list)，点击获取临时令牌，您可以使用临时令牌完成Docker客户端的授权认证；一个小时内最多申请5个临时令牌  
 ![](https://github.com/jdcloudcom/cn/blob/edit/image/Elastic-Compute/Container-Registry/获取临时令牌.png)   
 2. 设置临时令牌的有效期：默认为12小时；范围为1~24小时的整数。点击确定  
 3. 弹窗“下载临时令牌”，单击“下载.xlsx文件”，将临时令牌下载到本地，文件名“registry名称-token.xlsx”。或者复制保存信息。  
![](https://github.com/jdcloudcom/cn/blob/edit/image/Elastic-Compute/Container-Registry/下载临时令牌.png)  
**注：关闭后，无法再次获取临时令牌的Docker客户端登录命令**

**二、通过京东云CLI获取**

 1. 安装最新版的[京东云CLI](https://docs.jdcloud.com/cn/cli/introduction)
 2. 通过以下命令获取临时令牌  
    `jdc cr get-authorization-token --region-id **** --registry-name ****`
