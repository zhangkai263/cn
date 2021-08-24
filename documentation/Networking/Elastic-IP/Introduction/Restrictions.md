# 使用限制

本文将详细介绍公网IP相关的使用限制，具体分为以下几个方面：
- [创建公网IP](restrictions#user-content-1)
- [绑定资源](restrictions#user-content-2)
- [调整带宽](restrictions#user-content-3)
- [共享带宽包](restrictions#user-content-4)
- [删除公网IP](restrictions#user-content-5)

### 创建公网IP
<div id="user-content-1"></div>

- 仅华南-广州地域支持创建边缘公网IP
- 为避免业务正常运转，创建后付费计费类型的公网IP，账户余额需不少于50元，预付费无余额门槛限制。
- 目前每个京东云账户支持各个地域（region）最多申请10个弹性公网IP，其中包括标准公网IP和边缘公网IP，如需更多配额请[提交工单](https://ticket.jdcloud.com/applyorder/form?cateId=1135&questionId=1155)申请。
- 申请弹性公网IP时设置的带宽为上行带宽，即从京东云访问公网的带宽上限，购买带宽上限为100Mbps以内的公网IP，出方向带宽为实际购买的带宽上限，入方向带宽均为100Mbps。购买带宽上限超过100Mbps的公网IP，出入方向带宽上限一致，均为实际购买的带宽上限。
- 从促销入口创建的弹性公网IP，出入方向带宽上限一致，均为实际购买的带宽上限，如您购买的带宽上限为10Mbps，则出入方向的带宽上限均为10Mbps。

### 绑定资源
<div id="user-content-2"></div>

- 弹性公网IP仅可与同地域资源（包括云主机、负载均衡、NFV实例等）进行绑定。其中标准公网IP仅可与同地域下中心可用区资源绑定、边缘公网IP仅可与同地域下的相同边缘可用区资源绑定；未明确IP类型的弹性公网IP默认为标准公网IP。
- 弹性公网IP同时只能与一个云资源绑定
- 单个弹性公网IP可以在一天之内进行多次绑定/解绑操作。如果需要为已绑定弹性公网IP的资源更换IP，必须先将资源与当前的IP解绑，之后再进行新IP的绑定。

### 调整带宽
<div id="user-content-3"></div>

- 所有计费模式下弹性公网IP均支持调整带宽上限。其中计费模式为包年包月的弹性公网IP，提升带宽时，到期时间不变，需支付带宽差价；降低带宽，将根据差价等值延长使用时间，不予退款。
- 公网IP加入共享带宽包后不支持在IP侧调整带宽，如需调整带宽，请在对应的共享带宽包中调整，具体可参考[管理在共享带宽包中的公网IP](../../Shared-Bandwidth-Package/Getting-Started/Manage-Public-IP.md)

### 共享带宽包
<div id="user-content-4"></div>

- 支持按配置、按用量计费的标准公网IP加入共享带宽包，包年包月计费类型的公网IP和边缘公网IP不支持加入共享带宽包
- 公网IP加入共享带宽后不支持修改带宽上限，加入共享带宽包后IP的带宽上限以在共享带宽包中带宽上限为准
- 已到期或已欠费的公网IP不支持加入共享带宽包
- 公网IP加入共享带宽包后将立即停止计费，均通过共享带宽包计费，从共享带宽包移除后将恢复原有的计费逻辑及带宽上限
- 公网IP加入共享带宽包后不支持续费

### 删除公网IP
<div id="user-content-5"></div>

- 不支持删除绑定资源的公网IP，如需删除IP，需先解绑资源；
- 不支持删除已加入共享带宽包的公网IP，如需删除IP，需先从共享带宽包中移除公网IP。

## 相关参考
- [创建公网IP](../Operation-Guide/Elastic-IP-Management/Create-Elastic-IP.md)
- [公网IP加入共享带宽包](../../Shared-Bandwidth-Package/Getting-Started/Manage-Public-IP.md)
- [修改带宽](../Operation-Guide/Elastic-IP-Management/Modify-Elastic-IP.md)
- [删除公网IP](../Operation-Guide/Elastic-IP-Management/Delete-Elastic-IP.md)
- [绑定资源](../Operation-Guide/Elastic-IP-Management/Associate-Elastic-IP.md)
