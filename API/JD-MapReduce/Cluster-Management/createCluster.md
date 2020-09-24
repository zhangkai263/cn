# createCluster


## 描述
创建集群

## 请求方式
POST

## 请求地址
https://jmr.jdcloud-api.com/v1/regions/{regionId}/cluster:create

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**clusterSpec**|[ClusterSpec](#clusterspec)|True| |描述集群配置|
|**clientToken**|String|False| |用于保证请求的幂等性。由客户端生成，长度不能超过64个字符。<br>|

### <div id="ClusterSpec">ClusterSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |集群名称(不能少于6字符不能超过20字符，除下划线外不能包含特殊符号)|
|**password**|String|True| |集群root用户密码(须包含大小写字母、数字及特殊字符其中三类，且不能少于8字符不能超过30字符)|
|**version**|String|True|JMR2.0.0|集群版本，默认版本为JMR2.0.0|
|**payType**|String|True|按配置|集群计费类型，支持按配置和包年包月计费|
|**masterNodeCount**|Integer|True| |主节点数量|
|**masterCore**|Integer|False| |Master节点CPU|
|**masterMemory**|Integer|False| |Master节点内存(推荐至少8G内存，否则服务可能会部署失败)|
|**masterSystemDiskType**|String|True| |Master系统硬盘类型：ssd.gp1,ssd.io1和hdd.std1|
|**masterSystemDiskVolume**|Integer|True| |Master系统硬盘大小，单位GB|
|**masterSystemDiskIops**|Integer|True| |Master系统硬盘iops，只有在硬盘类型是ssd.gp1,ssd.io1时，才需要有iops，200起步，步长为10|
|**masterDiskType**|String|True| |Master数据盘类型：ssd.gp1,ssd.io1和hdd.std1|
|**masterDiskVolume**|Integer|True| |Master数据盘大小，单位GB|
|**masterDiskIops**|Integer|True| |Master数据盘ipos，只有在硬盘类型是ssd.gp1,ssd.io1时，才需要有iops，200起步，步长为10|
|**masterInstanceType**|String|True| |master节点规格|
|**slaveNodeCount**|Integer|True| |Slave节点数量|
|**slaveCore**|Integer|False| |Slave节点CPU|
|**slaveMemory**|Integer|False| |Slave节点内存(推荐至少4G内存，否则服务可能会部署失败)|
|**slaveSystemDiskType**|String|True| |Slave系统硬盘类型：ssd.gp1,ssd.io1和hdd.std1|
|**slaveSystemDiskVolume**|Integer|True| |Slave系统硬盘大小，单位GB|
|**slaveSystemDiskIops**|Integer|True| |Slave系统硬盘iops，只有在硬盘类型是ssd.gp1,ssd.io1时，才需要有iops，200起步，步长为10|
|**slaveDiskType**|String|True| |Slave数据盘类型：ssd.gp1,ssd.io1和hdd.std1|
|**slaveDiskVolume**|Integer|True| |Slave数据盘大小，单位GB|
|**slaveDiskIops**|Integer|True| |Slave数据盘ipos，只有在硬盘类型是ssd.gp1,ssd.io1时，才需要有iops，200起步，步长为10|
|**coreInstanceType**|String|True| |slave节点规格|
|**jssFlag**|Boolean|True| |关联JSS|
|**dataCenter**|String|True|cn-north-1|数据中心，即regionId|
|**softwareList**|String|True|HADOOP,ZOOKEEPER|软件列表|
|**haFlag**|Boolean|True|True|集群是否为高可用，默认为高可用集群|
|**vpcId**|String|True|new|Vpc网络ID|
|**vpcSubnetId**|String|True|new|Vpc子网ID|
|**az**|String|True| |数据中心的可用区|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**status**|Boolean|是否开始创建集群|
|**clusterId**|String|集群ID|
|**message**|String|创建集群的信息|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
