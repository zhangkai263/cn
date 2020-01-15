# 负载均衡
负载均衡下有应用负载均衡和网络负载均衡两款子产品。

## 应用负载均衡
应用负载均衡其servicecode为balance。若要查看某个端口的指标数据，tags中port需指定具体的端口号。
其提供的监控指标如下：  

metric | 中文名称 | 英文名称 | 单位 | 说明
---|--- |--- |---|---
network.services.lb.new.requests | 新增请求数 | Requests | 个 | 
network.services.lb.active.connections| 活跃连接数|Active Connection Counts | 个|
network.services.lb.new.connections | 新建连接数 | New Connection Counts | 个 | 
network.services.lb.server.error| 服务端错误 | Server Error |个|
network.services.lb.client.error|客户端错误|Client Error|个|
network.services.lb.inflow.rate|流入流量速率|ProcessedIn_bps|bps|
network.services.lb.outflow.rate|流出流量速率|ProcessedOut_bps|bps|
network.services.lb.inflow.bytes|流入字节数|ProcessedIn_Bytes|Bytes|
network.services.lb.outflow.bytes|流出字节数|ProcessedOut_Bytes|Bytes|
network.services.lb.total.bytes|总字节数|Total Bytes|Bytes|




## 网络负载均衡
网络负载均衡其servicecode为nlb。若要查看某个端口的指标数据，tags中port需指定具体的端口号。
其提供的监控指标如下：    

metric | 中文名称 | 英文名称 | 单位 | 说明
---|--- |--- |---|---
network.services.lb.active.connections| 活跃连接数|Active Connection Counts | 个|
network.services.lb.new.connections | 新建连接数 | New Connection Counts | 个 | 
network.services.lb.inflow.rate|流入流量速率|ProcessedIn_bps|bps|
network.services.lb.inflow.bytes|流入字节数|ProcessedIn_Bytes|Bytes|
network.services.lb.outflow.bytes|流出字节数|ProcessedOut_Bytes|Bytes|
