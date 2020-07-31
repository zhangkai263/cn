# createNodeGroup


## 描述
创建工作节点组<br>
- 要求集群状态为running


## 请求方式
POST

## 请求地址
https://kubernetes.jdcloud-api.com/v1/regions/{regionId}/nodeGroups

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |名称（同一用户的 cluster 内部唯一）|
|**description**|String|False| |描述|
|**clusterId**|String|True| |工作节点所属的集群|
|**nodeConfig**|[NodeConfigSpec](createnodegroup#nodeconfigspec)|True| |工作节点配置信息|
|**azs**|String[]|False| |工作节点组的 az，必须为集群az的子集，默认为集群az|
|**initialNodeCount**|Integer|True| |工作节点组初始化大小|
|**vpcId**|String|True| |工作节点组初始化大小运行的VPC|
|**nodeCidr**|String|False| |工作节点组的cidr|
|**autoRepair**|Boolean|False| |是否开启工作节点组的自动修复，默认关闭|
|**caConfig**|[CAConfigSpec](createnodegroup#caconfigspec)|False| |自动伸缩配置|
|**nodeGroupNetwork**|[NodeGroupNetworkSpec](createnodegroup#nodegroupnetworkspec)|False| |节点组的网络配置，如果集群的类型customized类型，则必须指定该参数，如果是auto，则不是必须|

### <div id="nodegroupnetworkspec">NodeGroupNetworkSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**subnetId**|String|False| |node所在子网id|
### <div id="caconfigspec">CAConfigSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**enable**|Boolean|False| |是否启用自动伸缩，默认为 false<br>|
|**maxNode**|Integer|False| |自动扩容最大工作节点数, 取值范围[1, min(2000, 子网剩余ip)]|
|**minNode**|Integer|False| |自动扩容最小工作节点数, 取值范围[0, min(2000, maxNode)]|
### <div id="nodeconfigspec">NodeConfigSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**instanceType**|String|True| |实例类型|
|**version**|String|False| |工作节点版本，不指定则使用默认版本|
|**password**|String|False| |云主机密码，默认为集群密码，密码规范参考：[公共参数规范](https://docs.jdcloud.com/cn/virtual-machines/api/general_parameters)|
|**keyNames**|String[]|False| |云主机SSH密钥对名称，当前仅支持一个。使用中的SSH密钥请勿删除。|
|**systemDisk**|[DiskSpec](createnodegroup#diskspec)|False| |云主机系统盘配置信息|
|**labels**|[LabelSpec[]](createnodegroup#labelspec)|False| |工作节点组标签，最多支持 10 个|
### <div id="labelspec">LabelSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**key**|String|True| |key包含两个部分：prefix与name，name是必须的，prefix是可选的。prefix与name分隔用"/"。 <br>name 可以是字母，数字，[-_.]。长度小于63。prefix：遵循DNS标准（例如：kubernetes.io/），长度不超过253 <br>[参照](https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/#syntax-and-character-set)    <br>|
|**value**|String|False| |字母，数字,[-_.],长度不超过63|
### <div id="diskspec">DiskSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**systemDiskCategory**|String|False| |磁盘类型，取值为cloud、local，默认为cloud|
|**systemDiskSize**|Integer|False| |云盘系统盘的大小 单位(GB)|
|**systemDiskType**|String|False| |云盘系统盘的类型，支持 hdd.std1,ssd.gp1,ssd.io1|
|**systemDiskIops**|Integer|False| |云盘 iops，仅限 ssd.io1 类型云盘有效|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createnodegroup#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**nodeGroupId**|String| |

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**429**|Quota exceeded|
|**500**|Internal server error|
|**503**|Service unavailable|
