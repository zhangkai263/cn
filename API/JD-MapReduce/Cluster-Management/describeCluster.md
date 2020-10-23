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
|**result**|[Result](describecluster#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**cluster**|[Cluster](describecluster#cluster)| |
|**status**|Boolean| |
### <div id="cluster">Cluster</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|集群ID|
|**name**|String|集群名称|
|**region**|String|集群所属地域|
|**vpcName**|String|VPC名称|
|**vpcSubnetName**|String|集群子网名称|
|**status**|String|集群状态|
|**version**|String|集群版本|
|**software**|String|集群服务|
|**createTime**|String|集群创建时间|
|**haFlag**|Boolean|集群所属可用区|
|**ossFlag**|Boolean|集群是否使用OSS|
|**payPrice**|Double|集群费用|
|**payType**|String|集群收费类型|
|**duration**|String|集群运行时间|
|**nodeCount**|Integer|集群节点个数|
|**clusterNodes**|[ClusterNode[]](describecluster#clusternode)|集群节点信息|
### <div id="clusternode">ClusterNode</div>
|名称|类型|描述|
|---|---|---|
|**serverId**|String|节点ID|
|**instanceInfo**|String|节点实例信息|
|**nodeName**|String|节点主机名称|
|**nodeSystemDiskType**|String|节点系统盘类型|
|**instanceType**|String|节点实例类型|
|**nodeStatus**|String|节点运行状态|
|**nodeDiskType**|String|节点数据盘类型|
|**nodeType**|String|节点类型，MASTER或者SLAVE|
|**outerIp**|String|节点外网IP|
|**innerIp**|String|节点内网IP|
|**nodeSystemDiskVolume**|String|节点系统盘大小(GB)|
|**nodeDiskVolume**|String|节点数据盘大小(GB)|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
