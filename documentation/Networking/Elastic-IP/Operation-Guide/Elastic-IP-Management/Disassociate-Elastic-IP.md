# 解绑弹性公网IP

弹性公网IP支持从所绑定的云资源上解绑，本文将详细介绍解绑弹性公网IP的操作步骤。

### 操作场景

- 云资源不再支持访问公网和被公网访问，需解绑公网IP

- 容灾场景中主备切换，更换公网IP绑定的资源


### 前提条件及限制

- 确保您已经[注册京东云账号](https://user.jdcloud.com/register?returnUrl=https%3A%2F%2Fwww.jdcloud.com%2F)，并实现[实名认证](https://docs.jdcloud.com/cn/real-name-verification/introduction)；

- 确保您已经创建一个弹性公网IP，确认公网IP绑定的云资源不再需要当前绑定的公网IP；

- 计费类型为后付费的公网IP解绑后仍会产生费用，如不再使用该公网IP，请及时删除资源

### 操作步骤

步骤1：登录京东云控制台，进入控制台导航页面。

步骤2：在控制台左侧导航栏，选择网络-【私有网络】-【弹性公网IP】，进入弹性公网IP列表页。

步骤3：在弹性公网IP列表页，定位需要解绑的弹性公网IP，点击【解绑资源】按键，进入弹性公网IP解绑资源弹窗。
```
- 若弹性公网IP处于绑定状态，则按钮显示【解绑资源】
- 若公网IP处于未绑定状态，则按钮显示【绑定资源】
```
步骤4：在解绑资源弹窗，点击【确定】按键，完成解绑弹性公网IP操作。

步骤5：返回弹性公网IP列表页，查看弹性公网IP解绑情况。

## 相关参考

- [使用限制](https://docs.jdcloud.com/cn/elastic-ip/restrictions)
- [删除公网IP](https://docs.jdcloud.com/cn/elastic-ip/delete-elastic-ip)
- [计费规则](https://docs.jdcloud.com/cn/elastic-ip/billing-rules)

