# describeInstances


## 描述
批量查询云主机的详细信息<br>
此接口支持分页查询，默认每页20条。


## 请求方式
GET

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instances

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码；默认为1|
|**pageSize**|Integer|False|20|分页大小；默认为20；取值范围[10, 100]|
|**filters**|[Filter[]](describeinstances#filter)|False| |instanceId - 云主机ID，精确匹配，支持多个<br>privateIpAddress - 主网卡内网主IP地址，模糊匹配，支持多个<br>az - 可用区，精确匹配，支持多个<br>vpcId - 私有网络ID，精确匹配，支持多个<br>status - 云主机状态，精确匹配，支持多个，<a href="http://docs.jdcloud.com/virtual-machines/api/vm_status">参考云主机状态</a><br>name - 云主机名称，模糊匹配，支持单个<br>imageId - 镜像ID，精确匹配，支持多个<br>networkInterfaceId - 弹性网卡ID，精确匹配，支持多个<br>subnetId - 子网ID，精确匹配，支持多个<br>agId - 使用可用组id，支持单个<br>faultDomain - 错误域，支持多个<br>dedicatedHostId - 专有宿主机ID，精确匹配，支持多个<br>dedicatedPoolId - 专有宿主机池ID，精确匹配，支持多个<br>instanceType - 实例规格，精确匹配，支持多个<br>elasticIpAddress - 公网IP地址，精确匹配，支持单个<br>|

### <div id="filter">Filter</div>
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**name**|String|True| |过滤条件的名称|
|**operator**|String|False| |过滤条件的操作符，默认eq|
|**values**|String[]|True| |过滤条件的值|

## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeinstances#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**instances**|[Instance[]](describeinstances#instance)| |
|**totalCount**|Number| |
### <div id="instance">Instance</div>
|名称|类型|描述|
|---|---|---|
|**instanceId**|String|云主机ID|
|**instanceName**|String|云主机名称|
|**instanceType**|String|实例规格|
|**vpcId**|String|主网卡所属VPC的ID|
|**subnetId**|String|主网卡所属子网的ID|
|**privateIpAddress**|String|主网卡主IP地址|
|**elasticIpId**|String|主网卡主IP绑定弹性IP的ID|
|**elasticIpAddress**|String|主网卡主IP绑定弹性IP的地址|
|**status**|String|云主机状态，<a href="http://docs.jdcloud.com/virtual-machines/api/vm_status">参考云主机状态</a>|
|**description**|String|云主机描述|
|**imageId**|String|镜像ID|
|**systemDisk**|[InstanceDiskAttachment](describeinstances#instancediskattachment)|系统盘配置|
|**dataDisks**|[InstanceDiskAttachment[]](describeinstances#instancediskattachment)|数据盘配置|
|**primaryNetworkInterface**|[InstanceNetworkInterfaceAttachment](describeinstances#instancenetworkinterfaceattachment)|主网卡配置|
|**secondaryNetworkInterfaces**|[InstanceNetworkInterfaceAttachment[]](describeinstances#instancenetworkinterfaceattachment)|辅助网卡配置|
|**launchTime**|String|创建时间|
|**az**|String|云主机所在可用区|
|**keyNames**|String[]|密钥对名称|
|**charge**|[Charge](describeinstances#charge)|计费信息|
|**ag**|[Ag](describeinstances#ag)|高可用组，如果创建云主机使用了高可用组，此处可展示高可用组名称|
|**faultDomain**|String|高可用组中的错误域|
|**tags**|[Tag[]](describeinstances#tag)|Tag信息|
|**chargeOnStopped**|String|关机模式，只支持云盘做系统盘的按配置计费云主机。keepCharging：关机后继续计费；stopCharging：关机后停止计费。|
### <div id="tag">Tag</div>
|名称|类型|描述|
|---|---|---|
|**key**|String|Tag键|
|**value**|String|Tag值|
### <div id="ag">Ag</div>
|名称|类型|描述|
|---|---|---|
|**name**|String|高可用组名称|
|**id**|String|高可用组id|
### <div id="charge">Charge</div>
|名称|类型|描述|
|---|---|---|
|**chargeMode**|String|支付模式，取值为：prepaid_by_duration，postpaid_by_usage或postpaid_by_duration，prepaid_by_duration表示预付费，postpaid_by_usage表示按用量后付费，postpaid_by_duration表示按配置后付费，默认为postpaid_by_duration|
|**chargeStatus**|String|费用支付状态，取值为：normal、overdue、arrear，normal表示正常，overdue表示已到期，arrear表示欠费|
|**chargeStartTime**|String|计费开始时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|
|**chargeExpiredTime**|String|过期时间，预付费资源的到期时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ，后付费资源此字段内容为空|
|**chargeRetireTime**|String|预期释放时间，资源的预期释放时间，预付费/后付费资源均有此值，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|
### <div id="instancenetworkinterfaceattachment">InstanceNetworkInterfaceAttachment</div>
|名称|类型|描述|
|---|---|---|
|**deviceIndex**|Integer|设备Index|
|**autoDelete**|Boolean|指明删除实例时是否删除网卡，默认true；当前只能是true|
|**networkInterface**|[InstanceNetworkInterface](describeinstances#instancenetworkinterface)|网卡接口规范|
### <div id="instancenetworkinterface">InstanceNetworkInterface</div>
|名称|类型|描述|
|---|---|---|
|**networkInterfaceId**|String|弹性网卡ID|
|**macAddress**|String|以太网地址|
|**vpcId**|String|虚拟网络ID|
|**subnetId**|String|子网ID|
|**securityGroups**|[SecurityGroupSimple[]](describeinstances#securitygroupsimple)| |
|**sanityCheck**|Integer|源和目标IP地址校验，取值为0或者1|
|**primaryIp**|[NetworkInterfacePrivateIp](describeinstances#networkinterfaceprivateip)|网卡主IP|
|**secondaryIps**|[NetworkInterfacePrivateIp[]](describeinstances#networkinterfaceprivateip)|网卡辅IP|
### <div id="networkinterfaceprivateip">NetworkInterfacePrivateIp</div>
|名称|类型|描述|
|---|---|---|
|**privateIpAddress**|String|私有IP的IPV4地址|
|**elasticIpId**|String|弹性IP实例ID|
|**elasticIpAddress**|String|弹性IP实例地址|
### <div id="securitygroupsimple">SecurityGroupSimple</div>
|名称|类型|描述|
|---|---|---|
|**groupId**|String|安全组ID|
|**groupName**|String|安全组名称|
### <div id="instancediskattachment">InstanceDiskAttachment</div>
|名称|类型|描述|
|---|---|---|
|**diskCategory**|String|磁盘分类，取值为本地盘(local)或者数据盘(cloud)。<br>系统盘支持本地盘(local)或者云硬盘(cloud)。系统盘选择local类型，必须使用localDisk类型的镜像；同理系统盘选择cloud类型，必须使用cloudDisk类型的镜像。<br>数据盘仅支持云硬盘(cloud)。<br>|
|**autoDelete**|Boolean|随云主机一起删除，删除主机时自动删除此磁盘，默认为true，本地盘(local)不能更改此值。<br>如果云主机中的数据盘(cloud)是包年包月计费方式，此参数不生效。<br>如果云主机中的数据盘(cloud)是共享型数据盘，此参数不生效。<br>|
|**localDisk**|[LocalDisk](describeinstances#localdisk)|本地磁盘配置|
|**cloudDisk**|[Disk](describeinstances#disk)|云硬盘配置|
|**deviceName**|String|数据盘逻辑挂载点，取值范围：vda,vdb,vdc,vdd,vde,vdf,vdg,vdh,vdi,vmj,vdk,vdl,vdm|
|**status**|String|数据盘挂载状态，取值范围：attaching,detaching,attached,detached,error_attach,error_detach|
### <div id="disk">Disk</div>
|名称|类型|描述|
|---|---|---|
|**diskId**|String|云硬盘ID|
|**az**|String|云硬盘所属AZ|
|**name**|String|云硬盘名称，只允许输入中文、数字、大小写字母、英文下划线“_”及中划线“-”，不允许为空且不超过32字符。|
|**description**|String|云硬盘描述，允许输入UTF-8编码下的全部字符，不超过256字符。|
|**diskType**|String|云硬盘类型，取值为 ssd,premium-hdd,ssd.gp1,ssd.io1,hdd.std1|
|**diskSizeGB**|Integer|云硬盘大小，单位为 GiB|
|**iops**|Integer|该云硬盘实际应用的iops值|
|**throughput**|Integer|该云硬盘实际应用的吞吐量的数值|
|**status**|String|云硬盘状态，取值为 creating、available、in-use、extending、restoring、deleting、deleted、error_create、error_delete、error_restore、error_extend 之一|
|**attachments**|[DiskAttachment[]](describeinstances#diskattachment)|挂载信息|
|**snapshotId**|String|创建该云硬盘的快照ID|
|**multiAttachable**|Boolean|云盘是否支持多挂载|
|**encrypted**|Boolean|云盘是否为加密盘|
|**enabled**|Boolean|云盘是否被暂停（IOPS限制为极低）|
|**createTime**|String|创建云硬盘时间|
|**charge**|[Charge](describeinstances#charge)|云硬盘计费配置信息|
|**tags**|[Tag[]](describeinstances#tag)|Tag信息|
### <div id="diskattachment">DiskAttachment</div>
|名称|类型|描述|
|---|---|---|
|**attachmentId**|String|挂载ID|
|**diskId**|String|云硬盘ID|
|**instanceType**|String|挂载实例的类型，取值为 vm、nc|
|**instanceId**|String|挂载实例的ID|
|**status**|String|挂载状态，取值为 "attaching", "attached", "detaching", "detached"|
|**attachTime**|String|挂载时间|
### <div id="localdisk">LocalDisk</div>
|名称|类型|描述|
|---|---|---|
|**diskType**|String|磁盘类型，取值范围{ssd、premium-hdd、hdd.std1、ssd.gp1、ssd.io1}|
|**diskSizeGB**|Integer|磁盘大小|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
