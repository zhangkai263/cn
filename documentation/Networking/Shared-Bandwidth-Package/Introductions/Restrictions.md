# 使用限制

### 共享带宽包限制

- 按用量计费模式的共享带宽包创建后，最早于下月账单出完后支持删除，即至少使用完1个完整的自然月

- 包年包月模式的共享带宽包仅支持到期后删除

- 只允许删除不包含公网IP的共享带宽包

- 共享带宽包停服时不支持添加公网IP

- 到期或欠费后不允许修改带宽

### EIP 限制

- 共享带宽包支持添加按配置和按用量计费的弹性公网IP

- 仅支持添加同地域下同线路的公网IP

- 已欠费的公网IP不支持加入共享带宽包

- 一个公网IP只能同时加入一个共享带宽包


### 资源配额限制

| 资源                                                | 默认上限（个） | 提升配额                                 |
| --------------------------------------------------- | -------------- | ---------------------------------------- |
| 同账号同地域可持有的包年包月/按配置的共享带宽包数量 | 无限制           | 不支持提升配额                           |
| 同账号同地域最多可持有按用量的共享带宽包数量        | 5              | 如需提升配额，请[提交工单](https://ticket.jdcloud.com/applyorder/submit)申请。 |
| 每个共享带宽包可加入的EIP数量                       | 20             | 如需添加更多弹性公网IP，请[提交工单](https://ticket.jdcloud.com/applyorder/submit)申请。 |

## 相关参考
- [共享带宽包概述](Product-Overview.md)
- [产品功能](Features.md)
- [应用场景](Application-Scenarios.md)
- [管理公网IP](../Getting-Started/Manage-Public-IP.md)
- [计费概述](../Pricing/Billing-Overview.md)
- [计费规则](../Pricing/Billed-Rules.md)
- [价格总览](../Pricing/Price-Overview.md)
- [增强95消峰计费](../Pricing/Charge-By-Usage/Enhance95th-Eliminate.md)
- [查看共享带宽包监控信息](../Operation-Guide/View-Monitoring.md)
- [创建共享带宽包](../Operation-Guide/Create-Bwp.md)
- [修改共享带宽包](../Operation-Guide/Modify-Bwp.md)
- [删除共享带宽包](../Operation-Guide/Delete-Bwp.md)
