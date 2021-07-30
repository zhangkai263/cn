# 计费概览
本文将介绍私有网络中的产品以及相关产品计费规则，部分产品为免费产品，具体如下：

|产品名称|是否计费|相关价格总览|产品状态|备注|
|---|---|--|---|--|
|VPC|否|--|GA||
|子网|否|--|GA||
|安全组|否|--|GA||
|路由表|否|--|GA||
|网络ACL|否|--|GA||
|弹性网卡|否|--|GA||
|弹性公网IP|是|[弹性公网IP价格总览](https://docs.jdcloud.com/cn/elastic-ip/price-overview)||
|云主机|是|[云主机价格总览](https://docs.jdcloud.com/cn/virtual-machines/price-overview)||
|NAT实例网关|是|[云主机价格](/documentation/Elastic-Compute/Virtual-Machines/Pricing/Billing-Overview.md)，[公网IP价格](/documentation/Networking/Elastic-IP/Pricing/Price-Overview.md)||费用由公网IP及云主机组成|
|VPN镜像网关|是|[云主机价格](/documentation/Elastic-Compute/Virtual-Machines/Pricing/Price-Overview.md)、[公网IP价格](/documentation/Networking/Elastic-IP/Pricing/Price-Overview.md)、[镜像价格见云市场](https://market.jdcloud.com/)||相应镜像说明，如[深信服WOC_Cloud加速IPsec_VPN镜像](https://market.jdcloud.com/520009.html)，镜像缺省可免费试用1个月，试用镜像限制为：仅支持10M带宽规格|
|NAT网关|是|[NAT网关价格总览](https://docs.jdcloud.com/cn/nat-gateway/price-overview)||与NAT实例网关不同|

同地域下不同实例间通过内网进行通信无需支付带宽/流量费用。


## 相关参考

- [云主机价格](/documentation/Elastic-Compute/Virtual-Machines/Pricing/Billing-Overview.md) 
- [公网IP价格](/documentation/Networking/Elastic-IP/Pricing/Price-Overview.md)
- [NAT网关](https://docs.jdcloud.com/cn/nat-gateway/product-overview)
- [NAT实例网关](../Getting-Started/NAT-Instance-Gateway.md)
- [VPN镜像网关](../Getting-Started/VPN-Mirror-Gateway.md)
