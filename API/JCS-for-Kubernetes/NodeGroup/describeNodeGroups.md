# describeNodeGroups


## 描述
查询工作节点组列表

## 请求方式
GET

## 请求地址
https://kubernetes.jdcloud-api.com/v1/regions/{regionId}/nodeGroups

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False| |页码；默认为1|
|**pageSize**|Integer|False| |分页大小；默认为20；取值范围[10, 100]|
|**tags**|[TagFilter[]](describenodegroups#tagfilter)|False| |Tag筛选条件|
|**filters**|[Filter[]](describenodegroups#filter)|False| |name - 节点组名称，模糊匹配，支持单个<br>id - 节点组 id，支持多个<br>clusterId - 根据 clusterId 查询<br>clusterName - 根据 cluster 名称查询<br>|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|
### <div id="tagfilter">TagFilter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**key**|String|False| |Tag键|
|**values**|String[]|False| |Tag值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describenodegroups#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**nodeGroups**|[NodeGroup[]](describenodegroups#nodegroup)| |
|**totalCount**|Number| |
### <div id="nodegroup">NodeGroup</div>
|名称|类型|描述|
|---|---|---|
|**clusterId**|String|集群 id|
|**nodeGroupId**|String|工作节点组 id|
|**name**|String|工作节点组名称|
|**description**|String|工作节点组描述|
|**nodeConfig**|[NodeConfig](describenodegroups#nodeconfig)|工作节点组配置信息|
|**version**|String|工作节点版本|
|**nodeNetwork**|[NodeNetwork](describenodegroups#nodenetwork)|工作节点所属的网络信息|
|**currentCount**|Integer|当前工作节点数量|
|**expectCount**|Integer|期望的工作节点数量|
|**agId**|String|工作节点组的ag id ，通过agid可以查询该工作节点组下的实例|
|**azs**|String[]|工作节点组所在的 az|
|**instanceTemplateId**|String|工作节点组的 ag 对应的实例模板|
|**state**|String|状态  [pending,running,resizing,reconciling,deleting,deleted,error,running_with_error(部分节点有问题)]|
|**tags**|[Tag[]](describenodegroups#tag)| |
|**updateTime**|String|更新时间|
|**stateMessage**|String|状态变更原因|
|**autoRepair**|Boolean|是否开启自动修复|
|**progress**|[NodeGroupProgress](describenodegroups#nodegroupprogress)|控制节点操作进度|
|**caConfig**|[CAConfig](describenodegroups#caconfig)|自动伸缩配置|
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
|**labels**|[LabelSpec[]](describenodegroups#labelspec)|工作节点组标签|
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
|**500**|Internal server error|
|**503**|Service unavailable|
