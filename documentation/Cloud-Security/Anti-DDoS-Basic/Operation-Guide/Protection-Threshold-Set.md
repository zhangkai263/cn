# 防护阈值设置

1、定位到控制台中->DDoS基础防护->公网IP列表，找到需要修改的公网IP,进入基本信息页面，如下：

![公网IP菜单](https://github.com/jdcloudcom/cn/blob/Anti-DDoS/image/Basic%20Anti-DDos/IP-list.png)
![创建对象](https://github.com/jdcloudcom/cn/blob/Anti-DDoS/image/Basic%20Anti-DDos/basic%20message.png)

2、单击防护规则旁边的**修改**按钮，即可对基础防护的防护规则进行编辑。

如果该公网IP已经绑定了某个DDoS防护包，则防护方式既可以选择整个防护包的规则，也可以只针对该IP进行自定义的防护规则配置。若要进行整个防护包规则的变更，请到“DDoS防护包”菜单下，进入操作。
清洗触发值请设置合适的阈值，建议应该稍微高于正常情况下的业务流量。当攻击超过这个阈值时，即会触发清洗。

![创建对象](https://github.com/jdcloudcom/cn/blob/Anti-DDoS/image/Basic%20Anti-DDos/protection-rules.png)

