## NAT网关

该产品监控数据的servicecode为natgateway，提供的指标信息如下：

metric | 中文名称  | 英文名称 |单位 | 说明
---|--- |--- |--- |---
natgateway.new_connection.count | 新建连接数 | NewConnections | 个 |
natgateway.active_connection.count| 活跃连接数 | ActiveConnections|个|
natgateway.ip.bytes.out|公网IP流出流量速率|NetworkOutTraffic|bps|
natgateway.ip.bytes.in|公网IP流入流量速率|NetworkInTraffic |bps|
natgateway.bytes.out|NAT网关流出流量速率|NatGatewayOutTraffic|bps|
natgateway.bytes.in|NAT网关流入流量速率|NatGatewayInTraffic|bps|
natgateway.error.port.allocation|源端口耗尽数|ErrorPortAllocation|次|
