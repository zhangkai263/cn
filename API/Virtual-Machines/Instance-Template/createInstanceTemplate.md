# createInstanceTemplate


## 描述
创建一个指定参数的启动模板，启动模板中包含创建云主机时的大部分配置参数，避免每次创建云主机时的重复性工作。<br>
如果是使用启动模板创建云主机，如果指定了某些参数与模板中的参数相冲突，那么新指定的参数会替换模板中的参数。<br>
如果是使用启动模板创建云主机，如果指定了镜像ID与模板中的镜像ID不一致，那么模板中的dataDisks参数会失效。<br>
如果使用高可用组(Ag)创建云主机，那么Ag所关联的模板中的参数都不可以被调整，只能以模板为准。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instanceTemplates

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**instanceTemplateData**|[InstanceTemplateSpec](createinstancetemplate#instancetemplatespec)|True| |启动模板的数据|
|**name**|String|True| |启动模板的名称，<a href="http://docs.jdcloud.com/virtual-machines/api/general_parameters">参考公共参数规范</a>。|
|**description**|String|False| |启动模板的描述，<a href="http://docs.jdcloud.com/virtual-machines/api/general_parameters">参考公共参数规范</a>。|

### <div id="instancetemplatespec">InstanceTemplateSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**instanceType**|String|True| |实例规格，可查询<a href="http://docs.jdcloud.com/virtual-machines/api/describeinstancetypes">DescribeInstanceTypes</a>接口获得指定地域或可用区的规格信息。|
|**imageId**|String|True| |镜像ID，可查询<a href="http://docs.jdcloud.com/virtual-machines/api/describeimages">DescribeImages</a>接口获得指定地域的镜像信息。|
|**password**|String|False| |密码，<a href="http://docs.jdcloud.com/virtual-machines/api/general_parameters">参考公共参数规范</a>。|
|**keyNames**|String[]|False| |密钥对名称，当前只支持一个。|
|**metadata**|[Metadata[]](createinstancetemplate#metadata)|False| |自定义元数据信息，key-value 键值对数量不超过20。key、value不区分大小写。<br>注意：key不要以连字符(-)结尾，否则此key不生效。<br>|
|**userdata**|[Userdata[]](createinstancetemplate#userdata)|False| |自定义脚本，目前只支持传入一个key为"launch-script"，表示首次启动脚本。value为base64格式。<br>launch-script：linux系统支持bash和python，编码前须分别以 #!/bin/bash 和 #!/usr/bin/env python 作为内容首行;<br>launch-script：windows系统支持bat和powershell，编码前须分别以 <cmd></cmd> 和 <powershell></powershell> 作为内容首、尾行。<br>|
|**elasticIp**|[InstanceTemplateElasticIpSpec](createinstancetemplate#instancetemplateelasticipspec)|False| |主网卡主IP关联的弹性IP规格。|
|**primaryNetworkInterface**|[InstanceTemplateNetworkInterfaceAttachmentSpec](createinstancetemplate#instancetemplatenetworkinterfaceattachmentspec)|True| |主网卡配置信息。|
|**systemDisk**|[InstanceTemplateDiskAttachmentSpec](createinstancetemplate#instancetemplatediskattachmentspec)|True| |系统盘配置信息。|
|**dataDisks**|[InstanceTemplateDiskAttachmentSpec[]](createinstancetemplate#instancetemplatediskattachmentspec)|False| |数据盘配置信息。|
|**chargeOnStopped**|String|False| |停机不计费的标志， keepCharging(默认)：关机后继续计费；stopCharging：关机后停止计费。|
|**autoImagePolicyId**|String|False| |自动镜像策略ID。|
|**passWordAuth**|String|False| |当存在密钥时，是否同时使用密码登录，"yes"为使用，"no"为禁用，默认为"yes"。|
|**imageInherit**|String|False| |使用镜像中的原有的登录凭证不再额外指定，仅使用私有镜像和共享镜像时此参数有效。"yes"为使用，"no"为不使用，默认为"no"。|
### <div id="instancetemplatediskattachmentspec">InstanceTemplateDiskAttachmentSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**diskCategory**|String|False| |磁盘分类，取值为本地盘(local)或者数据盘(cloud)。<br>系统盘支持本地盘(local)或者云硬盘(cloud)。系统盘选择local类型，必须使用localDisk类型的镜像；同理系统盘选择cloud类型，必须使用cloudDisk类型的镜像。<br>数据盘仅支持云硬盘(cloud)。<br>|
|**autoDelete**|Boolean|False| |随云主机一起删除，删除主机时自动删除此磁盘，默认为true，本地盘(local)不能更改此值。<br>如果云主机中的数据盘(cloud)是包年包月计费方式，此参数不生效。<br>如果云主机中的数据盘(cloud)是共享型数据盘，此参数不生效。<br>|
|**cloudDiskSpec**|[InstanceTemplateDiskSpec](createinstancetemplate#instancetemplatediskspec)|False| |数据盘规格|
|**deviceName**|String|False| |数据盘逻辑挂载点，取值范围：vda,vdb,vdc,vdd,vde,vdf,vdg,vdh,vdi,vmj,vdk,vdl,vdm|
|**noDevice**|Boolean|False| |排除设备，使用此参数noDevice配合deviceName一起使用。<br>创建模板：如deviceName:vdb、noDevice:true，则表示镜像中的数据盘vdb不参与创建主机。<br>|
### <div id="instancetemplatediskspec">InstanceTemplateDiskSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**diskType**|String|False| |云硬盘类型，取值为ssd、premium-hdd、hdd.std1、ssd.gp1、ssd.io1|
|**diskSizeGB**|Integer|False| |云硬盘大小，单位为 GiB；ssd 类型取值范围[20,1000]GB，步长为10G，premium-hdd 类型取值范围[20,3000]GB，步长为10G，hdd.std1、ssd.gp1、ssd.io1 类型取值范围[20-16000]GB，步长为10GB|
|**snapshotId**|String|False| |用于创建云硬盘的快照ID|
|**encrypt**|Boolean|False| |用于指定是否加密，false:(默认)不加密；true:加密，未指定快照时生效，只有打包创建2代主机的时候才允许创建加密数据盘。|
|**iops**|Integer|False| |用于指定云硬盘的iops值，仅支持ssd.io1类型的云盘|
### <div id="instancetemplatenetworkinterfaceattachmentspec">InstanceTemplateNetworkInterfaceAttachmentSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**deviceIndex**|Integer|False| |设备Index；主网卡的index必须为1；当前仅支持主网卡|
|**autoDelete**|Boolean|False| |指明删除实例时是否删除网卡，默认true；当前只能是true|
|**networkInterface**|[InstanceTemplateNetworkInterfaceSpec](createinstancetemplate#instancetemplatenetworkinterfacespec)|True| |网卡接口规范；此字段当前必填|
### <div id="instancetemplatenetworkinterfacespec">InstanceTemplateNetworkInterfaceSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**subnetId**|String|True| |子网ID 仅支持中心可用区的子网|
|**securityGroups**|String[]|False| |安全组ID列表|
|**sanityCheck**|Integer|False| |PortSecurity，取值为0或者1，默认为1|
### <div id="instancetemplateelasticipspec">InstanceTemplateElasticIpSpec</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**bandwidthMbps**|Integer|True| |弹性公网IP的限速（单位：MB）|
|**provider**|String|False| |IP服务商，取值为BGP,nonBGP，不支持边缘可用区|
|**chargeMode**|String|True| |计费类型，支持按带宽计费(bandwith)，按流量计费(flow)|
### <div id="userdata">Userdata</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**key**|String|False| |键|
|**value**|String|False| |值|
|**key**|String|False| |键，当前仅支持launch-script|
|**value**|String|False| |值，最大长度21848字符|
### <div id="metadata">Metadata</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**key**|String|False| |键，最大长度256，支持全字符|
|**value**|String|False| |值，最大长度16k，支持全字符|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](createinstancetemplate#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**instanceTemplateId**|String| |

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
