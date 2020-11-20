# 发布消息和消息推送

在控制台创建消息主题（Topic）后，用户可以通过控制台或者调用SDK来发布消息。 控制台主要用于调试和检验资源的可用性，生产环节建议使用SDK来进行消息的发送。

## 前提条件

- 已经创建主题和订阅，并且状态处于服务中。

- 已经创建了用户的AK和SK。

  

## 方式一：通过控制台发布消息和消息通知

1. 在主题列表找到想要发布消息的主题，点击操作列的“发布消息”。

2. 填写消息主题（可选），选择消息格式

   - 原文：所有终端节点发送相同的消息内容。【因为发送短信需要签名ID和模板ID，所以不建议有短信终端节点的主题用原文发送消息，因为其他类型的终端节点也会收到签名ID和模板ID，而不是短信模板里的内容】
   - Json：可自定义选择不同终端节点的消息内容。【适用短信终端节点等所有类型的终端节点，可参考[消息发布](../Operation-Guide/Message-Management/Publish-Message.md)】

3. 填写消息属性，可以为消息设置一些消息属性方便订阅者通过筛选策略筛选消息，或者只是为不同消息分类。

   - 消息属性数量限制为10个，消息属性的所有组件都包括在消息大小限制中，最大为256KB。
   - 消息属性名称可以包含以下字符：A-Z、a-z、0-9、下划线 (_)、连字符 (-) 和句点 (.)。
   - 说明：
     - 1.最长可为 256 个字符
     - 2.必须在消息的所有属性名中唯一
     - 3.不能以句点开头或结尾
     - 4.序列中不能有连续句点
   - 消息属性数据类型：支持的类型包括 String、String.Array、Number 和 Binary。
   - 消息属性的值：按照提示填写相应的内容，如果属性类型是 "String.Array"请将该数组放入方括号 “[]” 内。在该数组内，将字符串值加入双引号内。、

4. 选择”发布消息“，消息将发布到主题。

5. 接收消息：订阅终端之后就会收到刚才发布到主题的消息，订阅者可以登陆订阅终端查看。




## 方式二：通过SDK发布消息和接收消息

SDK推荐您使用AWS SNS SDK, 京东云队列服务支持了AWS SNS SDK的接口。在使用SDK的时候，您需要配置4个参数：Accesskey、Secretkey、Endpoint和Region。其中AK&SK您在之前[AccessKey管理页面](https://uc.jdcloud.com/account/accesskey)已经创建，Endpoint和Region您可以点击控制台“接入点地址”获取, Endopint为一个HTTP/S的地址，Region为所选地域的英文代号，如下图所示。



以Go SDK为例进行说明，其他方式及开发语言请参考[其他章节](../SDK-Rerference/SDK-Overview.md)。

1.安装AWS SDK for Go

```
go get github.com/aws/aws-sdk-go

```

2.初始化，将AK&SK、接入点地址和Region信息填入。


```Go

var ses *session.Session
 regionId := Config().Region
 accessKey := Config().AccountConfig.AccessKey
 secretKey := Config().AccountConfig.SecretKey
 endPoint := Config().JnsServerConfig.JnsServer

ses, _ = session.NewSession(&aws.Config{
   Region: aws.String(regionId),
   Credentials: credentials.NewStaticCredentials(accessKey, secretKey, ""),
   Endpoint: aws.String(endPoint),
   //DisableSSL: aws.Bool(true),
  })

 _, err := ses.Config.Credentials.Get()
 if err != nil {
  log.Fatal("凭据创建失败")
 }
 client := sns.New(ses)
                  
   
```

