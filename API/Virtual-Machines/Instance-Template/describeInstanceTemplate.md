# describeInstanceTemplate


## 描述
查询启动模板详情


## 请求方式
GET

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instanceTemplates/{instanceTemplateId}

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|
|**instanceTemplateId**|String|True| |启动模板ID|

## 请求参数
无


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeinstancetemplate#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**instanceTemplate**|[InstanceTemplate](describeinstancetemplate#instancetemplate)| |
### <div id="instancetemplate">InstanceTemplate</div>
|名称|类型|描述|
|---|---|---|
|**id**|String|启动模板ID|
|**name**|String|启动模板名称|
|**description**|String|启动模板描述|
|**instanceTemplateData**|[InstanceTemplateData](describeinstancetemplate#instancetemplatedata)|启动模板的数据|
|**ags**|[Ag[]](describeinstancetemplate#ag)|关联的高可用组(ag)信息|
|**createdTime**|String|创建时间|
### <div id="ag">Ag</div>
|名称|类型|描述|
|---|---|---|
|**name**|String|高可用组名称|
|**id**|String|高可用组id|
### <div id="instancetemplatedata">InstanceTemplateData</div>
|名称|类型|描述|
|---|---|---|
|**instanceType**|String|实例规格|
|**vpcId**|String|主网卡所属VPC的ID|
|**imageId**|String|镜像ID|
|**includePassword**|Boolean|启动模板中是否包含自定义密码，true：包含密码，false：不包含密码|
|**systemDisk**|[InstanceTemplateDiskAttachment](describeinstancetemplate#instancetemplatediskattachment)|系统盘信息|
|**dataDisks**|[InstanceTemplateDiskAttachment[]](describeinstancetemplate#instancetemplatediskattachment)|数据盘信息，本地盘(local类型)做系统盘的云主机可挂载8块数据盘，云硬盘(cloud类型)做系统盘的云主机可挂载7块数据盘。|
|**primaryNetworkInterface**|[InstanceTemplateNetworkInterfaceAttachment](describeinstancetemplate#instancetemplatenetworkinterfaceattachment)|主网卡信息|
|**elasticIp**|[InstanceTemplateElasticIp](describeinstancetemplate#instancetemplateelasticip)|主网卡主IP关联的弹性IP规格|
|**keyNames**|String[]|密钥对名称；当前只支持一个|
|**chargeOnStopped**|String|停机不计费的标志， keepCharging(默认)：关机后继续计费；stopCharging：关机后停止计费。|
|**autoImagePolicyId**|String|自动镜像策略ID。|
|**passwordAuth**|String|是否允许使用密码。|
|**imageInherit**|String|是否继承镜像登录凭证。|
### <div id="instancetemplateelasticip">InstanceTemplateElasticIp</div>
|名称|类型|描述|
|---|---|---|
|**bandwidthMbps**|Integer|弹性公网IP的限速（单位：MB）|
|**provider**|String|IP服务商，取值为BGP,nonBGP|
|**chargeMode**|String|计费类型，支持按带宽计费(bandwith)，按流量计费(flow)|
### <div id="instancetemplatenetworkinterfaceattachment">InstanceTemplateNetworkInterfaceAttachment</div>
|名称|类型|描述|
|---|---|---|
|**deviceIndex**|Integer|设备Index；主网卡的index必须为1；当前仅支持主网卡|
|**autoDelete**|Boolean|指明删除实例时是否删除网卡，默认true；当前只能是true|
|**networkInterface**|[InstanceTemplateNetworkInterface](describeinstancetemplate#instancetemplatenetworkinterface)|网卡接口规范；此字段当前必填|
### <div id="instancetemplatenetworkinterface">InstanceTemplateNetworkInterface</div>
|名称|类型|描述|
|---|---|---|
|**subnetId**|String|子网ID|
|**securityGroups**|String[]|安全组ID列表|
|**sanityCheck**|Integer|PortSecurity，取值为0或者1，默认为1|
### <div id="instancetemplatediskattachment">InstanceTemplateDiskAttachment</div>
|名称|类型|描述|
|---|---|---|
|**diskCategory**|String|磁盘分类，取值为本地盘(local)或者数据盘(cloud)。<br>系统盘支持本地盘(local)或者云硬盘(cloud)。系统盘选择local类型，必须使用localDisk类型的镜像；同理系统盘选择cloud类型，必须使用cloudDisk类型的镜像。<br>数据盘仅支持云硬盘(cloud)。<br>|
|**autoDelete**|Boolean|随云主机一起删除，删除主机时自动删除此磁盘，默认为true，本地盘(local)不能更改此值。<br>如果云主机中的数据盘(cloud)是包年包月计费方式，此参数不生效。<br>如果云主机中的数据盘(cloud)是共享型数据盘，此参数不生效。<br>|
|**instanceTemplateDisk**|[InstanceTemplateDisk](describeinstancetemplate#instancetemplatedisk)|数据盘配置|
|**deviceName**|String|数据盘逻辑挂载点，取值范围：vda,vdb,vdc,vdd,vde,vdf,vdg,vdh,vdi,vmj,vdk,vdl,vdm。系统盘不需要使用，数据盘时才能够使用。|
|**noDevice**|Boolean|排除设备，使用此参数noDevice配合deviceName一起使用。<br>创建整机镜像：如deviceName:vdb、noDevice:true，则表示云主机中的数据盘vdb不参与创建镜像。<br>创建模板：如deviceName:vdb、noDevice:true，则表示镜像中的数据盘vdb不参与创建主机。<br>创建主机：如deviceName:vdb、noDevice:true，则表示镜像中的数据盘vdb，或者模板(使用模板创建主机)中的数据盘vdb不参与创建主机。<br>|
### <div id="instancetemplatedisk">InstanceTemplateDisk</div>
|名称|类型|描述|
|---|---|---|
|**diskType**|String|云硬盘类型，取值为 ssd、premium-hdd、hdd.std1、ssd.gp1、ssd.io1|
|**diskSizeGB**|Integer|云硬盘大小，单位为 GiB；ssd 类型取值范围[20,1000]GB，步长为10G，premium-hdd 类型取值范围[20,3000]GB，步长为10G，hdd.std1、ssd.gp1、ssd.io1 类型取值范围[20-16000]GB，步长为10GB|
|**snapshotId**|String|创建云硬盘的快照ID|
|**encrypt**|Boolean|是否加密，false:(默认)不加密；true:加密|
|**iops**|Integer|云硬盘的iops值|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
