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
|**result**|Result| |
|**requestId**|String| |

### Result
|名称|类型|描述|
|---|---|---|
|**cluster**|Cluster| |
### Cluster
|名称|类型|描述|
|---|---|---|
|**clusterId**|String|集群id|
|**name**|String|名称|
|**description**|String|描述|
|**version**|String|kubernetes的版本|
|**azs**|String[]|集群所在的az|
|**nodeGroups**|NodeGroup[]|节点组列表|
|**clusterCidr**|String|k8s的cluster的cidr|
|**masterAuth**|MasterAuth|认证信息|
|**clusterState**|String|状态  [pending,running,reconciling（升级时的状态）, deleting, deleted, error]|
|**stateMessage**|String|状态变更原因|
|**updateTime**|String|更新时间|
|**createTime**|String|创建时间|
|**accessKey**|String|用户的AccessKey，插件调用open-api时的认证凭证|
|**basicAuth**|Boolean| |
|**clientCertificate**|Boolean| |
|**endpoint**|String|用户访问的ip|
|**endpointPort**|String|endpoint的port|
|**dashboardPort**|String|endpoint的dashboard port|
|**userMetrics**|Boolean|deprecated 优先以addonsConfig中的配置为准 <br>用户是否启用集群自定义监控，true 表示开启用，false 表示未开启用|
|**addonsConfig**|AddonConfig[]|集群组件配置信息|
|**autoUpgrade**|Boolean|是否开启集群自动升级，true 表示开启，false 表示未开启|
|**maintenanceWindow**|MaintenanceWindow|配置集群维护策略|
|**upgradePlan**|UpgradePlan|集群升级计划信息, 仅展示最新一条升级计划信息|
|**masterProgress**|MaintenanceWindow|控制节点操作进度|
### MaintenanceWindow
|名称|类型|描述|
|---|---|---|
|**periodType**|String|daily, weekly, monthly， 默认 weekly|
|**startDay**|Integer|维护操作开始具体日期, 仅对 periodType 取值为 weekly 或 monthly 时有效, periodType 为 weekly 时可以取 1-7, periodType 为 monthly 时可取 1-28<br>|
|**startTime**|String|维护操作开始具体时间. 时间格式符合RFC3339，并使用 UTC 时间，精确到分钟，例如 23:27|
|**duration**|Integer|维护运行时长: 4-24 小时，步长 1 小时， 默认为： 4小时|
### UpgradePlan
|名称|类型|描述|
|---|---|---|
|**mode**|String|升级方式 auto, manual|
|**scope**|String|升级范围 cluster, master, nodegroup|
|**state**|String|升级计划状态 waiting, upgrading|
|**masterExpectedVersion**|String|master 期望版本|
|**nodeExpectedVersion**|String|node 期望版本|
|**startTime**|String|升级启动时间|
|**duration**|Integer|持续时长|
### AddonConfig
|名称|类型|描述|
|---|---|---|
|**name**|String|组件名称|
|**enabled**|Boolean|组件是否开启|
### MasterAuth
|名称|类型|描述|
|---|---|---|
|**clusterCaCertificate**|String|base64编码，集群的根的public certificate|
|**clientCertificate**|String|base64编码，客户端连接集群的public certificate|
|**clientKey**|String|base64编码, client的私钥|
|**user**|String|basic auth的user|
|**password**|String|basic auth的password|
### NodeGroup
|名称|类型|描述|
|---|---|---|
|**clusterId**|String|集群id|
|**nodeGroupId**|String|node group id|
|**name**|String|名称|
|**description**|String|描述|
|**nodeConfig**|NodeConfig|Node的信息|
|**version**|String|k8s中的node的版本|
|**nodeNetwork**|NodeNetwork|node所属的网络信息|
|**currentCount**|Integer|当前node数量|
|**expectCount**|Integer|期望的node数量|
|**agId**|String|node group的ag id ，通过agid可以查询该node group下的实例|
|**instanceTemplateId**|String|node group的ag id对应的实例模板|
|**state**|String|状态  [pending,running,resizing,reconciling,deleting,deleted,error,running_with_error(部分节点有问题)]|
|**tags**|Tag[]| |
|**updateTime**|String|更新时间|
|**stateMessage**|String|状态变更原因|
|**autoRepair**|Boolean|是否开启自动修复|
|**progress**|NodeGroupProgress|控制节点操作进度|
|**createdTime**|String|创建时间|
### NodeGroupProgress
|名称|类型|描述|
|---|---|---|
|**nodeGroupId**|String|节点组 id|
|**action**|String|操作类型, upgrade, downgrade, rollback|
|**totalCount**|Integer|总node个数|
|**updatedCount**|Integer|升级完成node个数|
### Tag
|名称|类型|描述|
|---|---|---|
|**key**|String|Tag键|
|**value**|String|Tag值|
### NodeNetwork
|名称|类型|描述|
|---|---|---|
|**podSubnetId**|String|pod子网的id|
|**nodeSubnetId**|String|node子网的id|
|**serviceSubnetId**|String|service子网的id|
|**servicePublicSubnetId**|String|service关联LB的具有公网访问能力的子网id|
|**nodeNetworkCidr**|String|node的cidr|
|**vpcId**|String|vpc id|
### NodeConfig
|名称|类型|描述|
|---|---|---|
|**instanceType**|String|实例类型|
|**imageId**|String|镜像信息|
|**systemDiskSize**|Integer|云盘系统盘的大小  单位(GB)|
|**systemDiskType**|String|云盘系统盘的大小[ssd,premium-hdd]|
|**labels**|LabelSpec[]|Node的信息|
### LabelSpec
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
