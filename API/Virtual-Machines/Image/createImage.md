# createImage


## 描述

为云主机制作私有镜像。

详细操作说明请参考帮助文档：[基于实例创建私有镜像](https://docs.jdcloud.com/cn/virtual-machines/create-private-image)

## 接口说明
- 云主机实例没有正在进行中的任务时才可制作镜像。
- 本地系统盘的实例，仅支持`stopped`（已停止）状态下制作私有镜像。
- 云盘系统盘的实例，支持`running`(运行中)、`stopped`（已停止）状态下制作私有镜像。
- 调用接口后，需要等待镜像状态变为 `ready` 后，才能正常使用镜像。
- 若当前实例系统盘为本地盘，则创建完成后的私有镜像为本地盘系统盘镜像；若当前实例系统盘为云硬盘，则创建完成后的私有镜像为云硬盘系统盘镜像。您可通过镜像类型转换 [convertImage](https://docs.jdcloud.com/Image/api/convertimage) 将本地盘系统盘镜像转换为云硬盘系统盘镜像后使用。
- 默认情况下，制作的镜像中包括数据盘中的云硬盘（制作快照），但是不包含本地数据盘。
- 如果需要变更打包镜像中的一些数据盘、或排除一些数据盘不需要制作快照，可通过 `dataDisks` 中的参数进行控制。


## 请求方式
POST

## 请求地址
https://vm.jdcloud-api.com/v1/regions/{regionId}/instances/{instanceId}:createImage

|名称|类型|是否必需|示例值|描述|
|---|---|---|---|---|
|**regionId**|String|是|cn-north-1|地域ID。|
|**instanceId**|String|是|i-eumm****d6|云主机ID。|

## 请求参数
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**name**|String|是| image-test|镜像名称，长度为2\~32个字符，只允许中文、数字、大小写字母、英文下划线（\_）、连字符（-）及点（.）。<br>|
|**description**|String|否| |镜像描述。256字符以内。<br>|
|**dataDisks**|[InstanceDiskAttachmentSpec[]](#instancediskattachmentspec)|否| |数据盘列表。<br>在不指定该参数的情况下，制作镜像的过程中会默认将该实例挂载的所有云盘数据盘制作快照，并与系统盘一起，制作成整机镜像。<br>- 如果不希望将实例中的某个云盘数据盘制作快照，可使用 `noDevice` 的方式排除，例如：`deviceName=vdb`、`noDevice=true` 制作的镜像中就不会包含 `vdb` 数据盘的快照。<br>- 如果希望调整已有设备的磁盘属性，比如上调容量，可指定`deviceName`并设置新属性，例如：`deviceName=vdb`、`diskSizeGB=100`<br>- 如果希望在整机镜像中插入一块新盘，若新加设备名，可通过指定新的 `deviceName` 的方式实现，例如：`deviceName=vdx` 将会在整机镜像中插入一块盘符为 `vdx` 的新盘，新盘可创建空盘或通过`snapshotId`指定快照创建；若新加盘期望替换已有设备，可先参照第一种情况将已有盘排除掉再指定新属性。|

### <div id="InstanceDiskAttachmentSpec">InstanceDiskAttachmentSpec</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**diskCategory**|String|否|cloud|磁盘类型。数据盘仅支持云硬盘`cloud`。<br>|
|**autoDelete**|Boolean|否|true|是否随实例一起删除，即删除实例时是否自动删除此磁盘。此参数仅对按配置计费的非多点挂载云硬盘生效。<br>`true`：随实例删除。<br>`false`：不随实例删除。<br>如不指定，则默认与磁盘当前删除属性一致。|
|**cloudDiskSpec**|[DiskSpec](#diskspec)|否| |云硬盘详细配置。|
|**deviceName**|String|否|vdb|磁盘逻辑挂载点。<br>**系统盘**：此参数无须指定且指定无效，默认为vda。<br>**数据盘**：取值范围：`[vdb~vdbm]`。<br>|
|**noDevice**|Boolean|否|false |排除参与制作镜像的磁盘，使用此参数 `noDevice` 配合 `deviceName` 一起使用。|

### <div id="DiskSpec">DiskSpec</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**az**|String|是| |云硬盘所属的可用区。此参数无须指定且指定无效。|
|**name**|String|是| |云硬盘名称。此参数无须指定且指定无效|
|**description**|String|否| |云硬盘描述。此参数无须指定且指定无效。|
|**diskType**|String|是| ssd.io1|云硬盘类型。各类型介绍请参见[云硬盘类型](https://docs.jdcloud.com/cn/cloud-disk-service/specifications)。<br>可选值：<br>`ssd.gp1`：通用型SSD<br>`ssd.io1`：性能型SSD<br>`hdd.std1`：容量型HDD<br>|
|**diskSizeGB**|Integer|是|100 |云硬盘容量，单位为 GiB，步长10GiB。<br>取值范围：<br>系统盘：`[40,500]`GiB，且不能小于镜像系统盘容量<br>数据盘：`[20,16000]`GiB，如指定`snapshotId`创建云硬盘则不能小于快照容量|
|**iops**|Integer|否| 2000|云硬盘IOPS，步长为10。仅`diskType=ssd.io1`时此参数有效。<br>取值范围：`[200,min(32000,diskSizeGB*50)]`<br>默认值：`diskSizeGB*30`|
|**snapshotId**|String|否|snapshot-ev1h****gd |创建云硬盘使用的快照ID。仅制作镜像添加新盘时此参数有效。|
|**policyId**|String|否| |云硬盘自动快照策略ID。此参数无须指定且指定无效。|
|**charge**|ChargeSpec|否| |计费配置。此参数无须指定且指定无效。|
|**multiAttachable**|Boolean|否| |云硬盘是否支持一盘多主机挂载。此参数无须指定且指定无效。|
|**encrypt**|Boolean|否| |云硬盘是否加密。仅添加空数据盘时此参数有效，指定快照ID创建时加密属性继承自快照。<br>可选值：<br>`true`：加密<br>`false`（默认值）：不加密|


## 返回参数
|名称|类型|示例值|描述|
|---|---|---|---|
|**result**|[Result](#result)| |响应结果。|
|**requestId**|String|c2hmmaan8w06w19qcdfuic4w03f7ft2d|请求ID。|

### <div id="Result">Result</div>
|名称|类型|示例值|描述|
|---|---|---|---|
|**imageId**|String|img-m5s0****29|镜像ID。|


## 请求示例
POST

#### 场景：<br>
基于实例创建私有镜像，并做如下调整：
* 当前设备名为`vdc`的云硬盘排除，镜像不包含此数据盘的快照；
* 新增（或覆盖）设备名为`vde`的云硬盘，使用快照`snapshot-h8u1****36`创建，并指定磁盘类型、容量、IOPS；
* 新增（或覆盖）设备名为`vdh`的云硬盘，该盘为空盘，并指定磁盘类型及容量。

```
/v1/regions/cn-north-1/instances/i-eumm****d6:createImage
{
    "name":"test",
    "description":"test",
    "dataDisks":[
        {
            "deviceName":"vdc",
            "noDevice":true
        },
        {
            "deviceName":"vde",
            "autoDelete":true,
            "CloudDiskSpec":{
            	"snapshotId":"snapshot-h8u1****36",
                "diskType":"ssd.io1",
                "diskSizeGB":40,
                "iops":500
            }
        },
        {
            "deviceName":"vdh",
            "CloudDiskSpec":{
                "diskType":"ssd.gp1",
                "diskSizeGB":40
            }
        }
    ]
}
```



## 返回示例
```
{
    "requestId": "0ee754ebce7a3f2f70d6d914dbbd2498", 
    "result": {
        "imageId": "img-m5s0****29"
    }
}
```

## 返回码
|HTTP状态码|错误码|描述|错误解析|
|---|---|---|---|
|**200**||OK||
|**400**|FAILED_PRECONDITION|Conflict with underlay task xx|云主机实例正在执行其它任务，请稍后再试。|
|**400**|FAILED_PRECONDITION|Invalid instance status xx|错误的云主机状态。|
|**400**|FAILED_PRECONDITION|Please stop the instance first|制作镜像前需要先停止实例。|
|**400**|FAILED_PRECONDITION|System disk not found|云主机没有挂载系统盘。|
|**400**|FAILED_PRECONDITION|Invalid system disk mount state|云主机系统盘挂载状态异常。|
|**400**|DUPLICATE|Duplicate deviceName|指定了重复的盘符。|
|**400**|INVALID_ARGUMENT|Parameter DataDisks.CloudDiskSpec.DiskType missing|没有指定云盘类型，没有使用快照的情况下需要指定类型。|
|**400**|OUT_OF_RANGE|DataDisks.CloudDiskSpec.DiskSizeGB out of range|云盘大小错误，没有使用快照的情况下需要指定大小。|
|**400**|OUT_OF_RANGE|Device 'xx' size can only be larger than the original size|指定的云盘大小，不能小于当前云硬盘的大小。|
|**400**|FAILED_PRECONDITION|Disk 'xx' busy in 'xx'|云硬盘正在执行某个任务。|
|**400**|FAILED_PRECONDITION|Invalid Disk 'xx' status 'xx'|云硬盘状态错误。|
|**400**|OUT_OF_RANGE|DataDisks.CloudDiskSpec.Iops out of range.|云硬盘iops超出规定范围。|
|**404**|NOT_FOUND|Instance 'xx' not found.|云主机实例不存在。|
|**404**|NOT_FOUND|Snapshot 'xx' not found|快照不存在。|
|**429**|QUOTA_EXCEEDED|Image quota limit exceeded|镜像配额不足。|
|**429**|QUOTA_EXCEEDED|Snapshot quota limit exceeded|快照配置不足。|
|**500**|INTERNAL|Internal server error|系统内部错误，请稍后重试。如果多次尝试失败，请提交工单。|
|**500**|UNKNOWN|Unknown server error|服务暂时不可用，请稍后重试。如果多次尝试失败，请提交工单。|
