# createInstances


## 描述

创建一台或多台指定配置的云主机实例。

实例有三种创建方式，不同方式下传参详见下方的请求[参数说明](createInstances#user-content-requestparameters)，也可参考请求[示例](createInstances#user-content-1)。

1、自定义创建：按配置要求逐一指定参数创建；<br>

2、使用实例模板创建：[实例模板](https://docs.jdcloud.com/virtual-machines/instance-template-overview)是实例配置信息的预配置，通过实例模板可快速创建实例，省去逐一配置参数的步骤。指定实例模板创建时，如不额外指定模板包含的参数将以模板为准创建实例，模板中未包含的参数，如可用区、内网IPv4地址、名称等仍需指定；<br>

3、基于高可用组创建：[高可用组](https://docs.jdcloud.com/availability-group/product-overview)是一种高可用部署解决方案，提供了组内实例在数据中心内横跨多个故障域均衡部署的机制。高可用组须搭配实例模板使用，基于高可用组创建的实例将在其指定的可用区内以实例模板配置按一定分散机制创建实例。此创建方式下，实例创建参数除内网IPv4地址、名称等外均以实例模板为准且不支持再次指定。

详细操作说明请参考帮助文档：[创建实例](https://docs.jdcloud.com/cn/virtual-machines/create-instance)

## 接口说明
- 创建实例前，请参考 [创建前准备](https://docs.jdcloud.com/virtual-machines/account-preparation-linux) 完成实名认证、支付方式确认、计费类型选择等准备工作。
- 创建实例的配置说明和选择指导，请参考 [配置项说明](https://docs.jdcloud.com/cn/virtual-machines/select-configuration-linux)。
- 各地域下实例及关联资源（云硬盘、弹性公网IP）的可创建数量受配额限制，创建前请通过 [DescribeQuotas](https://docs.jdcloud.com/cn/virtual-machines/api/describequotas?content=API) 确认配额，如须提升请 [提交工单](https://ticket.jdcloud.com/applyorder/submit) 或联系京东云客服。
- 不同地域及可用区下售卖的实例规格有差异，可通过 [DescribeInstanceTypes](https://docs.jdcloud.com/virtual-machines/api/describeinstancetypes?content=API) 查询在售规格及规格详细信息。
- 通过本接口创建包年包月实例时将自动从账户扣款（代金券优先），如需使用第三方支付方式请通过控制台创建。
- 单次请求最多支持创建 `100` 台实例。
- 本接口为异步接口，请求下发成功后会返回RequestId和实例ID，此时实例处于 `Pending`（创建中）状态。如创建成功则实例自动变为 `Running`（运行中）状态；如创建失败则短暂处于 `Error`（错误）状态，随后将自动删除（创建失败的实例不会收费且会自动释放占用的配额）。实例状态可以通过 [describeInstanceStatus](https://docs.jdcloud.com/virtual-machines/api/describeinstancestatus?content=API) 接口查询。
- 批量创建多台实例时系统将尽可能完成目标创建数量，但受底层资源、配额等因素影响，可能存在部分成功部分失败的情况，还请关注最终完成数量，如有失败情况请尝试重新申请或联系客服。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instances

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|

## <div id="user-content-requestparameters">请求参数</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**instanceSpec**|[InstanceSpec](createInstances#user-content-1)|是| |实例配置。<br>|
|**maxCount**|Integer|否|10|创建实例的数量，不能超过用户配额。<br>取值范围：`[1,100]`；默认值：`1`。<br>如果在弹性网卡中指定了内网IP地址，那么单次创建 `maxCount` 只能是 `1`。<br>|
|**clientToken**|String|否| jd71-13hb-12dk-p123|用于保证请求的幂等性。由客户端生成，并确保不同请求中该参数唯一，长度不能超过64个字符。<br>|

### <div id="user-content-2">InstanceSpec</div>

|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**agId**|String|否|ag-81qq****pn|高可用组ID。指定此参数后，将默认使用高可用组关联的实例模板创建实例，实例模板中的参数不可覆盖替换。实例模板以外的参数（内网IPv4/Ipv6分配方式、名称、描述、标签）可指定。<br>|
|**instanceTemplateId**|String|否|it-u3o8****yy|实例模板ID。指定此参数后，如实例模板中参数不另行指定将默认以模板配置创建实例，如指定则以指定值为准创建。<br>指定 `agId` 时此参数无效。<br>|
|**az**|String|否|cn-north-1a|实例所属的可用区。<br>如不指定 `agId` 以使用高可用组设置的可用区，此参数为必选。<br>|
|**instanceType**|String|否|g.n2.xlarge|实例规格。可通过 [DescribeInstanceTypes](https://docs.jdcloud.com/virtual-machines/api/describeinstancetypes) 接口查询各地域及可用区下的规格售卖情况。<br>如不指定 `agId` 或 `instanceTemplateId` 以使用实例模板中配置的规格，此参数为必选。<br>|
|**imageId**|String|否| img-m5s0****29|镜像ID。可通过 [DescribeImages](https://docs.jdcloud.com/virtual-machines/api/describeimages) 接口获得指定地域的镜像信息。<br>如不指定 `agId` 或 `instanceTemplateId` 以使用实例模板中配置的镜像，此参数为必选。<br>|
|**name**|String|是|instance-\[001\]-ops|实例名称。长度为2\~128个字符，只允许中文、数字、大小写字母、英文下划线（\_）、连字符（-）及点（.），不能以（.）作为首尾。<br>批量创建多台实例时，可在name中非首位位置以\[start_number]格式来设置有序name。start_number为起始序号，其位数代表编号字符位数，范围：\[0,9999]。详情参见[为实例设置有序名称及Hostname]()。<br>|
|**hostname**|String|否|instance-\[001\]-ops|实例hostname。若不指定hostname，则默认以实例名称 `name` 作为hostname，但是会以RFC 952和RFC 1123命名规范做一定转义。<br>**Windows系统**：长度为2\~15个字符，允许大小写字母、数字或连字符（-），不能以连字符（-）开头或结尾，不能连续使用连字符（-），也不能全部使用数字。不支持点号（.）。<br>**Linux系统**：长度为2-64个字符，允许支持多个点号，点之间为一段，每段允许使用大小写字母、数字或连字符（-），但不能连续使用点号（.）或连字符（-），不能以点号（.）或连字符（-）开头或结尾。<br>批量创建多台实例时，可在hostname中非首位位置以\[start_number]格式来设置有序hostname。start_number为起始序号，其位数代表编号字符位数，范围：\[0,9999]。详情参见[为实例设置有序名称及Hostname]()。|
|**password**|String|否|Instance@010|实例密码。可用于SSH登录和VNC登录。长度为8\~30个字符，必须同时包含大、小写英文字母、数字和特殊符号中的三类字符。特殊符号包括：\(\)\`~!@#$%^&\*\_-+=\|{}\[ ]:";'<>,.?/，更多密码输入要求请参见 [公共参数规范](https://docs.jdcloud.com/virtual-machines/api/general_parameters)。<br>如指定密钥且 `passwordAuth` 设置为 `true` ，则密码不会生成注入，否则即使不指定密码系统也将默认自动生成随机密码，并以短信和邮件通知。<br>|
|**keyNames**|String[]|否|\[&quot;keypair001&quot;\]|密钥对名称。仅Linux系统下该参数生效，当前仅支持输入单个密钥。<br>|
|**elasticIp**|[ElasticIpSpec](createInstances#user-content-11)|否| |主网卡主IP关联的弹性公网IP配置。<br>|
|**primaryNetworkInterface**|[InstanceNetworkInterfaceAttachmentSpec](createInstances#user-content-9)|否| |主网卡配置。<br>|
|**systemDisk**|[InstanceDiskAttachmentSpec](createInstances#user-content-7)|否| |系统盘配置。<br>|
|**dataDisks**|[InstanceDiskAttachmentSpec[]](createInstances#user-content-7)|否| |数据盘配置。单实例最多可挂载云硬盘（系统盘+数据盘）的数量受实例规格的限制。<br>|
|**charge**|[ChargeSpec](createInstances#user-content-6)|否| |计费配置。<br>云主机不支持按用量方式计费，默认为按配置计费。<br>打包创建数据盘的情况下，数据盘的计费方式只能与云主机保持一致。<br>打包创建弹性公网IP的情况下，若公网IP的计费方式没有指定为按用量计费，那么公网IP计费方式只能与云主机保持一致。<br>|
|**metadata**|[Metadata[]](createInstances#user-content-5)|否| |用户自定义元数据。以key-value键值对形式指定，可在实例系统内通过元数据服务查询获取。最多支持40对键值对，且key不超过256字符，value不超过16KB，不区分大小写。<br>注意：key不要以连字符(-)结尾，否则此key不生效。<br>|
|**userdata**|[Userdata[]](createInstances#user-content-4)|否| |自定义脚本。目前仅支持启动脚本，即 `launch-script`，须 `base64` 编码且编码前数据长度不能超过16KB。<br>**linux系统**：支持 `bash` 和 `python`，编码前须分别以 `#!/bin/bash` 和 `#!/usr/bin/env python` 作为内容首行。<br>**Windows系统**：支持 `bat` 和 `powershell`，编码前须分别以 `<cmd></cmd>和<powershell></powershell>` 作为内容首、尾行。<br>|
|**description**|String|否| |实例描述。256字符以内。<br>|
|**noPassword**|Boolean|否| |使用实例模板创建实例时，如模板中已设置密码，期望不使用该密码而由系统自动生成时，可通过此参数（`true`）实现。<br>可选值：<br>`true`：不使用实例模板中配置的密码。<br>`false`：使用实例模板中配置的密码。<br>仅在未指定 `agId` 且指定 `instanceTemplateId`，且 `password` 为空时，此参数(`true`)生效。<br>|
|**noKeyNames**|Boolean|否| |使用实例模板创建实例时，如模板中已设置密钥，期望不使用该密钥仅使用密码作为登录凭证时，可通过此参数（`true`）实现。<br>仅在未指定 `agId` 且指定 `instanceTemplateId`，且 `keyNames` 为空时，此参数(`true`)生效。<br>|
|**noElasticIp**|Boolean|否| |使用实例模板创建实例时，如模板中已设置弹性公网IP，期望不绑定弹性公网IP时，可通过此参数（`true`）实现。<br>仅在未指定 `agId` 且指定 `instanceTemplateId`，且 `elasticIp` 为空时，此参数(`true`)生效。<br>|
|**userTags**|[Tag[]](createInstances#user-content-3)|否| |自定义实例标签。以key-value键值对形式指定，最多支持10个标签。key不能以 "jrn:" 或“jdc-”开头，仅支持中文、大/小写英文、数字及如下符号：`\_.,:\/=+-@`。<br>|
|**chargeOnStopped**|String|否|stopCharging|停机不计费模式。该参数仅对按配置计费且系统盘为云硬盘的实例生效，并且不是专有宿主机中的实例。配置停机不计费且停机后，实例部分将停止计费，且释放实例自身包含的资源（CPU/内存/GPU/本地数据盘）。<br>可选值：<br>`keepCharging`（默认值）：停机后保持计费，不释放资源。<br>`stopCharging`：停机后停止计费，释放实例资源。<br>|
|**autoImagePolicyId**|String|否|pol-xgsc****7e|自动任务策略ID。<br>|
|**passwordAuth**|String|否|True|允许SSH密码登录。<br>可选值：<br>`yes`（默认值）：允许SSH密码登录。<br>`no`：禁止SSH密码登录。<br>仅在指定密钥时此参数有效，指定此参数后密码即使输入也将被忽略，同时会在系统内禁用SSH密码登录。<br>|
|**imageInherit**|String|否|no |使用镜像中的登录凭证，无须再指定密码或密钥（指定无效）。<br>可选值：<br>`yes`：使用镜像登录凭证。<br>`no`（默认值）：不使用镜像登录凭证。<br>仅使用私有或共享镜像时此参数有效。<br>|

### <div id="user-content-3">Tag</div>

|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**key**|String|否|环境|标签key。长度不能超过127字符，不能以 `jrn:` 或 `jdc-` 开头，仅支持中文、大/小写英文、数字及如下符号：`\_.,:\/=+-@`。|
|**value**|String|否|测试|标签value。长度不能超过255字符，仅支持中文、大/小写英文、数字及如下符号：`\_.,:\/=+-@`。|

### <div id="user-content-4">Userdata</div>

|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**key**|String|否|launch-script|脚本类型，当前仅支持输入 `launch-script`，即启动脚本。|
|**value**|String|否|IyEvYmluL2Jhc2gKZWNobyAnMTIzJw|脚本内容，须 `Base64` 编码，且编码前长度不能超过16KB。|

### <div id="user-content-5">Metadata</div>

|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**key**|String|否|index|key，字符长度不超过256，支持全字符。不能以连字符(-)结尾，否则此key不生效。|
|**value**|String|否|1|value，字符长度不超过16KB，支持全字符。|

### <div id="user-content-6">ChargeSpec</div>

|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**chargeMode**|String|否|prepaid_by_duration |计费模式。<br>可选值：<br>`postpaid_by_duration`（默认值）：按配置（后付费）<br>`prepaid_by_duration`：包年包月（预付费）<br>`postpaid_by_usage`：按用量（后付费）<br>仅弹性公网IP支持`postpaid_by_usage`，具体计费说明请参考[实例计费类型说明](https://docs.jdcloud.com/cn/virtual-machines/billing-overview)。|
|**chargeUnit**|String|否| month|包年包月（预付费）付费单位。仅`chargeMode=prepaid_by_duration`时此参数有效。<br>可选值：<br>`month`（默认值）：月<br>`year`：年|
|**chargeDuration**|Integer|否|1 |包年包月（预付费）付费单位。仅`chargeMode=prepaid_by_duration`时此参数有效。<br>取值范围：<br>`chargeUnit=month`时：`[1,9]`<br>`chargeUnit=year`时：`[1,3]`|
|**autoRenew**|Boolean|否|true |自动续费。<br>可选值：<br>`True`：开通自动续费<br>`False`（默认值）：不开通自动续费|
|**buyScenario**|String|否| |统一活动凭证。此参数暂未启用，无须指定且指定无效。|

### <div id="user-content-7">InstanceDiskAttachmentSpec</div>

|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**diskCategory**|String|否|cloud|磁盘类型。<br>**系统盘**：此参数无须指定，其类型取决于镜像类型。<br>**数据盘**：可选值：`cloud`：云硬盘，数据盘仅支持云硬盘。<br>|
|**autoDelete**|Boolean|否|True|是否随实例一起删除，即删除实例时是否自动删除此磁盘。此参数仅对按配置计费的非多点挂载云硬盘生效。<br>`true`：随实例删除。<br>`false`（默认值）：不随实例删除。<br>|
|**cloudDiskSpec**|[diskspec](createInstances#user-content-8)|否| |磁盘详细配置。此参数仅针对云硬盘，本地系统盘无须指定且指定无效。<br>|
|**deviceName**|String|否|vdb|磁盘逻辑挂载点。<br>**系统盘**：此参数无须指定且指定无效，默认为vda。<br>**数据盘**：取值范围：`[vdb~vdbm]`。<br>|
|**noDevice**|Boolean|否| |排除设备，使用此参数 `noDevice` 配合 `deviceName` 一起使用。<br>创建镜像的场景下：使用此参数可以排除云主机实例中的云硬盘不参与制作快照。<br>创建实例模板的场景下：使用此参数可以排除镜像中的数据盘。<br>创建云主机的场景下：使用此参数可以排除实例模板、或镜像中的数据盘。<br>示例：如果镜像中除系统盘还包含一块或多块数据盘，期望仅使用镜像中的部分磁盘，可通过此参数忽略部分磁盘配置。此参数须配合 `deviceName` 一起使用。<br>例：`deviceName=vdb`、`noDevice=true`，则表示在使用镜像创建实例时，忽略数据盘vdb配置，不创建磁盘。|

### <div id="user-content-8">DiskSpec</div>

|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**az**|String|否| |云硬盘可用区。创建实例时此参数无须指定且指定无效。云硬盘可用区默认同实例。|
|**name**|String|否| |云硬盘名称。创建实例时此参数无须指定。如指定则按指定名称创建，如不指定云硬盘名称同实例名称，创建多块磁盘时会在名称后依次追加序号1,2...。|
|**description**|String|否| |云硬盘描述。|
|**diskType**|String|是|ssd.gp1 |云硬盘类型。各类型介绍请参见[云硬盘类型](https://docs.jdcloud.com/cn/cloud-disk-service/specifications)。<br>可选值：<br>`ssd.gp1`：通用型SSD<br>`ssd.io1`：性能型SSD<br>`hdd.std1`：容量型SSD<br>|
|**diskSizeGB**|Integer|是|50 |云硬盘容量，单位为 GiB，步长10GiB。<br>取值范围：<br>系统盘：`[40,500]`GiB，且不能小于镜像系统盘容量<br>数据盘：`[20,16000]`GiB，如指定`snapshotId`创建云硬盘则不能小于快照容量|
|**iops**|Integer|否| 2000|云硬盘IOPS，步长为10。仅`diskType=ssd.io1`时此参数有效。<br>取值范围：`[200,min(32000,diskSizeGB*50)]`<br>默认值：`diskSizeGB*30`|
|**snapshotId**|String|否|snapshot-ev1h****gd |创建云硬盘使用的快照ID。|
|**policyId**|String|否| ss-policy-5v25****us |云硬盘自动快照策略ID。|
|**charge**|[ChargeSpec](createInstances#user-content-6)|否| |云硬盘计费配置。创建实例时此参数无须指定且指定无效，云硬盘计费类型默认与实例计费类型一致。|
|**multiAttachable**|Boolean|否||云硬盘是否支持多点挂载。创建实例时此参数无须指定。|
|**encrypt**|Boolean|否| false|云硬盘是否加密。<br>可选值：<br>`true`：加密<br>`false`（默认值）：不加密|

### <div id="user-content-9">InstanceNetworkInterfaceAttachmentSpec</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**deviceIndex**|Integer|否|1|网卡设备Index。创建实例时此参数无须指定且指定无效。<br>对于主网卡默认Index为1。<br>|
|**autoDelete**|Boolean|否|true|是否随实例一起删除。<br>`true`：随实例删除。<br>`false`：不随实例删除。<br>主网卡此属性默认为`true`|
|**networkInterface**|[NetworkInterfaceSpec](createInstances#user-content-10)|否| |网卡设备详细配置。<br>|

### <div id="user-content-10">NetworkInterfaceSpec</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**subnetId**|String|是|subnet-8kbl****er |子网ID|
|**az**|String|否| |网卡可用区。创建实例时此参数无须指定且指定无效。|
|**networkInterfaceName**|String|否| |网卡名称。创建实例时此参数无须指定且指定无效。|
|**primaryIpAddress**|String|否| 10.192.0.\*\* |网卡主IP。如不指定，则自动从所选子网可用IP中分配；如指定，请在在子网可用IP范围内指定。<br>指定IP地址时，主机数量`maxCount`仅可指定为`1`。|
|**secondaryIpAddresses**|String[]|否| |网卡辅助内网IP地址。创建实例时此参数无须指定且指定无效。|
|**secondaryIpCount**|Integer|否| |自动分配的网卡辅助内网IP数量。创建实例时此参数无须指定且指定无效|
|**securityGroups**|String[]|否| sg-1r4z****ra |实例（主网卡）所属绑定的安全组ID。最多可指定5个。|
|**sanityCheck**|Integer|否| |参数已弃用，指定无效。|
|**description**|String|否| |网卡描述。创建实例时此参数无须指定且指定无效。|

### <div id="user-content-11">ElasticIpSpec</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**bandwidthMbps**|Integer|是|10|弹性公网IP的带宽上限，单位：Mbps。<br>取值范围为：`[1-200]`。|
|**provider**|String|是| bgp|弹性公网IP线路。中心可用区目前仅提供BGP类型IP。|
|**chargeSpec**|[ChargeSpec](#chargespec)|否| |弹性公网IP计费配置。<br>**中心可用区**：支持包年包月、按配置、按流量。<br>**边缘可用区**：支持包年包月、按配置。<br>中心可用区下如指定按流量计费，则IP计费独立于实例的计费类型，否则以实例计费类型为准与其保持一致。|

## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**result**|[Result](createInstances#user-content-12)| |响应结果。|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

### <div id="user-content-12">Result</div>

|名称|类型|示例值|描述|
|---|---|---|---|
|**instanceIds**|String[]|\[&quot;i-eumm\*\*\*\*d6&quot;,&quot;i-y5nh\*\*\*\*9w&quot;\]|实例ID列表。|


## 请求示例

<div id="user-content-1"></div>

调用方法、签名算法及公共请求参数请参考 [京东云OpenAPI公共说明](https://docs.jdcloud.com/common-declaration/api/introduction)。

#### 场景1：自定义创建
华北可用区A，创建1台 `g.n2.large` 规格的按配置计费实例，同时设置 `密码` 和 `SSH密钥`，创建并绑定5Mbps的 `BGP IP`，系统盘类型指定为 `通用型SSD`，随实例创建一块20GB的 `性能型SSD` 并设定 `iops` 为1000，配置实例为停机不计费。

- 请求示例

POST

```JSON
/v1/regions/cn-north-1/instances
{
  "maxCount":1,
  "InstanceSpec":{
    "az":"cn-north-1a",
    "ImageId":"img-m5s0****29",
    "InstanceType":"g.n2.large",
    "name":"instance",
    "password":"A1i2n@Apix#",
    "keyNames":[
      "ssh-key-test"
    ],
    "elasticIp":{
      "bandwidthMbps":5,
      "provider":"bgp"
    },
    "primaryNetworkInterface":{
      "networkInterface":{
        "subnetId":"subnet-c2p3****9o",
        "securityGroups":[
          "sg-p2d1****ya"
        ]
      }
    },
    "systemDisk":{
      "cloudDiskSpec":{
        "diskType":"ssd.gp1"
      }
    },
    "dataDisks":[
    {
      "diskCategory":"cloud",
      "cloudDiskSpec":{
        "diskType":"ssd.io1",
        "diskSizeGB":20,
        "iops":1000
      }
    }
    ],
    "chargeOnStopped":"stopCharging"
  }
}
```

- 返回示例

```JSON
{
  "result":{
    "instanceIds":[
      "i-eumm****d6"
    ]
  },
  "requestId":"c2i8w4g6fiqocr2fetqf8ef59k1k4wir"
}
```
#### 场景2：使用实例模板创建
华北可用区A，使用实例模板创建1台包年包月计费实例，包月时长1个月并开通自动续费功能，并重新指定密码和SSH密钥。

- 请求示例

POST

```JSON
/v1/regions/cn-north-1/instances
{
  "maxCount":1,
  "InstanceSpec":{
    "az":"cn-north-1a",
    "instanceTemplateId":"it-u3o8****yy",
    "name":"instance",
    "password":"A1i2n@Apix#",
    "keyNames":[
      "ssh-key-test"
    ],
    "charge":{
      "chargeMode":"prepaid_by_duration",
      "chargeUnit":"month",
      "chargeDuration":1,
      "autoRenew":true
    }
  }
}
```

- 返回示例

```JSON
{
  "result":{
    "instanceIds":[
      "i-eumm****d6"
    ]
  },
  "requestId":"c2i91887dpbocwfgkaa55jj1ugdh5rjs"
}
```
#### 场景3：基于高可用组创建
基于高可用组创建实例，除名称必须指定外，另外增加tag用于标识实例环境信息。

- 请求示例

POST

```JSON
/v1/regions/cn-north-1/instances
{
  "maxCount":2,
  "InstanceSpec":{
    "agId":"ag-81qq****pn",
    "name":"instance",
    "userTags":[
    {
      "key":"environment",
      "value":"test"
    }
    ]
  }
}

```
- 返回示例

```JSON
{
  "result":{
    "instanceIds":[
      "i-eumm****d6",
      "i-y5nh****9w"
    ]
  },
  "requestId":"c2i8cp2nk66nivcf85gvhad46ggjich6"
}
```



## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**400**|INVALID_ARGUMENT|Parameter InstanceSpec.ImageId missing|参数ImageId不可为空。|
|**400**|INVALID_ARGUMENT|Invalid password|密码不符合规范。|
|**400**|FAILED_PRECONDITION|Disk type 'xx' is out of stock|所选类型云硬盘已售罄。|
|**400**|FAILED_PRECONDITION|Image 'xx' not ready|所选镜像处于非可用状态。|
|**400**|FAILED_PRECONDITION|stopCharging only applied to cloud system disk|仅系统盘类型为云硬盘的实例支持配置stopCharging参数。|
|**400**|FAILED_PRECONDITION|stopCharging only applied to postpaid by duration|仅计费类型为按配置计费的实例实例支持配置stopCharging参数。|
|**400**|FAILED_PRECONDITION|Image constraints. Only support cloud system disk|所选镜像仅支持硬云盘系统盘。|
|**400**|FAILED_PRECONDITION|Image constraints. Doesn't support instanceType 'xx'|所选镜像不支持当前配置的实例规格。|
|**400**|FAILED_PRECONDITION|Subnet 'xx' is unsupported in center zones|所选子网在中心可用区不可用。|
|**400**|FAILED_PRECONDITION|Available Ip in segments not enough|所选子网可用内网IP数量不足。|
|**400**|OUT_OF_RANGE|Maxcount out of range|创建数量超过允许上限。|
|**400**|OUT_OF_RANGE|InstanceSpec.SystemDisk.CloudDiskSpec.DiskSizeGB out of range|系统盘容量超出允许范围。|
|**400**|CONFLICT|Subnet 'xx' not support ipv6|所选子网不支持IPv6。|
|**404**|NOT_FOUND|Snapshot 'xx' not found|指定的快照不存在。|
|**404**|NOT_FOUND|InstanceType 'xx' not found|实例规格不存在。|
|**404**|NOT_FOUND|Subnet 'xx' not found|子网不存在。|
|**404**|NOT_FOUND|SecurityGroups 'xx' not found|安全组不存在。|
|**404**|NOT_FOUND|KeyPair 'xx' not found|密钥不存在。|
|**404**|NOT_FOUND|Image 'xx' not found|镜像不存在。|
|**429**|QUOTA_EXCEEDED|Instance quota limit exceeded|云主机配额不足。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
