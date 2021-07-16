# describeImages


## 描述
查询镜像信息列表。<br>
通过此接口可以查询到京东云官方镜像、第三方镜像、私有镜像、或其他用户共享给您的镜像。<br>
此接口支持分页查询，默认每页20条。


## 请求方式
GET

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/images

|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**regionId**|String|True| |地域ID|

## 请求参数
|名称|类型|是否必需|默认值|描述|
|---|---|---|---|---|
|**ids**|String[]|False| |镜像ID列表，如果指定了此参数，其它参数无效。|
|**imageSource**|String|False| |镜像来源，如果没有指定ids参数，此参数必传。<br> 取值范围： public（官方）、private（私有）、shared(共享)、thirdparty（云市场）|
|**offline**|Boolean|False| |镜像是否下线，imageSource为public或者thirdparty时，此参数才有意义；指定镜像ID查询时，此参数无效。<br>取值范围：true（下线镜像）、false（在线镜像）。<br>默认值:false。|
|**platform**|String|False| |操作系统平台。<br>取值范围：Windows Server、CentOS、Ubuntu。<br>默认值：空，空表示返回不限制操作系统平台|
|**rootDeviceType**|String|False| |镜像支持的系统盘类型。<br>取值范围：localDisk（本地盘系统盘）、cloudDisk（云硬盘系统盘）。|
|**launchPermission**|String|False| |镜像的使用权限，仅当imageSource取值private时有效。<br>取值范围：ownerOnly（仅镜像owner可用，不存在共享关系）、specifiedUsers（存在共享关系，除镜像owner外还有其他用户可用）。<br>默认值：空，空表示返回不限制使用权限。|
|**status**|String|False| |<a href="http://docs.jdcloud.com/virtual-machines/api/image_status">参考镜像状态</a>|
|**pageNumber**|Integer|False|1|页码；默认为1|
|**pageSize**|Integer|False|20|分页大小；默认为20；取值范围[10, 100]|


## 返回参数
|名称|类型|描述|
|---|---|---|
|**result**|[Result](describeimages#result)| |
|**requestId**|String| |

### <div id="result">Result</div>
|名称|类型|描述|
|---|---|---|
|**images**|[Image[]](describeimages#image)|镜像详情|
|**totalCount**|Integer|总数量|
### <div id="image">Image</div>
|名称|类型|描述|
|---|---|---|
|**imageId**|String|镜像ID。|
|**name**|String|镜像名称。|
|**platform**|String|镜像的操作系统发行版。<br>可能值：Windows Server、CentOS、Ubuntu|
|**osVersion**|String|镜像的操作系统版本。|
|**architecture**|String|镜像架构。<br>可能值：x86_64。|
|**systemDiskSizeGB**|Integer|镜像系统盘大小。|
|**imageSource**|String|镜像来源。<br>可能值：jcloud（官方）、self（私有）、shared(共享)、marketplace（云市场像）。|
|**osType**|String|镜像的操作系统类型。<br>可能值：windows、linux。|
|**status**|String|<a href="http://docs.jdcloud.com/virtual-machines/api/image_status">参考镜像状态</a>。|
|**createTime**|String|创建时间。|
|**sizeMB**|Integer|镜像文件实际大小。|
|**desc**|String|镜像描述。|
|**ownerPin**|String|该镜像所有者的用户PIN。|
|**launchPermission**|String|镜像的使用权限，可能值：all（所有人可使用，官方和云市场镜像返回此值）、ownerOnly（仅镜像owner可用）、specifiedUsers（除镜像owner外还有其他共享用户可用）。|
|**systemDisk**|[InstanceDiskAttachment](describeimages#instancediskattachment)|镜像系统盘配置。|
|**dataDisks**|[InstanceDiskAttachment[]](describeimages#instancediskattachment)|镜像数据盘映射信息。|
|**snapshotId**|String|创建云盘系统盘所使用的云硬盘快照ID。系统盘类型为本地盘的镜像，此参数为空。|
|**rootDeviceType**|String|镜像支持的系统盘类型。<br>可能值：localDisk（本地盘系统盘）、cloudDisk（云硬盘系统盘）。|
|**progress**|String|镜像复制和转换时的进度，仅显示数值，单位为百分比。|
|**offline**|Boolean|镜像的在线状态。<br>可能值：true（下线镜像）、false（在线镜像）。|
### <div id="instancediskattachment">InstanceDiskAttachment</div>
|名称|类型|描述|
|---|---|---|
|**diskCategory**|String|磁盘分类，可能值：local（本地盘）、cloud（云硬盘）。<br>|
|**autoDelete**|Boolean|随实例删除属性，即删除主机时是否自动删除此磁盘。<br>磁盘是包年包月计费方式时，此参数不生效。<br>磁盘多点挂载至多个实例上时，此参数不生效。<br>|
|**localDisk**|[LocalDisk](describeimages#localdisk)|本地盘配置。|
|**cloudDisk**|[Disk](describeimages#disk)|云硬盘配置。|
|**deviceName**|String|磁盘逻辑挂载点，可能值：vda、vdb... ...vdm。|
|**status**|String|数据盘挂载状态，可能值：attaching、detaching、attached、detached、error_attach、error_detach|
### <div id="disk">Disk</div>
|名称|类型|描述|
|---|---|---|
|**diskId**|String|云硬盘ID。|
|**az**|String|云硬盘所属AZ。|
|**name**|String|云硬盘名称。|
|**description**|String|云硬盘描述。|
|**diskType**|String|云硬盘类型，可能值：ssd（已下线）、premium-hdd（已下线）、ssd.gp1、ssd.io1、hdd.std1。|
|**diskSizeGB**|Integer|云硬盘大小，单位为 GiB。|
|**iops**|Integer|云硬盘实际应用的iops值。|
|**throughput**|Integer|云硬盘实际应用的吞吐量的数值。|
|**status**|String|云硬盘状态，可能值：creating、available、in-use、extending、restoring、deleting、deleted、error_create、error_delete、error_restore、error_extend。|
|**attachments**|[DiskAttachment[]](describeimages#diskattachment)|挂载信息。|
|**snapshotId**|String|创建该云硬盘的快照ID。|
|**multiAttachable**|Boolean|云盘是否支持多挂载。|
|**encrypted**|Boolean|云盘是否为加密盘。|
|**enabled**|Boolean|云盘是否被暂停（IOPS限制为极低）。|
|**createTime**|String|创建云硬盘时间。|
|**charge**|[Charge](describeimages#charge)|云硬盘计费信息。|
|**tags**|[Tag[]](describeimages#tag)|云硬盘Tag信息。|
### <div id="tag">Tag</div>
|名称|类型|描述|
|---|---|---|
|**key**|String|Tag键。|
|**value**|String|Tag值。|
### <div id="charge">Charge</div>
|名称|类型|描述|
|---|---|---|
|**chargeMode**|String|计费方式，可能值：prepaid_by_duration（包年包月预付费）、postpaid_by_duration（按配置后付费）。|
|**chargeStatus**|String|计费状态，可能值：normal（正常）、overdue（包年包月已到期）、arrear（按配置已欠费）。|
|**chargeStartTime**|String|计费开始时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ。|
|**chargeExpiredTime**|String|过期时间，预付费资源的到期时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ，后付费资源此字段内容为空。|
|**chargeRetireTime**|String|预期释放时间，资源的预期释放时间，预付费/后付费资源在到期/欠费后会有此值，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ。|
### <div id="diskattachment">DiskAttachment</div>
|名称|类型|描述|
|---|---|---|
|**attachmentId**|String|挂载ID。|
|**diskId**|String|云硬盘ID。|
|**instanceType**|String|挂载实例的类型，可能值：vm（云主机）、nc（原生容器）。|
|**instanceId**|String|挂载实例的ID。|
|**status**|String|挂载状态，可能值：attaching、attached、detaching、detached。|
|**attachTime**|String|挂载时间。|
### <div id="localdisk">LocalDisk</div>
|名称|类型|描述|
|---|---|---|
|**diskType**|String|磁盘类型，可能值：ssd、hdd、nvme ssd。本地系统盘不返回此参数。|
|**diskSizeGB**|Integer|磁盘大小。|

## 返回码
|返回码|描述|
|---|---|
|**200**|OK|
|**400**|Invalid parameter|
|**401**|Authentication failed|
|**404**|Not found|
|**500**|Internal server error|
|**503**|Service unavailable|
