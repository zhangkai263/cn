# createInstanceTemplate


## 描述

创建实例模板。

实例模板是创建云主机实例的配置信息模板，包括镜像、实例规格、系统盘及数据盘类型和容量、私有网络及子网配置、安全组及登录信息等。实例模板可用于创建实例及用于配置高可用组（创建高可用组时必须指定实例模板）。使用实例模板创建实例时，无需重新指定实例模板已包括的参数，缩短您的部署时间。

请注意：实例模板一经创建后其属性将不能编辑，如需调整参数请重新创建实例模板替换使用。

详细操作说明请参考帮助文档：[创建实例模板](https://docs.jdcloud.com/cn/virtual-machines/create-instance-template)

## 接口说明
- 创建实例模板的限制基本与创建云主机一致，可参考 [创建云主机](https://docs.jdcloud.com/cn/virtual-machines/create-instance-template)。
- 实例模板中包含创建云主机的大部分配置参数，可以避免每次创建云主机时的重复性配置参数的工作。
- 使用实例模板创建云主机时，如果再次指定了某些参数，并且与实例模板中的参数相冲突，那么新指定的参数会替换模板中的参数，以新指定的参数为准。
- 使用实例模板创建云主机时，如果再次指定了镜像ID，并且与模板中的镜像ID不一致，那么模板中的 `systemDisk` 和 `dataDisks` 配置会失效，以新指定的镜像为准。
- 如果使用高可用组(Ag)创建云主机，那么Ag所关联的模板中的参数都不可以被调整，只能以模板为准。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instanceTemplates

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**instanceTemplateData**|[InstanceTemplateSpec](createInstanceTemplate#user-content-1)|是| |实例模板配置信息。|
|**name**|String|是|test|实例模板的名称，参考 [公共参数规范](https://docs.jdcloud.com/virtual-machines/api/general_parameters)。|
|**description**|String|否|test|实例模板的描述，参考 [公共参数规范](https://docs.jdcloud.com/virtual-machines/api/general_parameters)。|

### <div id="user-content-1">InstanceTemplateSpec</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**instanceType**|String|是|g.n2.xlarge|实例规格，可查询 [DescribeInstanceTypes](https://docs.jdcloud.com/virtual-machines/api/describeinstancetypes) 接口获得指定地域或可用区的规格信息。|
|**imageId**|String|是|img-m5s0****29|镜像ID，可查询 [DescribeImages](https://docs.jdcloud.com/virtual-machines/api/describeimages) 接口获得指定地域的镜像信息。|
|**password**|String|否|Instance@010|实例密码。可用于SSH登录和VNC登录。长度为8\~30个字符，必须同时包含大、小写英文字母、数字和特殊符号中的三类字符。特殊符号包括：\(\)\`~!@#$%^&\*\_-+=\|{}\[ ]:";'<>,.?/，更多密码输入要求请参见 [公共参数规范](https://docs.jdcloud.com/virtual-machines/api/general_parameters)。<br>如指定密钥且 `passwordAuth` 设置为 `true`，则密码不会生成注入，否则即使不指定密码系统也将默认自动生成随机密码，并以短信和邮件通知。<br>|
|**keyNames**|String[]|否|\[&quot;keypair001&quot;\]|密钥对名称。仅Linux系统下该参数生效，当前仅支持输入单个密钥。|
|**metadata**|[Metadata[]](createInstanceTemplate#user-content-2)|否| |用户自定义元数据。以key-value键值对形式指定，可在实例系统内通过元数据服务查询获取。最多支持40对键值对，且key不超过256字符，value不超过16KB，不区分大小写。<br>注意：key不要以连字符(-)结尾，否则此key不生效。<br>|
|**userdata**|[Userdata[]](createInstanceTemplate#user-content-3)|否| |自定义脚本。目前仅支持启动脚本，即 `launch-script`，须 `base64` 编码且编码前数据长度不能超过16KB。<br>**linux系统**：支持 `bash` 和 `python`，编码前须分别以 `#!/bin/bash` 和 `#!/usr/bin/env python` 作为内容首行。<br>**Windows系统**：支持 `bat` 和 `powershell`，编码前须分别以 `<cmd></cmd>和<powershell></powershell>` 作为内容首、尾行。<br>|
|**elasticIp**|[InstanceTemplateElasticIpSpec](createInstanceTemplate#user-content-4)|否| |主网卡主IP关联的弹性公网IP配置。|
|**primaryNetworkInterface**|[InstanceTemplateNetworkInterfaceAttachmentSpec](createInstanceTemplate#user-content-5)|是| |主网卡配置。|
|**systemDisk**|[InstanceTemplateDiskAttachmentSpec](createInstanceTemplate#user-content-6)|否| |系统盘配置。|
|**dataDisks**|[InstanceTemplateDiskAttachmentSpec[]](createInstanceTemplate#user-content-6)|否| |数据盘配置。单实例最多可挂载云硬盘（系统盘+数据盘）的数量受实例规格的限制。|
|**chargeOnStopped**|String|否| |停机不计费模式。该参数仅对按配置计费且系统盘为云硬盘的实例生效，并且不是专有宿主机中的实例。配置停机不计费且停机后，实例部分将停止计费，且释放实例自身包含的资源（CPU/内存/GPU/本地数据盘）。<br>可选值：<br>`keepCharging`（默认值）：停机后保持计费，不释放资源。<br>`stopCharging`：停机后停止计费，释放实例资源。<br>|
|**autoImagePolicyId**|String|否|pol-xgsc****7e|自动任务策略ID。|
|**passWordAuth**|String|否| |允许SSH密码登录。<br>可选值：<br>`yes`（默认值）：允许SSH密码登录。<br>`no`：禁止SSH密码登录。<br>仅在指定密钥时此参数有效，指定此参数后密码即使输入也将被忽略，同时会在系统内禁用SSH密码登录。<br>|
|**imageInherit**|String|否| |使用镜像中的登录凭证，无须再指定密码或密钥（指定无效）。<br>可选值：<br>`yes`：使用镜像登录凭证。<br>`no`（默认值）：不使用镜像登录凭证。<br>仅使用私有或共享镜像时此参数有效。|

### <div id="user-content-6">InstanceTemplateDiskAttachmentSpec</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**diskCategory**|String|否||磁盘类型。<br>**系统盘**：此参数无须指定，其类型取决于镜像类型。<br>**数据盘**：数据盘仅支持云硬盘`cloud`。<br>|
|**autoDelete**|Boolean|否|true|是否随实例一起删除，即删除实例时是否自动删除此磁盘。此参数仅对按配置计费的非多点挂载云硬盘生效。<br>`true`：随实例删除。<br>`false`（默认值）：不随实例删除。<br>|
|**cloudDiskSpec**|[InstanceTemplateDiskSpec](createInstanceTemplate#user-content-7)|否| |磁盘详细配置。此参数仅针对云硬盘，本地系统盘无须指定且指定无效。<br>|
|**deviceName**|String|否|vdb|磁盘逻辑挂载点。<br>**系统盘**：此参数无须指定且指定无效，默认为vda。<br>**数据盘**：取值范围：`[vdb~vdbm]`。<br>|
|**noDevice**|Boolean|否| |排除设备，使用此参数 `noDevice` 配合 `deviceName` 一起使用。<br>创建镜像的场景下：使用此参数可以排除云主机实例中的云硬盘不参与制作快照。<br>创建实例模板的场景下：使用此参数可以排除镜像中的数据盘。<br>创建云主机的场景下：使用此参数可以排除实例模板、或镜像中的数据盘。<br>示例：如果镜像中除系统盘还包含一块或多块数据盘，期望仅使用镜像中的部分磁盘，可通过此参数忽略部分磁盘配置。此参数须配合 `deviceName` 一起使用。<br>例：`deviceName=vdb`、`noDevice=true`，则表示在使用镜像创建实例时，忽略数据盘vdb配置，不创建磁盘。|

### <div id="user-content-7">InstanceTemplateDiskSpec</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**diskType**|String|否|ssd.io1|云硬盘类型。各类型介绍请参见[云硬盘类型](https://docs.jdcloud.com/cn/cloud-disk-service/specifications)。<br>可选值：<br>`ssd.gp1`：通用型SSD<br>`ssd.io1`：性能型SSD<br>`hdd.std1`：容量型SSD<br>
|**diskSizeGB**|Integer|否|50|云硬盘容量，单位为 GiB，步长10GiB。<br>取值范围：<br>系统盘：`[40,500]`GiB，且不能小于镜像系统盘容量<br>数据盘：`[20,16000]`GiB，如指定`snapshotId`创建云硬盘则不能小于快照容量|
|**snapshotId**|String|否|snapshot-h8u1****36|创建云硬盘的快照ID。|
|**policyId**|String|否| ss-policy-5v25****us|云硬盘自动快照策略ID。|
|**encrypt**|Boolean|否| |云硬盘是否加密。<br>可选值：<br>`true`：加密<br>`false`（默认值）：不加密|
|**iops**|Integer|否|1000|云硬盘的最大iops。|

### <div id="user-content-5">InstanceTemplateNetworkInterfaceAttachmentSpec</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**deviceIndex**|Integer|否|1|网卡设备Index。创建实例时此参数无须指定且指定无效。<br>对于主网卡默认Index为1。<br>|
|**autoDelete**|Boolean|否|true|是否随实例一起删除。<br>`true`：随实例删除。<br>`false`：不随实例删除。<br>主网卡此属性默认为`true`|
|**networkInterface**|[InstanceTemplateNetworkInterfaceSpec](createInstanceTemplate#user-content-10)|否| |网卡设备详细配置。<br>|

### <div id="user-content-10">InstanceTemplateNetworkInterfaceSpec</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**subnetId**|String|是|subnet-c2p3****9o|子网ID。|
|**securityGroups**|String[]|否| |安全组ID列表。|
|**sanityCheck**|Integer|否| |参数已弃用，指定无效。|

### <div id="user-content-4">InstanceTemplateElasticIpSpec</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**bandwidthMbps**|Integer|是|20|弹性公网IP的带宽上限，单位：Mbps。<br>取值范围为：`[1-200]`。|
|**provider**|String|否|BGP|弹性公网IP线路。中心可用区目前仅提供`BGP`类型IP。|
|**chargeMode**|String|是|bandwith|计费模式。可选值：<br>`bandwith`：按带宽计费 <br>`flow`：按流量计费 |

### <div id="user-content-3">Userdata</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**key**|String|否|launch-script|脚本类型，当前仅支持输入 `launch-script`，即启动脚本。|
|**value**|String|否|IyEvYmluL2Jhc2gKZWNobyAnMTIzJw|脚本内容，须 `Base64` 编码，且编码前长度不能超过16KB。|

### <div id="user-content-2">Metadata</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**key**|String|否|index|key，字符长度不超过256，支持全字符。不能以连字符(-)结尾，否则此key不生效。|
|**value**|String|否|1|value，字符长度不超过16KB，支持全字符。|

## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**result**|[Result](createInstanceTemplate#user-content-9)| |响应结果。|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

### <div id="user-content-9">Result</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**instanceTemplateId**|String|it-u3o8****yy|实例模板ID。|


## 请求示例
POST

```
/v1/regions/cn-north-1/instanceTemplates
{
    "name":"test",
    "description":"test",
    "instanceTemplateData":{
        "instanceType":"p.n1p40h.3xlarge",
        "imageId":"img-m5s0****29",
        "password":"Instance@010",
        "primaryNetworkInterface":{
            "autoDelete":true,
            "networkInterface":{
                "subnetId":"subnet-c2p3****9o",
                "securityGroups":[
                    "sg-p2d1****ya"
                ]
            }
        },
        "systemDisk":{
            "diskCategory":"cloud",
            "cloudDiskSpec":{
                "diskType":"ssd.gp1",
                "diskSizeGB":100
            },
            "deviceName":"",
            "noDevice":null
        },
        "dataDisks":[
            {
                "diskCategory":"cloud",
                "autoDelete":true,
                "cloudDiskSpec":{
                    "diskType":"hdd.std1",
                    "diskSizeGB":100
                },
                "deviceName":"vdb"
            }
        ],
        "chargeOnStopped":"keepCharging",
        "passwordAuth":"yes",
        "imageInherit":"no"
    }
}
```



## 返回示例
```
{
    "instanceTemplateId": "it-u3o8****yy"
}
```

## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**400**|INVALID_ARGUMENT|Malformed InstanceTemplateData.Password 'xx'|密码格式错误。|
|**400**|FAILED_PRECONDITION|Invalid image status 'xx'|镜像状态错误。|
|**400**|FAILED_PRECONDITION|Image constraints. Only support cloud system disk|本地系统盘选择了云盘系统盘的镜像。|
|**400**|FAILED_PRECONDITION|Image constraints. Only support local system disk|云盘系统盘选择了本地系统盘的镜像。|
|**400**|FAILED_PRECONDITION|Image constraints. Doesn't support instanceType 'xx'|镜像不支持这个实例规格。|
|**400**|CONFLICT|Subnet 'xx' not support ipv6|所选子网不支持IPv6。|
|**400**|OUT_OF_RANGE|InstanceTemplateData.SystemDisk.CloudDiskSpec.DiskSizeGB out of range|系统盘容量超出允许范围。|
|**400**|OUT_OF_RANGE|InstanceTemplateData.SystemDisk.CloudDiskSpec.Iops out of range|云硬盘iops超出允许范围。|
|**404**|NOT_FOUND|Snapshot 'xx' not found|指定的快照不存在。|
|**404**|NOT_FOUND|InstanceType 'xx' not found|实例规格不存在。|
|**404**|NOT_FOUND|Subnet 'xx' not found|子网不存在。|
|**404**|NOT_FOUND|SecurityGroups 'xx' not found|安全组不存在。|
|**404**|NOT_FOUND|KeyPair 'xx' not found|密钥不存在。|
|**404**|NOT_FOUND|Image 'xx' not found|镜像不存在。|
|**429**|QUOTA_EXCEEDED|InstanceTemplate quota limit exceeded|实例模板配额不足。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
