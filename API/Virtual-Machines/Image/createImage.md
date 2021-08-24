# createImage


## 描述

为云主机制作私有镜像。

详细操作说明请参考帮助文档：[基于实例创建私有镜像](https://docs.jdcloud.com/cn/virtual-machines/create-private-image)

## 接口说明
- 云主机实例没有正在进行中的任务时才可制作镜像。
- 本地系统盘的实例，仅支持关机（已停止）状态下制作私有镜像。
- 云盘系统盘的实例，支持开机(运行中)/关机（已停止）状态下制作私有镜像。
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
|**name**|String|是| |镜像名称，长度为2\~32个字符，只允许中文、数字、大小写字母、英文下划线（\_）、连字符（-）及点（.）。<br>|
|**description**|String|否| |镜像描述。256字符以内。<br>|
|**dataDisks**|[InstanceDiskAttachmentSpec[]](#instancediskattachmentspec)|否| |数据盘列表。<br>在不指定该参数的情况下，制作镜像的过程中会将该实例中的所有云盘数据盘制作快照，并与系统盘一起，制作成打包镜像。<br>如果不希望将实例中的某个云盘数据盘制作快照，可使用 `noDevice` 的方式排除，例如：`deviceName=vdb`、`noDevice=true` 就不会将 `vdb` 制作快照。<br>如果希望在打包镜像中插入一块新盘，该盘不在实例中，可通过指定新的 `deviceName` 的方式实现，例如：`deviceName=vdx` 将会在打包镜像中插入一块盘符为 `vdx` 的新盘，支持新盘使用或不使用快照都可以。<br>如果使用 `deviceName` 指定了与实例中相同的盘符，那么实例中对应的云盘数据盘也不会制作快照，并使用新指定的参数进行替换。<br>|

### <div id="InstanceDiskAttachmentSpec">InstanceDiskAttachmentSpec</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**diskCategory**|String|否|cloud|磁盘类型。<br>**系统盘**：此参数无须指定，其类型取决于镜像类型。<br>**数据盘**：可选值：`cloud`：云硬盘，数据盘仅支持云硬盘。<br>|
|**autoDelete**|Boolean|否|True|是否随实例一起删除，即删除实例时是否自动删除此磁盘。此参数仅对按配置计费的非多点挂载云硬盘生效。<br>`true`：随实例删除。<br>`false`（默认值）：不随实例删除。<br>|
|**cloudDiskSpec**|[DiskSpec](#diskspec)|否| |磁盘详细配置。此参数仅针对云硬盘，本地系统盘无须指定且指定无效。<br>|
|**deviceName**|String|否|vdb|磁盘逻辑挂载点。<br>**系统盘**：此参数无须指定且指定无效，默认为vda。<br>**数据盘**：取值范围：`[vdb~vdbm]`。<br>|
|**noDevice**|Boolean|否| |排除设备，使用此参数 `noDevice` 配合 `deviceName` 一起使用。<br>创建镜像的场景下：使用此参数可以排除云主机实例中的云硬盘不参与制作快照。<br>创建实例模板的场景下：使用此参数可以排除镜像中的数据盘。<br>创建云主机的场景下：使用此参数可以排除实例模板、或镜像中的数据盘。<br>示例：如果镜像中除系统盘还包含一块或多块数据盘，期望仅使用镜像中的部分磁盘，可通过此参数忽略部分磁盘配置。此参数须配合 `deviceName` 一起使用。<br>例：`deviceName=vdb`、`noDevice=true`，则表示在使用镜像创建实例时，忽略数据盘vdb配置，不创建磁盘。|
### <div id="DiskSpec">DiskSpec</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**az**|String|是| |云硬盘所属的可用区|
|**name**|String|是| |云硬盘名称|
|**description**|String|否| |云硬盘描述|
|**diskType**|String|是| |云硬盘类型，取值为ssd、premium-hdd、ssd.gp1、ssd.io1、hdd.std1之一|
|**diskSizeGB**|Integer|是| |云硬盘大小，单位为 GiB，ssd 类型取值范围[20,1000]GB，步长为10G，premium-hdd 类型取值范围[20,3000]GB，步长为10G, ssd.gp1, ssd.io1, hdd.std1 类型取值均是范围[20,16000]GB，步长为10G|
|**iops**|Integer|否| |云硬盘IOPS的大小，当且仅当云盘类型是ssd.io1型的云盘有效，步长是10.|
|**snapshotId**|String|否| |用于创建云硬盘的快照ID|
|**policyId**|String|否| |策略ID|
|**charge**|[ChargeSpec](#chargespec)|否| |计费配置；如不指定，默认计费类型是后付费-按使用时常付费|
|**multiAttachable**|Boolean|否| |云硬盘是否支持一盘多主机挂载，默认为false（不支持）|
|**encrypt**|Boolean|否| |云硬盘是否加密，默认为false（不加密）|
### <div id="ChargeSpec">ChargeSpec</div>
|名称|类型|是否必选|示例值|描述|
|---|---|---|---|---|
|**chargeMode**|String|否| |计费模式，取值为：prepaid_by_duration，postpaid_by_usage或postpaid_by_duration，prepaid_by_duration表示预付费，postpaid_by_usage表示按用量后付费，postpaid_by_duration表示按配置后付费，默认为postpaid_by_duration.请参阅具体产品线帮助文档确认该产品线支持的计费类型|
|**chargeUnit**|String|否| |预付费计费单位，预付费必填，当chargeMode为prepaid_by_duration时有效，取值为：month、year，默认为month|
|**chargeDuration**|Integer|否| |预付费计费时长，预付费必填，当chargeMode取值为prepaid_by_duration时有效。当chargeUnit为month时取值为：1~9，当chargeUnit为year时取值为：1、2、3|
|**autoRenew**|Boolean|否| |True=：OPEN——开通自动续费、False=CLOSE—— 不开通自动续费，默认为CLOSE|
|**buyScenario**|String|否| |产品线统一活动凭证JSON字符串，需要BASE64编码，目前要求编码前格式为 {"activity":{"activityType":必填字段, "activityIdentifier":必填字段}}|

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
                "iops":500,
                "encrypt":false
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
