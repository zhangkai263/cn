# 创建资源

通知服务采取发布订阅消息模型，消息的发布和接收需要以主题和订阅为载体，故用户首先要创建通知服务中的主题（Topic），然后再创建订阅（Subscription）指定发送的终端地址，最后发送消息到指定的主题，而订阅者可以在终端节点接收到消息推送（Push），对消息进行消费。

## 前提条件

- 已注册京东云账号，并完成实名认证，且保证账户处于正常状态，没有在黑名单中。如果还没有账号请 [注册](https://accounts.jdcloud.com/p/regPage?source=jdcloud&ReturnUrl=//uc.jdcloud.com/passport/complete?returnUrl=http://uc.jdcloud.com/redirect/loginRouter?returnUrl=https%3A%2F%2Fwww.jdcloud.com%2Fhelp%2Fdetail%2F734%2FisCatalog%2F1)，并 [实名认证](https://uc.jdcloud.com/account/certify)。
- 因为产品的计费类型为按用量计费，请确认您的账户不能处于欠费状态。

## 注意事项

- 您开始使用京东云提供的通知服务，即代表您同意服务的[等级协议](https://docs.jdcloud.com/cn/product-service-agreement/notification-service-terms-of-service)及[计费标准](https://docs.jdcloud.com/cn/notification-service/price-overview)。
- 对于用户创建的主题数量服务限制，请参考：[限制说明](../Introduction/Restrictions.md)    

## 步骤一：创建主题

1. 进入京东云控制台，菜单互联网中间件-通知服务。
2. 首先选择想要创建资源的区域（比如华北-北京），然后点击“创建主题”按钮，新建主题。

图

3. 创建主题中需要填写“主题名称”【必填】和显示名称【非必填】，然后点击创建主题完成创建。

   ### 说明：

   1. 主题传输重试策略（HTTP/S）是主题设置其所有HTTP/S订阅的传输重试策略，有默认设置，如果无特殊需求可以不作修改。

   2. 如果有自定义传输重试需求，可以参考：[消息传输重试策略](../Operation-Guide/Message-Management/Reties-Policies.md)，进行修改。

      

## 步骤二：创建订阅

1. 在主题列表选取想要订阅的主题，点击操作列的“订阅”。
2. 创建订阅中首先选择订阅类型，包含"HTTP, HTTPS, JQS, SMS, Email，Function"，填写订阅终端地址信息。
3. 当用户订阅类型选择为“HTTP, HTTPS, Email，JQS”，会有原始消息传输该参数，原始消息传输意思是不包含通知服务JSON格式的元数据，只包含原始消息本身。可以根据需要选择，如果没有特殊需求，默认原始参数状态即可。
4. 完成后，点击创建订阅即可。
5. 订阅确认：在订阅创建后，订阅终端节点必须确认该订阅该主题，通知服务才会推送消息到该终端。其中订阅类型为 HTTP，HTTPS ，Email和 SMS 需要确认，而订阅类型为JQS和Function如果该订阅者有JQS发送权限和Funciton的出发权限，就不需要进行确认（如果订阅者为JQS队列和Function的所有者，即不用确认）。订阅确认的方法：登陆相应订阅终端，会受到一条确认订阅的信息，点击订阅URL即可确认订阅。具体可参考：[订阅确认](../Operation-Guide/Subscription-Management/Subscription-Confirm.md)。

### 说明：

1. 订阅筛选策略为该订阅的消息过滤策略，使得主题订阅者可以收到所需要的消息通知，而不是接收发布到该主题的每条消息。如果有需求，可以参考：[订阅筛选策略](../Operation-Guide/Subscription-Management/Filtering-Policies.md)，进行编辑。
2. 如果订阅类型为HTTP或者HTTPS，可以修改订阅传输重试策略（HTTP/S），该策略是HTTP和HTTPS订阅的传输重试策略，有默认设置，如果无特殊需求可以不作修改。
3. 如果有自定义传输重试需求，可以参考：[消息传输重试策略](../Operation-Guide/Message-Management/Reties-Policies.md)，进行修改。



## 步骤三：创建 AccessKey和 SecretKey

如果在使用其他京东云资源时，已经创建过，可跳过此步骤。

在调用通知服务的SDK进行消息发布或者管理操作时候，还需要验证用户的身份信息，即需要在控制台创建AccessKey和 SecretKey。

### 创建方法：

在京东云用户中心账户管理下的[AccessKey管理页面](https://uc.jdcloud.com/account/accesskey)申请AccessKey和SecretKey密钥对（简称AK/SK）。 AK/SK信息请妥善保管，如果遗失可能会造成非法用户使用此信息操作您在云上的资源，给你造成数据和财产损失。AK/SK密钥对允许启用、禁用，启用后可用其调用OpenAPI，禁用后不能用其调用OpenAPI。
