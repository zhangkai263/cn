## 堡垒机

该产品获取监控数据的servicecode为bastion，一台堡垒机实例部署在单个或多个节点（容器）上，故监控数据供实例和节点两个维度的指标数据。

注： 获取节点维度的监控数据时，tags中的key 需指定为resource_name，value值需指定具体的容器名称。容器名称为固定格式， 具体如下：
- 规格为 5、20、50、100、200的堡垒机实例，仅1个节点，容器名称格式为：堡垒机实例ID-log-0.
- 规格为 500、1000、5000 的堡垒机实例，有4个节点。其容器名格式称分别为：堡垒机实例ID-log-0、堡垒机实例ID-relay1-0、堡垒机实例ID-relay2-0、堡垒机实例ID-relay3-0.

metric | 中文名称  | 英文名称 |单位 | 说明
---|--- |--- |--- |--- 
bastion.cpu.util|CPU使用率|CPU Usage|%|
bastion.memory.usage|内存使用率|Memory Usage|%|
bastion.disk.bytes.read|磁盘读字节数|Disk Read Bytes|MB|
bastion.disk.bytes.write|磁盘写字节数|Disk Write Bytes|MB|
bastion.network.bytes.incoming|网络接收字节数|Nework Incoming Bytes|MB|
bastion.network.bytes.outgoing|网络发送字节数|Network Outgoing Bytes|MB|
bastion.disk.iops.read|磁盘读IOPS|Disk Read Iops|个/s|
bastion.disk.iops.write|磁盘写IOPS|Disk Write Iops|个/s|
bastion.disk.usage|磁盘使用率|Disk use percent|%| 仅节点维度提供该指标
