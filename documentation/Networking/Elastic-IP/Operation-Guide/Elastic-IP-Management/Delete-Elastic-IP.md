# 删除弹性公网IP

京东云支持删除后付费的弹性公网IP。预付费的弹性公网IP在到期前不允许删除，更多不允许删除公网IP请查看[使用限制](https://docs.jdcloud.com/cn/elastic-ip/restrictions)。

### 操作背景

不再使用当前的弹性公网IP，避免产生不必要的成本开销。


### 前提条件及限制

- 确保已创建一个公网IP，且确认该公网IP不再使用

- 确保待删除公网IP处于未绑定状态，如处于绑定状态，请先[解绑资源](./Disassociate-Elastic-IP.md)

- 包年包月未到期的公网IP不支持提前删除

- 公网IP加入共享带宽包后不支持直接删除IP，需先从共享带宽包中[移除公网IP](https://docs.jdcloud.com/cn/shared-bandwidth-package/manage-public-ip#user-content-4)


### 操作步骤

步骤1：登录京东云控制台，进入控制台导航页面。

步骤2：在控制台左侧导航栏，选择网络-【私有网络】-【弹性公网IP】，进入弹性公网IP列表页。

步骤3：在弹性公网IP列表页，定位到您需要删除的弹性公网IP。若弹性公网IP处于绑定状态，删除按键置灰，需要先解绑弹性网卡才可执行删除操作；若弹性公网IP处于未绑定状态，可直接点击删除按键执行删除操作。

步骤4（可选）：若弹性公网IP处于绑定状态，请先点击【解绑资源】按键，解除弹性公网IP与资源的绑定关系。

步骤5：点击删除按键，进入删除弹性公网IP弹窗。

```
提示
- 公网IP加入共享带宽包后，不支持直接删除IP资源，需先从共享带宽包中移除公网IP，然后在公网IP侧删除。
- 在弹性公网IP详情页，右上角快捷操作选项同时提供删除按键，功能与列表页删除按键保持一致。
```
步骤6：完成上述步骤后，点击【确定】按键，完成弹性公网IP删除操作，返回弹性公网IP列表页，查看弹性公网IP删除情况。

## 相关参考

- [解绑弹性公网IP](./Disassociate-Elastic-IP.md)
- [使用限制](https://docs.jdcloud.com/cn/elastic-ip/restrictions)
- [计费规则](https://docs.jdcloud.com/cn/elastic-ip/billing-rules)
- [移除公网IP](https://docs.jdcloud.com/cn/shared-bandwidth-package/manage-public-ip#user-content-4)

