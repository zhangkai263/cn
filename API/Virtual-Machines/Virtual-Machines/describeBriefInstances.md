# describeBriefInstances


## 描述
批量查询云主机信息的轻量接口，不返回云盘、网络、计费、标签等信息。如果不需要关联资源属性，尽量选择使用该接口。<br>
此接口支持分页查询，默认每页20条。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instances:describeBriefInstances

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**pageNumber**|Integer|False|1|页码；默认为1|
|**pageSize**|Integer|False|20|分页大小；默认为20；取值范围[10, 100]|
|**tags**|[TagFilter[]](describebriefinstances#tagfilter)|False| |Tag筛选条件|
|**filters**|[Filter[]](describebriefinstances#filter)|False| |instanceId - 云主机ID，精确匹配，支持多个<br>privateIpAddress - 主网卡内网主IP地址，模糊匹配，支持多个<br>az - 可用区，精确匹配，支持多个<br>vpcId - 私有网络ID，精确匹配，支持多个<br>status - 云主机状态，精确匹配，支持多个，<a href="http://docs.jdcloud.com/virtual-machines/api/vm_status">参考云主机状态</a><br>name - 云主机名称，模糊匹配，支持单个<br>imageId - 镜像ID，精确匹配，支持多个<br>networkInterfaceId - 弹性网卡ID，精确匹配，支持多个<br>subnetId - 子网ID，精确匹配，支持多个<br>agId - 使用可用组id，支持单个<br>faultDomain - 错误域，支持多个<br>dedicatedHostId - 专有宿主机ID，精确匹配，支持多个<br>dedicatedPoolId - 专有宿主机池ID，精确匹配，支持多个<br>instanceType - 实例规格，精确匹配，支持多个<br>elasticIpAddress - 公网IP地址，精确匹配，支持单个<br>|

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
|**result**|[Result](describebriefinstances#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**instances**|[BriefInstance[]](describebriefinstances#briefinstance)| |
|**totalCount**|Number| |
### <div id="briefinstance">BriefInstance</div>
|名称|类型|描述|
|---|---|---|
|**instanceId**|String|云主机ID|
|**instanceName**|String|云主机名称|
|**instanceType**|String|实例规格|
|**vpcId**|String|主网卡所属VPC的ID|
|**subnetId**|String|主网卡所属子网的ID|
|**privateIpAddress**|String|主网卡主IP地址|
|**status**|String|云主机状态，<a href="http://docs.jdcloud.com/virtual-machines/api/vm_status">参考云主机状态</a>|
|**description**|String|云主机描述|
|**imageId**|String|镜像ID|
|**systemDisk**|[BriefInstanceDiskAttachment](describebriefinstances#briefinstancediskattachment)|系统盘配置|
|**dataDisks**|[BriefInstanceDiskAttachment[]](describebriefinstances#briefinstancediskattachment)|数据盘配置|
|**primaryNetworkInterface**|[BriefInstanceNetworkInterfaceAttachment](describebriefinstances#briefinstancenetworkinterfaceattachment)|主网卡配置|
|**secondaryNetworkInterfaces**|[BriefInstanceNetworkInterfaceAttachment[]](describebriefinstances#briefinstancenetworkinterfaceattachment)|辅助网卡配置|
|**launchTime**|String|创建时间|
|**az**|String|云主机所在可用区|
|**keyNames**|String[]|密钥对名称|
|**faultDomain**|String|高可用组中的错误域|
|**chargeOnStopped**|String|关机模式，只支持云盘做系统盘的按配置计费云主机。KeepCharging：关机后继续计费；StopCharging：关机后停止计费。|
|**dedicatedPoolId**|String|实例所属的专有宿主机池|
|**dedicatedHostId**|String|专有宿主机ID|
### <div id="briefinstancenetworkinterfaceattachment">BriefInstanceNetworkInterfaceAttachment</div>
|名称|类型|描述|
|---|---|---|
|**deviceIndex**|Integer|设备Index|
|**autoDelete**|Boolean|指明删除实例时是否删除网卡，默认true；当前只能是true|
### <div id="briefinstancediskattachment">BriefInstanceDiskAttachment</div>
|名称|类型|描述|
|---|---|---|
|**diskCategory**|String|磁盘分类，取值为本地盘(local)或者数据盘(cloud)。<br>系统盘支持本地盘(local)或者云硬盘(cloud)。系统盘选择local类型，必须使用localDisk类型的镜像；同理系统盘选择cloud类型，必须使用cloudDisk类型的镜像。<br>数据盘仅支持云硬盘(cloud)。<br>|
|**autoDelete**|Boolean|随云主机一起删除，删除主机时自动删除此磁盘，默认为true，本地盘(local)不能更改此值。<br>如果云主机中的数据盘(cloud)是包年包月计费方式，此参数不生效。<br>如果云主机中的数据盘(cloud)是共享型数据盘，此参数不生效。<br>|
|**localDisk**|[LocalDisk](describebriefinstances#localdisk)|本地磁盘配置|
|**deviceName**|String|数据盘逻辑挂载点，取值范围：vda,vdb,vdc,vdd,vde,vdf,vdg,vdh,vdi,vmj,vdk,vdl,vdm|
|**status**|String|数据盘挂载状态，取值范围：attaching,detaching,attached,detached,error_attach,error_detach|
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
