# 应用场景

以下说明弹性公网IP的适用场景。

## 弹性公网IP绑定云主机
弹性公网IP支持与云主机进行灵活的绑定与解绑操作，可以为云主机提供公网接入服务，应用场景如下图所示。此场景标准公网IP与边缘公网IP同时支持，分别在中心可用区和边缘可用区提供弹性公网IP与云主机的绑定、解绑能力，实现云主机访问公网或被公网访问。

![弹性公网IP绑定云主机](../../../../image/Networking/Elastic-IP/eip-001.png)


## 弹性公网IP绑定负载均衡
弹性公网IP支持与负载均衡进行灵活的绑定与解绑操作，该公网IP可以作为负载均衡的虚拟IP地址（VIP），应用场景如下图所示。此场景目前仅标准公网IP支持。

![弹性公网IP绑定负载均衡](../../../../image/Networking/Elastic-IP/eip-002.png)

## 弹性公网IP绑定NFV实例
弹性公网IP支持与多种NFV实例进行灵活绑定与解绑，包括VPN网关、NAT网关等，更多可参考[NFV](../../Virtual-Private-Cloud/Introduction/Features/NFV-Features.md)。本教程以VPN网关为例进行应用场景的描述。此场景标准公网IP与边缘公网IP同时支持，分别在中心可用区和边缘可用区提供弹性公网IP与NFV实例的绑定、解绑能力。

![弹性公网IP绑定NFV实例](../../../../image/Networking/Elastic-IP/eip-003.png)


