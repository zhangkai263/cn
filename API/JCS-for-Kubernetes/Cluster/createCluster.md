# createCluster


## 描述
- 创建集群
- 证书
  - 关于kubernetes的证书，默认生成，不需要用户传入。
- nodegroup
  - cluster必须与nodeGroup进行绑定
  - cluster支持多nodegroup
  - 状态
    - pending,reconciling,deleting状态不可以操作更新接口
    - running，running_with_error状态可以操作nodegroup所有接口
    - error状态只可以查询，删除
    - delete状态的cluster在十五分钟内可以查询，十五分钟后无法查询到
- 状态限制
  - pending,reconciling,deleting状态不可以操作更新接口
  - running状态可以操作cluster所有接口
  - error状态只可以查询，删除
  - delete状态的cluster在十五分钟内可以查询，十五分钟后无法查询到


## 请求方式
POST

## 请求地址
https://kubernetes.jdcloud-api.com/v1/regions/{regionId}/clusters

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域 ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |名称（同一用户的 cluster 允许重名）|
|**description**|String|False| |描述|
|**basicAuth**|Boolean|False| |默认开启 basicAuth与clientCertificate最少选择一个|
|**clientCertificate**|Boolean|False| |默认开启 clientCertificate|
|**version**|String|False| |kubernetes的版本|
|**azs**|String[]|True| |集群所在的az|
|**nodeGroup**|[NodeGroupSpec](createcluster#nodegroupspec)|True| |集群节点组|
|**masterCidr**|String|True| |k8s的master的cidr|
|**accessKey**|String|True| |用户的AccessKey，插件调用open-api时的认证凭证|
|**secretKey**|String|True| |用户的SecretKey，插件调用open-api时的认证凭证|
|**userMetrics**|Boolean|False| |deprecated 在addonsConfig中同时指定，将被addonsConfig的设置覆盖 <br>是否启用用户自定义监控|
|**addonsConfig**|[AddonConfigSpec[]](createcluster#addonconfigspec)|False| |集群组件配置|

### <div id="addonconfigspec">AddonConfigSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |组件名称，目前支持customMetrics、logging|
|**enabled**|Boolean|False| |是否开启该组件，默认为false。|
### <div id="nodegroupspec">NodeGroupSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |名称|
|**description**|String|False| | |
|**nodeConfig**|[NodeConfigSpec](createcluster#nodeconfigspec)|True| |工作节点组的信息|
|**azs**|String[]|False| |工作节点组的 az，必须为集群az的子集，默认为集群az|
|**initialNodeCount**|Integer|True| |工作节点组初始化大小，至少为1个|
|**vpcId**|String|True| |工作节点组运行的vpc|
|**nodeCidr**|String|False| |工作节点组的cidr|
|**autoRepair**|Boolean|False| |是否开启自动修复，默认不开启。|
|**caConfig**|[CAConfigSpec](createcluster#caconfigspec)|False| |自动伸缩配置|
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
|**systemDisk**|[DiskSpec](createcluster#diskspec)|False| |云主机系统盘配置信息|
|**labels**|[LabelSpec[]](createcluster#labelspec)|False| |工作节点组标签，最多支持 10 个|
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
|**result**|[Result](createcluster#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**clusterId**|String| |

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
