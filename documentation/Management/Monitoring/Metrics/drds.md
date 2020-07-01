## DRDS
DRDS监控的servicecode为drds，该产品按照节点展示对应的指标数据，获取监控数据时，tags中instance_id需指定具体的节点ID。 提供的指标数据如下：

metric | 中文名称  | 英文名称 |单位 | 说明
---|--- |--- |--- |--- 
database.drds.cpu.util | CPU使用率 | CPU Usage | % |
database.drds.network.incoming|平均每秒网络流入量| Network Inbound | bps |
database.drds.network.outgoing|平均每秒网络流出量| Network Outbound | bps |
database.drds.connectCount |前端连接数 | Front Connections　|个|
database.drds.backConnectCount|后端连接数|Back Connections|个|
