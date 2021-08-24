# describeImages


## 描述

查询镜像信息列表。

详细操作说明请参考帮助文档：[镜像概述](https://docs.jdcloud.com/cn/virtual-machines/image-overview)

## 接口说明
- 通过此接口可以查询到京东云官方镜像、第三方镜像、镜像市场、私有镜像、或其他用户共享给您的镜像。
- 请求参数即过滤条件，每个条件之间的关系为逻辑与（AND）的关系。
- 如果使用子帐号查询，只会查询到该子帐号有权限的镜像。关于资源权限请参考 [IAM概述](https://docs.jdcloud.com/cn/iam/product-overview)。
- 单次查询最大可查询100条镜像信息。
- 尽量一次调用接口查询多条数据，不建议使用该批量查询接口一次查询一条数据，如果使用不当导致查询过于密集，可能导致网关触发限流。
- 由于该接口为 `GET` 方式请求，最终参数会转换为 `URL` 上的参数，但是 `HTTP` 协议下的 `GET` 请求参数长度是有大小限制的，使用者需要注意参数超长的问题。


## 请求方式
GET

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/images

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**imageSource**|String|否|public|镜像来源，如果没有指定 `ids` 参数，此参数必传。取值范围：<br>`public`：官方镜像。<br>`thirdparty`：镜像市场镜像。<br>`private`：用户自己的私有镜像。<br>`shared`：其他用户分享的镜像。<br>`community`：社区镜像。<br>|
|**offline**|Boolean|否| |查询已经下线的镜像时使用。<br>只有查询 `官方镜像` 或者 `镜像市场镜像` 时，此参数才有意义，其它情况下此参数无效。<br>指定 `ids` 查询时，此参数无效。<br>|
|**platform**|String|否|CentOS|根据镜像的操作系统发行版查询。<br>取值范围：`Ubuntu、CentOS、Windows Server`。<br>|
|**ids**|String[]|否|\[&quot;img-m5s0****29&quot;,&quot;img-m5s0****30&quot;]|指定镜像ID查询，如果指定了此参数，其它参数可以不传。<br>|
|**imageName**|String|否| |根据镜像名称模糊查询。|
|**rootDeviceType**|String|否|cloudDisk|根据镜像支持的系统盘类型查询。支持范围：`localDisk` 本地系统盘镜像；`cloudDisk` 云盘系统盘镜像。|
|**launchPermission**|String|否|all|根据镜像的使用权限查询，可选参数，仅当 `imageSource` 为 `private` 时有效。取值范围：<br>`all`：没有限制，所有人均可以使用。<br>`specifiedUsers`：只有共享用户可以使用。<br>`ownerOnly`：镜像拥有者自己可以使用。<br>|
|**status**|String|否|ready|根据镜像状态查询。参考 [镜像状态](https://docs.jdcloud.com/virtual-machines/api/image_status)|
|**serviceCode**|String|否| |已废弃。|
|**pageNumber**|Integer|否|1|页码；默认为1。|
|**pageSize**|Integer|否|20|分页大小；<br>默认为20；取值范围[10, 100]。|


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**result**|[Result](#result)| |响应结果。|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

### <div id="Result">Result</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**images**|[Image[]](#image)| |镜像列表。|
|**totalCount**|Integer| |本次查询可匹配到的总记录数，使用者需要结合 `pageNumber` 和 `pageSize` 计算是否可以继续分页。|
### <div id="Image">Image</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**imageId**|String|img-m5s0****29|镜像ID。|
|**name**|String| |镜像名称。|
|**platform**|String|CentOS|镜像的操作系统平台名称。<br>取值范围：`Ubuntu、CentOS、Windows Server、Other Linux、Other Windows`。<br>|
|**osVersion**|String|8.2|镜像的操作系统版本。|
|**architecture**|String|x86_64|镜像架构。取值范围：`x86_64、i386`。|
|**systemDiskSizeGB**|Integer|40|镜像系统盘大小。|
|**imageSource**|String|public|镜像来源，取值范围：<br>`public`：官方镜像。<br>`thirdparty`：镜像市场镜像。<br>`private`：用户自己的私有镜像。<br>`shared`：其他用户分享的镜像。<br>`community`：社区镜像。<br>|
|**osType**|String|linux|镜像的操作系统类型。取值范围：`windows、linux`。|
|**status**|String|ready|镜像状态。参考 [镜像状态](https://docs.jdcloud.com/virtual-machines/api/image_status)。|
|**createTime**|String|2020-08-21 11:36:36|镜像的创建时间。|
|**sizeMB**|Integer|3244|镜像文件的实际大小。|
|**desc**|String| |镜像描述。|
|**ownerPin**|String| |该镜像拥有者的用户PIN。|
|**launchPermission**|String|all|镜像的使用权限。取值范围：<br>`all`：没有限制，所有人均可以使用。<br>`specifiedUsers`：只有共享用户可以使用。<br>`ownerOnly`：镜像拥有者自己可以使用。<br>|
|**systemDisk**|[InstanceDiskAttachment](#instancediskattachment)| |镜像系统盘配置。|
|**dataDisks**|[InstanceDiskAttachment[]](#instancediskattachment)| |镜像数据盘配置列表。|
|**snapshotId**|String|snapshot-h8u1****36|创建云盘系统盘所使用的快照ID。系统盘类型为本地盘的镜像，此参数为空。|
|**rootDeviceType**|String|cloudDisk|镜像支持的系统盘类型。取值范围：<br>`localDisk`：本地盘系统盘。<br>`cloudDisk`：云盘系统盘。<br>|
|**progress**|String|100|镜像复制和转换时的进度，仅显示数值，单位为百分比。|
|**offline**|Boolean| |镜像的上下线状态。`offline=true` 的镜像不再允许创建云主机。|
|**uefiSupport**|Boolean| |是否支持uefi启动。|
|**serviceCode**|String| |已废弃。|
### <div id="InstanceDiskAttachment">InstanceDiskAttachment</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**diskCategory**|String|cloud|磁盘类型。<br>**系统盘**：取值为：`local` 本地系统盘 或 `cloud` 云盘系统盘。<br>**数据盘**：取值为：`local` 本地数据盘 或 `cloud` 云盘数据盘。<br>|
|**autoDelete**|Boolean|True|是否随实例一起删除，即删除实例时是否自动删除此磁盘。此参数仅对按配置计费的非多点挂载云硬盘生效。<br>`true`：随实例删除。<br>`false`：不随实例删除。<br>|
|**localDisk**|[LocalDisk](#localdisk)| |本地磁盘配置，对应 `diskCategory=local`。|
|**cloudDisk**|[Disk](#disk)| |云硬盘配置，对应 `diskCategory=cloud`。|
|**deviceName**|String|vdb|磁盘逻辑挂载点。<br>**系统盘**：默认为vda。<br>**数据盘**：取值范围：`[vdb~vdbm]`。<br>|
|**status**|String|attached|磁盘挂载状态。<br>取值范围：`attaching、detaching、attached、detached、error_attach、error_detach`。|
### <div id="Disk">Disk</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**diskId**|String| |云硬盘ID|
|**az**|String| |云硬盘所属AZ|
|**name**|String| |云硬盘名称，只允许输入中文、数字、大小写字母、英文下划线“_”及中划线“-”，不允许为空且不超过32字符。|
|**description**|String| |云硬盘描述，允许输入UTF-8编码下的全部字符，不超过256字符。|
|**diskType**|String| |云硬盘类型，取值为 ssd,premium-hdd,ssd.gp1,ssd.io1,hdd.std1|
|**diskSizeGB**|Integer| |云硬盘大小，单位为 GiB|
|**iops**|Integer| |该云硬盘实际应用的iops值|
|**throughput**|Integer| |该云硬盘实际应用的吞吐量的数值|
|**status**|String| |云硬盘状态，取值为 creating、available、in-use、extending、restoring、deleting、deleted、error_create、error_delete、error_restore、error_extend 之一|
|**attachments**|[DiskAttachment[]](#diskattachment)| |挂载信息|
|**snapshotId**|String| |创建该云硬盘的快照ID|
|**multiAttachable**|Boolean| |云盘是否支持多挂载|
|**encrypted**|Boolean| |云盘是否为加密盘|
|**enabled**|Boolean| |云盘是否被暂停（IOPS限制为极低）|
|**createTime**|String| |创建云硬盘时间|
|**charge**|[Charge](#charge)| |云硬盘计费配置信息|
|**tags**|[Tag[]](#tag)| | |
|**snapshotPolicies**|[SnapshotPolicy[]](#snapshotpolicy)| | |
### <div id="SnapshotPolicy">SnapshotPolicy</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**id**|String| |策略id|
|**name**|String| |策略名称|
|**pin**|String| |用户pin|
|**interval**|Integer| |策略执行间隔，单位:秒|
|**effectiveTime**|String| |策略生效时间。格式`YYYY-MM-DDTHH:mm:ss+xx:xx`。如`2020-02-02T20:02:00+08:00`|
|**lastTriggerTime**|String| |策略上次执行时间。格式`YYYY-MM-DDTHH:mm:ss+xx:xx`。如`2020-02-02T20:02:00+08:00`|
|**nextTriggerTime**|String| |策略下次执行时间。格式`YYYY-MM-DDTHH:mm:ss+xx:xx`。如`2020-02-02T20:02:00+08:00`|
|**snapshotLifecycle**|Integer| |快照保留时间。单位:秒。0：永久保留|
|**contactInfo**|[ContactInfo](#contactinfo)| |联系人信息|
|**createTime**|String| |策略下次执行时间。格式`YYYY-MM-DDTHH:mm:ss+xx:xx`。如`2020-02-02T20:02:00+08:00`|
|**updateTime**|String| |策略下次执行时间。格式`YYYY-MM-DDTHH:mm:ss+xx:xx`。如`2020-02-02T20:02:00+08:00`|
|**status**|Integer| |策略状态。1：启用 2：禁用|
|**diskCount**|Integer| |策略绑定的disk数量|
### <div id="ContactInfo">ContactInfo</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**sms**|Integer| |是否发送短信。0:不发送 1:发送|
|**email**|Integer| |是否发送短信。0:不发送 1:发送|
|**personIds**|Integer[]| |联系人id|
|**groupIds**|Integer[]| |联系组id|
### <div id="Tag">Tag</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**key**|String| |Tag键|
|**value**|String| |Tag值|
### <div id="Charge">Charge</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**chargeMode**|String| |支付模式，取值为：prepaid_by_duration，postpaid_by_usage或postpaid_by_duration，prepaid_by_duration表示预付费，postpaid_by_usage表示按用量后付费，postpaid_by_duration表示按配置后付费，默认为postpaid_by_duration|
|**chargeStatus**|String| |费用支付状态，取值为：normal、overdue、arrear，normal表示正常，overdue表示已到期，arrear表示欠费|
|**chargeStartTime**|String| |计费开始时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|
|**chargeExpiredTime**|String| |过期时间，预付费资源的到期时间，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ，后付费资源此字段内容为空|
|**chargeRetireTime**|String| |预期释放时间，资源的预期释放时间，预付费/后付费资源均有此值，遵循ISO8601标准，使用UTC时间，格式为：YYYY-MM-DDTHH:mm:ssZ|
### <div id="DiskAttachment">DiskAttachment</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**attachmentId**|String| |挂载ID|
|**diskId**|String| |云硬盘ID|
|**instanceType**|String| |挂载实例的类型，取值为 vm、nc|
|**instanceId**|String| |挂载实例的ID|
|**status**|String| |挂载状态，取值为 "attaching", "attached", "detaching", "detached"|
|**attachTime**|String| |挂载时间|
### <div id="LocalDisk">LocalDisk</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**diskType**|String|ssd.gp1|磁盘类型，取值范围：`ssd、premium-hdd、hdd.std1、ssd.gp1、ssd.io1`。|
|**diskSizeGB**|Integer|120|磁盘大小。|


## 请求示例
GET

```
/v1/regions/cn-north-1/images?pageNumber=1&pageSize=10&imageSource=public&platform=CentOS
```



## 返回示例
```
{
    "requestId": "5dfbb22e5f44a6798476bc2408c3bb68", 
    "result": {
        "images": [
            {
                "architecture": "x86_64", 
                "createTime": "2021-01-28 16:49:05", 
                "desc": "", 
                "imageId": "img-m5s0****29", 
                "imageSource": "public", 
                "launchPermission": "all", 
                "name": "CentOS 8.2 64位", 
                "osType": "linux", 
                "osVersion": "8.2", 
                "ownerPin": "admin", 
                "platform": "CentOS", 
                "progress": "100", 
                "rootDeviceType": "cloudDisk", 
                "sizeMB": 2494, 
                "snapshotId": "snapshot-h8u1****36", 
                "status": "ready", 
                "systemDisk": {
                    "autoDelete": true, 
                    "cloudDisk": {
                        "diskSizeGB": 40, 
                        "diskType": "ssd.gp1", 
                        "encrypt": false, 
                        "encrypted": false, 
                        "snapshotId": "snapshot-h8u1****36"
                    }, 
                    "deviceName": "vda", 
                    "diskCategory": "cloud"
                }, 
                "systemDiskSizeGB": 40, 
                "uefiSupport": false
            }, 
            {
                "architecture": "x86_64", 
                "createTime": "2019-12-30 11:05:02", 
                "desc": "", 
                "imageId": "img-m5s0****30", 
                "imageSource": "public", 
                "launchPermission": "all", 
                "name": "CentOS 7.6 64位", 
                "osType": "linux", 
                "osVersion": "7.6", 
                "ownerPin": "admin", 
                "platform": "CentOS", 
                "rootDeviceType": "cloudDisk", 
                "sizeMB": 0, 
                "snapshotId": "snapshot-h8u1****36", 
                "status": "ready", 
                "systemDisk": {
                    "autoDelete": true, 
                    "cloudDisk": {
                        "diskSizeGB": 40, 
                        "diskType": "ssd.gp1", 
                        "encrypt": false, 
                        "encrypted": false, 
                        "snapshotId": "snapshot-h8u1****36"
                    }, 
                    "deviceName": "vda", 
                    "diskCategory": "cloud"
                }, 
                "systemDiskSizeGB": 40, 
                "uefiSupport": true
            }
        ], 
        "totalCount": 2
    }
}
```

## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**400**|FAILED_PRECONDITION|Parameter ImageSource missing|未指定 imageSource 参数。|
|**400**|OUT_OF_RANGE|PageSize out of range|分页大小超出规定范围。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
