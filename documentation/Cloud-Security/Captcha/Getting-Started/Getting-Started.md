## **快速接入验证码服务**

1、开通服务。进入京东智联云控制台，选择**云安全-验证码**页面进入验证码产品开通页，点击**立即开通服务**。产品开通后即可领取免费试用包，20000次调用服务，一个月内有效。

  ![img](../../../../image/Captcha/free-traffic-package.png) 

2、创建AccessKey和AccessKeySecret。到个人中心的AccessKey管理处，手动创建AccessKey和AccessKeySecret，作为调用服务的鉴权票据。

![img](../../../../image/Captcha/AK-management.png)

![img](../../../../image/Captcha/creat-AK-SK.png)

3、客户端接入。验证码客户端接入，请参照[APP端接入SDK](https://docs.jdcloud.com/cn/captcha/androidsdk)

4、服务端接入。服务端接入通过OpenAPI接口进行调用，请参照[服务器端接入](https://docs.jdcloud.com/cn/captcha/getSessionId)。验证码前后端调用时序图如下：

![img](../../../../image/Captcha/work.png)

5、打开京东智联云验证码控制台，选择**云安全-验证码**页面，查看统计数据、应用管理、场景管理、流量包管理等信息。





