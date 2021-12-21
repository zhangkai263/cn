# updateInstanceTemplate


## 描述

修改实例模板属性。

详细操作说明请参考帮助文档：[实例模板](https://docs.jdcloud.com/cn/virtual-machines/instance-template-overview)

## 接口说明
- 名称、描述、实例模板配置信息至少要传一项。
- 若实例模板已绑定高可用组，则不支持更改VPC。


## 请求方式
PATCH

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instanceTemplates/{instanceTemplateId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID。|
|**instanceTemplateId**|String|True| |实例模板ID。|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|False| |实例模板的名称，参考 [公共参数规范](https://docs.jdcloud.com/virtual-machines/api/general_parameters)。|
|**description**|String|False| |实例模板的描述，参考 [公共参数规范](https://docs.jdcloud.com/virtual-machines/api/general_parameters)。|
|**instanceTemplateData**|[UpdateInstanceTemplateSpec](updateInstanceTemplate#user-content-updateinstancetemplatespec)|False| |实例模板配置信息。|

### <div id="user-content-updateinstancetemplatespec">UpdateInstanceTemplateSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**instanceType**|String|False| |实例规格，可查询 [DescribeInstanceTypes](https://docs.jdcloud.com/virtual-machines/api/describeinstancetypes) 接口获得指定地域或可用区的规格信息。|
|**imageId**|String|False| |镜像ID，可查询 [DescribeImages](https://docs.jdcloud.com/virtual-machines/api/describeimages) 接口获得指定地域的镜像信息。|
|**password**|String|False| |实例密码。可用于SSH登录和VNC登录。长度为8\~30个字符，必须同时包含大、小写英文字母、数字和特殊符号中的三类字符。特殊符号包括：\(\)\`~!@#$%^&\*\_-+=\|{}\[ ]:";'<>,.?/，更多密码输入要求请参见 [公共参数规范](https://docs.jdcloud.com/virtual-machines/api/general_parameters)。<br>如指定密钥且 `passwordAuth` 设置为 `true`，则密码不会生成注入，否则即使不指定密码系统也将默认自动生成随机密码，并以短信和邮件通知。<br>|
|**keyNames**|String[]|False| |密钥对名称。仅Linux系统下该参数生效，当前仅支持输入单个密钥。如指定了该参数则覆盖原有参数。|
|**metadata**|[Metadata[]](#metadata)|False| |用户自定义元数据。以key-value键值对形式指定，可在实例系统内通过元数据服务查询获取。最多支持20对键值对，且key不超过256字符，value不超过16KB，不区分大小写。<br>注意：key以连字符(-)结尾，表示要删除该key。<br>|
|**userdata**|[Userdata[]](#userdata)|False| |自定义脚本。目前仅支持启动脚本，即 `launch-script`，须 `base64` 编码且编码前数据长度不能超过16KB。<br>**linux系统**：支持 `bash` 和 `python`，编码前须分别以 `#!/bin/bash` 和 `#!/usr/bin/env python` 作为内容首行。<br>**Windows系统**：支持 `bat` 和 `powershell`，编码前须分别以 `<cmd></cmd>和<powershell></powershell>` 作为内容首、尾行。<br>|
|**elasticIp**|[InstanceTemplateElasticIpSpec](updateInstanceTemplate#user-content-instancetemplateelasticipspec)|False| |主网卡主IP关联的弹性公网IP配置。如指定了该参数则覆盖原有参数。|
|**primaryNetworkInterface**|[InstanceTemplateNetworkInterfaceAttachmentSpec](updateInstanceTemplate#user-content-instancetemplatenetworkinterfaceattachmentspec)|False| |主网卡配置。如指定了该参数则覆盖原有参数。|
|**systemDisk**|[InstanceTemplateDiskAttachmentSpec](updateInstanceTemplate#user-content-instancetemplatediskattachmentspec)|False| |系统盘配置。如指定了该参数则覆盖原有参数。|
|**dataDisks**|[InstanceTemplateDiskAttachmentSpec[]](updateInstanceTemplate#user-content-instancetemplatediskattachmentspec)|False| |数据盘配置。单实例最多可挂载云硬盘（系统盘+数据盘）的数量受实例规格的限制。如指定了该参数则覆盖原有参数。|
|**chargeOnStopped**|String|False| |停机不计费模式。该参数仅对按配置计费且系统盘为云硬盘的实例生效，并且不是专有宿主机中的实例。配置停机不计费且停机后，实例部分将停止计费，且释放实例自身包含的资源（CPU/内存/GPU/本地数据盘）。<br>可选值：<br>`keepCharging`（默认值）：停机后保持计费，不释放资源。<br>`stopCharging`：停机后停止计费，释放实例资源。<br>|
|**autoImagePolicyId**|String|False| |自动任务策略ID，传“NoPolicy”则会清空实例模板配置的自动任务策略。|
|**passWordAuth**|String|False| |是否允许SSH密码登录。<br>`yes`：允许SSH密码登录。<br>`no`：禁止SSH密码登录。<br>仅在指定密钥时此参数有效，指定此参数后密码即使输入也将被忽略，同时会在系统内禁用SSH密码登录。<br>|
|**imageInherit**|String|False| |是否使用镜像中的登录凭证，不再指定密码或密钥。<br>`yes`：使用镜像登录凭证。<br>`no`（默认值）：不使用镜像登录凭证。<br>仅使用私有或共享镜像时此参数有效。若指定`imageInherit=yes`则指定的密码或密钥将无效。<br>|
|**noPassword**|Boolean|False| |传 `true` 则会清空实例模板配置的密码。|
|**noElasticIp**|Boolean|False| |传 `true` 则会清空实例模板配置的公网IP。|
### <div id="user-content-instancetemplatediskattachmentspec">InstanceTemplateDiskAttachmentSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**diskCategory**|String|False| |磁盘类型。<br>**系统盘**：此参数无须指定，其类型取决于镜像类型。<br>**数据盘**：数据盘仅支持云硬盘`cloud`。<br>|
|**autoDelete**|Boolean|False| |是否随实例一起删除，即删除实例时是否自动删除此磁盘。此参数仅对按配置计费的非多点挂载云硬盘生效。<br>`true`：随实例删除。<br>`false`（默认值）：不随实例删除。<br>|
|**cloudDiskSpec**|[InstanceTemplateDiskSpec](updateInstanceTemplate#user-content-instancetemplatediskspec)|False| |磁盘详细配置。此参数仅针对云硬盘，本地系统盘无须指定且指定无效。|
|**deviceName**|String|False| |磁盘逻辑挂载点。<br>**系统盘**：此参数无须指定且指定无效，默认为vda。<br>**数据盘**：取值范围：`[vdb~vdbm]`。<br>|
|**noDevice**|Boolean|False| |排除设备，使用此参数 `noDevice` 配合 `deviceName` 一起使用。<br>创建实例模板的场景下：使用此参数可以排除镜像中的数据盘。<br>示例：如果镜像中除系统盘还包含一块或多块数据盘，期望仅使用镜像中的部分磁盘，配置`deviceName=vdb`、`noDevice=true`，则表示在使用实例模板创建实例时，忽略镜像中数据盘vdb配置，不创建磁盘。<br>|
### <div id="user-content-instancetemplatediskspec">InstanceTemplateDiskSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**diskType**|String|False| |云硬盘类型。各类型介绍请参见[云硬盘类型](https://docs.jdcloud.com/cn/cloud-disk-service/instance-type)。<br>可选值：<br>`ssd.gp1`：通用型SSD<br>`ssd.io1`：性能型SSD<br>`hdd.std1`：容量型HDD<br>|
|**diskSizeGB**|Integer|False| |云硬盘容量，单位为 GiB，步长10GiB。<br>取值范围：<br>系统盘：`[40,500]`GiB，且不能小于镜像系统盘容量<br>数据盘：`[20,16000]`GiB，如指定`snapshotId`创建云硬盘则不能小于快照容量。<br>|
|**snapshotId**|String|False| |创建云硬盘的快照ID。|
|**policyId**|String|False| |云硬盘自动快照策略ID。|
|**encrypt**|Boolean|False| |云硬盘是否加密。<br>可选值：<br>`true`：加密<br>`false`（默认值）：不加密<br>|
|**iops**|Integer|False| |云硬盘的最大iops。|
### <div id="user-content-instancetemplatenetworkinterfaceattachmentspec">InstanceTemplateNetworkInterfaceAttachmentSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**deviceIndex**|Integer|False| |网卡设备Index。创建实例时此参数无须指定且指定无效。<br>对于主网卡默认Index为1。<br>|
|**autoDelete**|Boolean|False| |是否随实例一起删除。<br>`true`：随实例删除。<br>`false`：不随实例删除。<br>主网卡此属性默认为`true`<br>|
|**networkInterface**|[InstanceTemplateNetworkInterfaceSpec](updateInstanceTemplate#user-content-instancetemplatenetworkinterfacespec)|True| |网卡设备详细配置。|
### <div id="user-content-instancetemplatenetworkinterfacespec">InstanceTemplateNetworkInterfaceSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**subnetId**|String|True| |子网ID。|
|**securityGroups**|String[]|False| |安全组ID列表。|
|**sanityCheck**|Integer|False| |参数已弃用，指定无效。|
|**ipv6AddressCount**|Integer|False| |自动分配的ipv6地址数量，取值范围[0,1]，默认为0。|
### <div id="user-content-instancetemplateelasticipspec">InstanceTemplateElasticIpSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**bandwidthMbps**|Integer|True| |弹性公网IP的带宽上限，单位：Mbps。<br>取值范围为：`[1-200]`。<br>|
|**provider**|String|False| |弹性公网IP线路。中心可用区目前仅提供`BGP`类型IP。<br>|
|**chargeMode**|String|True| |弹性公网IP计费模式。可选值：<br>`bandwith`：按带宽计费。<br>`flow`：按流量计费。<br>若指定`chargeSpec=bandwith`则弹性公网IP计费类型同实例（包年包月或按配置）。边缘可用区目前仅支持`flow`计费模式。|
### <div id="Userdata">Userdata</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**key**|String|False| |脚本类型，当前仅支持输入 `launch-script`，即启动脚本。|
|**value**|String|False| |脚本内容，须 `Base64` 编码，且编码前长度不能超过16KB。|
### <div id="Metadata">Metadata</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**key**|String|False| |key，字符长度不超过256，支持全字符。不能以连字符(-)结尾，否则此key不生效。|
|**value**|String|False| |value，字符长度不超过16KB，支持全字符。|

## 返回参数
|名称|类型|描述|
|---|---|---|


## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**400**|INVALID_ARGUMENT|Parameter name and description missing|未指定任何可修改的属性。|
|**404**|NOT_FOUND|Instance Template 'xx' not found|实例模板不存在。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|

## 请求示例
PATCH
```
```
/v1/regions/cn-north-1/instanceTemplates/it-u3o8****yy
{
    "name" : "test2",
    "description" : "test"
}
```

```

## 返回示例
```
{
    "requestId": "a0633f72670e59f8c6db36b1ee257011"
}
```
