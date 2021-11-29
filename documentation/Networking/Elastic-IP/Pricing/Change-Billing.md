# 计费类型转换

京东云的弹性公网IP支持不同计费类型进行转换，支持按配置计费的公网IP转成包年包月计费，按用量计费的公网IP转换成包年包月，转换不可逆。

#### 背景

按用量计费、按配置计费的公网IP根据业务需要转成按包年包月计费，后续持续按包年包月进行计费。

#### 转换方式

支持通过续费将按配置或按用量计费的公网IP转成按包年包月的计费模式，操作步骤请参考[续费公网IP](../Operation-Guide/Elastic-IP-Management/Renew-Elastic-IP.md)，包年包月的起始日期为续费日期，需支付当前带宽下所续时长的带宽费用，续费时不支持调整带宽，如需调整带宽，可在续费前或续费调整均可，支付完成后立即生效。



## 相关参考

- [调整带宽](../Operation-Guide/Elastic-IP-Management/Modify-Elastic-IP.md)
- [续费公网IP](../Operation-Guide/Elastic-IP-Management/Renew-Elastic-IP.md)
- [价格总览](Price-Overview.md)
- [计费规则](Billing-Rules.md)
- [常见计费问题](Bill-FAQ.md)



