## 专线服务
专线服务下有物理连接、专线通道、托管专线和托管通道4款子产品。

### 物理连接
物理连接的servicecode为physical_conn，提供的指标信息如下：  

metric | 中文名称  | 英文名称 |单位 | 说明
---|--- |--- |--- |---
direct_connect.incoming.bytes | 入流量 | Network In | bps |
direct_connect.outgoing.bytes | 出流量 | Network Out| bps |
direct_connect.incoming.packets|入包量|Network Packets In|pps|
direct_connect.outgoing.packets|出包量|Network Packets Out|pps|


### 专线通道
专线通道的servicecode为private_vif，提供的指标信息如下：  

metric | 中文名称  | 英文名称 |单位 | 说明
---|--- |--- |--- |---
vif.incoming.bytes|入流量|Network In | bps |
vif.outgoing.bytes | 出流量 | Network Out| bps |
vif.incoming.packets|入包量|Network Packets In|pps|
vif.outgoing.packets|出包量|Network Packets Out|pps|


### 托管专线
物理连接的servicecode为hosted_conn，提供的指标信息如下：  

metric | 中文名称  | 英文名称 |单位 | 说明
---|--- |--- |--- |---
direct_connect.incoming.bytes | 入流量 | Network In | bps |
direct_connect.outgoing.bytes | 出流量 | Network Out| bps |
direct_connect.incoming.packets|入包量|Network Packets In|pps|
direct_connect.outgoing.packets|出包量|Network Packets Out|pps|



### 托管通道
专线通道的servicecode为hosted_private_vif，提供的指标信息如下：  

metric | 中文名称  | 英文名称 |单位 | 说明
---|--- |--- |--- |---
vif.incoming.bytes|入流量| Network In | bps |
vif.outgoing.bytes | 出流量 | Network Out| bps |
vif.incoming.packets|入包量|Network Packets In|pps|
vif.outgoing.packets|出包量|Network Packets Out|pps|
