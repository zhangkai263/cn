# CC防护规则相关配置
CC防护规则属于网站类防护的规则，需要先切换网站类转发配置。

步骤如下：

- 首先需要登录 [IP高防 控制台](https://ip-anti-console.jdcloud.com/instancelist)。
- 找到需要配置的实例，单击实例名称，进入 **实例详情** 页面。
- 切换到 **网站转发配置** ，在操作栏下点击 **防护规则** 。
    ![网站转发规则](https://github.com/jdcloudcom/cn/blob/edit/image/Advanced%20Anti-DDoS/web-rule%2009.png)

### 操作步骤

1. 开启CC防护开关，默认CC防护模式为正常。

    ![网站转发规则](https://github.com/jdcloudcom/cn/blob/edit/image/Advanced%20Anti-DDoS/web-rule%2010.png)

2. 点击 **去设置** ，可根据业务特点选择不同的防护模式。

    ![网站转发规则](https://github.com/jdcloudcom/cn/blob/edit/image/Advanced%20Anti-DDoS/CC%20rules%2002.png)

    以下是规则解释：
    
    * 网站类转发配置列表中CC状态字段根据CC防护开关状态显示已开启/已关闭。
    * 基本信息中的CC防护峰值，显示的是所购买套餐中的CC防护峰值大小。
    * CC防护模式配置。系统支持四种CC防护模式的选择：
    
         - “宽松”：仅很少部分的访问会经过CC规则校验，适用于较少访问的网站。
         - “正常”：网站无明显异常时，请选用正常模式。仅对部分访问进行校验检查。
         - “紧急”：网站响应缓慢，CPU、内存等出现异常时，请使用紧急模式。该模式检查严格，可能存在误伤。
         - “自定义”：适用于高级用户，可自定义防护阈值。包括HTTP请求数阈值，每个Host的防护阈值，每个Host+URI的防护阈值，每个源IP对Host的防护阈值，每个源IP对Host+URI的防护阈值。最大HTTP请求数阈值，不超过购买套餐的阈值。</br>
         ![网站转发规则](https://github.com/jdcloudcom/cn/blob/edit/image/Advanced%20Anti-DDoS/CC%20rules%2003.png)
         
         **注意**: 上述四种CC防护模式采用的防护算法只适用于网页类的站点。如果被访问的网站的业务是API或App应用，由于该类业务一般无法正常响应算法校验，存在很大的误拦截风险。如果用户存在API业务或App类业务的CC防护需求，请提交工单进行防护策略定制。

3. CC观察模式

    * 若CC观察模式开启，则CC防护只告警，不防御。

4. CC防护自定义规则

    * 点击 **去设置** ，进入CC防护自定义规则页面。</br>
    ![网站转发规则](https://github.com/jdcloudcom/cn/blob/edit/image/Advanced%20Anti-DDoS/CC%20rules%2005.png) </br>  
    ![网站转发规则](https://github.com/jdcloudcom/cn/blob/edit/image/Advanced%20Anti-DDoS/CC%20rules%2004.png) </br>  
    * 点击 **添加规则** ，
 
