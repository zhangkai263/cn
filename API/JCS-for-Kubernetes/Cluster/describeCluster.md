# describeCluster


## 描述
查询单个集群详情。

## 请求方式
GET

## 请求地址
https://kubernetes.jdcloud-api.com/v1/regions/{regionId}/clusters/{clusterId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 ID|
|**clusterId**|String|True| |集群 ID|

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
### <div id="cluster">Cluster</div>
|名称|类型|描述|
|---|---|---|
|**clusterId**|String|集群id|
|**name**|String|名称|
|**description**|String|描述|
|**version**|String|kubernetes的版本|
|**azs**|String[]|集群所在的az|
|**nodeGroups**|[NodeGroup[]](describecluster#nodegroup)|节点组列表|
|**clusterCidr**|String|k8s的cluster的cidr|
|**masterAuth**|[MasterAuth](describecluster#masterauth)|认证信息|
|**clusterState**|String|状态  [pending,running,reconciling（升级时的状态）, deleting, deleted, error]|
|**stateMessage**|String|状态变更原因|
|**updateTime**|String|更新时间|
|**createTime**|String|创建时间|
|**accessKey**|String|用户的AccessKey，插件调用open-api时的认证凭证|
|**basicAuth**|Boolean|基本验证方式|
|**clientCertificate**|Boolean|证书验证方式|
|**endpoint**|String|用户访问的ip|
|**endpointPort**|String|endpoint的port|
|**dashboardPort**|String|endpoint的dashboard port|
|**userMetrics**|Boolean|deprecated 优先以addonsConfig中的配置为准 <br>用户是否启用集群自定义监控，true 表示开启用，false 表示未开启用|
|**addonsConfig**|[AddonConfig[]](describecluster#addonconfig)|集群组件配置信息|
|**autoUpgrade**|Boolean|是否开启集群自动升级，true 表示开启，false 表示未开启|
|**maintenanceWindow**|[MaintenanceWindow](describecluster#maintenancewindow)|配置集群维护策略|
|**upgradePlan**|[UpgradePlan](describecluster#upgradeplan)|集群升级计划信息, 仅展示最新一条升级计划信息|
|**masterProgress**|[MaintenanceWindow](describecluster#maintenancewindow)|控制节点操作进度|
|**clusterNetwork**|[ClusterNetwork](describecluster#clusternetwork)|网络配置信息|
|**networkMode**|String|集群网络类型,可取值为auto和customized|
### <div id="clusternetwork">ClusterNetwork</div>
|名称|类型|描述|
|---|---|---|
|**publicApiServer**|Boolean|kube-apiserver是否可公网访问，false则kube-apiserver不绑定公网地址，true绑定公网地址|
|**masterCidr**|String|master网络的cidr|
|**serviceCidr**|String|service网络的cidr|
|**vpcId**|String|用户侧承载node和pod的vpc id|
|**clusterSubnets**|[ClusterNetworkSubnet[]](describecluster#clusternetworksubnet)|集群子网信息|
|**natGateway**|[NatGateway[]](describecluster#natgateway)|nat网关配置|
### <div id="natgateway">NatGateway</div>
|名称|类型|描述|
|---|---|---|
|**natType**|String|nat的类型，nat_vm/nat_gw/nat_none|
|**natId**|String|nat虚机id，或者nat网关的实例id|
### <div id="clusternetworksubnet">ClusterNetworkSubnet</div>
|名称|类型|描述|
|---|---|---|
|**subnetId**|String|子网 ID|
|**subnetType**|String|子网类型，可取值为：pod_subnet/lb_subnet/node_subnet|
|**enabled**|Boolean|子网是否启用，仅pod子网可用。|
### <div id="maintenancewindow">MaintenanceWindow</div>
|名称|类型|描述|
|---|---|---|
|**periodType**|String|daily, weekly, monthly， 默认 weekly|
|**startDay**|Integer|维护操作开始具体日期, 仅对 periodType 取值为 weekly 或 monthly 时有效, periodType 为 weekly 时可以取 1-7, periodType 为 monthly 时可取 1-28<br>|
|**startTime**|String|维护操作开始具体时间. 时间格式符合RFC3339，并使用 UTC 时间，精确到分钟，例如 23:27|
|**duration**|Integer|维护运行时长: 4-24 小时，步长 1 小时， 默认为： 4小时|
### <div id="upgradeplan">UpgradePlan</div>
|名称|类型|描述|
|---|---|---|
|**mode**|String|升级方式 auto, manual|
|**scope**|String|升级范围 cluster, master, nodegroup|
|**state**|String|升级计划状态 waiting, upgrading|
|**masterExpectedVersion**|String|master 期望版本|
|**nodeExpectedVersion**|String|node 期望版本|
|**startTime**|String|升级启动时间|
|**duration**|Integer|持续时长|
### <div id="addonconfig">AddonConfig</div>
|名称|类型|描述|
|---|---|---|
|**name**|String|组件名称|
|**enabled**|Boolean|组件是否开启|
### <div id="masterauth">MasterAuth</div>
|名称|类型|描述|
|---|---|---|
|**clusterCaCertificate**|String|base64编码，集群的根的public certificate|
|**clientCertificate**|String|base64编码，客户端连接集群的public certificate|
|**clientKey**|String|base64编码, client的私钥|
|**user**|String|basic auth的user|
|**password**|String|basic auth的password|
### <div id="nodegroup">NodeGroup</div>
|名称|类型|描述|
|---|---|---|
|**clusterId**|String|集群 id|
|**nodeGroupId**|String|工作节点组 id|
|**name**|String|工作节点组名称|
|**description**|String|工作节点组描述|
|**nodeConfig**|[NodeConfig](describecluster#nodeconfig)|工作节点组配置信息|
|**version**|String|工作节点版本|
|**nodeNetwork**|[NodeNetwork](describecluster#nodenetwork)|工作节点所属的网络信息|
|**currentCount**|Integer|当前工作节点数量|
|**expectCount**|Integer|期望的工作节点数量|
|**agId**|String|工作节点组的ag id ，通过agid可以查询该工作节点组下的实例|
|**azs**|String[]|工作节点组所在的 az|
|**instanceTemplateId**|String|工作节点组的 ag 对应的实例模板|
|**state**|String|状态  [pending,running,resizing,reconciling,deleting,deleted,error,running_with_error(部分节点有问题)]|
|**tags**|[Tag[]](describecluster#tag)| |
|**updateTime**|String|更新时间|
|**stateMessage**|String|状态变更原因|
|**autoRepair**|Boolean|是否开启自动修复|
|**progress**|[NodeGroupProgress](describecluster#nodegroupprogress)|控制节点操作进度|
|**caConfig**|[CAConfig](describecluster#caconfig)|自动伸缩配置|
|**createdTime**|String|创建时间|
### <div id="caconfig">CAConfig</div>
|名称|类型|描述|
|---|---|---|
|**enable**|Boolean|是否启用了自动伸缩<br>|
|**maxNode**|Integer|自动扩容最大工作节点数|
|**minNode**|Integer|自动扩容最小工作节点数|
### <div id="nodegroupprogress">NodeGroupProgress</div>
|名称|类型|描述|
|---|---|---|
|**nodeGroupId**|String|工作节点组 id|
|**action**|String|操作类型, upgrade, downgrade, rollback|
|**totalCount**|Integer|总工作节点个数|
|**updatedCount**|Integer|升级完成工作节点个数|
### <div id="tag">Tag</div>
|名称|类型|描述|
|---|---|---|
|**key**|String|Tag键|
|**value**|String|Tag值|
### <div id="nodenetwork">NodeNetwork</div>
|名称|类型|描述|
|---|---|---|
|**podSubnetId**|String|pod子网的id|
|**nodeSubnetId**|String|node子网的id|
|**serviceSubnetId**|String|service子网的id|
|**servicePublicSubnetId**|String|service关联LB的具有公网访问能力的子网id|
|**nodeNetworkCidr**|String|node的cidr|
|**vpcId**|String|vpc id|
### <div id="nodeconfig">NodeConfig</div>
|名称|类型|描述|
|---|---|---|
|**instanceType**|String|实例类型|
|**imageId**|String|镜像信息|
|**keyNames**|String[]|云主机SSH密钥对名称|
|**systemDiskCategory**|String|云主机磁盘类型|
|**systemDiskSize**|Integer|云主机云盘系统盘大小  单位(GB)|
|**systemDiskType**|String|云主机云盘系统盘类型|
|**systemDiskIops**|Integer|云主机云盘 iops，仅限 ssd 类型云盘有效|
|**labels**|[LabelSpec[]](describecluster#labelspec)|工作节点组标签|
### <div id="labelspec">LabelSpec</div>
|名称|类型|描述|
|---|---|---|
|**key**|String|key包含两个部分：prefix与name，name是必须的，prefix是可选的。prefix与name分隔用"/"。 <br>name 可以是字母，数字，[-_.]。长度小于63。prefix：遵循DNS标准（例如：kubernetes.io/），长度不超过253 <br>[参照](https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/#syntax-and-character-set)    <br>|
|**value**|String|字母，数字,[-_.],长度不超过63|

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
