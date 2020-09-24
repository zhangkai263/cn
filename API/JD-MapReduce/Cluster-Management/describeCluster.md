# describeCluster


## 描述
查询指定集群的详细信息


## 请求方式
GET

## 请求地址
https://jmr.jdcloud-api.com/v1/regions/{regionId}/clusters/{clusterId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**clusterId**|String|True| |集群ID|
|**regionId**|String|True| |地域ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](#result)| |
|**requestId**|String| |

### <div id="Result">Result</div>
|名称|类型|描述|
|---|---|---|
|**cluster**|[Cluster](#cluster)| |
|**status**|Boolean| |
### <div id="Cluster">Cluster</div>
|名称|类型|描述|
|---|---|---|
|**clusterId**|String|集群ID|
|**clusterName**|String|集群名称|
|**clusterCreateTime**|String|集群创建时间|
|**clusterHa**|Boolean|集群是否为高可用|
|**clusterStatus**|String|集群状态|
|**clusterVersion**|String|集群版本|
|**clusterService**|String[]|集群服务|
|**clusterRegion**|String|集群所属地域|
|**clusterAz**|String|集群所属可用区|
|**clusterPrice**|Double|集群费用|
|**clusterPaymentType**|String|集群计费类型|
|**clusterOss**|Boolean|集群是否关联对象存储|
|**clusterVpc**|String|集群私有网络名称|
|**clusterVpcSubnet**|String|集群子网名称|
|**clusterBandwidth**|Integer|集群公网网络带宽|
|**clusterNodes**|[ClusterNode[]](#clusternode)|集群节点信息|
### <div id="ClusterNode">ClusterNode</div>
|名称|类型|描述|
|---|---|---|
|**clusterNodeId**|String|集群节点ID|
|**clusterNodeHostName**|String|集群节点主机名称|
|**clusterNodeIntranetIp**|String|集群节点内网IP|
|**clusterNodeConnectionIp**|String|集群节点公网IP|
|**clusterNodeRole**|String|集群节点类型|
|**clusterNodeDisk**|[ClusterNodeDisk[]](#clusternodedisk)|集群节点硬盘信息|
|**clusterNodeModel**|String|集群节点型号|
### <div id="ClusterNodeDisk">ClusterNodeDisk</div>
|名称|类型|描述|
|---|---|---|
|**clusterNodeDiskId**|String|云硬盘ID，暂不提供|
|**clusterNodeDiskType**|String|云硬盘类型|
|**clusterNodeDiskSize**|Integer|云硬盘大小，单位为 GiB|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
